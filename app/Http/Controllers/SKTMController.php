<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sktm;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SKTMController extends Controller
{
    public function index()
    {
        $sktms = Sktm::with('user')->latest()->paginate(10);
        return view('sktms.index', compact('sktms'));
    }
    public function submit(Request $request)
    {
        return response()->json(['message' => 'Form submitted successfully']);
    }

    public function submitStep1(Request $request)
    {
        $request->validate([
            'sktm-name' => 'required|string|max:255',
            'sktm-nik' => 'required|string|max:16',
            'sktm-address' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->nama = $request->input('sktm-name');
        $user->nik = $request->input('sktm-nik');
        $user->alamat = $request->input('sktm-address');
        $user->save();

        return redirect()->route('service.form', ['service' => 'sktm', 'step' => 2, 'user_id' => $user->id]);
    }

    public function show($id)
    {
        $sktm = Sktm::findOrFail($id);
        return view('sktms.show', compact('sktm'));
    }

    public function edit($id)
    {
        $sktm = Sktm::findOrFail($id);
        return view('sktms.edit', compact('sktm'));
    }

    public function update(Request $request, $id)
    {
        $sktm = Sktm::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required|string|max:255',
        ]);

        // Update user information
        $user = $sktm->user;
        $user->update($request->only(['nama', 'nik', 'alamat']));

        // Update documents if they are uploaded
        if ($request->hasFile('ktp')) {
            // Delete the old file
            if ($sktm->ktp) {
                Storage::delete($sktm->ktp);
            }
            // Store the new file
            $sktm->ktp = $request->file('ktp')->store('public/storage/files');
        }

        if ($request->hasFile('kk')) {
            // Delete the old file
            if ($sktm->kk) {
                Storage::delete($sktm->kk);
            }
            // Store the new file
            $sktm->kk = $request->file('kk')->store('public/storage/files');
        }

        // Update the status
        $sktm->status = $request->status;
        $sktm->save();

        return redirect()->route('SKTM.index')->with('success', 'SKTM updated successfully.');
    }


    public function destroy($id)
    {
        $sktm = Sktm::findOrFail($id);
        if ($sktm->ktp) {
            Storage::delete($sktm->ktp);
        }

        if ($sktm->kk) {
            Storage::delete($sktm->kk);
        }
        $sktm->delete();

        return redirect()->route('SKTM.index')->with('success', 'SKTM deleted successfully.');
    }

}
