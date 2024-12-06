<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Your Payments</h1>
    <p class="text-sm text-gray-500 mb-4"></p>

    <form class="flex flex-wrap items-stretch gap-1 max-h-[600px] overflow-y-auto">
        <!-- Add address -->
        <button class="flex flex-col bg-gray-100 py-2 rounded-xl justify-center items-center w-full sm:w-[100%] h-[125px]">
            <p class="text-2xl mb-1" style="opacity: 0.75;">+</p>
            <p class="text-2xl">Add Payment</p>
        </button>
        <!-- Current address -->
        <div class="flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%] h-[400px]">
            <!-- Name -->
            <div class="mx-4">
                <label class="block text-gray-700 text-sm font-semibold">Name</label>
                <input type="text" class="w-full p-2 border border-gray-300 rounded" value="John Doe" disabled>
            </div>
            <!-- Card Type -->
            <div class="mx-4">
                <label class="block text-gray-700 text-sm font-semibold" for="cardtype">Card Type</label>
                <select name="cardtype" id="type" class="w-full p-2 border border-gray-300 rounded" disabled>
                    <option value="visa">Visa</option>
                    <option value="mastercard">MasterCard</option>
                </select>
            </div>
            <div class="flex">
                <!-- Card Number -->
                <div class="mx-4">
                    <label class="block text-gray-700 text-sm font-semibold">Card Number</label>
                    <input id="ccn" type="tel" inputmode="numeric" class="w-full p-2 border border-gray-300 rounded" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" value="1234 5678 9109 8765">
                </div>
                <!-- CVV -->
                <div class="mx-4">
                    <label class="block text-gray-700 text-sm font-semibold">CVV</label>
                    <input type="text" class="w-full p-2 border border-gray-300 rounded" value="098">
                </div>
            </div>
            <!-- Expiry Date -->
            <div class="flex flex-col ml-4">
                <div class="flex flex-row space-x-4">
                    <!-- Month -->
                    <div>
                        <label for="expirymonth" class="block text-gray-700 text-sm font-semibold">Month</label>
                        <select name="expirymonth" id="expirymonth" class="w-full p-2 border border-gray-300 rounded">
                            <option value="01">01</option>
                            <option value="01">02</option>
                            <option value="01">03</option>
                            <option value="01">04</option>
                            <option value="01">05</option>
                            <option value="01">06</option>
                            <option value="01">07</option>
                            <option value="01">08</option>
                            <option value="01">09</option>
                            <option value="01">10</option>
                            <option value="01">11</option>
                            <option value="01">12</option>
                        </select>
                    </div>
                    <!-- Year -->
                    <div>
                        <label for="expiryyear" class="block text-gray-700 text-sm font-semibold">Year</label>
                        <select name="expiryyear" id="expiryyear" class="w-full p-2 border border-gray-300 rounded">
                            <option value="2024">2024</option>
                            <option value="2024">2025</option>
                            <option value="2024">2026</option>
                            <option value="2024">2027</option>
                            <option value="2024">2028</option>
                            <option value="2024">2029</option>
                            <option value="2024">2030</option>
                        </select>
                    </div>
                </div>
             <!-- Billing Address -->
             <div>
                <label class="block text-gray-700 text-sm font-semibold">Billing Address</label>
                <select name="expiryyear" id="expiryyear" class="w-full p-2 border border-gray-300 rounded">
                    <option value="Address1">Address 1</option>
                    <option value="Address2">Address 2</option>
                    <option value="">---------------</option>
                    <option value="NewAddress">Add new address</option>
                </select>
            </div>
            <!-- Buttons -->
            <div class="col-span-2 flex space-x-4 mt-6">
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
                <a href='/account/user' class="bg-gray-300 text-gray-700 px-4 py-2 rounded font-semibold hover:bg-gray-400">Cancel</a>
            </div>
        </form>
</x-account-layout>
