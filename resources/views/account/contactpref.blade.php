<x-account-layout>
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
</x-account-layout>
