<x-layout>
    @foreach ($cartItems as $item )
        {{ $item->box->title }}
    @endforeach
</x-layout>