@props(['name'])

<input type="text" class="form-control" name="{{ $name }}" id="{{ $name }}"
       wire:model.live="{{ $name }}" {{ $attributes }}>