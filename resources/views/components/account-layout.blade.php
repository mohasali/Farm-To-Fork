<x-layout>
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto p-2 md:p-4 md:my-8 bg-gray-50 rounded-lg shadow-lg">
        
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 bg-white p-4 rounded-lg shadow-md flex flex-col items-center h-auto md:max-h-[calc(100vh-4rem)] mb-2 md:mb-0 overflow-y-auto">            
            <!-- User Info -->
            <div class="text-center mb-6">
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col w-full space-y-1">

                <x-account-nav-link href="{{ route('account.user') }}" :active="request()->routeIs('account.user')" >Personal Information</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.orders') }}" :active="request()->routeIs('account.orders')" >Orders</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.address') }}" :active="request()->routeIs('account.address')" >Addresses</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.subscription') }}" :active="request()->routeIs('account.subscription')" >Subscriptions</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.rewards') }}" :active="request()->routeIs('account.rewards')" >Rewards</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.payments') }}" :active="request()->routeIs('account.payments')" >Payments</x-account-nav-link>
                <x-account-nav-link href="{{ route('account.contactpref') }}" :active="request()->routeIs('account.contactpref')" >Contact Preferences</x-account-nav-link>
                <!-- Only display to administrators -->
                @if(Auth::check() && Auth::user()->isAdmin)
                    <x-account-nav-link href="{{ route('admin.index') }}" :active="request()->routeIs('admin.index')" >Admin</x-account-nav-link>
                @endif
                <form class=" m-0" method="POST" action="/logout">
                    @csrf
                    <button class="py-2 px-4 hover:bg-gray-200 rounded-lg text-left font-medium text-red-500">Log Out</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4 bg-white p-4 md:p-6 rounded-lg shadow-md md:ml-4 flex-1 overflow-y-auto md:max-h-[calc(100vh-4rem)]">
            {{ $slot }}
        </main>
    </div>
</x-layout>
