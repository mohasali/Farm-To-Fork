@props(['active'=>false])

<a class="py-16 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg text-center font-medium {{ $active ? "bg-gray-100":"" }}"{{$attributes}}>{{ $slot }}</a>