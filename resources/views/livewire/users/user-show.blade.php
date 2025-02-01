<div>
    <div style="background: url('{{ asset('images/bg.jpg') }}') no-repeat center center fixed; background-size: cover; color: white;">
        <x-slot:title>اطلاعات مشتری</x-slot>
        <div class="container my-5">
            <!-- تصویر لوگو -->
            <div class="text-center mb-4">
                <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد" class="img-fluid" style="max-height: 120px;">
            </div>

            <!-- عنوان -->
            <h2 class="text-center mb-4 font-weight-bold" style="font-family: 'Arial', sans-serif;">
                اطلاعات مشتری: <span class="text-warning">{{ $user->name }} {{ $user->family }}</span>
            </h2>

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

            <!-- ماه‌ها و پرداخت‌ها -->
            <div class="table-responsive mt-4">
                <h4 class="text-success text-center">پرداخت‌ها:</h4>
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

            <!-- اطلاعات مشتری -->
            <div class="table-responsive mb-4">
                <h4 class="text-success text-center">مشخصات مشتری:</h4>
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
                        <td class="text-dark">شماره</td>
                        <td class="text-muted">{{ $user->number }}</td>
                    </tr>
                    <tr>
                        <td class="text-dark">کفش</td>
                        <td class="text-muted">{{ $user->shoes }}</td>
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
                        <td class="text-dark">بیمه</td>
                        <td class="text-muted">{{ $user->insurance }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>