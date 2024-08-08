<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit SKU</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleKeteranganTidakLancar() {
            const keadaanSaatIni = document.getElementById('keadaan_saat_ini').value;
            const keteranganField = document.getElementById('keterangan_tidak_lancar_field');

            if (keadaanSaatIni === 'Berjalan Tidak Lancar') {
                keteranganField.style.display = 'block';
            } else {
                keteranganField.style.display = 'none';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            toggleKeteranganTidakLancar();
            document.getElementById('keadaan_saat_ini').addEventListener('change', toggleKeteranganTidakLancar);
        });
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Edit SKU</h2>
        <form action="{{ route('sku.update', $sku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nama_pemilik_perusahaan" class="block text-sm font-medium text-gray-700">Nama Pemilik Perusahaan</label>
                    <input type="text" name="nama_pemilik_perusahaan" id="nama_pemilik_perusahaan" value="{{ $sku->nama_pemilik_perusahaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="no_wa" class="block text-sm font-medium text-gray-700">Nomor WA</label>
                    <input type="text" name="no_wa" id="no_wa" value="{{ $sku->no_wa }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" value="{{ $sku->nama_perusahaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="bentuk_perusahaan" class="block text-sm font-medium text-gray-700">Bentuk Perusahaan</label>
                    <input type="text" name="bentuk_perusahaan" id="bentuk_perusahaan" value="{{ $sku->bentuk_perusahaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="alamat_perusahaan" class="block text-sm font-medium text-gray-700">Alamat Perusahaan</label>
                    <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" value="{{ $sku->alamat_perusahaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="npwp" class="block text-sm font-medium text-gray-700">NPWP</label>
                    <input type="text" name="npwp" id="npwp" value="{{ $sku->npwp }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label for="bidang_kegiatan_usaha" class="block text-sm font-medium text-gray-700">Bidang Kegiatan Usaha</label>
                    <input type="text" name="bidang_kegiatan_usaha" id="bidang_kegiatan_usaha" value="{{ $sku->bidang_kegiatan_usaha }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="jenis_barang_jasa_dagang_utama" class="block text-sm font-medium text-gray-700">Jenis Barang/Jasa Dagang Utama</label>
                    <input type="text" name="jenis_barang_jasa_dagang_utama" id="jenis_barang_jasa_dagang_utama" value="{{ $sku->jenis_barang_jasa_dagang_utama }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="keadaan_saat_ini" class="block text-sm font-medium text-gray-700">Keadaan Saat Ini</label>
                    <select name="keadaan_saat_ini" id="keadaan_saat_ini" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Berjalan Lancar" {{ $sku->keadaan_saat_ini == 'Berjalan Lancar' ? 'selected' : '' }}>Berjalan Lancar</option>
                        <option value="Berjalan Tidak Lancar" {{ $sku->keadaan_saat_ini == 'Berjalan Tidak Lancar' ? 'selected' : '' }}>Berjalan Tidak Lancar</option>
                    </select>
                </div>
                <div id="keterangan_tidak_lancar_field" style="display: none;">
                    <label for="keterangan_tidak_lancar" class="block text-sm font-medium text-gray-700">Keterangan (Jika Tidak Lancar)</label>
                    <input type="text" name="keterangan_tidak_lancar" id="keterangan_tidak_lancar" value="{{ $sku->keterangan_tidak_lancar }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                </div>
                <div>
                    <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
                    <input type="file" name="ktp" id="ktp" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    <p class="mt-2 text-sm text-gray-500">Current File: {{ basename($sku->ktp) }}</p>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Proses" {{ $sku->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $sku->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-blue-500 transition duration-200">Update</button>
                <a href="{{ route('sku.index') }}" class="ml-4 bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
