@props(['name'])

<div>
    @error($name) <p class="text-danger me-5">{{ $message }}</p> @enderror
</div>