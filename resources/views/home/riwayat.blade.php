@include('home.cssload')
@include('home.navbar')
@include('sweetalert::alert')
<title>Pduli ID</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<style>
</style>
<!-- Import SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<br><br><br><br><br>
<a href="/redirect" style="font-weight: bold; margin-left:20px;"><strong>Kembali</strong></a>
<div class="overflow-x-auto">
    <table class="min-w-full bg-white border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">#</th>
                <th class="border border-gray-300 px-4 py-2">Permasalahan</th>
                <th class="border border-gray-300 px-4 py-2">Jadwal</th>
                <th class="border border-gray-300 px-4 py-2">Status Jadwal</th>
                <th class="border border-gray-300 px-4 py-2">Status Pembayaran</th>
                <th class="border border-gray-300 px-4 py-2">Invoice</th>
                <th class="border border-gray-300 px-4 py-2">Cancel</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($janji as $j)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $j->masalah }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $j->tanggal }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($j->status_jadwal == 'aktif')
                            <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-xs">Aktif</span>
                        @elseif($j->status_jadwal == 'cancel')
                            <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-xs">Cancel</span>
                        @elseif($j->status_jadwal == 'selesai')
                            <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-xs">Selesai</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $j->status_pembayaran }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($j->status_pembayaran == 'paid')
                            <a href="{{ url('print_pdf', $j->id) }}" class="btn btn-outline-success">Invoice</a>
                        @else
                            <h6 style="color: blue;">Belum Tersedia</h6>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($j->status_jadwal == 'cancel')
                            <h6 style="color: blue;">Jadwal Tercancel</h6>
                        @else
                            <form action="{{ url('/cancel_janji', $j->id) }}" method="POST" class="cancel-form">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger" style="margin-top:20px;">Cancel
                                    Jadwal</button>
                            </form>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        @if ($j->status_pembayaran == 'unpaid' && $j->status_jadwal == 'aktif')
                            <button class="btn btn-outline-warning" onclick="openIsiDataModal({{ $j->id }})">Isi
                                Data</button>
                            <form action="{{ url('/checkout', $j->id) }}" method="GET">
                                <button type="submit" class="btn btn-outline-success"
                                    style="margin-top:20px;">Bayar</button>
                            </form>
                        @elseif ($j->status_pembayaran == 'paid')
                            <h6 style="color: blue;">Pembayaran Sudah Dilakukan</h6>
                        @elseif ($j->status_jadwal == 'cancel')
                            <h6 style="color: blue;">Jadwal Tercancel</h6>
                        @endif
                    </td>
                </tr>
            @endforeach
            <!-- Tambahkan baris lain sesuai kebutuhan -->
        </tbody>
    </table>

    <!-- Modal Overlay untuk Isi Data -->
    <div id="isiDataModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Isi Data</h2>
            <form id="isiDataForm" action="{{ url('/isi_data') }}" method="POST">
                @csrf
                <input type="hidden" id="janjiIdIsiData" name="janji_id" value="">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="qty" id="qty"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeIsiDataModal()"
                        class="btn btn-outline-danger mr-2">Cancel</button>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Overlay untuk Checkout -->


    <script>
        function openIsiDataModal(janjiId) {
            document.getElementById('janjiIdIsiData').value = janjiId;
            document.getElementById('isiDataModal').classList.remove('hidden');
        }

        function closeIsiDataModal() {
            document.getElementById('isiDataModal').classList.add('hidden');
        }
    </script>
    <script>
        document.querySelectorAll('.cancel-form').forEach(form => {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                var form = this;
                swal({
                        title: "Apakah Kamu Yakin Untuk Cancel Jadwal?",
                        text: "Kamu Tidak Bisa Merubahnya Lagi!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            form.submit();
                        }
                    });
            });
        });
    </script>

    @include('home.js')
