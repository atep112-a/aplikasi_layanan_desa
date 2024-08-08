<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .card a {
            display: block;
            color: inherit;
            text-decoration: none;
        }
    </style>
    <style>
        .notification-bell {
            position: relative;
        }
        .notification-bell::after {
            content: attr(data-count);
            position: absolute;
            top: -10px;
            right: -10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 5px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mx-auto">
        <header class="flex justify-between items-center bg-gray-800 text-white">
            <div class="logo">
                <img src="img/llogo.png" alt="Logo Desa" width="150">
            </div>
            <div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                <button class="text-white font-bold flex items-center mr-4">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
                </form>
            </div>
        </header>
        <main class="p-4">
            <!-- Filter Form -->

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-items-center">
                <!-- Card 1: Notifikasi -->
               <!-- Notifikasi Card -->
                <div class="card bg-white shadow-md rounded-lg p-6 md:p-8 w-full">
                    <a href="#notifikasi" class="notification-bell" data-count="0">
                        <div class="flex items-center">
                            <i class="fas fa-bell text-gray-800 text-4xl mr-4"></i>
                            <h2 class="text-2xl font-bold">Notifikasi</h2>
                        </div>
                        <p class="mt-4 text-gray-600">Dapatkan pemberitahuan terbaru tentang desa Anda.</p>
                    </a>
                </div>

                <!-- Card 2: Admin -->
                <div class="card bg-white shadow-md rounded-lg p-6 md:p-8 w-full">
                    <a href="admins">
                        <div class="flex items-center">
                            <i class="fas fa-user-shield text-gray-800 text-4xl mr-4"></i>
                            <h2 class="text-2xl font-bold">Admin</h2>
                        </div>
                        <p class="mt-4 text-gray-600">Kelola informasi dan data desa dengan mudah.</p>
                    </a>
                </div>
                <!-- Card 3: Kelola Layanan -->
                <div class="card bg-white shadow-md rounded-lg p-6 md:p-8 w-full">
                    <a href="#kelola-layanan">
                        <div class="flex items-center">
                            <i class="fas fa-cogs text-gray-800 text-4xl mr-4"></i>
                            <h2 class="text-2xl font-bold">Kelola Layanan</h2>
                        </div>
                        <p class="mt-4 text-gray-600">Atur dan kelola semua layanan desa di satu tempat.</p>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                <!-- Card 4: SPPT -->
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="SPPT">
                        <div class="flex items-center">
                            <i class="fas fa-file-alt text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">SPPT</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Kelola Surat Pemberitahuan Pajak Terhutang (SPPT) dengan mudah.</p>
                    </a>
                </div>
                <!-- Card 5: SKTM -->
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="SKTM">
                        <div class="flex items-center">
                            <i class="fas fa-file-signature text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">SKTM</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Ajukan Surat Keterangan Tidak Mampu (SKTM) secara online.</p>
                    </a>
                </div>
                <!-- Card 6: Kelahiran -->
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="Kelahiran">
                        <div class="flex items-center">
                            <i class="fas fa-baby text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">Kelahiran</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Lapor dan kelola data kelahiran di desa.</p>
                    </a>
                </div>
                <!-- Card 7: Kematian -->
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="Kematian">
                        <div class="flex items-center">
                            <i class="fas fa-hospital text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">Kematian</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Lapor dan kelola data kematian di desa.</p>
                    </a>
                </div>
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="domisili">
                        <div class="flex items-center">
                            <i class="fas fa-home text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">Domisili</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Lapor dan kelola data Domisili di desa.</p>
                    </a>
                </div>
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="sku">
                        <div class="flex items-center">
                            <i class="fas fa-home text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">Keterangan Usaha</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Lapor dan kelola data Domisili di desa.</p>
                    </a>
                </div>
                <div class="card bg-white shadow-md rounded-lg p-4 w-full">
                    <a href="skt">
                        <div class="flex items-center">
                            <i class="fas fa-home text-gray-800 text-2xl mr-4"></i>
                            <h2 class="text-xl font-bold">Keterangan Tanah</h2>
                        </div>
                        <p class="mt-2 text-gray-600">Lapor dan kelola data Keterangan Tanah di desa.</p>
                    </a>
                </div>
            </div>
            <div class="my-4">
                <div class="flex items-center space-x-4">
                    <label for="filter" class="text-gray-700 font-bold">Filter by:</label>
                    <select id="filter" class="form-select bg-white border border-gray-300 rounded py-2 px-4">
                        <option value="newest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </div>
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white" id="data-table">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">No</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Nama</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">NIK</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Alamat</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Layanan</th>
                            <th class="w-2/12 py-3 px-4 uppercase font-semibold text-sm">Data</th>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($combinedData as $index => $item)
                        <tr data-timestamp="{{ strtotime($item['data']->created_at) }}">
                            <td class="w-1/12 py-3 px-4">{{ $index + 1 }}</td>
                            <td class="w-2/12 py-3 px-4">{{ $item['data']->user->nama ?? 'N/A' }}</td>
                            <td class="w-2/12 py-3 px-4">{{ $item['data']->user->nik ?? 'N/A' }}</td>
                            <td class="w-2/12 py-3 px-4">{{ $item['data']->user->alamat ?? 'N/A' }}</td>
                            <td class="w-2/12 py-3 px-4">{{ $item['type'] }}</td>
                            <td class="w-2/12 py-3 px-4">
                                <a href="{{ route($item['type'] . '.show', $item['data']->id) }}" class="bg-gray-800 text-sm m-1 text-white py-1 px-2 rounded">Show Data</a>
                            </td>
                            <td class="w-1/12 py-3 px-4">{{ $item['data']->status ?? 'Pending' }}</td>
                            <td class="w-1/12 py-3 px-4">
                                <a href="{{ route($item['type'] . '.edit', $item['data']->id) }}" class="bg-gray-800 text-sm m-1 text-white py-1 px-2 rounded">Edit</a>
                                <a href="{{ route($item['type'] . '.show', $item['data']->id) }}" class="bg-gray-600 text-sm m-1 text-white py-1 px-2 rounded">Show</a>
                                <form action="{{ route($item['type'] . '.destroy', $item['data']->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-sm m-1 text-white py-1 px-2 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
        document.getElementById('filter').addEventListener('change', function () {
            const table = document.getElementById('data-table').getElementsByTagName('tbody')[0];
            const rows = Array.from(table.getElementsByTagName('tr'));
            const filter = this.value;

            rows.sort(function (a, b) {
                const aTimestamp = parseInt(a.getAttribute('data-timestamp'));
                const bTimestamp = parseInt(b.getAttribute('data-timestamp'));

                return filter === 'newest' ? bTimestamp - aTimestamp : aTimestamp - bTimestamp;
            });

            rows.forEach(row => table.appendChild(row));
        });
    </script>
     <script>
        document.addEventListener('DOMContentLoaded', function() {
            let notificationBell = document.querySelector('.notification-bell');

            function playNotificationSound() {
                let audio = new Audio('/path/to/notification-sound.mp3');
                audio.play();
            }

            async function fetchNotifications() {
                try {
                    let response = await fetch('{{ route("notifications") }}');
                    let notifications = await response.json();

                    let totalNotifications = 0;
                    for (let key in notifications) {
                        if (notifications.hasOwnProperty(key)) {
                            totalNotifications += notifications[key].length;
                        }
                    }

                    if (totalNotifications > 0) {
                        notificationBell.setAttribute('data-count', totalNotifications);
                        notificationBell.querySelector('::after').style.display = 'block';
                        playNotificationSound();
                        showNotificationModal(notifications);
                    } else {
                        notificationBell.querySelector('::after').style.display = 'none';
                    }
                } catch (error) {
                    console.error('Error fetching notifications:', error);
                }
            }

            function showNotificationModal(notifications) {
                let modalContent = `
                    <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-4 rounded-lg">
                            <h2 class="text-xl font-bold mb-4">Notifikasi Baru</h2>
                            <ul class="list-disc ml-4">
                `;

                for (let key in notifications) {
                    if (notifications.hasOwnProperty(key)) {
                        notifications[key].forEach(notification => {
                            modalContent += `<li>${key} - ${notification.nama}</li>`;
                        });
                    }
                }

                modalContent += `
                            </ul>
                            <button class="bg-red-500 text-white px-4 py-2 rounded mt-4" onclick="closeNotificationModal()">Tutup</button>
                        </div>
                    </div>
                `;

                let modal = document.createElement('div');
                modal.innerHTML = modalContent;
                document.body.appendChild(modal);
            }

            function closeNotificationModal() {
                document.querySelector('.fixed.inset-0.bg-gray-900').remove();
            }

            setInterval(fetchNotifications, 60000); // Fetch notifications every 60 seconds
            fetchNotifications(); // Initial fetch
        });
    </script>
</body>
</html>
