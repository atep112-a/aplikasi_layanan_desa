<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Desa Cikukulu</title>
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

     <!-- Alert Success -->
     @if(session('success'))
     <div class="bg-green-500 text-white px-6 py-4 border-0 rounded relative mb-4">
         <span class="text-xl inline-block mr-5 align-middle">
             <i class="fas fa-bell"></i>
         </span>
         <span class="inline-block align-middle mr-8">
             {{ session('success') }}
         </span>
         <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
             <span>×</span>
         </button>
     </div>
 @endif


    <header class="bg-gray-900 text-white">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-lg font-bold">Layanan Desa Cikukulu</a>
            <nav class="space-x-4">
                <div>
                    <a href="admin/login" class="bg-white text-blue-900 p-2 text-sm rounded-md">Login</a>
                </div>
            </nav>
        </div>
    </header>

    <section class="bg-gray-800 text-white py-2">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Layanan Kami</h1>
            <p class="text-lg mb-8">Kami Bersedia Melayani Anda Dengan Sepenuh Hati.</p>
            <a href="#" class="bg-blue-600 px-6 py-3 rounded-full text-white font-semibold hover:bg-blue-700">Lihat Selengkapnya</a>

            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-10">
                <a href="/form/sktm/1" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">SKTM</h2>
                    <p>Surat Keterangan Tidak Mampu</p>
                </a>
                <a href="/form/sppt/1" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">SPPT</h2>
                    <p>Surat Pemberitahuan Pajak Terhutang</p>
                </a>
                <a href="/form/skl/1" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">SKL</h2>
                    <p>Surat Keterangan Lahir</p>
                </a>
                <a href="/form/kematian/1" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">Kematian</h2>
                    <p>Surat Keterangan Kematian</p>
                </a>
                <a href="/form/domisili/domisili" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">Domisili</h2>
                    <p>Surat Keterangan Domisili</p>
                </a>
                <a href="/form/sku/sku" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">Usaha</h2>
                    <p>Surat Keterangan Usaha</p>
                </a>
                <a href="/form/skt/skt" class="bg-white text-black rounded-lg shadow-lg p-6 text-center hover:bg-gray-200">
                    <h2 class="text-3xl font-bold">Tanah</h2>
                    <p>Surat Keterangan Tanah</p>
                </a>
            </div>
        </div>
    </section>

    <!-- SKTM Step 1 Modal -->
    <div id="modal-sktm-step1" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SKTM - Step 1</h2>
                    <form id="sktm-form-step1" action="{{ route('submit-sktm-step1') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sktm-name">Nama</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sktm-name" name="name" type="text" placeholder="Nama">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sktm-nik">NIK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sktm-nik" name="nik" type="text" placeholder="NIK">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sktm-address">Alamat</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sktm-address" name="address" type="text" placeholder="Alamat">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="nextStep('modal-sktm-step1', 'modal-sktm-step2')">
                                Next
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-sktm-step1')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SKTM Step 2 Modal -->
    <div id="modal-sktm-step2" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SKTM - Step 2</h2>
                    <form id="sktm-form-step2" action="{{ route('submit-sktm') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sktm-form-step2-ktp">Upload Foto KTP</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sktm-form-step2-ktp" name="ktp" type="file">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sktm-form-step2-kk">Upload Foto KK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sktm-form-step2-kk" name="kk" type="file">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm('sktm-form-step2', '/submit-sktm')">
                                Submit
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="previousStep('modal-sktm-step2', 'modal-sktm-step1')">
                                Back
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-sktm-step2')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SPPT Step 1 Modal -->
    <div id="modal-sppt-step1" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SPPT - Step 1</h2>
                    <form id="sppt-form-step1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sppt-name">Nama</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sppt-name" name="name" type="text" placeholder="Nama">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sppt-nik">NIK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sppt-nik" name="nik" type="text" placeholder="NIK">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sppt-address">Alamat</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sppt-address" name="address" type="text" placeholder="Alamat">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="nextStep('modal-sppt-step1', 'modal-sppt-step2')">
                                Next
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-sppt-step1')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SPPT Step 2 Modal -->
    <div id="modal-sppt-step2" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SPPT - Step 2</h2>
                    <form id="sppt-form-step2">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sppt-form-step2-ktp">Upload Foto KTP</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sppt-form-step2-ktp" name="ktp" type="file">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="sppt-form-step2-kk">Upload Foto KK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sppt-form-step2-kk" name="kk" type="file">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm('sppt-form-step2', '/submit-sppt')">
                                Submit
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="previousStep('modal-sppt-step2', 'modal-sppt-step1')">
                                Back
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-sppt-step2')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SKL Step 1 Modal -->
    <div id="modal-skl-step1" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SKL - Step 1</h2>
                    <form id="skl-form-step1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="skl-name">Nama</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skl-name" name="name" type="text" placeholder="Nama">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="skl-nik">NIK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skl-nik" name="nik" type="text" placeholder="NIK">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="skl-address">Alamat</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skl-address" name="address" type="text" placeholder="Alamat">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="nextStep('modal-skl-step1', 'modal-skl-step2')">
                                Next
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-skl-step1')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- SKL Step 2 Modal -->
    <div id="modal-skl-step2" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">SKL - Step 2</h2>
                    <form id="skl-form-step2">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="skl-form-step2-ktp">Upload Foto KTP</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skl-form-step2-ktp" name="ktp" type="file">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="skl-form-step2-kk">Upload Foto KK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="skl-form-step2-kk" name="kk" type="file">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm('skl-form-step2', '/submit-skl')">
                                Submit
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="previousStep('modal-skl-step2', 'modal-skl-step1')">
                                Back
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-skl-step2')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Kematian Step 1 Modal -->
    <div id="modal-kematian-step1" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Surat Kematian - Step 1</h2>
                    <form id="kematian-form-step1">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kematian-name">Nama</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kematian-name" name="name" type="text" placeholder="Nama">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kematian-nik">NIK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kematian-nik" name="nik" type="text" placeholder="NIK">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kematian-address">Alamat</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kematian-address" name="address" type="text" placeholder="Alamat">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="nextStep('modal-kematian-step1', 'modal-kematian-step2')">
                                Next
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-kematian-step1')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Kematian Step 2 Modal -->
    <div id="modal-kematian-step2" class="modal fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-4">Surat Kematian - Step 2</h2>
                    <form id="kematian-form-step2">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kematian-form-step2-ktp">Upload Foto KTP</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kematian-form-step2-ktp" name="ktp" type="file">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="kematian-form-step2-kk">Upload Foto KK</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kematian-form-step2-kk" name="kk" type="file">
                        </div>
                        <div class="flex items-center justify-between">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="submitForm('kematian-form-step2', '/submit-kematian')">
                                Submit
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="previousStep('modal-kematian-step2', 'modal-kematian-step1')">
                                Back
                            </button>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" onclick="closeModal('modal-kematian-step2')">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "block";
    }

    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }

    function nextStep(currentId, nextId) {
        document.getElementById(currentId).style.display = "none";
        document.getElementById(nextId).style.display = "block";
    }

    function previousStep(currentId, prevId) {
        document.getElementById(currentId).style.display = "none";
        document.getElementById(prevId).style.display = "block";
    }

    function submitForm(formId, url) {
        const formData = new FormData(document.getElementById(formId));
        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            closeModal(formId.replace('-form-', '-'));
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<script>
    // Optional: Auto hide the alert after a few seconds
    setTimeout(function() {
        const alert = document.querySelector('.bg-green-500');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 5000);
</script>
</body>
</html>
