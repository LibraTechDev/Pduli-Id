@include('home.cssload')
@include('home.navbar')
@include('sweetalert::alert')
<title>Pduli ID</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<br><br><br><br>

<div class="container mx-auto p-8">
    <h1 style="font-weight: bold; text-align:center;">Mohon Bertutur Kata Dengan Sopan!</h1>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ url('/add_harapan') }}" method="POST" class="mb-6">
            @csrf
            <div class="mb-4">
                <textarea name="harapan" rows="4"
                    class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Tulis harapan Anda di sini..."></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">Kirim</button>
        </form>

        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <!-- Contoh Card Harapan -->
            @foreach ($harapans as $h)
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <div class="p-4">
                        <p class="text-gray-800 text-sm mb-2">Anonymous</p>
                        <p class="text-lg font-semibold">{{ $h->harapan }}</p>
                    </div>
                </div>
            @endforeach


        </div>

    </div>
</div>


</html>

@include('home.js')
