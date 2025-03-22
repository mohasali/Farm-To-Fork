<x-layout>
    <!-- Users -->
    <section class="relative w-full bg-center">
        <div class="mt-16 flex flex-col items-center justify-center text-center px-4">
            <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')">Back</x-account-nav-link>
            <h1 class="font-medium text-3xl md:text-5xl text-secondary">Customers </h1>
        </div>
    </section>

    <!-- Customer and Admin filter -->
    <section class="gap-4 p-6 max-w-4xl mx-auto text-center">
        <div class="bg-gray-50 p-4 font-medium text-lg rounded-lg">
            <!-- Search Bar -->
            <div class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-2">
                <form class="relative w-full md:w-80 flex" method="GET">
                    <input name="q" autocomplete="off" type="text" placeholder="Search for a customer..." 
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300 ease-in-out">
                    <button type="submit" class="p-2 px-4 bg-primary text-white rounded hover:bg-accent1 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form> 
            </div>

            <!-- Customer Filter and Sort By -->
            <div class="flex flex-col md:flex-row justify-between p-4 text-secondary space-y-2 md:space-y-0">
                <form action="" method="GET">
                    <select class="w-full md:w-auto bg-gray-100 rounded-lg py-2 px-4" name="customer" onchange="this.form.submit()">
                        <option value="" hidden>Customer Filter</option>
                        <option value="user" {{ request('customer') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ request('customer') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </form>
                <form action="" method="GET">
                    <button type="submit" value="" class="text-red-600 ml-4">Reset</button>
                </form>                
            </div>
        </div>
    </section>

    <!-- Display Users -->
    <section class="gap-4 p-6 max-w-4xl mx-auto overflow-y-auto">
        <div class="max-h-[600px] overflow-y-auto space-y-4 p-2">
            @if($users->isEmpty())
                <p>No customers found.</p>
            @else
                <!-- Loop through users -->
                @foreach ($users as $user)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <!-- Customer has their own page --> 
                        <a href="{{ url('/customer/' . $user->id) }}">
                            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
                                <div class="w-16 h-16 rounded-full overflow-hidden">
                                    <!-- User image else default image -->
                                    <img src="{{ $user->pfp ?? '/images/Account/default_chicken.png' }}" alt="{{ $user->name }}" class="w-full h-full object-cover">
                                </div>
                                <div class="ml-4 text-center md:text-left">
                                    <h3 class="font-medium text-lg">{{ $user->name }}</h3>
                                    <p class="text-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                        </a>
                        <div class="ml-16 pl-2">
                            <form method="POST" action="{{ route('update-user-role', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <!-- User role -->
                                @if (auth()->user()->id == $user->id)
                                    <p class="text-red-500">You can't change your own role.</p>
                                @else
                                    <select name="isAdmin" class="p-2 m-2 mb-0 bg-gray-100 rounded-lg" onchange="this.form.submit()">
                                        <option value="0" {{ $user->isAdmin == 0 ? 'selected' : '' }}>User</option>
                                        <option value="1" {{ $user->isAdmin == 1 ? 'selected' : '' }}>Admin</option>
                                    </select>
                                @endif
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</x-layout>
