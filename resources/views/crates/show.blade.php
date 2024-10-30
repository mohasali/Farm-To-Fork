<x-layout>
    <div class="flex flex-col md:flex-row justify-center items-center md:items-start m-8 space-x-4 space-y-4 md:space-y-0 bg-white p-8 rounded-xl">
        <div class="md:hidden text-4xl font-bold"> {{ $crate->title }}</div>
        <img class=" max-w-[400px] rounded-lg" src="{{ $crate->imagePath }}" alt="Crate">
        <div class="flex flex-col items-center space-y-8"> 
            <div class="hidden md:block text-4xl font-bold"> {{ $crate->title }}</div>
            <div class="space-x-2"> 
                
                <a class="text-white bg-primary p-1 rounded-[5px] hover:brightness-95" href="#">Tag 1</a>
                <a class="text-white bg-primary p-1 rounded-[5px] hover:brightness-95" href="#">Tag 2</a>
                <a class="text-white bg-primary p-1 rounded-[5px] hover:brightness-95" href="#">Tag 3</a>
                <a class="text-white bg-primary p-1 rounded-[5px] hover:brightness-95" href="#">Tag 4</a>
            </div>
            <div> {{ $crate->description }} </div>
            <div><a class="bg-primary text-white px-6 py-3 rounded-lg hover:brightness-95" href="#">Add to cart - £{{ $crate->price }} </a></div>
        </div>
    </div>
</x-layout>