<div>
    <x-slot:title>ساخت کلاس</x-slot>

    <div class="container my-3">
        <div class="card shadow-sm p-3">
            <form wire:submit.prevent="save">
                <!-- اطلاعات اصلی -->
                <div class="row g-3">
                    <!-- نام -->
                    <div class="col-md-12">
                        <x-label name="form.name" value="نام" class="form-label"/>
                        <x-text name="form.name" class="form-control"/>
                        <x-error name="form.name" class="text-danger"/>
                    </div>

                    <!-- کاربران -->
                    <div class="col-md-12">
                        <x-label name="form.users" value="کاربر" class="form-label"/>
                        <select name="form.users[]" id="form.users" multiple wire:model.defer="form.users"
                                class="form-control">
                            @foreach(App\Models\User::query()->orderByDesc('id')->get() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  {{ $user->family }}</option>
                            @endforeach
                        </select>
                        <x-error name="form.users" class="text-danger"/>
                    </div>

                    <!-- دکمه ثبت -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-success w-100">
                            ساخت کلاس
                        </button>
                    </div>
            </form>
        </div>
    </div>
</div>