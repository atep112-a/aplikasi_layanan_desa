<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Keterangan Usaha</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const keadaanSelect = document.getElementById('keadaan_saat_ini');
            const keteranganField = document.getElementById('keterangan_tidak_lancar').parentElement;

            function toggleKeteranganField() {
                if (keadaanSelect.value === 'Berjalan Tidak Lancar') {
                    keteranganField.style.display = 'block';
                } else {
                    keteranganField.style.display = 'none';
                }
            }

            keadaanSelect.addEventListener('change', toggleKeteranganField);
            toggleKeteranganField(); // Initial check
        });
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Surat Keterangan Usaha</h2>
        <form action="{{ route('service.submit', ['service' => 'sku', 'step' => 'sku']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_pemilik_perusahaan" class="block text-gray-700">Nama Pemilik Perusahaan:</label>
                <input type="text" name="nama_pemilik_perusahaan" id="nama_pemilik_perusahaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="no_wa" class="block text-gray-700">No Wa:</label>
                <input type="text" name="no_wa" id="no_wa" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="nama_perusahaan" class="block text-gray-700">Nama Perusahaan:</label>
                <input type="text" name="nama_perusahaan" id="nama_perusahaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="bentuk_perusahaan" class="block text-gray-700">Bentuk Perusahaan:</label>
                <input type="text" name="bentuk_perusahaan" id="bentuk_perusahaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="alamat_perusahaan" class="block text-gray-700">Alamat Perusahaan:</label>
                <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="npwp" class="block text-gray-700">NPWP (Tidak Wajib):</label>
                <input type="text" name="npwp" id="npwp" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="bidang_kegiatan_usaha" class="block text-gray-700">Bidang/Kegiatan Usaha:</label>
                <input type="text" name="bidang_kegiatan_usaha" id="bidang_kegiatan_usaha" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="jenis_barang_jasa_dagang_utama" class="block text-gray-700">Jenis Barang/Jasa Dagang Utama:</label>
                <input type="text" name="jenis_barang_jasa_dagang_utama" id="jenis_barang_jasa_dagang_utama" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="keadaan_saat_ini" class="block text-gray-700">Keadaan Saat Ini:</label>
                <select name="keadaan_saat_ini" id="keadaan_saat_ini" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    <option value="Berjalan Lancar">Berjalan Lancar</option>
                    <option value="Berjalan Tidak Lancar">Berjalan Tidak Lancar</option>
                </select>
            </div>
            <div class="mb-4" id="tidak-lancar">
                <label for="keterangan_tidak_lancar" class="block text-gray-700">Keterangan (Jika Tidak Lancar):</label>
                <textarea name="keterangan_tidak_lancar" id="keterangan_tidak_lancar" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <div class="mb-4">
                <label for="ktp" class="block text-gray-700">Upload KTP</label>
                <input type="file" name="ktp" id="ktp" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Kirim</button>
        </form>
    </div>
</body>
</html>
