@props(['name'])

<input type="number" class="form-control" name="{{ $name }}" id="{{ $name }}"
       wire:model.live="{{ $name }}" {{ $attributes }}>
