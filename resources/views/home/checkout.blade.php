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
        <h2 class="text-2xl font-bold text-center">Checkout</h2>
        <form action="{{ url('/checkout_2', $order->id) }}" method="POST" class="space-y-6">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <<div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $order->name }}" readonly>
                </div>
                
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" id="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $order->address }}" readonly>
                </div>
                
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $order->phone }}" readonly>
                </div>
                
                <div class="mb-4">
                    <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="qty" id="qty" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $order->qty }}" readonly>
                </div>
                
                <div class="mb-4">
                    <label for="total_price" class="block text-sm font-medium text-gray-700">Total Price</label>
                    <input type="text" name="total_price" id="total_price" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm sm:text-sm" value="{{ $order->total_price }}" readonly>
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-outline-success">Checkout</button>
                </div>
        </form>
    </div>
</div>


@include('home.js')
