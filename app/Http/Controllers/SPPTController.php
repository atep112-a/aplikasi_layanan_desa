<?php

namespace App\Http\Controllers;

use App\Models\Sppt;
use App\Models\User;
use Illuminate\Http\Request;

class SPPTController extends Controller
{
    public function index()
    {
        $sppt = Sppt::with('user')->latest()->paginate(10);
        return view('sppt.index', compact('sppt'));
    }
    public function submit(){
        return response()->json(['message' => 'Form submitted successfully']);
    }

    public function submitStep1(){

            $request->validate([
                'sppt-name' => 'required|string|max:255',
                'sppt-nik' => 'required|string|max:16',
                'sppt-address' => 'required|string|max:255',
            ]);

            $user = new User();
            $user->nama = $request->input('sppt-name');
            $user->nik = $request->input('sppt-nik');
            $user->alamat = $request->input('sppt-address');
            $user->save();

            return redirect()->route('service.form', ['service' => 'sppt', 'step' => 2, 'user_id' => $user->id]);

    }

    public function show($id)
    {
        $sppt = Sppt::findOrFail($id);
        return view('sppt.show', compact('sppt'));
    }

    public function edit($id)
    {
        $sppt = Sppt::findOrFail($id);
        return view('sppt.edit', compact('sppt'));
    }

    public function update(Request $request, $id)
    {
        $sppt = Sppt::findOrFail($id);
        $request->validate([
            'batas_utara' => 'required|string|max:255',
            'batas_selatan' => 'required|string|max:255',
            'batas_timur' => 'required|string|max:255',
            'batas_barat' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required|string|max:255',
        ]);

        if ($request->hasFile('ktp')) {
            // Delete the old file
            if ($sppt->ktp) {
                Storage::delete($sppt->ktp);
            }
            // Store the new file
            $sppt->ktp = $request->file('ktp')->store('public/storage/files');
        }

        if ($request->hasFile('kk')) {
            // Delete the old file
            if ($sppt->kk) {
                Storage::delete($sppt->kk);
            }
            // Store the new file
            $sppt->kk = $request->file('kk')->store('public/storage/files');
        }
        $sppt->batas_utara = $request->batas_utara;
        $sppt->batas_selatan = $request->batas_selatan;
        $sppt->batas_timur = $request->batas_timur;
        $sppt->batas_barat = $request->batas_barat;
        $sppt->status = $request->status;
        $sppt->save();

        return redirect()->route('SPPT.index')->with('success', 'SPPT updated successfully.');
    }

    public function destroy($id)
    {
        $sppt = Sppt::findOrFail($id);
        if ($sppt->ktp) {
            Storage::delete($sppt->ktp);
        }

        if ($sppt->kk) {
            Storage::delete($sppt->kk);
        }
        $sppt->delete();

        return redirect()->route('SPPT.index')->with('success', 'SPPT deleted successfully.');
    }
}
