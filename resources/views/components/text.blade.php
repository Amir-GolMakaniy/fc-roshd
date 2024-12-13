@props(['name'])

<input type="text" name="{{ $name }}" id="{{ $name }}" wire:model.live="{{ $name }}" {{ $attributes }}>