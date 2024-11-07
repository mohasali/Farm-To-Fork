<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Personal Information</h1>
    <p class="text-sm text-gray-500 mb-4"></p>

    <!-- Personal Information Form -->
    <form class="grid grid-cols-1 sm:grid-cols-2 gap-4" method="POST" action='/user'>
        @csrf
        @method('PATCH')
        <!-- Full Name -->
        <div class="col-span-2">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Name</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded" id="name" name="name" value="{{ Auth::user()->name }}" required>
        </div>

        <!-- Email -->
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
            @php
            $email = Auth::user()->email ?? ''; // Ensure email is not null
            $parts = explode('@', $email);

            $var = (count($parts) > 1) ? '@' . strtolower($parts[1]) : '@';
            @endphp
            <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" value="{{ Auth::user()->email}}" required>
        </div>
        <x-form-error name="email"/>

        <!-- Phone -->
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Phone</label>
            <input type="text" id="phone" name="phone" class="w-full p-2 border border-gray-300 rounded " value="{{ Auth::user()->phone }}" >
        </div>
        <x-form-error name="phone"/>

        <!-- Password -->
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Password</label>
            <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 border border-gray-300 rounded">
        </div>
        <x-form-error name="password"/>

        @if (session('success'))
        <div class=" text-green-600 font-bold text-sm mt-1">
            {{ session('success') }}
        </div>
        @endif

        <!-- Buttons -->
        <div class="col-span-2 flex space-x-4 mt-6">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
            <a href='/account' class="bg-gray-300 text-gray-700 px-4 py-2 rounded font-semibold hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</x-account-layout>
