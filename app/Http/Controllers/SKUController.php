<?php

namespace App\Http\Controllers;

use App\Models\Sku;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SKUController extends Controller
{
    public function index()
    {
        $sku = Sku::latest()->paginate(10);
        return view('sku.index', compact('sku'));
    }

    public function show($id)
    {
        $sku = Sku::findOrFail($id);
        return view('sku.show', compact('sku'));
    }

    public function create(): View
    {
        return view('sku.create');
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nama_pemilik_perusahaan' => 'required|string',
        'nama_perusahaan' => 'required|string',
        'bentuk_perusahaan' => 'required|string',
        'alamat_perusahaan' => 'required|string',
        'npwp' => 'nullable|string',
        'bidang_kegiatan_usaha' => 'required|string',
        'jenis_barang_jasa_dagang_utama' => 'required|string',
        'keadaan_saat_ini' => 'required|string',
        'keterangan_tidak_lancar' => 'nullable|string',
    ]);

    Sku::create($validatedData);

    return redirect()->route('sku.index')->with('success', 'Surat Keterangan Usaha created successfully.');
    }


    public function edit($id)
    {
        $sku = Sku::findOrFail($id);
        return view('sku.edit', compact('sku'));
    }

    public function update(Request $request, $id)
{
    $suratKeteranganUsaha = Sku::findOrFail($id);
    $validatedData = $request->validate([
        'nama_pemilik_perusahaan' => 'required|string',
        'no_wa' => 'required|string',
        'nama_perusahaan' => 'required|string',
        'bentuk_perusahaan' => 'required|string',
        'alamat_perusahaan' => 'required|string',
        'npwp' => 'nullable|string',
        'bidang_kegiatan_usaha' => 'required|string',
        'jenis_barang_jasa_dagang_utama' => 'required|string',
        'keadaan_saat_ini' => 'required|string',
        'keterangan_tidak_lancar' => 'nullable|string',
        'ktp' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'status' => 'required|string',
    ]);

    if ($request->hasFile('ktp')) {
        if ($suratKeteranganUsaha->ktp) {
            Storage::delete($suratKeteranganUsaha->ktp);
        }
        $validatedData['ktp'] = $request->file('ktp')->store('ktp', 'public');
    }



    $suratKeteranganUsaha->update($validatedData);

    return redirect()->route('sku.index')->with('success', 'Surat Keterangan Usaha updated successfully.');
}


    public function destroy($id)
    {
        $sku = Sku::findOrFail($id);
        if ($sku->ktp) {
            Storage::delete($sku->ktp);
        }

        $sku->delete();

        return redirect()->route('sku.index')->with('success', 'SKU deleted successfully.');
    }
}
