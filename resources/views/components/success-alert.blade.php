@props(['boxId'=>0])

@if (session('success') && $boxId==session('boxId'))
<div class=" text-green-600 font-bold text-sm text-center mt-1">
    {{ session('success') }}
</div>
@endif