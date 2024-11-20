@props(['quantity', 'imagePath', 'price', 'title', 'type'])

<div class="flex items-center gap-4">
    <img src="{{ $imagePath }}" alt="Box" class="w-16 h-16 object-cover rounded-md shadow-md">
    <div class="flex-1">
        <h3 class="font-semibold text-gray-800">{{ $title }}</h3>
        <p class="text-sm text-gray-500 capitalize">{{ $type }}</p>
        <p class="text-sm text-gray-500">Quantity: {{ $quantity }}</p>
    </div>
    <div>
        <p class="font-semibold text-gray-800">£{{ number_format($price*$quantity, 2) }}</p>
    </div>
</div>
