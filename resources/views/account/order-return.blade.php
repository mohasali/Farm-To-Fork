<x-account-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('account.orders') }}" class="text-gray-600 hover:text-primary mr-4">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
            <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
        </div>

        <div class="border rounded-lg p-4">
            <div class="mb-8">
                <form action="{{ route('order.return', $order->id) }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <input type="hidden" name="status" value="Canceled">
                    <h2 class="text-xl font-semibold mb-4 ">Select items to return</h2>

                    @foreach($order->itemOrders as $item)
                    <!-- If not last item, add border -->
                    <div class="flex items-center justify-between {{ !$loop->last ? 'border-b' : '' }} pt-4 pb-4">
                        <div>
                            <div class="flex flex-row">
                                <!-- Item title -->
                                <h3 class="font-semibold">{{ $item->box->title }}</h3>
                                <!-- Check item -->
                                <input class="ml-4 mt-1" type="checkbox" id="items[]" name="items[]" value="{{ $item->id }}">
                            </div>
                            <!-- Grab all images -->
                            @php
                                $images = $item->box->getImages();
                            @endphp
                            <div class="flex flex-row">
                            @if (!empty($images))
                                @foreach ($images as $image)
                                    <img src="{{ asset($image) }}" alt="Box Image" class="mx-auto my-4 h-36 object-cover rounded-lg">
                                @endforeach
                            @else
                                <p class="text-black">No images available.</p>
                            @endif
                            </div>
                            <!-- Item quantity -->
                            <p class="w-16 h-16 object-covsm text-gray-500">Quantity: {{ $item->quantity }}</p>
                            <p class="font-semibold">£{{ number_format($item->box->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div>
                    <div class="flex flex-row">
                        <div>
                            <!-- Reason for return -->
                            <h2 class="text-xl font-semibold mb-4 ">Why are you returning this?</h2>
                            <select name="reason" class="bg-gray-50 p-2 rounded-lg font-semibold" required>
                                <option value="" disabled selected>Select your reason</option>
                                <option value="damaged">Damaged or expired products</option>
                                <option value="incorrect">Incorrect Item received</option>
                                <option value="not_described">Not as Described</option>
                                <option value="late">Late Delivery</option>
                                <option value="changed_mind">Changed Mind</option>
                                <option value="accidental">Accidental Order</option>
                                <option value="no_reason">No Reason</option>
                            </select>
                            <!-- Original packaging -->
                            <h2 class="text-md font-semibold mb-4 mt-4">Is the item inside the shipping box unopened and sealed in its original packaging?</h2>
                            <p class="text-gray-500 text-sm">This will not impact your return or refund. Please ensure the item is returned in its original packaging.</p>
                            <!-- Make it right -->
                            <h2 class="text-xl font-semibold mb-4 mt-4">How can we make it right?</h2>
                            <!-- Radio buttons -->
                            <input type="radio" id="payment" name="return" value="payment" checked>
                            <label for="payment">Refund to payment method</label><br>
                            <input type="radio" id="replacement" name="return" value="replacement">
                            <label for="css">Replace with the exact same boxes</label><br>
                        </div>
                        <!-- Return -->
                        <div class="mt-4 p-16 rounded-lg text-center max-w-screen-lg mx-auto">
                            <h6 class="text-md font-semibold mb-4"></h6>
                            <!-- Submit  -->
                            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-bold hover:bg-orange-600">Return</button>
                            <p class="mt-4 text-sm font-semibold border-b pb-4">Return by {{ $order->updated_at->addDays(7)->format('j F, Y') }}</p>
                            <h6>Items you're returning</h6>
                            <!-- Grid with images -->
                            <div class="grid grid-cols-3 gap-4 mt-4" id="selected-items-grid">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            // Check if at least one item is selected
            const checkboxes = document.getElementsByName('items[]');
            let checked = false;
            
            // Loop through all checkboxes
            for (let checkbox of checkboxes) {
                if (checkbox.checked) {
                    checked = true;
                    break;
                }
            }
            
            // If no item is selected, show alert
            if (!checked) {
                alert('Please select at least one item to return');
                return false;
            }
            
            return alert('Your return request has been submitted');
        }
    </script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Updated images when checkboxes change
        const checkboxes = document.querySelectorAll("input[name='items[]']");
        const selectedItemsGrid = document.getElementById("selected-items-grid");

        // Wait for changes
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener("change", function () {
                updateSelectedImages();
            });
        });

        // Update selected images
        function updateSelectedImages() {
            selectedItemsGrid.innerHTML = "";// Clear
            
            // Loop through all checkboxes
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    // Get parent div
                    const itemDiv = checkbox.closest(".flex.items-center.justify-between");
                    const images = itemDiv.querySelectorAll("img");

                    // Add images to grid
                    images.forEach(image => {
                        const imgElement = document.createElement("img");
                        imgElement.src = image.src;
                        imgElement.alt = "Selected Item";
                        imgElement.classList.add("w-full", "h-16", "object-cover", "rounded-lg");
                        selectedItemsGrid.appendChild(imgElement);
                    });
                }
            });
        }
    });
</script>
</x-account-layout>