<div>
    <x-slot:title>لیست کاربران</x-slot>
    <style>
        body {
            background: linear-gradient(to right, #74ebd5, #9face6);
            font-family: 'Arial', sans-serif;
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

        /* برای ریسپانسیو کردن جدول */
        @media (max-width: 768px) {
            .table-container {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table {
                min-width: 600px; /* عرض حداقل برای جدول */
            }
        }
    </style>
    <div class="container my-5">
        <h2 class="text-center mb-4">لیست کاربران</h2>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-white">تعداد کاربران: <span class="badge bg-primary">{{ App\Models\User::count() }}</span></h5>
            <a wire:navigate href="{{ route('users.create') }}" class="btn btn-success">افزودن کاربر جدید</a>
        </div>
        <div class="table-container">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>کد ملی</th>
                    <th>تلفن</th>
                    <th>شهریه</th>
                    <th>باقی مانده</th>
                    <th>ویرایش</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->family }}</td>
                        <td>{{ $user->national_code }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ number_format($user->fee) }}</td>
                        <td>{{ number_format($user->fee - $user->paid) }}</td>
                        <td>
                            <a wire:navigate href="{{ route('users.edit',$user->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $users->links() }}
</div>