@props(['label', 'type' => 'text', 'name', 'id', 'required' => true,'value'=>''])

<div>
    <label for="{{ $id }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
    </label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $id }}" 
        value="{{ $value }}"
        {{ $required ? 'required' : '' }}
        class="px-4 py-2 w-full border border-gray-300 rounded-md focus:ring focus:ring-primary focus:border-primary"
    />
</div>
