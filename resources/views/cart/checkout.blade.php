<x-layout>
    <div class="flex flex-wrap justify-between p-6 bg-gray-100 rounded-lg shadow-md text-black">
        <div class="w-full lg:w-[60%] mb-6 lg:mb-0 px-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <h2 class="text-2xl font-bold mb-4">Payment Details</h2>

                @if (!$addresses->isEmpty())
                    <select id="address-dropdown" class="form-control bg-gray-200 rounded px-3 py-1 mb-2 text-large">
                        <option value="">Select an address</option>
                        @foreach ($addresses as $address)
                            <option 
                                value="{{ $address->id }}" 
                                data-name="{{ $address->name }}" 
                                data-phone="{{ $address->phone }}" 
                                data-address="{{ $address->address }}" 
                                data-city="{{ $address->city }}" 
                                data-postcode="{{ $address->postcode }}" 
                                data-country="{{ $address->country }}">
                                {{ $address->address }}
                            </option>
                        @endforeach
                    </select>
                @endif

                <form class="grid grid-cols-1 gap-4" method="POST" action="/checkout/process" >
                    @csrf
                    <x-form-input label="Full Name" name="name" id="name" required />
                    <x-form-error name="name" />
                    
                    <x-form-input label="Phone Number" type="phone" name="phone" id="phone" value="{{ Auth::user()->phone }}" required />
                    <x-form-error name="phone" />
                    
                    <x-form-input label="Address Line 1" name="address" id="address" required />
                    <x-form-error name="address" />
                    
                    <x-form-input label="City" name="city" id="city" required />
                    <x-form-error name="city" />
                    
                    <x-form-input label="Postcode" name="postcode" id="postcode" required />
                    <x-form-error name="postcode" />
                    
                    <x-form-input label="Country" name="country" id="country" required />
                    <x-form-error name="country" />
                    
                    <x-form-input label="Card Number" name="card" type="text" id="card" maxlength="19" placeholder="1234 5678 9012 3456" required />
                    <x-form-error name="card" />
                    
                    <x-form-input label="CVV" name="cvv" type="text" id="cvv" maxlength="4" placeholder="123" required />
                    <x-form-error name="cvv" />
                    
                    <x-form-input label="Expiry Date" name="exp" type="text" id="exp" maxlength="5" placeholder="MM/YY" required />
                    <x-form-error name="exp" />
                    
                <button type="submit" class="w-full bg-primary py-3 text-white mt-2 font-semibold rounded-md hover:bg-accent1 transition">
                    Pay £{{ number_format($total, 2) }}
                </button>
                <p id="error-message" class="text-red-500 text-xs font-bold mt-3"></p>
            </form>
        </div>
        </div>
    
        <div class="w-full lg:w-[35%] bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4">Your Cart</h2>
            <div class="overflow-y-auto h-[528px] divide-y divide-gray-200">
                @foreach ($cartItems as $item )
                <div class="py-2">
                    <x-cart-item 
                    :quantity="$item->quantity" 
                    :imagePath="$item->box->imagePath" 
                    :price="$item->box->price" 
                    :title="$item->box->title" 
                    :type="$item->box->type" />
                </div>
                @endforeach
                <div class="flex justify-between items-center font-bold border-t border-gray-300 mt-4 pt-4">
                    <span class="text-gray-700">Total:</span>
                    <span class="text-gray-900">£{{ number_format($total, 2) }}</span>
                </div>
            </div>
        </div>
    </div>

<script>
    const addressDropdown = document.getElementById('address-dropdown');
    addressDropdown.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        document.getElementById('name').value = selectedOption.dataset.name || '';
        document.getElementById('address').value = selectedOption.dataset.address || '';
        document.getElementById('city').value = selectedOption.dataset.city || '';
        document.getElementById('postcode').value = selectedOption.dataset.postcode || '';
        document.getElementById('country').value = selectedOption.dataset.country || '';
    });

    document.getElementById('card').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, ''); 
      value = value.match(/.{1,4}/g)?.join(' ') ?? value; 
      e.target.value = value;
    });
  
    document.getElementById('exp').addEventListener('input', function (e) {
      let value = e.target.value.replace(/\D/g, '');
      if (value.length > 2) {
        value = value.slice(0, 2) + '/' + value.slice(2, 4);
      }
      e.target.value = value;
    });
  
    document.getElementById('cvv').addEventListener('input', function (e) {
      e.target.value = e.target.value.replace(/\D/g, '').slice(0, 4);
    });
</script>


</x-layout>