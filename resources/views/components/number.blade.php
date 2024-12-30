@props(['name'])

<input type="text" oninput="input(this)" name="{{ $name }}" id="{{ $name }}" wire:model.defer="{{ $name }}" {{ $attributes }}>