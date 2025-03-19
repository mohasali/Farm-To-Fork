<x-account-layout>
    <h1 class="text-2xl font-semibold mb-2">Your Payment Methods</h1>
    <p class="text-sm text-gray-500 mb-4"></p>
    <div id="payment-container" class="flex flex-wrap items-stretch gap-1 max-h-[600px] overflow-y-auto">
        <!-- Add Payment -->
        <button onclick="addPayment()" class="flex flex-col bg-gray-100 py-2 rounded-xl justify-center items-center w-full sm:w-[100%] h-[125px]">
            <p class="text-2xl mb-1" style="opacity: 0.75;">+</p>
            <p class="text-2xl">Add Payment</p>
        </button>
        
        @foreach ($payments as $payment)
            <!-- Existing Payment Method -->
            <div class="payment-item flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%] md:h-[225px]">
                <div class="payment-display w-full">
                    <h6 class="ml-4 mb-1 font-semibold text-lg sm:text-base">{{ $payment->name }}</h6>
                    <p class="ml-4 mb-1 text-sm sm:text-base">**** **** **** {{ substr($payment->card, -4) }}</p>
                    <p class="ml-4 mb-1 text-sm sm:text-base">Expires: {{ $payment->expiry }}</p>
                    
                    <div class="flex flex-row mt-auto space-x-4 ml-auto mr-4 justify-end">
                        <button onclick="editPayment(this)" type="button" class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Edit</button>
                        <form action="{{ route('payment.delete',$payment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-6 py-2 rounded font-semibold hover:bg-gray-400">Remove</button>
                        </form>
                    </div>
                </div>
                
                <!-- Edit Payment -->
                <div class="payment-edit hidden">
                    <form action="{{ route('payment.edit',$payment->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="name" placeholder="Cardholder Name"  value="{{ $payment->name }}" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                        <input type="text" name="card" maxlength="19" class="card-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="Card Number" value="{{ $payment->card }}">
                        <input type="text" name="expiry" class="exp-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="Expiry Date" value="{{ $payment->expiry }}">
                        <input type="text" name="cvv" class="cvv-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="CVV" value="" minlength="3" maxlength="4">
                        
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
      function editPayment(button) {
          const paymentItem = button.closest('.payment-item');
          const display = paymentItem.querySelector('.payment-display');
          const edit = paymentItem.querySelector('.payment-edit');
          display.classList.add('hidden');
          edit.classList.remove('hidden');
      }
      
      function cancelEdit(button) {
          const paymentItem = button.closest('.payment-item');
          const display = paymentItem.querySelector('.payment-display');
          const edit = paymentItem.querySelector('.payment-edit');
          display.classList.remove('hidden');
          edit.classList.add('hidden');
      }
      
      function addPayment(){
          const newPayment = document.createElement('div');
          newPayment.className = 'payment-item flex flex-col bg-gray-100 py-2 rounded-xl justify-start items-start w-full sm:w-[100%]';
          newPayment.innerHTML = `
              <div class="payment-edit">
                  <form action="" method="post">
                      @csrf
                      <input type="text" name="name" placeholder="Cardholder Name" class="ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1">
                      <input type="text" name="card" maxlength="19" class="card-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="Card Number">
                      <input type="text" name="expiry" class="exp-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="Expiry Date">
                      <input type="text" name="cvv" class="cvv-input ml-4 mb-1 text-sm sm:text-base border rounded px-2 py-1" placeholder="CVV" minlength="3" maxlength="4">
                      
                      <div class="flex flex-row mt-2 space-x-4 ml-4">
                          <button class="bg-primary text-white px-4 py-2 rounded font-semibold hover:bg-orange-600">Save</button>
                          <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded font-semibold hover:bg-gray-400" onclick="window.location.reload();">Cancel</button>
                      </div>
                  </form>
              </div>
          `;
          const paymentContainer = document.getElementById('payment-container');
          paymentContainer.appendChild(newPayment);
  
          newPayment.querySelector('input').focus();
      }
      
      // Use event delegation on the payment container for input formatting
      document.getElementById('payment-container').addEventListener('input', function(e) {
          if (e.target.classList.contains('card-input')) {
              let value = e.target.value.replace(/\D/g, ''); 
              value = value.match(/.{1,4}/g)?.join(' ') ?? value; 
              e.target.value = value;
          }
          else if (e.target.classList.contains('exp-input')) {
              let value = e.target.value.replace(/\D/g, '');
              if (value.length > 2) {
                  value = value.slice(0, 2) + '/' + value.slice(2, 4);
              }
              e.target.value = value;
          }
          else if (e.target.classList.contains('cvv-input')) {
              e.target.value = e.target.value.replace(/\D/g, '').slice(0, 4);
          }
      });
    </script>
</x-account-layout>
