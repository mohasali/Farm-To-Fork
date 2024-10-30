<x-layout>
<div class="flex flex-col justify-content-start mt-8 h-[calc(100vh-200px)]">
    <div class=" flex flex-row mx-auto space-x-6 p-8">
        <div class=" pt-7 "> <img class=" max-w-[450px] rounded-lg" src = "{{ $box->imagePath }}" alt="Box"> </div>
        <div> 
            <a class=" text-xl mb-2 font-light italic hover:underline hover:text-accent2" href="/boxes?type={{ $box->type }}">{{ $box->type }}</a>
            <div class=" text-3xl mb-3 font-medium"> {{ $box->title }}</div>
            <div class=" text-lg space-x-2 mb-2 font-light italic">
                <a class="hover:underline hover:text-accent2" href="#">Summer</a>
                <a class="hover:underline hover:text-accent2" href="#">Greens</a>
                <a class="hover:underline hover:text-accent2" href="#">Low Fat</a>
            </div>
            <div class=" max-w-[500px] mb-7 ">{{ $box->description }}</div>
            <div class="flex justify-center"> <a class="bg-primary px-16 text-white py-3 rounded-xl text-center text-xl font-bold hover:bg-accent1 transition duration-300 ease-in-out" href="#">Add to cart £{{ $box->price }}</a> </div>
        </div>
        </div>
</div>
</x-layout>