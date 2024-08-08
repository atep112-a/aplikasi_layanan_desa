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
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Edit SKTM</h2>
        <form action="{{ route('SPPT.update', $sppt->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $sppt->user->nama }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" name="nik" id="nik" value="{{ $sppt->user->nik }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="{{ $sppt->user->alamat }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_utara" class="block text-sm font-medium text-gray-700">Batas utara</label>
                    <input type="text" name="batas_utara" id="batas_utara" value="{{ $sppt->batas_utara }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_selatan" class="block text-sm font-medium text-gray-700">Batas Selatan</label>
                    <input type="text" name="batas_selatan" id="batas_selatan" value="{{ $sppt->batas_selatan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_timur" class="block text-sm font-medium text-gray-700">Batas Timur</label>
                    <input type="text" name="batas_timur" id="batas_timur" value="{{ $sppt->batas_timur }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_barat" class="block text-sm font-medium text-gray-700">Batas Barat</label>
                    <input type="text" name="batas_barat" id="batas_barat" value="{{ $sppt->batas_barat }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="ktp" class="block text-sm font-medium text-gray-700">KTP</label>
                    <input type="file" name="ktp" id="ktp" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    <p class="mt-2 text-sm text-gray-500">Current File: {{ basename($sppt->ktp) }}</p>
                </div>
                <div>
                    <label for="kk" class="block text-sm font-medium text-gray-700">KK</label>
                    <input type="file" name="kk" id="kk" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    <p class="mt-2 text-sm text-gray-500">Current File: {{ basename($sppt->kk) }}</p>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Proses" {{ $sppt->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $sppt->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-blue-500 transition duration-200">Update</button>
                <a href="{{ route('SPPT.index') }}" class="ml-4 bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
