<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Storage;

use App\Models\Kelahiran;

class SKLController extends Controller
{

    public function index()
    {
        $kelahiran = Kelahiran::with('user')->latest()->paginate(10);
        return view('kelahiran.index', compact('kelahiran'));
    }
    public function submit(Request $request)
    {
        return response()->json(['message' => 'Form submitted successfully']);
    }

    public function submitStep1(Request $request)
    {
        $request->validate([
            'skl-name' => 'required|string|max:255',
            'skl-nik' => 'required|string|max:16',
            'skl-address' => 'required|string|max:255',
        ]);

        $user = new User();
        $user->nama = $request->input('skl-name');
        $user->nik = $request->input('skl-nik');
        $user->alamat = $request->input('skl-address');
        $user->save();

        return redirect()->route('service.form', ['service' => 'skl', 'step' => 2, 'user_id' => $user->id]);
    }

    public function show($id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        return view('kelahiran.show', compact('kelahiran'));
    }

    public function edit($id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        return view('kelahiran.edit', compact('kelahiran'));
    }

    public function update(Request $request, $id)
    {
        $skl = Kelahiran::findOrFail($id);
        $request->validate([
            'nama_pelahir' => 'required|string|max:255',
            'tanggal' => 'required|string|max:16',
            'waktu' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'pembantu_lahir' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required|string|max:255',
        ]);

        if ($request->hasFile('ktp')) {
            // Delete the old file
            if ($skl->ktp) {
                Storage::delete($skl->ktp);
            }
            // Store the new file
            $skl->ktp = $request->file('ktp')->store('public/storage/files');
        }

        if ($request->hasFile('kk')) {
            // Delete the old file
            if ($skl->kk) {
                Storage::delete($skl->kk);
            }
            // Store the new file
            $skl->kk = $request->file('kk')->store('public/storage/files');
        }

        $skl->nama_pelahir = $request->input('nama_pelahir');
        $skl->tanggal = $request->input('tanggal');
        $skl->waktu = $request->input('waktu');
        $skl->tempat = $request->input('tempat');
        $skl->pembantu_lahir = $request->input('pembantu_lahir'); // Ensure this field is being updated
        $skl->status = $request->input('status');
        $skl->save();

        return redirect()->route('Kelahiran.index')->with('success', 'Kelahiran updated successfully.');
    }


    public function destroy($id)
    {
        $kelahiran = Kelahiran::findOrFail($id);
        if ($kelahiran->ktp) {
            Storage::delete($kelahiran->ktp);
        }

        if ($kelahiran->kk) {
            Storage::delete($kelahiran->kk);
        }
        $kelahiran->delete();

        return redirect()->route('Kelahiran.index')->with('success', 'Kelahiran deleted successfully.');
    }
}
