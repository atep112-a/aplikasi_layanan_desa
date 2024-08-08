<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Edit Kelahiran</h2>
        <form action="{{ route('domisili.update', $domisili->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $domisili->nama }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ $domisili->nik }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $domisili->alamat }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="no_wa" class="block text-sm font-medium text-gray-700">No WhatsApp</label>
                    <input type="text" name="no_wa" id="no_wa" value="{{ $domisili->no_wa }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="ttl" class="block text-sm font-medium text-gray-700">Tempat/Tanggal lahir</label>
                    <input type="text" name="ttl" id="ttl" value="{{ $domisili->ttl }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="jk" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Laki - Laki" {{ $domisili->jk == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                        <option value="Perempuan" {{ $domisili->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                    <input type="text" name="agama" id="agama" value="{{ $domisili->agama }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                    <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $domisili->pekerjaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="kegunaan" class="block text-sm font-medium text-gray-700">kegunaan</label>
                    <input type="text" name="kegunaan" id="kegunaan" value="{{ $domisili->kegunaan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="tujuan_pembuatan" class="block text-sm font-medium text-gray-700">Tujuan Pembuatan</label>
                    <input type="text" name="tujuan_pembuatan" id="tujuan_pembuatan" value="{{ $domisili->tujuan_pembuatan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
                    <input type="file" name="ktp" id="ktp" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    <p class="mt-2 text-sm text-gray-500">Current File: {{ basename($domisili->ktp) }}</p>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Proses" {{ $domisili->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $domisili->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-blue-500 transition duration-200">Update</button>
                <a href="{{ route('domisili.index') }}" class="ml-4 bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
