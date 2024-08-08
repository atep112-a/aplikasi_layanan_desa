<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Surat Keterangan Tanah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-4xl">
        <h2 class="text-3xl font-bold mb-8 text-gray-800 text-center">Edit Surat Keterangan Tanah</h2>
        <form action="{{ route('skt.update', $skt->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label for="nama_pemilik" class="block text-sm font-medium text-gray-700">Nama Pemilik</label>
                    <input type="text" name="nama_pemilik" id="nama_pemilik" value="{{ $skt->nama_pemilik }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="no_wa" class="block text-sm font-medium text-gray-700">Nomor WhatsApp</label>
                    <input type="text" name="no_wa" id="no_wa" value="{{ $skt->no_wa }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="tanggal_kepemilikan" class="block text-sm font-medium text-gray-700">Tanggal Kepemilikan</label>
                    <input type="date" name="tanggal_kepemilikan" id="tanggal_kepemilikan" value="{{ $skt->tanggal_kepemilikan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="luas" class="block text-sm font-medium text-gray-700">Luas (m²)</label>
                    <input type="number" name="luas" id="luas" value="{{ $skt->luas }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_utara" class="block text-sm font-medium text-gray-700">Batas Utara</label>
                    <input type="text" name="batas_utara" id="batas_utara" value="{{ $skt->batas_utara }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_selatan" class="block text-sm font-medium text-gray-700">Batas Selatan</label>
                    <input type="text" name="batas_selatan" id="batas_selatan" value="{{ $skt->batas_selatan }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_timur" class="block text-sm font-medium text-gray-700">Batas Timur</label>
                    <input type="text" name="batas_timur" id="batas_timur" value="{{ $skt->batas_timur }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="batas_barat" class="block text-sm font-medium text-gray-700">Batas Barat</label>
                    <input type="text" name="batas_barat" id="batas_barat" value="{{ $skt->batas_barat }}" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                </div>
                <div>
                    <label for="ktp" class="block text-sm font-medium text-gray-700">Upload KTP</label>
                    <input type="file" name="ktp" id="ktp" class="mt-1 p-3 border border-gray-300 rounded-md w-full">
                    @if ($skt->ktp)
                        <p class="mt-2 text-sm text-gray-500">File saat ini: <a href="{{ asset('storage/' . $skt->ktp) }}" target="_blank" class="text-blue-500">Lihat KTP</a></p>
                    @endif
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 p-3 border border-gray-300 rounded-md w-full" required>
                        <option value="Proses" {{ $skt->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                        <option value="Selesai" {{ $skt->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-blue-500 transition duration-200">Update</button>
                <a href="{{ route('skt.index') }}" class="ml-4 bg-red-700 text-white py-2 px-4 rounded-md hover:bg-red-500 transition duration-200">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
