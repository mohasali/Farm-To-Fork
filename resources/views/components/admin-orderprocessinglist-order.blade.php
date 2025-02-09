@props(['order'])

<!-- Order Card -->
<div class="bg-gray-50 p-4 font-medium text-lg rounded-lg flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4">
    <!-- Order Info -->
    <div class="flex-1 w-full">
        <div class="flex items-center space-x-2">
            <div class="flex items-center w-full">
                <!-- Order ID -->
                <div class="w-24 flex items-center"><p><strong>Order ID</strong></p></div>
                <input type="text" value="{{ $order->id }}" class="w-full px-3 py-2 bg-gray-100 rounded-md" disabled>
            </div>
            <!-- Edit Icon -->
            <a href="" class="w-8 h-8 border rounded-md flex items-center justify-center">
                <img src="/images/Edit.png" alt="Edit icon" class="w-5 h-5"/>
            </a>
        </div>
        <div class="flex items-center space-x-2">
            <!-- Order Customer Name -->
            <div class="w-24 flex items-center"><p><strong>Name</strong></p></div>
            <!-- Hyperlink to user page -->
            <a href="" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md"><input type="text" value="{{ $order->user->name }}" disabled></a>
        </div>
        <div class="flex items-center mt-2">
            <!-- Order Description -->
            <div class="w-36 flex items-center"><p><strong>Description</strong></p></div>
            <input type="text" value="' {{ $order->description }}'" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled> <!-- No order description?! -->
        </div>
        <!-- Buttons -->
        <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0">
            <button class="w-full md:w-1/2 bg-gray-100 rounded-lg py-2 text-center">View Order Details</button>
            <button class="w-full md:w-1/4 bg-gray-100 rounded-lg py-2 text-center">Expand Info</button>
        </div>
    </div>
</div>
