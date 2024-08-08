<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sktm;
use App\Models\Sppt;
use App\Models\Sku;
use App\Models\Skt;
use App\Models\Kelahiran;
use App\Models\Kematian;
use App\Models\Domisili; // Add this line
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index() : View
    {
        return view('user.index');
    }

    public function showForm($service, $step) : View
    {
        return view("services.$service-step$step");
    }

    public function submitForm(Request $request, $service, $step) : RedirectResponse
    {
        if ($step == 1) {
            $request->validate([
                'nama' => 'required|string|max:255',
                'nik' => 'required|string|max:16',
                'alamat' => 'required|string|max:255',
                'no_wa' => 'required|string|max:15',
            ]);

            // Create the user and get the user ID
            $user = User::create($request->only(['nama', 'nik', 'alamat', 'no_wa']));
            $userId = $user->id; // Store the user ID in the session
            $request->session()->put('userId', $userId);

            return redirect()->route('service.form', ['service' => $service, 'step' => 2]);
        } elseif ($step == 2) {
            $request->validate([
                'ktp' => 'required|file|mimes:jpg,jpeg,png',
                'kk' => 'required|file|mimes:jpg,jpeg,png',
            ]);

            $userId = $request->session()->get('userId');
            if (!$userId) {
                return redirect()->back()->withErrors('User not found.');
            }

            $ktpPath = $request->file('ktp')->store('public/storage/files');
            $kkPath = $request->file('kk')->store('public/storage/files');

            if ($service == 'sktm') {
                Sktm::create([
                    'user_id' => $userId,
                    'ktp' => $ktpPath,
                    'kk' => $kkPath,
                    'status' => 'Proses'
                ]);
            } elseif ($service == 'sppt') {
                $request->validate([
                    'batas_utara' => 'required|string|max:50',
                    'batas_selatan' => 'required|string|max:50',
                    'batas_timur' => 'required|string|max:50',
                    'batas_barat' => 'required|string|max:50',
                ]);
                Sppt::create([
                    'user_id' => $userId,
                    'batas_utara' => $request->batas_utara,
                    'batas_selatan' => $request->batas_selatan,
                    'batas_timur' => $request->batas_timur,
                    'batas_barat' => $request->batas_barat,
                    'ktp' => $ktpPath,
                    'kk' => $kkPath,
                    'status' => 'Proses'
                ]);
            } elseif ($service == 'skl') {
                $request->validate([
                    'nama_pelahir' => 'required|string|max:255',
                    'tanggal' => 'required|string|max:16',
                    'waktu' => 'required|string|max:255',
                    'tempat' => 'required|string|max:255',
                    'pembantu_lahir' => 'required|string|max:255',
                ]);
                Kelahiran::create([
                    'user_id' => $userId,
                    'nama_pelahir' => $request->nama_pelahir,
                    'tanggal' => $request->tanggal,
                    'waktu' => $request->waktu,
                    'tempat' => $request->tempat,
                    'pembantu_lahir' => $request->pembantu_lahir,
                    'ktp' => $ktpPath,
                    'kk' => $kkPath,
                    'status' => 'Proses',
                ]);
            } elseif ($service == 'kematian') {
                $request->validate([
                    'kronologi' => 'required|string|max:255',
                    'tanggal' => 'required|string|max:16',
                    'waktu' => 'required|string|max:255',
                    'tempat' => 'required|string|max:255',
                ]);
                Kematian::create([
                    'user_id' => $userId,
                    'kronologi' => $request->kronologi,
                    'tanggal' => $request->tanggal,
                    'waktu' => $request->waktu,
                    'tempat' => $request->tempat,
                    'ktp' => $ktpPath,
                    'kk' => $kkPath,
                    'status' => 'Proses',
                ]);
            }
        }
        elseif($step == 'domisili'){
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
            'tujuan_pembuatan' => 'required|string|max:255',
            'ktp' => 'required|file|mimes:jpg,jpeg,png',
        ]);

        $ktpPath = $request->file('ktp')->store('public/storage/files');
        //create domisili
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

        }
        elseif($step == 'sku'){
            $request->validate([
                'nama_pemilik_perusahaan' => 'required|string',
                'no_wa' => 'required|string|max:15',
                'nama_perusahaan' => 'required|string',
                'bentuk_perusahaan' => 'required|string',
                'alamat_perusahaan' => 'required|string',
                'npwp' => 'nullable|string',
                'bidang_kegiatan_usaha' => 'required|string',
                'jenis_barang_jasa_dagang_utama' => 'required|string',
                'keadaan_saat_ini' => 'required|string',
                'keterangan_tidak_lancar' => 'nullable|string',
                'ktp' => 'nullable|file|mimes:jpg,jpeg,png',
            ]);
            $ktpPath = $request->file('ktp')->store('public/storage/files');
            Sku::create([
                'nama_pemilik_perusahaan' => $request-> nama_pemilik_perusahaan ,
                'nama_perusahaan' => $request-> nama_perusahaan,
                'no_wa' => $request->no_wa,
                'bentuk_perusahaan' => $request-> bentuk_perusahaan ,
                'alamat_perusahaan' => $request-> alamat_perusahaan ,
                'npwp' => $request-> npwp,
                'bidang_kegiatan_usaha' => $request-> bidang_kegiatan_usaha,
                'jenis_barang_jasa_dagang_utama' => $request-> jenis_barang_jasa_dagang_utama,
                'keadaan_saat_ini' => $request-> keadaan_saat_ini,
                'keterangan_tidak_lancar' => $request-> keterangan_tidak_lancar,
                'ktp' => $ktpPath,
                'status' =>  'Proses',
            ]);

        } elseif($step == 'skt'){

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
                    'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);

                if ($request->hasFile('ktp')) {
                    $ktpPath = $request->file('ktp')->store('ktp', 'public');
                    $validatedData['ktp'] = $ktpPath;
                }

                if ($validatedData['sertifikat'] === 'Tidak Ada') {
                    $validatedData['no_sertifikat'] = null;
                }

                $validatedData['status'] = 'Proses';

                Skt::create($validatedData);

        }

        return redirect()->route('user.index')->with('success', 'Form submitted successfully!');
    }
}
