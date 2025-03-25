<x-layout title="Edit Details">
    <section class="max-w-4xl mt-4 rounded-md mx-auto p-6 shadow-md">
        <x-account-nav-link href="{{ url()->previous() }}" :active="false">Back</x-account-nav-link>
        
        <h1 class="text-2xl font-semibold text-secondary mt-4">Edit Customer Information</h1>
        
        <form method="POST" action="{{ route('customer.update', ['id' => $user->id]) }}" class="mt-6">
            @csrf
            @method('PUT')
            
            <input type="hidden" name="field" value="{{ $field }}">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    @if($field == 'name')
                        Name
                    @elseif($field == 'email')
                        Email
                    @elseif($field == 'phone')
                        Phone
                    @elseif($field == 'password')
                        New Password
                    @endif
                </label>
                
                @if($field == 'password')
                    <input type="password" name="password" class="w-full p-2 border border-gray-300 rounded" required>
                    
                    <label class="block text-gray-700 text-sm font-semibold mt-4 mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="w-full p-2 border border-gray-300 rounded" required>
                @else
                    <input type="{{ $field == 'email' ? 'email' : 'text' }}" name="{{ $field }}" value="{{ $field == 'password' ? '' : $user->$field }}" class="w-full p-2 border border-gray-300 rounded" required>
                @endif
            </div>
            
            @if ($errors->any())
                <div class="text-red-500 mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="flex justify-end">
                <button type="submit" class="bg-primary text-white py-2 px-4 rounded hover:bg-opacity-90">
                    Save Changes
                </button>
            </div>
        </form>
    </section>
</x-layout>