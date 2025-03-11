<x-account-layout>
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-6">
            <a href="{{ route('account.orders') }}" class="text-gray-600 hover:text-primary mr-4">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
            <h1 class="text-2xl font-semibold">Order #{{ $order->id }}</h1>
        </div>

        

    </div>
</x-account-layout>