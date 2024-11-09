<x-layout>
    <div id="loading" class="fixed inset-0 bg-gray-900 bg-opacity-30 flex items-center justify-center z-10 hidden">
        <div class="w-24 h-24 border-4 border-dashed border-white rounded-full animate-spin"></div>
    </div>
    <div class="flex flex-wrap justify-between p-6 bg-gray-100 rounded-lg shadow-md text-black">

        <div class="w-full lg:w-[60%] mb-6 lg:mb-0 px-4">
            <form id="payment-form" class="bg-white p-6 rounded-lg shadow-md">
                @csrf
                <h2 class="text-xl font-bold mb-4">Payment Details</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <x-form-input label="Full Name" name="name" id="name"/>
                    <x-form-input label="Phone Number" type="phone" name="phone" id="phone" />
                    <x-form-input label="Address Line 1" name="address" id="address" />
                    <x-form-input label="City" name="city" id="city" />
                    <x-form-input label="Postcode" name="postcode" id="postcode" />
                    <x-form-input label="Country" name="country" id="country"/>
                </div>
    
                <div id="payment-element" class="my-4 mt-8">
                </div>
                <button id="submit" class="w-full bg-primary py-3 text-white font-semibold rounded-md hover:bg-accent1 transition">
                    Pay £{{ number_format($total, 2) }}
                </button>
                <p id="error-message" class="text-red-500 text-xs font-bold mt-3"></p>
            </form>
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

<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('{{ config('cashier.key') }}');
    const form = document.getElementById('payment-form');
    const errorMessage = document.getElementById('error-message');
    let elements, paymentElement;

    async function initialize() {
        const { clientSecret } = await fetch("{{ route('checkout.process') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        }).then(res => {
            if (!res.ok) throw new Error('Failed to fetch client secret');
            return res.json();
        });

        elements = stripe.elements({ clientSecret });
        paymentElement = elements.create('payment');
        paymentElement.mount('#payment-element');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            document.getElementById('submit').disabled = true;
            document.getElementById('loading').classList.remove('hidden');
            try {
                const { paymentIntent, error } = await stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        shipping: {
                            name: document.getElementById('name').value,
                            phone: document.getElementById('phone').value,
                            address: {
                                city: document.getElementById('city').value,
                                country: document.getElementById('country').value,
                                line1: document.getElementById('address').value,
                                postal_code: document.getElementById('postcode').value,
                            }
                        },
                        receipt_email: '{{ Auth::user()->email }}',
                    },
                    redirect: "if_required",
                });

                if (error) {
                    errorMessage.textContent = error.message;
                    document.getElementById('submit').disabled = false;
                    document.getElementById('loading').classList.add('hidden');
                    return;
                }

                const response = await fetch("{{ route('order.confirmation') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        paymentIntentId: paymentIntent.id
                    })
                });

                const result = await response.json();
                if (response.ok) {
                    window.location.href = result.redirectUrl;
                } else {
                    errorMessage.textContent = result.message || 'An error occurred.';
                    document.getElementById('submit').disabled = false;
                    document.getElementById('loading').classList.add('hidden');

                }
            } catch (err) {
                errorMessage.textContent = 'An unexpected error occurred. Please try again.';
                document.getElementById('submit').disabled = false;
                document.getElementById('loading').classList.add('hidden');

            }
        });
    }

    initialize();
</script>


</x-layout>
