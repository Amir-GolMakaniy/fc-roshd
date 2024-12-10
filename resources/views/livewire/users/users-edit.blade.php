<div class="container py-5">
    <x-slot:title>ویرایش کاربر</x-slot>
    <form wire:submit.prevent="save">
        <div class="row g-4">
            <!-- نام -->
            <div class="col-md-6">
                <x-label name="form.name" value="نام"/>
                <x-text name="form.name" class="form-control"/>
                <x-error name="form.name" class="text-danger"/>
            </div>

            <!-- نام خانوادگی -->
            <div class="col-md-6">
                <x-label name="form.family" value="نام خانوادگی"/>
                <x-text name="form.family" class="form-control"/>
                <x-error name="form.family" class="text-danger"/>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <!-- کد ملی -->
            <div class="col-md-6">
                <x-label name="form.national_code" value="کد ملی"/>
                <x-number name="form.national_code" class="form-control"/>
                <x-error name="form.national_code" class="text-danger"/>
            </div>

            <!-- تلفن -->
            <div class="col-md-6">
                <x-label name="form.phone" value="تلفن"/>
                <x-number name="form.phone" class="form-control"/>
                <x-error name="form.phone" class="text-danger"/>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <!-- شهریه -->
            <div class="col-md-6">
                <x-label name="form.fee" value="شهریه"/>
                <x-number name="form.fee" class="form-control"/>
                <x-error name="form.fee" class="text-danger"/>
            </div>

            <!-- پرداخت شده -->
            <div class="col-md-6">
                <x-label name="form.paid" value="پرداخت شده"/>
                <x-number name="form.paid" class="form-control"/>
                <x-error name="form.paid" class="text-danger"/>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit" class="btn btn-primary btn-lg px-5">ذخیره</button>
        </div>
    </form>
</div>
