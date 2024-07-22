@include('home.cssload')
@include('home.navbar')
@include('sweetalert::alert')
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- Import SweetAlert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<br><br><br><br><br>
<a href="{{ url('/riwayat') }}" style="font-weight: bold; margin-left:20px;"><strong>Kembali</strong></a>
<title>Pduli ID</title>

<div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-md mx-auto">
        <h2 class="text-2xl font-bold text-center">Edit Janji Temu</h2>
        <form action="{{ url('/update_janji_2', $janji->id) }}" method="POST" class="space-y-6">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="first_name" class="sr-only">First Name</label>
                    <input id="first_name" name="first_name" type="text" value="{{ $janji->first_name }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="First Name">
                </div>
                <div>
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input id="last_name" name="last_name" type="text" value="{{ $janji->last_name }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Last Name">
                </div>
                <div>
                    <label for="services" class="sr-only">Services</label>
                    <select id="services" name="services"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        <option value="cinta" {{ $janji->masalah == 'cinta' ? 'selected' : '' }}>Permasalahan Cinta
                        </option>
                        <option value="keluarga" {{ $janji->masalah == 'keluarga' ? 'selected' : '' }}>Permasalahan
                            Keluarga</option>
                        <option value="lainnya" {{ $janji->masalah == 'lainnya' ? 'selected' : '' }}>Permasalahan
                            Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="nomor" class="sr-only">Phone</label>
                    <input id="nomor" name="nomor" type="text" value="{{ $janji->nomor }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Phone">
                </div>
                <div>
                    <label for="tanggal" class="sr-only">Date</label>
                    <input id="tanggal" name="tanggal" type="datetime-local" value="{{ $janji->tanggal }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Date">
                </div>
                <div>
                    <label for="keterangan" class="sr-only">Keterangan</label>
                    <textarea id="keterangan" name="keterangan" rows="3"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="Message">{{ $janji->keterangan }}</textarea>
                </div>
            </div>
            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Janji Temu
                </button>
            </div>
        </form>
    </div>
</div>


@include('home.js')
