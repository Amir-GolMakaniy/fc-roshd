<div>
    <div class="container">
        <form wire:submit="save()">
            <div class="row">
                <div class="col-6">
                    <x-lable name="form.name" value="نام"/>
                    <x-text name="form.name"/>
                    <x-error name="form.name"/>
                </div>
                <div class="col-6">
                    <x-lable name="form.family" value="نام خانوادگی"/>
                    <x-text name="form.family"/>
                    <x-error name="form.family"/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-lable name="form.national_code" value="کد ملی"/>
                    <x-number name="form.national_code"/>
                    <x-error name="form.national_code"/>
                </div>
                <div class="col-6">
                    <x-lable name="form.phone" value="تلفن"/>
                    <x-number name="form.phone"/>
                    <x-error name="form.phone"/>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <x-lable name="form.fee" value="شهریه"/>
                    <x-number name="form.fee"/>
                    <x-error name="form.fee"/>
                </div>
                <div class="col-6">
                    <x-lable name="form.finish" value="پرداخت شده"/>
                    <x-number name="form.finish"/>
                    <x-error name="form.finish"/>
                </div>
            </div>
            <button type="submit" class="btn btn-success">ذخیره</button>
        </form>
    </div>
</div>
