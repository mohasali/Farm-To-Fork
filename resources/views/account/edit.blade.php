<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Personal Information</h1>
    <p class="text-sm text-gray-500 mb-4"></p>

    <!-- Personal Information Form -->
    <form class="grid grid-cols-1 sm:grid-cols-2 gap-4" method="POST" action="{{ route('user.update', ['field' => request()->query('field')]) }}">
        @csrf
        @method('PATCH')

        @php
            $editableField = request()->query('field'); // Get which field should be editable
        @endphp

        <!-- Full Name -->
        @if ($editableField === 'name')
        <div class="col-span-2">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Name</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded" name="name" value="{{ Auth::user()->name }}" required>
        </div>
        @endif

        <!-- Email -->
        @if ($editableField === 'email')
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
            <input type="email" class="w-full p-2 border border-gray-300 rounded" name="email" value="{{ Auth::user()->email }}" required>
        </div>
        @endif

        <!-- Phone -->
        @if ($editableField === 'phone')
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Phone</label>
            <input type="text" class="w-full p-2 border border-gray-300 rounded" name="phone" value="{{ Auth::user()->phone }}">
        </div>
        @endif

        <!-- Password -->
        @if ($editableField === 'password')
        <div class="col-span-2">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Current Password</label>
            <input type="password" class="w-full p-2 border border-gray-300 rounded" name="password_current">
        </div>
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">New Password</label>
            <input type="password" class="w-full p-2 border border-gray-300 rounded" name="password">
        </div>
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Confirm Password</label>
            <input type="password" class="w-full p-2 border border-gray-300 rounded" name="password_confirmation">
        </div>
        @endif

        <!-- Buttons -->
        <div class="col-span-2 flex space-x-4 mt-6">
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
            <a href='/account/user' class="bg-gray-300 text-gray-700 px-4 py-2 rounded font-semibold hover:bg-gray-400">Cancel</a>
        </div>
        
        <!-- Display any errors from the fields -->
        @if ($errors->any())
            <div class="text-red-500 font-semibold text-sm mt-2">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

    </form>
</x-account-layout>
