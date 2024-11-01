<x-layout>
<div class="flex flex-col justify-content-start mt-8 min-h-[calc(100vh-200px)]">
    <div class=" flex flex-col md:flex-row mx-auto space-x-6 p-8">
        <a class="md:hidden text-3xl mb-2 font-light italic underline hover:text-accent2" href="/boxes?type={{ $box->type }}">{{ $box->type }}</a>
        <div class="md:hidden text-4xl mb-3 font-medium"> {{ $box->title }}</div>
        <div class="flex justify-center md:block pt-7 "> <img class="w-[100%] md:w-[450px] rounded-lg" src = "{{ $box->imagePath }}" alt="Box"> </div>
        <div> 
            <a class=" hidden md:inline-block text-xl mb-2 font-light italic hover:underline hover:text-accent2" href="/boxes?type={{ $box->type }}">{{ $box->type }}</a>
            <div class=" hidden md:block text-3xl mb-3 font-medium"> {{ $box->title }}</div>
            <div class=" text-xl md:text-lg mt-3 md:mt-0 space-x-2 mb-2 font-light underline md:no-underline italic">
                <a class="hover:underline hover:text-accent2" href="#">Summer</a>
                <a class="hover:underline hover:text-accent2" href="#">Greens</a>
                <a class="hover:underline hover:text-accent2" href="#">Low Fat</a>
            </div>
            <div class=" max-w-[500px] mb-7 ">{{ $box->description }}</div>

            <x-add-cart-form value="{{ $box->id }}">
                <select class=" rounded-md border-2 border-primary mr-4 px-4 py-2 h-full" name="increment" id="increment">
                    @for ($i=1; $i<=10 ; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select> 
                <button class="bg-primary p-4 text-white rounded-xl text-center text-xl font-bold hover:bg-accent1 transition duration-300 ease-in-out" >Add to cart £{{ $box->price }}</button> 
            </x-add-cart-form>
            <x-success-alert :boxId="$box->id" />
        </div>
        </div>
</div>
</x-layout>