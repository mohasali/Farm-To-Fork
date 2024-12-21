<x-account-layout>
    <h1 class="text-2xl font-semibold">Your Rewards</h1>
    <p class="text-sm text-gray-500 mb-4">Current Points: 000000</p> 
    <!-- Member? -->
    <div class="flex flex-col text-center rounded-lg p-12 pt-4 pb-6 bg-gray-100">
        <h1 class="justify-center font-bold text-lg">Become a Member NOW!</h1>
        <p>Click <a href="{{ route('account.subscription') }}"><u>HERE</u></a> to join</p>
        <p class="text-sm">Become a member and get £5 off your first purchase.</p>
    </div>
    <!-- Stamp system  --- Component for later | make it simple -->
    <div>
        <h1 class="text-1xl font-semibold pt-4">Daily Rewards</h1>
        <p class="text-sm text-gray-500 mb-2">Stamp your card</p> 
        <div class="flex justify-center">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-6">
                <button class="rounded-full border-solid border-black bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                <button class="rounded-full bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                <button class="rounded-full bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                <button class="rounded-full bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                <button class="rounded-full bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
                <button class="rounded-full bg-gray-100 w-20 h-20 md:w-24 md:h-24 flex items-center justify-center hover:bg-gray-200"></button>
            </div>
        </div>
    </div>
    <!-- Discount items --- Get a component later to make it simple -->
    <h1 class="text-1xl font-semibold mb-2">Discounted items</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 p-4">
        <!-- Card -->
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-primary text-white px-2 py-0.5 rounded-full font-semibold">DISCOUNTED</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-secondary text-white px-8 py-0.5 rounded-full font-semibold">DEAL</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-secondary text-white px-8 py-0.5 rounded-full font-semibold">DEAL</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-primary text-white px-2 py-0.5 rounded-full font-semibold">DISCOUNTED</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-primary text-white px-2 py-0.5 rounded-full font-semibold">DISCOUNTED</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
        <div class="flex flex-col bg-gray-100 rounded-xl justify-between items-center gap-4 w-full max-w-[150px] min-h-[200px] shadow-md">
            <!-- Discount and title -->
            <div class="flex flex-col items-center gap-1">
                <h1 class="text-xs bg-primary text-white px-2 py-0.5 rounded-full font-semibold">DISCOUNTED</h1>
                <h1 class="text-md font-bold mt-2 text-center">Title</h1>
            </div>
            <!-- Image -->
            <img class="border-solid rounded-lg border-2 w-[90%] max-h-[120px] object-cover" src="{{ asset('images/placeholder.jpeg') }}">
            <!-- Description -->
            <p class="text-center px-2 text-sm leading-tight">A really short description</p>
            <!-- View Button -->
            <a href="" class="bg-primary mb-2 text-white px-3 py-1 rounded font-semibold hover:bg-orange-600 transition text-sm">View</a>
        </div>
    </div>
</x-account-layout>

<!--

- Become a member get £5 off
- Spend £100 to get £15
- Specific items has discounts


-->