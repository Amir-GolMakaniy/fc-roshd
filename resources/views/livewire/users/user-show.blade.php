<div>
    <div style="background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed; background-size: cover; color: white;">
        <x-slot:title>اطلاعات مشتری</x-slot>
        <div class="container my-5">
            <!-- تصویر لوگو -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد" class="img-fluid" style="max-height: 120px;">
            </div>

            <div class="text-center mb-3">
                <button class="btn btn-primary" wire:click="$toggle('isEditing')">
                    {{ $isEditing ? 'لغو ویرایش' : 'ویرایش اطلاعات' }}
                </button>
            </div>

            <!-- عنوان -->
            {{--<h2 class="text-center mb-4 font-weight-bold" style="font-family: 'Arial', sans-serif;">
                <span class="text-warning">{{ $user->name }} {{ $user->family }}</span>
            </h2>--}}

            @if(!$isEditing)
                <!-- عکس مشتری و عکس قرارداد کنار هم -->
                <div class="row mb-4 text-center">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card border-light shadow-sm p-3 bg-secondary">
                            <h5 class="text-white">عکس مشتری</h5>
                            <img src="{{ asset('images/'.$user->image) }}" alt="عکس مشتری"
                                 class="img-fluid mx-auto d-block img-thumbnail" style="max-width: 250px;">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card border-light shadow-sm p-3 bg-secondary">
                            <h5 class="text-white">عکس قرارداد</h5>
                            <img src="{{ asset('images/'.$user->placed) }}" alt="عکس قرارداد"
                                 class="img-fluid mx-auto d-block img-thumbnail" style="max-width: 250px;">
                        </div>
                    </div>
                </div>

                <!-- ماه‌ها و پرداخت‌ها + اطلاعات مشتری کنار هم -->
                <div class="row mt-4">
                    <!-- مشخصات مشتری -->
                    <div class="col-12 col-md-6">
                        <div class="table-responsive">
                            <h4 class="text-white text-center">مشخصات مشتری:</h4>
                            <table class="table table-bordered table-striped text-center">
                                <thead class="bg-dark text-white">
                                <tr>
                                    <th>ویژگی</th>
                                    <th>مقدار</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-dark">نام</td>
                                    <td class="text-muted">{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">نام خانوادگی</td>
                                    <td class="text-muted">{{ $user->family }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">نام پدر</td>
                                    <td class="text-muted">{{ $user->father_name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">کد ملی</td>
                                    <td class="text-muted">{{ $user->national_code }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">تلفن</td>
                                    <td class="text-muted">{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">تاریخ تولد</td>
                                    <td class="text-muted">{{ $user->birthday }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">تاریخ بیمه</td>
                                    <td class="text-muted">{{ $user->insurance }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">لباس یک</td>
                                    <td class="text-muted">{{ $user->one_clothes }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">لباس دو</td>
                                    <td class="text-muted">{{ $user->two_clothes }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">کفش</td>
                                    <td class="text-muted">{{ $user->shoes }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark">شماره</td>
                                    <td class="text-muted">{{ $user->number }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- پرداخت‌ها -->
                    <div class="col-12 col-md-6">
                        <div class="table-responsive">
                            <h4 class="text-white text-center">پرداخت‌ها:</h4>
                            <table class="table table-bordered table-striped text-center">
                                <thead class="bg-dark text-white">
                                <tr>
                                    <th>ماه</th>
                                    <th>پرداخت شده</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(range(1, 12) as $month)
                                    <tr>
                                        <td class="text-dark">ماه {{ $month }}</td>
                                        <td class="text-muted">
                                            {{ $user->payments->firstWhere('month', $month)?->paid ?? 'پرداخت نشده' }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @else
                <form wire:submit.prevent="save">
                    <!-- عکس مشتری و عکس قرارداد کنار هم -->
                    <div class="row mb-4 text-center">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card border-light shadow-sm p-3 bg-secondary">
                                <h5 class="text-white">عکس مشتری</h5>
                                <x-file name="form.image" class="form-control"/>
                                <x-error name="form.image" class="text-danger"/>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card border-light shadow-sm p-3 bg-secondary">
                                <h5 class="text-white">عکس قرارداد</h5>
                                <x-file name="form.image" class="form-control"/>
                                <x-error name="form.image" class="text-danger"/>
                            </div>
                        </div>
                    </div>

                    <!-- ماه‌ها و پرداخت‌ها + اطلاعات مشتری کنار هم -->
                    <div class="row mt-4">
                        <!-- مشخصات مشتری -->
                        <div class="col-12 col-md-6">
                            <div class="table-responsive">
                                <h4 class="text-white text-center">مشخصات مشتری:</h4>
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ویژگی</th>
                                        <th>مقدار</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-dark">نام</td>
                                        <td>
                                            <x-text name="form.name" class="form-control"/>
                                            <x-error name="form.name" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">نام خانوادگی</td>
                                        <td>
                                            <x-text name="form.family" class="form-control"/>
                                            <x-error name="form.family" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">نام پدر</td>
                                        <td>
                                            <x-text name="form.father_name" class="form-control"/>
                                            <x-error name="form.father_name" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">کد ملی</td>
                                        <td>
                                            <x-text name="form.national_code" class="form-control"/>
                                            <x-error name="form.national_code" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">تلفن</td>
                                        <td>
                                            <x-text name="form.phone" class="form-control"/>
                                            <x-error name="form.phone" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">تاریخ تولد</td>
                                        <td>
                                            <x-date-birthday name="form.birthday" class="form-control birthday"/>
                                            <x-error name="form.birthday" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">تاریخ بیمه</td>
                                        <td>
                                            <x-date-insurance name="form.insurance" class="form-control insurance"/>
                                            <x-error name="form.insurance" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">لباس یک</td>
                                        <td>
                                            <x-text name="form.one_clothes" class="form-control"/>
                                            <x-error name="form.one_clothes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">لباس دو</td>
                                        <td>
                                            <x-text name="form.two_clothes" class="form-control"/>
                                            <x-error name="form.two_clothes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">کفش</td>
                                        <td>
                                            <x-text name="form.shoes" class="form-control"/>
                                            <x-error name="form.shoes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-dark">شماره</td>
                                        <td>
                                            <x-text name="form.number" class="form-control"/>
                                            <x-error name="form.number" class="text-danger"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success">
                                    ویرایش
                                </button>
                            </div>
                        </div>

                        <!-- پرداخت‌ها -->
                        <div class="col-12 col-md-6">
                            <div class="table-responsive">
                                <h4 class="text-white text-center">پرداخت‌ها:</h4>
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-dark text-white">
                                    <tr>
                                        <th>ماه</th>
                                        <th>پرداخت شده</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(range(1, 12) as $month)
                                        <tr>
                                            <td class="text-dark">ماه {{ $month }}</td>
                                            <td class="text-muted">
                                                {{ $user->payments->firstWhere('month', $month)?->paid ?? 'پرداخت نشده' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>