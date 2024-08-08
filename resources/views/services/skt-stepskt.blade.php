<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat Keterangan Tanah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Surat Keterangan Tanah</h2>
        <form action="{{ route('service.submit', ['service' => 'skt', 'step' => 'skt']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama_pemilik" class="block text-gray-700">Nama Pemilik:</label>
                <input type="text" name="nama_pemilik" id="nama_pemilik" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="no_wa" class="block text-gray-700">Nomor WhatsApp:</label>
                <input type="text" name="no_wa" id="no_wa" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="tanggal_kepemilikan" class="block text-gray-700">Tanggal Kepemilikan:</label>
                <input type="date" name="tanggal_kepemilikan" id="tanggal_kepemilikan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="luas" class="block text-gray-700">Luas (m²):</label>
                <input type="number" name="luas" id="luas" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="batas_utara" class="block text-gray-700">Batas Utara:</label>
                <input type="text" name="batas_utara" id="batas_utara" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="batas_selatan" class="block text-gray-700">Batas Selatan:</label>
                <input type="text" name="batas_selatan" id="batas_selatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="batas_timur" class="block text-gray-700">Batas Timur:</label>
                <input type="text" name="batas_timur" id="batas_timur" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="batas_barat" class="block text-gray-700">Batas Barat:</label>
                <input type="text" name="batas_barat" id="batas_barat" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="jenis_tanah" class="block text-gray-700">Jenis Tanah:</label>
                <select name="jenis_tanah" id="jenis_tanah" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                    <option value="Darat">Darat</option>
                    <option value="Sawah">Sawah</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="sertifikat" class="block text-gray-700">Sertifikat:</label>
                <select name="sertifikat" id="sertifikat" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required onchange="toggleNoSertifikat()">
                    <option value="Ada">Ada</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                </select>
            </div>
            <div class="mb-4" id="no_sertifikat_wrapper" style="display: none;">
                <label for="no_sertifikat" class="block text-gray-700">Nomor Sertifikat:</label>
                <input type="text" name="no_sertifikat" id="no_sertifikat" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="dijaminkan" class="block text-gray-700">Apakah Tanah Dijaminkan?</label>
                <select name="dijaminkan" id="dijaminkan" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="ktp" class="block text-gray-700">Upload KTP:</label>
                <input type="file" name="ktp" id="ktp" required class="mt-1 block w-full text-gray-700 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Kirim</button>
        </form>
    </div>

    <script>
        function toggleNoSertifikat() {
            const sertifikat = document.getElementById('sertifikat');
            const noSertifikatWrapper = document.getElementById('no_sertifikat_wrapper');

            if (sertifikat.value === 'Ada') {
                noSertifikatWrapper.style.display = 'block';
                document.getElementById('no_sertifikat').required = true;
            } else {
                noSertifikatWrapper.style.display = 'none';
                document.getElementById('no_sertifikat').required = false;
            }
        }

        // Initialize visibility based on the default value
        document.addEventListener('DOMContentLoaded', function() {
            toggleNoSertifikat();
        });
    </script>
</body>
</html>
