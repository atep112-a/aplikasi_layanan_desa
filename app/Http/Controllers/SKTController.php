<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skt;

use Illuminate\Support\Facades\Storage;
class SKTController extends Controller
{
    public function index()
    {
        $skt = Skt::latest()->paginate(10);
        return view('skt.index', compact('skt'));
    }
    public function submit(){
        return response()->json(['message' => 'Form submitted successfully']);
    }


    public function show($id)
    {
        $skt = Skt::findOrFail($id);
        return view('skt.show', compact('skt'));
    }

    public function edit($id)
    {
        $skt = skt::findOrFail($id);
        return view('skt.edit', compact('skt'));
    }

    public function update(Request $request, $id)
    {
        $skt = Skt::findOrFail($id);

        // Validasi data
        $validatedData = $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'no_wa' => 'required|string|max:15',
            'tanggal_kepemilikan' => 'required|date',
            'luas' => 'required|numeric',
            'batas_utara' => 'required|string|max:255',
            'batas_selatan' => 'required|string|max:255',
            'batas_timur' => 'required|string|max:255',
            'batas_barat' => 'required|string|max:255',
            'jenis_tanah' => 'required|string|in:Darat,Sawah',
            'sertifikat' => 'required|string|in:Ada,Tidak Ada',
            'no_sertifikat' => 'nullable|string|max:255',
            'dijaminkan' => 'required|string|in:Ya,Tidak',
            'ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        // Upload file KTP
        if ($request->hasFile('ktp')) {
            // Hapus file KTP lama jika ada
            if ($skt->ktp) {
                Storage::disk('public')->delete($skt->ktp);
            }

            // Simpan file KTP baru
            $ktpPath = $request->file('ktp')->store('ktp', 'public');
            $validatedData['ktp'] = $ktpPath;
        }

        // Jika sertifikat "Tidak Ada", kosongkan nomor sertifikat
        if ($validatedData['sertifikat'] === 'Tidak Ada') {
            $validatedData['no_sertifikat'] = null;
        }

        // Update data dalam database
        $skt->update($validatedData);

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('skt.index')->with('success', 'Data Surat Keterangan Tanah berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $skt = Skt::findOrFail($id);
        if ($skt->ktp) {
            Storage::delete($skt->ktp);
        }

        $skt->delete();

        return redirect()->route('skt.index')->with('success', 'SPPT deleted successfully.');
    }
}
