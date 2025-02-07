<x-layout>
    <!-- User Detail Managemnent -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')" >Back</x-account-nav-link>
            <h1 class="font-medium text-5xl text-black">User Detail Management</h1>
        </div>
    </section>
    <!-- Filter User -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-1xl rounded-lg">
            <!-- Search bar -->
            <div>
                <form class="relative" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for a user..." 
                        class="w-80 px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
            </div>
            <!-- Product Filter and Sort By -->
            <div class="flex justify-between p-4 text-secondary">
                <button class="items-start bg-gray-100 rounded-lg p-4">Product Filter</button>
                <button class="items-end bg-gray-100 rounded-lg p-4">Sort By</button>
            </div>
        </div>
    </section>
</x-layout>