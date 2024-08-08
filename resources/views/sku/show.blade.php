<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show SKU</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg w-full max-w-4xl relative">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">SKU Details</h1>
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                    <th class="px-6 py-3 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider border-b border-gray-200"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nama Pemilik Perusahaan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->nama_pemilik_perusahaan }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nomor WhatsApp</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->no_wa }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Nama Perusahaan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->nama_perusahaan }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Bentuk Perusahaan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->bentuk_perusahaan }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Alamat Perusahaan</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->alamat_perusahaan }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">NPWP</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->npwp }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Bidang/Kegiatan Usaha</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->bidang_kegiatan_usaha }}</td>
                </tr>
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Jenis Barang/Jasa Dagang Utama</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->jenis_barang_jasa_dagang_utama }}</td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Keadaan Saat Ini</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->keadaan_saat_ini }}</td>
                </tr>
                @if($sku->keadaan_saat_ini === 'Berjalan Tidak Lancar')
                <tr>
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Keterangan (Jika Tidak Lancar)</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->keterangan_tidak_lancar }}</td>
                </tr>
                @endif
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">KTP</td>
                    <td class="border px-6 py-4 text-sm text-gray-700"><img src="{{ Storage::url($sku->ktp) }}" alt="KTP Image" class="w-32 h-auto rounded-md shadow-sm"></td>
                </tr>
                <tr class="bg-gray-50">
                    <td class="border px-6 py-4 text-sm font-medium text-gray-900">Status</td>
                    <td class="border px-6 py-4 text-sm text-gray-700">{{ $sku->status }}</td>
                </tr>
                <!-- Add more fields as necessary -->
            </tbody>
        </table>
        <div class="absolute bottom-6 right-6">
            <a href="{{ route('sku.index') }}" class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Back to SKTM List</a>
        </div>
    </div>
</body>
</html>
