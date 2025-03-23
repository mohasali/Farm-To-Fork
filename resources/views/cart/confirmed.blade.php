<x-layout title="Order Confirmation">
    <div class="m-4 text-center">
      <!-- Order confirmation -->
      <div class="p-4">
        <h1 class="text-5xl font-bold pb-4">Order placed!</h1><hr>
        <p class="pt-4 text-black">Your order is confirmed! Thank you for your purchase, {{ $order->name }}.</p>
        <p class="text-black">Your order number is {{ $order->id }}.</p> 
      </div>
      <!-- Shipping Address -->
      <div class="p-4">
        <h1 class="text-3xl font-medium pb-4">Shipping to</h1><hr>
        <p class="text-black">{{ $order->address }}, {{ $order->city }}</p>
        <p class="text-black">{{ $order->postcode}}, {{ $order->country }}</p> 
      </div>
      <!-- Ordered Boxes -->
      <div class="p-4">
        <h1 class="text-3xl font-medium pb-4">Ordered Boxes</h1><hr>
        @if ($order->itemOrders->count())
          @foreach ($order->itemOrders as $itemOrder)
            @if ($itemOrder->box)
              <p class="text-black font-semibold">{{ $itemOrder->box->title }}</p>
              
              @php
                $images = $itemOrder->box->getImages();
              @endphp

              @if (!empty($images))
                @foreach ($images as $image)
                  <img src="{{ asset($image) }}" alt="Box Image" class="mx-auto my-4 h-48 object-cover rounded-lg">
                @endforeach
              @else
                <p class="text-black">No images available.</p>
              @endif

            @endif
          @endforeach
        @else
          <p class="text-black">No boxes ordered.</p>
        @endif
      </div>
      <!-- Total -->
      <div class="p-4">
        <h1 class="text-3xl font-medium pb-4">Total</h1><hr>
        <p class="text-black">£{{ $order->total }}</p>
      </div>
      <!-- Check order status -->
      <div class="p-4">
        <a href="/account/orders" class="px-7 py-3 bg-primary font-medium text-white rounded-lg pb-4">Check order status</a>
      </div>
    </div>
</x-layout>
