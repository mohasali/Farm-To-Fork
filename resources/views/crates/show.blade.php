<x-layout>
<div class="flex flex-col justify-content-start mt-8 h-[calc(100vh-200px)]">
    <div class=" flex flex-row mx-auto space-x-6 p-8">
        <img class=" max-w-[450px] pt-7 rounded-lg" src = "{{ $crate->imagePath }}" alt="Crate">
        <div> 
            <div class=" text-xl mb-2"> <a href="#"> Type </a></div>
            <div class=" text-3xl mb-3"> {{ $crate->title }}</div>
            <div class=" text-lg space-x-2 mb-2">
                <a href="#"> TAG 1 </a>
                <a href="#">TAG 2</a>
                <a href="#">TAG 3</a>
            </div>
            <div class=" max-w-[500px] mb-7 ">{{ $crate->description }}</div>
            <div class="bg-primary mx-16 text-white py-3 rounded-xl text-center text-xl font-bold"> <a href="#">Add to cart £{{ $crate->price }}</a> </div>
        </div>
        </div>
</div>
</x-layout>