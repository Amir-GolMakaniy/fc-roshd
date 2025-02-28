<div>
    <div style="background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed; background-size: cover; color: white;">
        <x-slot:title>اطلاعات بازیکن</x-slot>

        <div class="container my-5">
            <h3 class="fw-bold text-white">{{ auth()->user()->name }}</h3>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">خروج</button>
            </form>
            <div class="image-wrapper">
                <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد">
            </div>

            <h2 class="text-center mb-4 text-primary fw-bold">باشگاه فرهنگی ورزشی رشد شهرستان چناران</h2>

            <div class="text-center mb-3">
                <button class="btn btn-primary" wire:click="$toggle('isEditing')">
                    {{ $isEditing ? 'لغو ویرایش' : 'ویرایش اطلاعات' }}
                </button>
            </div>

            @if(!$isEditing)
                <div class="row text-center">
                    <div class="col-12 col-md-6 mb-3">
                        <div class="card border-light shadow-sm p-3 bg-secondary">
                            <h5 class="text-white">عکس بازیکن</h5>
                            <img src="{{ asset('images/'.$user->image) }}" alt="عکس بازیکن"
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

                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center table-dark">
                                <tbody>
                                <tr>
                                    <td>نام</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>نام خانوادگی</td>
                                    <td>{{ $user->family }}</td>
                                </tr>
                                <tr>
                                    <td>نام پدر</td>
                                    <td>{{ $user->father_name }}</td>
                                </tr>
                                <tr>
                                    <td>کد ملی</td>
                                    <td>{{ $user->national_code }}</td>
                                </tr>
                                <tr>
                                    <td>تلفن</td>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <td>تاریخ تولد</td>
                                    <td>{{ $user->birthday }}</td>
                                </tr>
                                <tr>
                                    <td>تاریخ بیمه</td>
                                    <td>{{ $user->insurance }}</td>
                                </tr>
                                <tr>
                                    <td>لباس یک</td>
                                    <td>{{ $user->one_clothes }}</td>
                                </tr>
                                <tr>
                                    <td>لباس دو</td>
                                    <td>{{ $user->two_clothes }}</td>
                                </tr>
                                <tr>
                                    <td>کفش</td>
                                    <td>{{ $user->shoes }}</td>
                                </tr>
                                <tr>
                                    <td>شماره پیراهن</td>
                                    <td>{{ $user->number }}</td>
                                </tr>
                                <tr>
                                    <td>کلاس</td>
                                    <td>{{ optional($user->classroom)->name ?? 'بدون کلاس' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped text-center table-dark">
                                <tbody>
                                @foreach(range(1, 12) as $month)
                                    <tr>
                                        <td>ماه {{ $month }}</td>
                                        <td>
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
                    <div class="row text-center">
                        <div class="col-12 col-md-6 mb-3">
                            <div class="card border-light shadow-sm p-3 bg-secondary">
                                <h5 class="text-white">عکس بازیکن</h5>
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

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center table-dark">
                                    <tbody>
                                    <tr>
                                        <td>نام</td>
                                        <td>
                                            <x-text name="form.name" class="form-control"/>
                                            <x-error name="form.name" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>نام خانوادگی</td>
                                        <td>
                                            <x-text name="form.family" class="form-control"/>
                                            <x-error name="form.family" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>نام پدر</td>
                                        <td>
                                            <x-text name="form.father_name" class="form-control"/>
                                            <x-error name="form.father_name" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>کد ملی</td>
                                        <td>
                                            <x-text name="form.national_code" class="form-control"/>
                                            <x-error name="form.national_code" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>تلفن</td>
                                        <td>
                                            <x-text name="form.phone" class="form-control"/>
                                            <x-error name="form.phone" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>تاریخ تولد</td>
                                        <td>
                                            <x-date-birthday name="form.birthday" class="form-control birthday"/>
                                            <x-error name="form.birthday" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>تاریخ بیمه</td>
                                        <td>
                                            <x-date-insurance name="form.insurance" class="form-control insurance"/>
                                            <x-error name="form.insurance" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>لباس یک</td>
                                        <td>
                                            <x-text name="form.one_clothes" class="form-control"/>
                                            <x-error name="form.one_clothes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>لباس دو</td>
                                        <td>
                                            <x-text name="form.two_clothes" class="form-control"/>
                                            <x-error name="form.two_clothes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>کفش</td>
                                        <td>
                                            <x-text name="form.shoes" class="form-control"/>
                                            <x-error name="form.shoes" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>شماره پیراهن</td>
                                        <td>
                                            <x-text name="form.number" class="form-control"/>
                                            <x-error name="form.number" class="text-danger"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>کلاس</td>
                                        <td>
                                            <x-text name="form.classroom_id" class="form-control"/>
                                            <x-error name="form.classroom_id" class="text-danger"/>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-success w-100">
                                    ویرایش
                                </button>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center table-dark">
                                    <tbody>
                                    @foreach(range(1, 12) as $month)
                                        <tr>
                                            <td>ماه {{ $month }}</td>
                                            <td>
                                                {{ $user->payments()->where('year', date('Y')->where('month', $month))->first() ?? 'پرداخت نشده' }}
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