@props(['order','statusOptions'])

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
        </div>
        <div class="flex items-center space-x-2">
            <!-- Order Customer Name -->
            <div class="w-24 flex items-center"><p><strong>Name</strong></p></div>
            <!-- Hyperlink to user page -->
            <a href="" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md"><input type="text" value="{{ $order->user->name }}" disabled></a>
        </div>
        <div class="flex items-center mt-2">
            <!-- Order Description -->
            <?php
                $description = "";
                foreach ($order->itemOrders as $item) {
                    $description .= $item->box->title . " × " . $item->quantity . ", ";
                }
                // Remove the trailing comma and space
                $description = rtrim($description, ", ");

            ?>
            <div class="w-36 flex items-center"><p><strong>Description</strong></p></div>
            <input type="text" value="{{$description}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled> <!-- No order description?! -->
        </div>
        <div class="flex items-center mt-2">
            <div class="w-36 flex items-center"><p><strong>Address</strong></p></div>
            <input type="text" value="{{$order->address.", ".$order->city.", ".$order->country.", ".$order->postcode}}" class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" disabled> <!-- No order description?! -->
        </div>
        <div class="flex items-center mt-2">
            <!-- Order Status -->
            <div class="w-36 flex items-center"><p><strong>Status</strong></p></div>
            <form action="" method="POST">
                @method('PATCH')
                @csrf
                <input name="orderId" value="{{ $order->id }}" hidden>
                <select class="w-full mt-2 px-3 py-2 bg-gray-100 rounded-md" name="status" onchange="this.form.submit()">
                    @foreach($statusOptions as $status)
                        <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <!-- Buttons -->
        <!--
        <div class="flex flex-col md:flex-row justify-between mt-4 space-y-2 md:space-y-0">
            <button class="w-full md:w-1/2 bg-gray-100 rounded-lg py-2 text-center">View Order Details</button>
            <button class="w-full md:w-1/4 bg-gray-100 rounded-lg py-2 text-center">Expand Info</button>
        </div>
    -->
    </div>
</div>
