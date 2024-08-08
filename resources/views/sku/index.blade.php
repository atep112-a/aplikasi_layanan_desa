<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKTM List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
        }
        .modal-active {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold mb-6 text-gray-900">Daftar SPPT</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border">ID</th>
                        <th class="py-2 px-4 border">Nama Pemilik Perusahaan</th>
                        <th class="py-2 px-4 border">Nama Perusahaan</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sku as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ $item->id }}</td>
                        <td class="py-2 px-4 border">{{ $item->nama_pemilik_perusahaan }}</td>
                        <td class="py-2 px-4 border">{{ $item->nama_perusahaan }}</td>
                        <td class="py-2 px-4 border">
                            <a href="{{ route('sku.edit', $item->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                            <a href="{{ route('sku.show', $item->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">Detail</a>
                            <form action="{{ route('sku.destroy', $item->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- <div class="mt-6">
                {{ $Sppt->links() }}
            </div> --}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Dokumen</h3>
                            <div class="mt-4">
                                <h2 class="text-md text-semibold">Batas Wilayah</h2>
                                <div class="mb-2 ml-4">
                                    <h5 class="text-sm text-semibold mb-1">Batas Utara</h5>
                                    <p class="text-sm text-gray-700" id="batas_utara"></p>
                                    <h5 class="text-sm text-semibold mb-1">Batas Selatan</h5>
                                    <p class="text-sm text-gray-700" id="batas_selatan"></p>
                                    <h5 class="text-sm text-semibold mb-1">Batas Timur</h5>
                                    <p class="text-sm text-gray-700" id="batas_timur"></p>
                                    <h5 class="text-sm text-semibold mb-1">Batas Barat</h5>
                                    <p class="text-sm text-gray-700" id="batas_barat"></p>
                                </div>
                                <h2 class="text-md text-semibold">Dokumen</h2>
                                <img id="ktpImage" class="mb-4 w-1/2 rounded-md shadow-sm">
                                <img id="kkImage" class="w-1/2 rounded-md shadow-sm">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-500 transition duration-200" onclick="hideModal()">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showModal(ktpUrl, kkUrl,utara,selatan,timur,barat) {
            document.getElementById('batas_utara').innerText = utara;
            document.getElementById('batas_selatan').innerText = selatan;
            document.getElementById('batas_timur').innerText = timur;
            document.getElementById('batas_barat').innerText = barat;
            document.getElementById('ktpImage').src = ktpUrl;
            document.getElementById('kkImage').src = kkUrl;
            document.querySelector('.modal').classList.add('modal-active');
        }

        function hideModal() {
            document.querySelector('.modal').classList.remove('modal-active');
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</body>
</html>
