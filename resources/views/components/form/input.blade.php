@props(['name', 'type'])
<x-form.field>
    <input name="{{ $name }}" id="{{ $name }}" type="{{ $type }}"
        {{ $attributes(['value' => old($name)]) }}
        class="w-full border-2 border-stone-500 rounded text-stone-500 font-medium">
    <x-form.error name="{{ $name }}" />
</x-form.field>
