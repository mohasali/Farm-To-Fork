@props(['active'=>false])

<a class="py-2 px-4 text-gray-700 hover:bg-gray-200 rounded-lg text-left font-medium {{ $active ? "bg-gray-100":"" }}"{{$attributes}}>{{ $slot }}</a>