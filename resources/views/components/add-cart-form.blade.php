<form method="POST" action="/cart/add" class="flex justify-center items-center"> 
    @csrf 
    <input {{  $attributes->merge(['class'=>"hidden", 'name'=>"boxId", 'id'=>"boxId"])}} /> 
    {{ $slot }}
</form>