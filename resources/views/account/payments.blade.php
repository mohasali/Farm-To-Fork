<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Your Payments</h1>
    <p class="text-sm text-gray-500 mb-4"></p>
    <div class="flex flex-wrap items-stretch gap-1 max-h-[600px] overflow-y-auto">
        <!-- Add address -->
        <button class="flex flex-col bg-gray-100 py-2 rounded-xl justify-center items-center w-full sm:w-[100%] h-[125px]">
            <p class="text-2xl mb-1" style="opacity: 0.75;">+</p>
            <p class="text-2xl">Add Payment</p>
        </button>
        <!-- Current address -->
        <div class="flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%] h-[325px]">
            <!-- Name -->
            <div class="mx-4">
                <label class="block text-gray-700 text-sm font-semibold">Name</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded" value="John Doe" disabled>
            </div>
            <!-- Card Type -->
            <div class="mx-4">
                <label class="block text-gray-700 text-sm font-semibold" for="cardtype">Card Type</label>
                <select name="cardtype" id="type" class="w-full p-2 border border-gray-300 rounded">
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                </select>
            </div>
            <div class="flex inline">
                <!-- Card Number -->
                <div class="mx-4">
                    <label class="block text-gray-700 text-sm font-semibold">Card Number</label>
                    <input id="ccn" type="tel" inputmode="numeric" class="w-full p-2 border border-gray-300 rounded" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" required>
                </div>
                <!-- CVV -->
                <div class="mx-4">
                    <label class="block text-gray-700 text-sm font-semibold">CVV</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded" value="098" disabled>
                </div>
            </div>
            <!-- Expiry date -->
            <div class="flex inline">
                <label class="block text-gray-700 text-sm font-semibold">Expiry Date</label>
                <div class="mx-4">
                    <div clsas="flex flex-row inline">
                        <!-- Month -->
                        <label class="block text-gray-700 text-sm font-semibold">Month</label>
                        <select name="expirymonth" id="type" class="w-full p-2 border border-gray-300 rounded">
                            <option value="visa">Visa</option>
                            <option value="mastercard">MasterCard</option>
                        </select>
                        <!-- Year -->
                        <label class="block text-gray-700 text-sm font-semibold">Month</label>
                        <select name="expirymonth" id="type" class="w-full p-2 border border-gray-300 rounded">
                            <option value="visa">Visa</option>
                            <option value="mastercard">MasterCard</option>
                        </select>
                    </div>
                </div>
            </div>
             <!-- Billing Address -->
             <div class="mx-4">
                <label class="block text-gray-700 text-sm font-semibold">Billing Address</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded" value="John Doe" disabled>
            </div>
        </div>
    </div>
</x-account-layout>
