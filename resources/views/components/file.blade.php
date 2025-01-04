@props(['name'])

<input type="file" name="{{ $name }}" id="{{ $name }}" wire:model.defer="{{ $name }}" {{ $attributes }}>