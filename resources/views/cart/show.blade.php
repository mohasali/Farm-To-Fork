<x-layout>
    <div>
    <div class=" flex justify-between mt-40 mb-4 mx-4 ">
        <div class="text-4xl font-bold">Your Cart</div>
        <div class="flex flex-col justify-between space-y-2">
            <div class=" text-xl font-bold">Subtotal: £{{ $total }}</div>
            <a href="/checkout" class=" text-center bg-primary text-white px-2 py-0.5 rounded hover:bg-accent1  duration-300 ease-in-out">Checkout</a>
        </div>
    </div>
    <div class="grid grid-cols-1 ">
        <!-- If the cart is empty -->
        @if ($cartItems->isEmpty())
        <div class="border-t-8 border-primary"></div>
        <div class="text-center w-full flex flex-col items-center justify-center pt-16">
            <h1 class="text-accent2 text-5xl pb-4 font-bold">Oh noes! Your cart is empty!</h1>
            <a href='/boxes' class="bg-primary px-6 py-3 mb-16 text-white rounded-xl text-sm md:text-lg font-bold hover:bg-accent1 transition duration-300" onclick="">
            Browse products
            </a>
            <img id="emptyCartImage" src="" alt="Sad dog" class="h-64 w-64 object-cover mb-16 rounded-xl md:h-64">
        </div>
        <script>
            // When page loads
            document.addEventListener('DOMContentLoaded', () => {
                // Array of images
                const images = [
                    '/images/emptyCart/1.JPEG',
                    '/images/emptyCart/2.png',
                    '/images/emptyCart/3.jpg',
                    '/images/emptyCart/4.png',
                    '/images/emptyCart/5.png'
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
            <div class="border-t-8 border-primary flex p-4 space-x-4">
            <div class="w-[60%] max-w-[300px]">
                <img class="rounded-lg" src="{{ $item->box->imagePath }}" alt="Box">
            </div>
            <div class="w-full flex justify-between">
                <div class="flex flex-col justify-between my-1">
                    <div class="flex flex-col">
                        <a href="/boxes/{{ $item->box->id }}" class="text-2xl hover:underline hover:text-accent2 transition duration-300 ease-in-out ">{{ $item->box->title }}</a>
                        <a href="/boxes?type={{ $item->box->type }}" class="text-xl font-[300] italic hover:underline hover:text-accent2 duration-300 ease-in-out">{{ $item->box->type }}</a>
                    </div>
                    <form action="/cart/{{ $item->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex flex-col">
                            <div class="space-x-2">
                                <label for="quantity">Quantity</label>
                                <input class="border-2 border-primary rounded w-[15%] text-center" id="quantity" name="quantity" value="{{ $item->quantity }}">
                            </div>
                            <div class="flex space-x-6">
                                <button class="bg-primary w-[22%] py-0.5 text-white rounded mt-2 hover:bg-accent1 transition duration-300 ease-in-out ">Save</button>
                                <button form="delete-form-{{$item->id}}" class="bg-red-600 w-[22%] py-0.5 text-white rounded mt-2 hover:bg-red-500 transition duration-300 ease-in-out ">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="flex flex-col justify-between my-1 ">
                    <div>Price: <strong>£{{ $item->box->price * $item->quantity }}</strong></div>
    
                </div>
            </div>
        </div>
        <form action="/cart/{{$item->id}}" method="POST" id="delete-form-{{$item->id }}" hidden>
            @csrf
            @method('DELETE')
        </form>
        @endforeach
        <div class="border-t-8 border-primary"></div>
        @endif
    </div>
    </div>
</x-layout>