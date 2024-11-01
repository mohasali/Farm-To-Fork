@props(['name'])

@error($name)
<p class="text-red-500 text-bold text-xs font-bold"> {{$message}}</p>
@enderror