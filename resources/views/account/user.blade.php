<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Personal Information</h1>
    <p class="text-sm text-gray-500 mb-4"></p>

    <!-- Personal Information Form -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Username -->
        <div class="col-span-2">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Name</label>
            <div class="relative w-full">
                <input type="text" class="w-full p-2 pr-10 border border-gray-300 rounded" value="{{ Auth::user()->name }}" disabled>
                <a href="{{ route('account.edit', ['field' => 'name']) }}" class="absolute inset-y-0 right-0 flex items-center"><img src="/images/Edit.png" alt="Edit icon" class="h-6 md:h-8 hover:opacity-75"></a>
            </div>
        </div>

        <!-- Email -->
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
            @php
            $email = Auth::user()->email ?? ''; // Ensure email is not null
            $parts = explode('@', $email);

            $var = (count($parts) > 1) ? '@' . strtolower($parts[1]) : '@';
            @endphp
            <div class="relative w-full">
                <input type="email" class="w-full p-2 border border-gray-300 rounded" value="{{ substr(Auth::user()->email, 0, 1) }}********{{ substr(explode('@', Auth::user()->email)[0], -1) }}{{ $var }}" disabled>
                <a href="{{ route('account.edit', ['field' => 'email']) }}" class="absolute inset-y-0 right-0 flex items-center"><img src="/images/Edit.png" alt="Edit icon" class="h-6 md:h-8 hover:opacity-75"></a>
            </div>
        </div>

        <!-- Phone -->
        <div class="col-span-1">
            @php
            $phone = Auth::user()->phone;
            if($phone!=''){ $phone = "********".substr(Auth::user()->phone, -3);};
            @endphp
            <label class="block text-gray-700 text-sm font-semibold mb-1">Phone</label>
            <div class="relative w-full">
                <a href="{{ route('account.edit', ['field' => 'phone']) }}" class="absolute inset-y-0 right-0 flex items-center"><img src="/images/Edit.png" alt="Edit icon" class="h-6 md:h-8 hover:opacity-75"></a>
                <input type="text" class="w-full p-2 border border-gray-300 rounded" name="phone" value="{{ $phone }}" disabled>
            </div>
        </div>

        <!-- Password -->
        <div class="col-span-1">
            <label class="block text-gray-700 text-sm font-semibold mb-1">Password</label>
            <div class="relative w-full">
                <input type="password" class="w-full p-2 pr-10 border border-gray-300 rounded" value="********" disabled>
                <a href="{{ route('account.edit', ['field' => 'password']) }}" class="absolute inset-y-0 right-0 flex items-center"><img src="/images/Edit.png" alt="Edit icon" class="h-6 md:h-8 hover:opacity-75"></a>
            </div>
        </div>
    </div>
    @if (session('success'))
        <div class=" text-green-600 font-bold text-sm mt-1">
            {{ session('success') }}
        </div>
    @endif
</x-account-layout>
