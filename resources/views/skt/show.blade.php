<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Surat Keterangan Tanah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg w-full max-w-4xl relative">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Detail Surat Keterangan Tanah</h1>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nama Pemilik</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->nama_pemilik }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nomor WhatsApp</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->no_wa }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Tanggal Kepemilikan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->tanggal_kepemilikan }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Luas</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->luas }} m²</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Batas Utara</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->batas_utara }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Batas Selatan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->batas_selatan }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Batas Timur</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->batas_timur }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Batas Barat</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->batas_barat }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Jenis Tanah</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->jenis_tanah }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Sertifikat</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->sertifikat }}</td>
                </tr>
                @if ($skt->sertifikat == 'Ada')
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nomor Sertifikat</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->no_sertifikat }}</td>
                </tr>
                @endif
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Dijaminkan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->dijaminkan }}</td>
                </tr>
                @if ($skt->ktp)
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">KTP</td>
                    <td class="border px-6 py-4 text-sm text-gray-700"><a href="{{ asset('storage/' . $skt->ktp) }}" target="_blank" class="text-blue-500">Lihat KTP</a></td>
                </tr>
                @endif
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Status</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $skt->status }}</td>
                </tr>
            </tbody>
        </table>
        <div class="absolute bottom-6 right-6">
            <a href="{{ route('skt.index') }}" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Back to List</a>
        </div>
    </div>
</body>
</html>
