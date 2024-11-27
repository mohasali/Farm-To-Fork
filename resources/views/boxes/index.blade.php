<x-layout>
    <section class="relative w-full bg-cover transform bg-center md:bg-top md:min-h-[280px]" style="background-image: url('images/bg1.jpg');">
    <div class="flex flex-col items-center">
        <h1 class= "m-auto text-5xl font-bold p-4 pt-8"> Boxes </h1>
        <p class=" w-[55%] md:w-[45%] text-center"> Discover the ease and excellence of our curated selection of produce boxes, delivered straight to your doorstep every month!
             Each package contains a blend of varied fruits and vegetables and our range of subscription choices allows you to tailor a plan that suits your preferences perfectly.
             Come along with us as we explore taste, health and sustainability. Experience the best of farm-to-table produce with every delivery.</p>
    </div>
    </section>
    
    <div class="flex flex-wrap justify-between items-center w-full mt-6 mb-12 px-5">
        <div>
            <button class="flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out" id="filter-menu-toggle">
                <span>Filters</span>
            </button>
    
            <div class="absolute mt-2 hidden bg-white border border-gray-200 shadow-md rounded-lg w-64 z-10" id="filter-menu">
                <div class="flex flex-col justify-center text-center p-4 space-y-3">

                    <h3 class="font-bold text-lg text-gray-800">Categories</h3>

                    @foreach ($types as $t)
                        <a href="/boxes{{ $type == $t ? '' : '?type='.$t }}" 
                           class="{{ $type == $t ? 'bg-primary hover:bg-accent1' : 'bg-secondary hover:bg-accent2' }} text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out">
                            {{ $t }}
                        </a>
                    @endforeach
                    
                </div>

                <form method="GET" action="{{ url()->current() }}" class="p-4 space-y-3">
                    @if($type)
                        <input hidden value="{{ $type }}" name="type">
                    @endif
                    @if(request()->q)
                        <input hidden value="{{ request()->q }}" name="q">
                    @endif
                    <h3 class="font-bold text-lg text-gray-800">Filter Options</h3>
                        @foreach ($tags as $tag)
                        <label class="flex items-center space-x-2">
                            <input type="checkbox" class="form-checkbox text-primary" name="tags[]" value="{{$tag->id}}" {{ is_array(request()->tags) && in_array($tag->id, request()->tags) ? 'checked' : '' }}>
                            <span>{{ $tag->name }}</span>
                        </label>
                        @endforeach

                        <button class="w-full mt-3 px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition" type="submit">
                            Apply Filters
                        </button>
                </form>
            </div>
        </div>

        <div class="text-center">
            <h3 class=" text-5xl font-bold">{{ $type }}</h3>
        </div>

        <div class="w-full md:w-auto mt-3 md:mt-0">
            <form class="relative group" method="GET">
                @if($type)
                    <input hidden value="{{ $type }}" name="type">
                @endif
                <input name="q" autocomplete="off" type="text" placeholder="Search for an item..." 
                       class="absolute right-[55px] w-0 px-4 py-2 rounded-lg border border-gray-300 opacity-0 group-hover:w-80 group-hover:opacity-100 focus:w-80 focus:opacity-100 transition-all duration-300 ease-in-out ">
                <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            
        </div>
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

            <x-add-cart-form value="{{ $box->id }}">
                <input class="hidden" id="increment" name="increment" value="1"> 
                <button class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-accent1 transition duration-300 ease-in-out"> Add to Cart</button>
            </x-add-cart-form>

            <x-success-alert :boxId="$box->id"/>
        </div>
        @endforeach
    </div>
    <div class="my-6 mx-8"> {{$boxes->links()}} </div>
</x-layout>

<script>
    document.getElementById('filter-menu-toggle').addEventListener('click', () => {
    const menu = document.getElementById('filter-menu');
    menu.classList.toggle('hidden');
});
 </script>