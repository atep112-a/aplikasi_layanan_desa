<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kematian;

class KematianController extends Controller
{
    public function index()
    {
        $kematian = Kematian::with('user')->latest()->paginate(10);
        return view('kematian.index', compact('kematian'));
    }

    public function show($id)
    {
        $kematian = Kematian::findOrFail($id);
        return view('kematian.show', compact('kematian'));
    }

    public function edit($id)
    {
        $kematian = Kematian::findOrFail($id);
        return view('kematian.edit', compact('kematian'));
    }

    public function update(Request $request, $id)
    {
        $kematian = Kematian::findOrFail($id);
        $request->validate([
            'kronologi' => 'required|string|max:255',
            'tanggal' => 'required|string|max:16',
            'waktu' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required|string|max:255',
        ]);

        if ($request->hasFile('ktp')) {
            // Delete the old file
            if ($kematian->ktp) {
                Storage::delete($kematian->ktp);
            }
            // Store the new file
            $kematian->ktp = $request->file('ktp')->store('public/storage/files');
        }

        if ($request->hasFile('kk')) {
            // Delete the old file
            if ($kematian->kk) {
                Storage::delete($kematian->kk);
            }
            // Store the new file
            $kematian->kk = $request->file('kk')->store('public/storage/files');
        }

        $kematian->kronologi = $request->kronologi;
        $kematian->tanggal = $request->tanggal;
        $kematian->waktu = $request->waktu;
        $kematian->tempat = $request->tempat;
        $kematian->status = $request->input('status');
        $kematian->save();

        return redirect()->route('Kematian.index')->with('success', 'Kematian updated successfully.');
    }

    public function destroy($id)
    {
        $kematian = Kematian::findOrFail($id);
        if ($kematian->ktp) {
            Storage::delete($kematian->ktp);
        }

        if ($kematian->kk) {
            Storage::delete($kematian->kk);
        }
        $kematian->delete();

        return redirect()->route('Kematian.index')->with('success', 'Kematian deleted successfully.');
    }
}
