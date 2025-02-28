<div>
    <x-slot:title>ویرایش کاربر</x-slot>

    <div class="container my-3">
        <div class="card p-3">
            <form wire:submit="save">
                <div class="row g-3">
                    <div class="col-md-4">
                        <x-label name="form.name" value="نام" class="form-label"/>
                        <x-text name="form.name" class="form-control"/>
                        <x-error name="form.name" class="text-danger"/>
                    </div>

                    <div class="col-md-4">
                        <x-label name="form.family" value="نام خانوادگی" class="form-label"/>
                        <x-text name="form.family" class="form-control"/>
                        <x-error name="form.family" class="text-danger"/>
                    </div>

                    <div class="col-md-4">
                        <x-label name="form.father_name" value="نام پدر" class="form-label"/>
                        <x-text name="form.father_name" class="form-control"/>
                        <x-error name="form.father_name" class="text-danger"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-10">
                        <x-label name="form.image" value="آپلود عکس" class="form-label"/>
                        <x-file name="form.image" class="form-control"/>
                        <x-error name="form.image" class="text-danger"/>
                    </div>

                    <div class="col-md-2">
                        <input type="checkbox" class="form-check-input mt-md-5" wire:model="form.delete_image">
                        <x-label name="form.delete_image" value="حذف تصویر" class="form-label mt-md-5"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-10">
                        <x-label name="form.placed" value="آپلود عکس قرار داد" class="form-label"/>
                        <x-file name="form.placed" class="form-control"/>
                        <x-error name="form.placed" class="text-danger"/>
                    </div>

                    <div class="col-md-2">
                        <input type="checkbox" class="form-check-input mt-md-5" wire:model="form.delete_placed">
                        <x-label name="form.delete_placed" value="حذف تصویر" class="form-label mt-md-5"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <x-label name="form.national_code" value="کد ملی" class="form-label"/>
                        <x-text name="form.national_code" class="form-control"/>
                        <x-error name="form.national_code" class="text-danger"/>
                    </div>

                    <div class="col-md-6">
                        <x-label name="form.phone" value="تلفن" class="form-label"/>
                        <x-text name="form.phone" class="form-control"/>
                        <x-error name="form.phone" class="text-danger"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <x-label name="form.birthday" value="تاریخ تولد" class="form-label"/>
                        <x-date-birthday name="form.birthday" class="form-control birthday"/>
                        <x-error name="form.birthday" class="text-danger"/>
                    </div>

                    <div class="col-md-6">
                        <x-label name="form.insurance" value="تاریخ بیمه" class="form-label"/>
                        <x-date-insurance name="form.insurance" class="form-control insurance"/>
                        <x-error name="form.insurance" class="text-danger"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <div class="col-md-3">
                        <x-label name="form.one_clothes" value="لباس یک" class="form-label"/>
                        <x-number name="form.one_clothes" class="form-control"/>
                        <x-error name="form.one_clothes" class="text-danger"/>
                    </div>

                    <div class="col-md-2">
                        <x-label name="form.two_clothes" value="لباس دو" class="form-label"/>
                        <x-number name="form.two_clothes" class="form-control"/>
                        <x-error name="form.two_clothes" class="text-danger"/>
                    </div>

                    <div class="col-md-2">
                        <x-label name="form.shoes" value="کفش" class="form-label"/>
                        <x-number name="form.shoes" class="form-control"/>
                        <x-error name="form.shoes" class="text-danger"/>
                    </div>

                    <div class="col-md-2">
                        <x-label name="form.number" value="شماره پیراهن" class="form-label"/>
                        <x-number name="form.number" class="form-control"/>
                        <x-error name="form.number" class="text-danger"/>
                    </div>

                    <div class="col-md-3">
                        <x-label name="form.classroom_id" value="کلاس" class="form-label"/>
                        <select name="form.classroom_id" id="form.classroom_id" wire:model.defer="form.classroom_id"
                                class="form-control">
                            <option value="">بدون کلاس</option>
                            @foreach(App\Models\Classroom::query()->orderByDesc('id')->get() as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        <x-error name="form.classroom_id" class="text-danger"/>
                    </div>
                </div>


                <div class="mt-3">
                    <h6>شهریه هر ماه</h6>
                    <div class="row g-2">
                        @foreach(range(1, 12) as $month)
                            <div class="col-6 col-md-4">
                                <x-label name="form.month_fee_{{ $month }}" value="ماه {{ $month }}"
                                         class="form-label"/>
                                <x-number name="form.months.{{ $month }}" class="form-control"/>
                                <x-error name="form.month_{{ $month }}" class="text-danger"/>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success w-100">
                        ویرایش کاربر
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>