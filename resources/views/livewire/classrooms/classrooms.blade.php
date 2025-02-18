<div>
    <x-slot:title>باشگاه رشد</x-slot>
    <div class="container my-5">
        <div class="image-wrapper text-center mb-4">
            <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد" class="img-fluid"
                 style="max-height: 120px;">
        </div>

        <h2 class="text-center mb-4 text-primary">باشگاه فرهنگی ورزشی رشد شهرستان چناران</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-white">تعداد کلاس:
                <span class="badge bg-primary">{{ App\Models\Classroom::query()->count() }}</span>
            </h5>
            <h6 class="text-white">تعداد کاربران کلاس بندی نشده:
                <span class="badge bg-primary">{{ App\Models\Classroom::query()->leftJoin('users', 'classrooms.id', '=', 'users.classroom_id')->whereNull('users.id')->select('classroom.*')->count() }}</span>
            </h6>
            <div class="mb-4 d-flex justify-content-center w-50">
                <input type="text" wire:model.live="search" class="form-control" placeholder="جستجو">
            </div>
            <a href="{{ route('classroom-create') }}" class="btn btn-success mx-2">
                افزودن کلاس جدید
            </a>
        </div>

        <div class="table-container table-responsive mt-4">
            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                <tr>
                    <th>نام</th>
                    <th>نمایش</th>
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($classrooms as $classroom)
                    <tr>
                        <td data-label="نام">{{ $classroom->name }}</td>
                        <td data-label="نمایش">
                            <a href="{{ route('classroom-show', $classroom->id) }}" class="btn btn-info btn-sm">
                                نمایش
                            </a>
                        </td><td data-label="ویرایش">
                            <a href="{{ route('classroom-edit', $classroom->id) }}" class="btn btn-warning btn-sm">
                                ویرایش
                            </a>
                        </td>
                        <td data-label="حذف">
                            <button wire:click="delete({{ $classroom->id }})" class="btn btn-danger btn-sm">
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
            {{ $classrooms->links() }}
        </div>
    </div>
</div>
</div>