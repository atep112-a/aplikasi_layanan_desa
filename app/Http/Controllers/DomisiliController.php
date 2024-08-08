<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;

class DomisiliController extends Controller
{
    public function index(){
        $domisili = Domisili::latest()->paginate(10);
        return view('domisili.index', compact('domisili'));
    }


    public function create(): View
    {
        return view('domisili.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:30',
            'no_wa' => 'required|string|max:15',
            'ttl' => 'required|string|max:40',
            'jk' => 'required|string|max:40',
            'agama' => 'required|string|max:40',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kegunaan' => 'required|string|max:255',
            'tujuan pembuatan' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
        ]);

        $ktpPath = $request->file('ktp')->store('public/storage/files');
        //create product

        Domisili::create([
            'nama'  => $request->nama,
            'nik'   => $request->nik,
            'no_wa' => $request->no_wa,
            'ttl'   => $request->ttl,
            'jk'   => $request->jk,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'alamat'   => $request->alamat,
            'kegunaan' => $request->kegunaan,
            'tujuan_pembuatan' => $request->tujuan_pembuatan,
            'ktp' => $ktpPath,
            'status' => 'Proses',
        ]);

        //redirect to index
        return redirect()->route('user.index')->with('success', 'Form submitted successfully!');
    }

    public function show($id)
    {
        $domisili = Domisili::findOrFail($id);
        return view('domisili.show', compact('domisili'));
    }

    public function edit($id)
    {
        $domisili = Domisili::findOrFail($id);
        return view('domisili.edit', compact('domisili'));
    }

    public function update(Request $request, $id)
    {
        $domisili = Domisili::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:30',
            'no_wa' => 'required|string|max:15',
            'ttl' => 'required|string|max:40',
            'jk' => 'required|string|max:40',
            'agama' => 'required|string|max:40',
            'pekerjaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kegunaan' => 'required|string|max:255',
            'tujuan pembuatan' => 'required|string|max:255',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            'status' => 'required|string|max:255',
        ]);

        if ($request->hasFile('ktp')) {
            // Delete the old file
            if ($domisili->ktp) {
                Storage::delete($domisili->ktp);
            }
            // Store the new file
            $domisili->ktp = $request->file('ktp')->store('public/storage/files');
        }


        $domisili->nama = $request->nama;
        $domisili->nik = $request->nik;
        $domisili->no_wa = $request->no_wa;
        $domisili->ttl = $request->ttl;
        $domisili->jk = $request->jk;
        $domisili->agama = $request->agama;
        $domisili->pekerjaan = $request->pekerjaan;
        $domisili->alamat = $request->alamat;
        $domisili->kegunaan = $request->kegunaan;
        $domisili->tujuan_pembuatan = $request->tujuan_pembuatan;
        $domisili->status = $request->input('status');
        $domisili->save();

        return redirect()->route('domisili.index')->with('success', 'Domisili updated successfully.');
    }

    public function destroy($id)
    {
        $domisili = Domisili::findOrFail($id);
        if ($domisili->ktp) {
            Storage::delete($domisili->ktp);
        }

        $domisili->delete();

        return redirect()->route('domisili.index')->with('success', 'Domisili deleted successfully.');
    }
}
