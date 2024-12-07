<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Your Addresses</h1>
    <p class="text-sm text-gray-500 mb-4"></p>
    <div id="address-container" class="flex flex-wrap items-stretch gap-1 max-h-[600px] overflow-y-auto">
        <!-- Add address -->
        <button onclick="addAddress()" class="flex flex-col bg-gray-100 py-2 rounded-xl justify-center items-center w-full sm:w-[100%] h-[125px]">
            <p class="text-2xl mb-1" style="opacity: 0.75;">+</p>
            <p class="text-2xl">Add Address</p>
        </button>

        @foreach ($addresses as $address)
            <!-- Current address -->
            <div class="address-item flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%] md:h-[225px]">
                <div class="address-display w-full">
                    <h6 class="ml-4 mb-1 font-semibold text-lg sm:text-base">{{ $address->name }}</h6>
                    <p class="ml-4 mb-1 text-sm sm:text-base">{{ $address->address }}</p>
                    <p class="ml-4 mb-1 text-sm sm:text-base">{{ $address->city }}</p>
                    <p class="ml-4 mb-1 text-sm sm:text-base">{{ $address->country }}</p>
                    <p class="ml-4 mb-1 text-sm sm:text-base">{{ $address->postcode }}</p>
                    <div class="flex flex-row mt-auto space-x-4 ml-auto mr-4 justify-end">
                        <button onclick="editAddress(this)" type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Edit</a>
                        <form action="/address/{{ $address->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-6 py-2 rounded font-semibold hover:bg-gray-400">Remove</a>
                        </form>
                    </div>
                </div>
                <div class="address-edit hidden">
                    <form action="/address/{{ $address->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="name" placeholder="Full Name" value="{{ $address->name }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                        <input type="text" name="address" placeholder="Address" value="{{ $address->address }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                        <input type="text" name="city" placeholder="City" value="{{ $address->city }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                        <input type="text" name="country" placeholder="Country" value="{{ $address->country }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                        <input type="text" name="postcode" placeholder="Post Code" value="{{ $address->postcode }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">

                        <div class="flex flex-row mt-2 space-x-4 ml-4">
                            <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded font-semibold hover:bg-gray-400" onclick="cancelEdit(this)">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <script>
    // Edit Address
    function editAddress(button) {
        const addressItem = button.closest('.address-item');
        const display = addressItem.querySelector('.address-display');
        const edit = addressItem.querySelector('.address-edit');
        display.classList.add('hidden');
        edit.classList.remove('hidden');
    }
    // Cancel Edit
    function cancelEdit(button) {
        const addressItem = button.closest('.address-item');
        const display = addressItem.querySelector('.address-display');
        const edit = addressItem.querySelector('.address-edit');
        display.classList.remove('hidden');
        edit.classList.add('hidden');
    }

    // Add Address
    function addAddress(){
        const newAddress = document.createElement('div');
        newAddress.className = 'address-item flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%]';
        newAddress.innerHTML = `
            <div class="address-edit">
                <form action="/address" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Full Name" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                    <input type="text" name="address" placeholder="Address" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                    <input type="text" name="city" placeholder="City" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                    <input type="text" name="country" placeholder="Country" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                    <input type="text" name="postcode" placeholder="Post Code" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">

                    <div class="flex flex-row mt-2 space-x-4 ml-4">
                        <button class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
                        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded font-semibold hover:bg-gray-400" onclick="window.location.reload();">Cancel</button>
                    </div>
                </form>
            </div>
        `;
        const addressContainer = document.getElementById('address-container');
        addressContainer.appendChild(newAddress);

        newAddress.querySelector('input').focus();
    }

</script>
</x-account-layout>
