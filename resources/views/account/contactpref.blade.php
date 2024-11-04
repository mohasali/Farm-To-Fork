<x-layout>
    <div class="flex flex-col md:flex-row w-full max-w-7xl mx-auto p-4 md:my-16 bg-gray-50 rounded-lg shadow-lg">
        
        <!-- Sidebar -->
        <aside class="w-full md:w-1/4 bg-white p-6 rounded-lg shadow-md flex flex-col items-center">            
            <!-- User Info -->
            <div class="text-center mb-6">
                <h2 class="text-lg font-semibold">{{ Auth::user()->name }}</h2>
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col w-full">
                <a href="{{ route('account.user') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium">Personal Information</a>
                <a href="{{ route('account.orders') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium">Orders</a>
                <a href="{{ route('account.address') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium">Addresses</a>
                <a href="{{ route('account.subscription') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium">Subscriptions</a>
                <a href="{{ route('account.payments') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium">Payments</a>
                <a href="{{ route('account.contactpref') }}" class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium bg-gray-100">Contact Preferences</a>
                <form class=" m-0" method="POST" action="/logout">
                    @csrf
                    <button class="py-2 px-4 hover:bg-gray-200 rounded-lg text-left font-medium text-red-500">Log Out</button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4 bg-white p-8 rounded-lg shadow-md md:ml-4">
            <h1 class="text-2xl font-semibold mb-4">Contact Preferences</h1>
            <p class="text-sm text-gray-500 mb-6">Select your preferred methods of contact below.</p>

            <!-- Contact Preferences Form -->
            <form class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Email  -->
                <div class="col-span-1 flex items-center justify-start space-x-3">
                    <input type="checkbox" id="email" class="text-gray-700 h-5 w-5">
                    <label for="email" class="text-gray-700 text-sm font-semibold">Email</label>
                </div>

                <!-- Phone  -->
                <div class="col-span-1 flex items-center justify-start space-x-3">
                    <input type="checkbox" id="phone" class="text-gray-700 h-5 w-5">
                    <label for="phone" class="text-gray-700 text-sm font-semibold">Phone</label>
                </div>

                <!-- Buttons -->
                <div class="col-span-2 flex justify-end space-x-4 mt-8">
                    <button type="submit" class="bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
                    <a href="/account" class="bg-gray-300 text-gray-700 px-6 py-2 rounded font-semibold hover:bg-gray-400">Cancel</a>
                </div>
            </form>
        </main>
    </div>
</x-layout>
