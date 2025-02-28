<div>
    <x-slot:title>{{ $classroom->name }}</x-slot>

    <div class="container my-5">
        <h3 class="fw-bold text-white">{{ auth()->user()->name }}</h3>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger ms-3">خروج</button>
        </form>
        <div class="image-wrapper">
            <img src="{{ asset('images/THE-ROSHD.png') }}" alt="رشد">
        </div>

        <h2 class="text-center mb-4 text-primary">باشگاه فرهنگی ورزشی رشد شهرستان چناران</h2>
        <h2 class="text-center mb-4 text-primary">کلاس {{ $classroom->name }}</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="text-white">تعداد کاربران:
                <span class="badge bg-primary">{{ $users->count() }}</span>
            </h5>
            <div class="mb-4 d-flex justify-content-center w-50">
                <input type="text" wire:model.live="search" class="form-control" placeholder="جستجو">
            </div>
            <a href="{{ route('classrooms') }}" class="btn btn-success">
                کلاس ها
            </a>
        </div>

        <div class="table-container table-responsive mt-4">
            <table class="table table-bordered table-striped text-center table-dark">
                <thead class="table-dark">
                <tr>
                    <th>عکس</th>
                    <th>عکس قرار داد</th>
                    <th>نام</th>
                    <th>نام خانوادگی</th>
                    <th>لباس یک</th>
                    <th>لباس دو</th>
                    <th>کفش</th>
                    <th>شماره پیراهن</th>
                    <th>بیمه</th>
                    <th>حاضر</th>
                    @for($month = 1; $month <= 12; $month++)
                        <th>ماه {{ $month }}</th>
                    @endfor
                    <th>ویرایش</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td data-label="عکس">
                            <img src="{{ asset('images/'.$user->image) }}" alt="" class="img-thumbnail"
                                 style="width: 80px; height: auto;">
                        </td>
                        <td data-label="عکس">
                            <img src="{{ asset('images/'.$user->placed) }}" alt="" class="img-thumbnail"
                                 style="width: 80px; height: auto;">
                        </td>
                        <td data-label="نام">{{ $user->name }}</td>
                        <td data-label="نام خانوادگی">{{ $user->family }}</td>
                        <td data-label="لباس یک">{{ $user->one_clothes }}</td>
                        <td data-label="لباس دو">{{ $user->two_clothes }}</td>
                        <td data-label="کفش">{{ $user->shoes }}</td>
                        <td data-label="شماره پیراهن">{{ $user->number }}</td>
                        <td data-label="بیمه">{{ $user->insurance }}</td>
                        <td data-label="حاضر">
                            <input type="checkbox"
                                   class="form-check-input"
                                   wire:click="presenceToggle({{ $user->id }})"
                                   @if($user->presence()->where('date',date('Y-m-d'))->exists()) checked @endif>
                        </td>
                        @for($month = 1; $month <= 12; $month++)
                            <td data-label="ماه {{ $month }}">
                                {{ $user->payments->firstWhere('month', $month)?->paid ?? '' }}
                            </td>
                        @endfor
                        <td data-label="ویرایش">
                            <a href="{{ route('user-edit', $user->id) }}" class="btn btn-warning ">
                                ویرایش
                            </a>
                        </td>
                        <td data-label="حذف">
                            <button wire:click="delete({{ $user->id }})" class="btn btn-danger ">
                                حذف
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</div>
</div>