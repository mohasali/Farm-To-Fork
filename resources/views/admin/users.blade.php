<x-layout title="Admin | Users">
    <!-- User Detail Management -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Customer Detail Management</h1>
        </div>
    </section>
    <!-- Filter User -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-lg rounded-lg">
            <!-- Search Bar -->
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-2">
                <form class="relative w-full md:w-80 flex" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for a user..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
            </div>
        </div>
    </section>
    <!-- Display Users -->
    <section class="gap-4 p-6 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            <!-- User -->
            @foreach ($users as $user)
                <x-admin-users-item :user="$user" />
            @endforeach
        </div>
    </section>
</x-layout>

<script>
    function viewUserInfo(i){
        document.getElementById('info_'+i).classList.remove('hidden');

    }
    function closeInfo(i) {
        document.getElementById('info_'+i).classList.add('hidden');
    }
    function viewOrders(i){
        document.getElementById('orders_'+i).classList.remove('hidden');

    }
    function closeOrders(i) {
        document.getElementById('orders_'+i).classList.add('hidden');
    }
</script>