<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Your Addresses</h1>
    <p class="text-sm text-gray-500 mb-4"></p>
    <div class="flex flex-wrap items-stretch gap-4 max-h-[600px] overflow-y-auto">
        <!-- Add address -->
        <button class="flex flex-col bg-gray-100 py-4 rounded-xl justify-center items-center w-full sm:w-[40%] h-[275px]">
            <p class="text-2xl mb-1" style="opacity: 0.75;">+</p>
            <p class="text-2xl">Add Address</p>
        </button>
        <!-- Current address -->
        <div class="flex flex-col bg-gray-100 py-4 rounded-xl justify-start items-start w-full sm:w-[40%] h-[275px]">
            <h6 class="ml-4 mb-1 font-semibold text-lg sm:text-base">John Doe</h6>
            <p class="ml-4 mb-1 text-sm sm:text-base">City, Post Code</p>
            <p class="ml-4 mb-1 text-sm sm:text-base">Country</p>
            <p class="ml-4 mb-1 text-sm sm:text-base">Phone number:</p>
            <p class="ml-4 text-sm sm:text-base">Country</p>
            <div class="flex flex-row mt-auto space-x-4 ml-4">
                <a href="" type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Edit</a>
                <a href="" class="bg-red-500 text-white px-6 py-2 rounded font-semibold hover:bg-gray-400">Remove</a>
            </div>
        </div>
    </div>
</x-account-layout>
