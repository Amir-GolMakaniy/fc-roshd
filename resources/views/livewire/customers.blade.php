<div>
    <x-slot:title>باشگاه رشد</x-slot>
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #9face6);
            font-family: 'Tahoma', sans-serif;
        }

        .table-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        h2 {
            color: #333;
            font-weight: bold;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            font-weight: bold;
        }

        .search-input {
            border-radius: 20px;
            padding: 10px 20px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        body {
            background: linear-gradient(to right, #74ebd5, #9face6);
            font-family: 'Tahoma', sans-serif;
        }

        /* استایل برای وسط‌چین کردن فقط عکس */
        .image-wrapper {
            display: flex;
            justify-content: center; /* وسط‌چین افقی */
            align-items: center; /* وسط‌چین عمودی */
        }

        .image-wrapper img {
            max-width: 100px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-wrapper img:hover {
            transform: scale(1.05); /* بزرگنمایی هنگام هاور */
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6); /* سایه بیشتر */
        }
    </style>
    <div class="container my-5">
        <div class="image-wrapper">
            <img src="{{ asset('image/THE ROSHD.png') }}" alt="رشد">
        </div>
        <h2 class="text-center mb-4">باشگاه فرهنگی ورزشی رشد شهرستان چناران</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-white">تعداد کاربران: <span
                        class="badge bg-primary">{{ App\Models\Customer::count() }}</span>
            </h5>
            <!-- بخش جستجو -->
            <div class="mb-4 d-flex justify-content-center">
                <input type="text" wire:model.live="search" class="search-input" placeholder="جستجو">
            </div>
            <button wire:mouseover="load({{ null }})" class="btn btn-success"
                    data-bs-toggle="modal" data-bs-target="#createModal">
                افزودن کاربر جدید
            </button>
            <div class="modal fade text-center" id="createModal" wire:ignore.self>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ساخت کاربر</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-4">
                                <!-- نام -->
                                <div class="col-md-6">
                                    <x-label name="form.name" class="form-label" value="نام"/>
                                    <x-text name="form.name" class="form-control"/>
                                    <x-error name="form.name" class="text-danger"/>
                                </div>

                                <!-- نام خانوادگی -->
                                <div class="col-md-6">
                                    <x-label name="form.family" class="form-label" value="نام خانوادگی"/>
                                    <x-text name="form.family" class="form-control"/>
                                    <x-error name="form.family" class="text-danger"/>
                                </div>
                            </div>

                            <div class="row g-4 mt-3">
                                <!-- کد ملی -->
                                <div class="col-md-6">
                                    <x-label name="form.national_code" class="form-label" value="کد ملی"/>
                                    <x-text name="form.national_code" class="form-control"/>
                                    <x-error name="form.national_code" class="text-danger"/>
                                </div>

                                <!-- تلفن -->
                                <div class="col-md-6">
                                    <x-label name="form.phone" class="form-label" value="تلفن"/>
                                    <x-text name="form.phone" class="form-control"/>
                                    <x-error name="form.phone" class="text-danger"/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button wire:click="store" class="btn btn-primary">ذخیره</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>تلفن</th>
                    <th>کفش</th>
                    @for($month = 1; $month <= 12; $month++)
                        <th>ماه {{ $month }}</th>
                    @endfor
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->family }}</td>
                        <td>{{ $customer->national_code }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td><input type="checkbox" wire:click="toggleShoes({{ $customer->id }})" {{ $customer->shoes ? 'checked' : '' }} name="shoes" id="shoes"></td>
                        @for($month = 1; $month <= 12; $month++)
                            <td>
                                <input type="checkbox"
                                       wire:click="togglePayment({{ $customer->id }}, {{ $month }})"
                                       @if($customer->payments->where('month', $month)->where('is_paid', true)->first()) checked @endif>
                            </td>
                        @endfor
                        <td>
                            <button wire:mouseover="load({{ $customer->id }})" class="btn btn-warning btn-sm"
                                    data-bs-toggle="modal" data-bs-target="#editModal">
                                ویرایش کاربر
                            </button>
                            <div class="modal fade" id="editModal" wire:ignore.self>
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">ویرایش کاربر</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-4">
                                                <!-- نام -->
                                                <div class="col-md-6">
                                                    <x-label name="form.name" class="form-label" value="نام"/>
                                                    <x-text name="form.name" class="form-control"/>
                                                    <x-error name="form.name" class="text-danger"/>
                                                </div>

                                                <!-- نام خانوادگی -->
                                                <div class="col-md-6">
                                                    <x-label name="form.family" class="form-label"
                                                             value="نام خانوادگی"/>
                                                    <x-text name="form.family" class="form-control"/>
                                                    <x-error name="form.family" class="text-danger"/>
                                                </div>
                                            </div>

                                            <div class="row g-4 mt-3">
                                                <!-- کد ملی -->
                                                <div class="col-md-6">
                                                    <x-label name="form.national_code" class="form-label"
                                                             value="کد ملی"/>
                                                    <x-text name="form.national_code" class="form-control"/>
                                                    <x-error name="form.national_code" class="text-danger"/>
                                                </div>

                                                <!-- تلفن -->
                                                <div class="col-md-6">
                                                    <x-label name="form.phone" class="form-label" value="تلفن"/>
                                                    <x-text name="form.phone" class="form-control"/>
                                                    <x-error name="form.phone" class="text-danger"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button wire:click="delete({{ $customer->id }})"
                                                    data-bs-dismiss="modal" class="btn btn-danger">
                                                حذف
                                            </button>
                                            <button wire:click="update" class="btn btn-primary">ذخیره</button>
                                        </div>
                                        <script>
                                            window.addEventListener('close-modal', () => {
                                                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                                                editModal.hide();
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $customers->links() }}
</div>