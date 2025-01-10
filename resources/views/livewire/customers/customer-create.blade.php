<div>
    <x-slot:title>ساخت کاربر</x-slot>

    <div class="container my-3">
        <div class="card shadow-sm p-3">
            <form wire:submit.prevent="save">
                <!-- اطلاعات اصلی -->
                <div class="row g-3">
                    <!-- نام -->
                    <div class="col-md-4">
                        <x-label name="form.name" value="نام" class="form-label"/>
                        <x-text name="form.name" class="form-control"/>
                        <x-error name="form.name" class="text-danger"/>
                    </div>

                    <!-- نام خانوادگی -->
                    <div class="col-md-4">
                        <x-label name="form.family" value="نام خانوادگی" class="form-label"/>
                        <x-text name="form.family" class="form-control"/>
                        <x-error name="form.family" class="text-danger"/>
                    </div>

                    <!-- نام پدر -->
                    <div class="col-md-4">
                        <x-label name="form.father_name" value="نام پدر" class="form-label"/>
                        <x-text name="form.father_name" class="form-control"/>
                        <x-error name="form.father_name" class="text-danger"/>
                    </div>
                </div>

                <!-- آپلود عکس -->
                <div class="row g-3 mt-2">
                    <div class="col-md-6">
                        <x-label name="form.image" value="آپلود عکس" class="form-label"/>
                        <x-file name="form.image" class="form-control"/>
                        <x-error name="form.image" class="text-danger"/>
                    </div>

                    <div class="col-md-6">
                        <x-label name="form.placed" value="آپلود عکس قرار داد" class="form-label"/>
                        <x-file name="form.placed" class="form-control"/>
                        <x-error name="form.placed" class="text-danger"/>
                    </div>
                </div>

                <div class="row g-3 mt-2">
                    <!-- کد ملی -->
                    <div class="col-md-6">
                        <x-label name="form.national_code" value="کد ملی" class="form-label"/>
                        <x-text name="form.national_code" class="form-control"/>
                        <x-error name="form.national_code" class="text-danger"/>
                    </div>

                    <!-- تلفن -->
                    <div class="col-md-6">
                        <x-label name="form.phone" value="تلفن" class="form-label"/>
                        <x-text name="form.phone" class="form-control"/>
                        <x-error name="form.phone" class="text-danger"/>
                    </div>
                </div>

                <!-- تاریخ‌ها -->
                <div class="row g-3 mt-2">
                    <!-- تاریخ تولد -->
                    <div class="col-md-6">
                        <x-label name="form.birthday" value="تاریخ تولد" class="form-label"/>
                        <x-date-birthday name="form.birthday" class="form-control birthday"/>
                        <x-error name="form.birthday" class="text-danger"/>
                    </div>

                    <!-- تاریخ بیمه -->
                    <div class="col-md-6">
                        <x-label name="form.insurance" value="تاریخ بیمه" class="form-label"/>
                        <x-date-insurance name="form.insurance" class="form-control insurance"/>
                        <x-error name="form.insurance" class="text-danger"/>
                    </div>
                </div>

                <!-- شهریه ماه‌ها -->
                <div class="mt-3">
                    <h6>شهریه هر ماه</h6>
                    <div class="row g-2">
                        @foreach(range(1, 12) as $month)
                            <div class="col-6 col-md-4">
                                <x-label name="form.month_fee_{{ $month }}" value="ماه {{ $month }}" class="form-label"/>
                                <x-number name="form.months.{{ $month }}" class="form-control"/>
                                <x-error name="form.month_{{ $month }}" class="text-danger"/>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- دکمه ثبت -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success w-100">
                        ساخت کاربر
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>