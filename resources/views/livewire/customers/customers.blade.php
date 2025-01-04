<div>
    <x-slot:title>باشگاه رشد</x-slot>
    <div class="container my-5">
        <!-- تصویر لوگو -->
        <div class="image-wrapper text-center mb-4">
            <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد" class="img-fluid"
                 style="max-height: 120px;">
        </div>

        <!-- عنوان -->
        <h2 class="text-center mb-4 text-primary">باشگاه فرهنگی ورزشی رشد شهرستان چناران</h2>

        <!-- تعداد کاربران و جستجو -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-white">تعداد کاربران:
                <span class="badge bg-primary">{{ App\Models\Customer::count() }}</span>
            </h5>
            <div class="mb-4 d-flex justify-content-center w-50">
                <input type="text" wire:model.live="search" class="form-control" placeholder="جستجو">
            </div>
            <a href="{{ route('customer-create') }}" class="btn btn-success">
                افزودن کاربر جدید
            </a>
        </div>

        <!-- جدول کاربران -->
        <div class="table-container table-responsive mt-4">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th>عکس</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>لباس یک</th>
                    <th>لباس دو</th>
                    <th>کفش</th>
                    <th>بیمه</th>
                    @for($month = 1; $month <= 12; $month++)
                        <th>ماه {{ $month }}</th>
                    @endfor
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td data-label="عکس">
                            <img src="{{ asset('images/'.$customer->image) }}" alt="" class="img-thumbnail" style="width: 80px; height: auto;">
                        </td>
                        <td data-label="نام">{{ $customer->name }}</td>
                        <td data-label="نام خانوادگی">{{ $customer->family }}</td>
                        <td data-label="لباس یک">{{ $customer->one_clothes }}</td>
                        <td data-label="لباس دو">{{ $customer->two_clothes }}</td>
                        <td data-label="کفش">{{ $customer->shoes }}</td>
                        <td data-label="بیمه">{{ $customer->insurance }}</td>
                        @for($month = 1; $month <= 12; $month++)
                            <td data-label="ماه {{ $month }}">
                                {{ $customer->payments->firstWhere('month', $month)?->paid ?? '' }}
                            </td>
                        @endfor
                        <td data-label="ویرایش">
                            <a href="{{ route('customer-edit', $customer->id) }}" class="btn btn-warning btn-sm">
                                ویرایش
                            </a>
                        </td>
                        <td data-label="حذف">
                            <button wire:click="delete({{ $customer->id }})" class="btn btn-danger btn-sm">
                                حذف
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $customers->links() }}
        </div>
    </div>
</div>