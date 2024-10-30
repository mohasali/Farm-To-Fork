<x-layout>
    <section class="relative w-full min-h-[280px] bg-cover transform" style="background-image: url('images/bg1.jpg');">
    <div class="flex flex-col items-center">
        <h1 class= "m-auto text-5xl font-bold p-4 pt-8"> Boxes </h1>
        <p class="w-[45%] text-center"> Some text here to talk about how good the creates are.
            Maybe Also talk about how subscriptions work?</p>
    </div>
    </section>
    <div class="flex justify-center space-x-5 px-5 my-6">
        @foreach ($types as $t )
            <a href="/boxes?type={{ $t }}" class="{{ $type==$t?'bg-primary hover:bg-accent1':'bg-secondary hover:bg-accent2' }} text-white px-2 py-1 rounded-lg ">{{ $t }}</a>
        @endforeach

    </div>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
        @foreach ($boxes as $box )
        <div class="flex flex-col items-center text-center px-5 pb-6 ">
            <a href="boxes/{{ $box->id }}" class="group">
                <div> <img class=" border-text border-2 group-hover:border-accent2 rounded-lg transition duration-300 ease-in-out" src="{{ $box->imagePath }}" alt="box" > </div>
                <div class=" flex items-baseline p-2 w-full justify-evenly group-hover:text-accent2 transition duration-300 ease-in-out">
                    <div class="font-bold text-lg ">{{ $box->title }}</div>
                    <div>£{{ $box->price }}</div>
                </div>
            </a>
            <a href="#" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out"> Add to Cart</a>
        </div>
        @endforeach
    </div>
    <div class="my-6 mx-8"> {{$boxes->links()}} </div>
</x-layout>