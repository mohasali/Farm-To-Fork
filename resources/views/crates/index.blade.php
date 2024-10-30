<x-layout>
    <section class="relative w-full min-h-[280px] bg-cover transform" style="background-image: url('images/bg1.jpg');">
    <div class="flex flex-col items-center">
        <h1 class= "m-auto text-5xl font-bold p-4"> Crates </h1>
        <p class="w-[45%] text-center"> Some text here to talk about how good the creates are.
            Maybe Also talk about how subscriptions work?</p>
    </div>
    </section>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        @foreach ($crates as $crate )
            <a href="crates/{{ $crate->id }}" class=" group flex flex-col items-center text-center px-5 py-6 ">
                <div> <img class=" border-text border-2 group-hover:border-primary rounded-lg transition duration-300 ease-in-out" src="{{ $crate->imagePath }}" alt="Crate" > </div>
                <div class=" flex items-baseline mt-2 p-1 w-full justify-evenly group-hover:text-primary transition duration-300 ease-in-out">
                    <div class="font-bold text-lg ">{{ $crate->title }}</div>
                    <div>£{{ $crate->price }}</div>
                </div>
                <div>Expires : {{ $crate->expiryDate }}</div>
            </a>
        @endforeach
    </div>
    <div class="my-6 mx-8"> {{$crates->links()}} </div>
</x-layout>