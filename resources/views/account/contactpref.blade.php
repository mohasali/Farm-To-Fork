<x-account-layout>
    <h1 class="text-2xl font-semibold mb-4">Contact Preferences</h1>
    <p class="text-sm text-gray-500 mb-6">Select your preferred methods of contact below.</p>

    <!-- Contact Preferences Form -->
    <form method="POST" action="{{ route('account.update.contact.preferences') }}" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @csrf
        @method('PUT')
        
        <!-- Email -->
        <div class="col-span-1 flex items-center justify-start space-x-3">
            <input type="checkbox" name="contact_preferences[]" value="email" id="email" class="text-gray-700 h-5 w-5" 
            {{ in_array('email', json_decode(auth()->user()->contact_preferences ?? '[]', true)) ? 'checked' : '' }}> <!-- get user, access conctact pref, if null, default to [] and then convert json string into an array-->
            <label for="email" class="text-gray-700 text-sm font-semibold">Email</label>
        </div>

        <!-- Phone -->
        <div class="col-span-1 flex items-center justify-start space-x-3">
            <input type="checkbox" name="contact_preferences[]" value="phone" id="phone" class="text-gray-700 h-5 w-5"
            {{ in_array('phone', json_decode(auth()->user()->contact_preferences ?? '[]', true)) ? 'checked' : '' }}> <!-- get user, access conctact pref, if null, default to [] and then convert json string into an array-->
            <label for="phone" class="text-gray-700 text-sm font-semibold">Phone</label>
        </div>
        @if (session('success'))
            <div class=" text-green-600 font-bold text-sm mt-1">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-span-2 flex justify-start space-x-4 mt-48">
            <button type="submit" class="bg-primary text-white px-6 py-2 rounded font-semibold hover:bg-orange-600">Update</button>
        </div>
    </form>
</x-account-layout>
