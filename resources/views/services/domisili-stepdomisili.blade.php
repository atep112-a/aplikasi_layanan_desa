<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Domisili</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Surat Domisili</h2>
        <form action="{{ route('service.submit', ['service' => 'domisili', 'step' => 'domisili']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama:</label>
                <input type="text" name="nama" id="nama" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="nik" class="block text-gray-700">NIK:</label>
                <input type="text" name="nik" id="nik" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700">Alamat:</label>
                <input type="text" name="alamat" id="alamat" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="no_wa" class="block text-gray-700">Nomor WhatsApp:</label>
                <input type="text" name="no_wa" id="no_wa" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="jk" class="block text-gray-700">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Laki - Laki">Laki - Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
            </div>
            <div class="mb-4">
                <label for="ttl" class="block text-gray-700">Tempat/Tanggal Lahir</label>
                <input type="text" name="ttl" id="ttl" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="agama" class="block text-gray-700">Agama</label>
                <input type="text" name="agama" id="agama" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="pekerjaan" class="block text-gray-700">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="kegunaan" class="block text-gray-700">Kegunaan</label>
                <input type="text" name="kegunaan" id="kegunaan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="tujuan_pembuatan" class="block text-gray-700">Tujuan Pembuatan</label>
                <input type="text" name="tujuan_pembuatan" id="tujuan_pembuatan" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-4">
                <label for="ktp" class="block text-gray-700">Upload KTP:</label>
                <input type="file" name="ktp" id="ktp" required class="mt-1 block w-full text-gray-700 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white py-2 px-4 rounded-md hover:bg-indigo-600">Kirim</button>
        </form>
    </div>
</body>
</html>
