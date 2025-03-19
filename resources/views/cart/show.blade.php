<x-layout>
    @if (session('message'))
    <div class="max-w-4xl mx-auto my-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 shadow-md rounded-lg flex items-center">
        <!-- Message Text -->
        <div class="text-sm font-medium">
            {{ session('message') }}
        </div>
    </div>
@endif
    <div class="container mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-5xl font-bold text-secondary">Your Cart</h1>
            <div class="text-right">
                <p class="text-2xl font-semibold text-gray-700">Subtotal: <span class="text-primary">£{{ $total }}</span></p>
                <a href="/checkout" class="block mt-2 bg-primary text-white px-2 text-center py-2 rounded-lg hover:bg-accent1 transition-all duration-300">Checkout</a>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-6">
            <!-- If the cart is empty -->
            @if ($cartItems->isEmpty())
            <div class="text-center py-16 items-center justify-center flex flex-col space-y-4">
                    <h2 class="text-accent2 text-4xl font-bold">Oh no! Your cart is empty!</h2>
                    <a href='/boxes' class="mt-6 inline-block bg-primary px-6 py-3 text-white rounded-xl text-lg font-bold hover:bg-accent1 transition duration-300">Browse Products</a>
                    <img id="emptyCartImage" src="" alt="Sad dog" class="h-64 w-64 object-cover mt-8 rounded-xl shadow-lg">
                </div>
            <script>
                // When page loads
                document.addEventListener('DOMContentLoaded', () => {
                    // Array of images
                    const images = [
                        '/images/emptyCart/1.JPEG',
                        '/images/emptyCart/2.png',
                        '/images/emptyCart/3.jpg',
                        '/images/emptyCart/4.jpg',
                        '/images/emptyCart/5.png',
                        'images/emptyCart/6.jpg',
                        'images/emptyCart/7.jpg',
                        'images/emptyCart/8.jpg'
                    ];

                    // Choose a random image
                    const randomImage = images[Math.floor(Math.random() * images.length)];

                    // Set the image to the random Image
                    document.getElementById('emptyCartImage').src = randomImage;
                    // Could add separate alt tags but too lazy
                });
            </script>
           @else
                @foreach ($cartItems as $item)
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col lg:flex-row items-start lg:items-center space-y-4 lg:space-x-6 border-l-8 border-primary">
                        <div class="w-40 h-40 flex-shrink-0">
                            <img class="rounded-lg object-cover w-full h-full" src="{{ $item->box->imagePath }}" alt="Box">
                        </div>
                        <div class="flex-grow flex flex-col lg:flex-row justify-between items-start">
                            <div>
                                <a href="/boxes/{{ $item->box->id }}" class="text-xl sm:text-2xl font-semibold text-gray-800 hover:underline hover:text-accent2 transition-all">{{ $item->box->title }}</a>
                                <p class="text-sm sm:text-lg text-gray-500 italic">{{ $item->box->type }}</p>
                                <form action="/cart/{{ $item->id }}" method="POST" class="mt-4 flex items-center space-x-4">
                                    @csrf
                                    @method('PATCH')
                                    <label class="text-gray-700">Quantity</label>
                                    <input class="border border-gray-400 rounded px-3 py-1 text-center w-16" id="quantity" name="quantity" value="{{ $item->quantity }}">
                                    <button class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-accent1 transition duration-300">Save</button>
                                </form>
                            </div>
                            <div class="text-center lg:text-right mt-4 lg:mt-0">
                                <p class="text-lg text-gray-700">Price: <strong class="text-primary">£{{ $item->box->price * $item->quantity }}</strong></p>
                                <button form="delete-form-{{$item->id}}" class="mt-4 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition duration-300">Remove</button>
                            </div>
                        </div>
                    </div>
                    <form action="/cart/{{$item->id}}" method="POST" id="delete-form-{{$item->id}}" hidden>
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
            @endif
        </div>
    </div>
</x-layout>