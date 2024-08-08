<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-6">Daftar Surat Keterangan Tanah</h2>
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white border rounded-lg shadow-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b">Nama Pemilik</th>
                    <th class="px-4 py-2 border-b">Nomor WA</th>
                    <th class="px-4 py-2 border-b">Tanggal Kepemilikan</th>
                    <th class="px-4 py-2 border-b">Luas</th>
                    <th class="px-4 py-2 border-b">Status</th>
                    <th class="px-4 py-2 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skt as $Skt)
                    <tr>
                        <td class="px-4 py-2 border-b">{{ $Skt->nama_pemilik }}</td>
                        <td class="px-4 py-2 border-b">{{ $Skt->no_wa }}</td>
                        <td class="px-4 py-2 border-b">{{ $Skt->tanggal_kepemilikan }}</td>
                        <td class="px-4 py-2 border-b">{{ $Skt->luas }} m²</td>
                        <td class="px-4 py-2 border-b">{{ $Skt->status }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="{{ route('skt.show', $Skt->id) }}" class="text-blue-500 hover:text-blue-700">Lihat</a>
                            <a href="{{ route('skt.edit', $Skt->id) }}" class="ml-4 text-yellow-500 hover:text-yellow-700">Edit</a>
                            <form action="{{ route('skt.destroy', $Skt->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-4 text-red-500 hover:text-red-700">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
