<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show kelahiran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg w-full max-w-4xl relative">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Kelahiran Details</h1>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nama</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->user->nama }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">NIK</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->user->nik }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Alamat</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->user->alamat }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nama Pelahir</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->nama_pelahir }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Tangal</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->tanggal }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Waktu</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->waktu }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Tempat</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->tempat }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Pembantu Pelahiran</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->pembantu_lahir }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">KTP</td>
                    <td class="border px-6 py-4 text-sm text-gray-700"><img src="{{ Storage::url($kelahiran->ktp) }}" alt="KTP Image" class="w-32 h-auto rounded-md shadow-sm"></td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">KK</td>
                    <td class="border px-6 py-4 text-sm text-gray-700"><img src="{{ Storage::url($kelahiran->kk)}}" alt="KK Image" class="w-32 h-auto rounded-md shadow-sm"></td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Status</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $kelahiran->status }}</td>
                </tr>
                <!-- Add more fields as necessary -->
            </tbody>
        </table>
        <div class="absolute bottom-6 right-6">
            <a href="{{ route('Kelahiran.index') }}" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Back to kelahiran List</a>
        </div>
    </div>
</body>
</html>
