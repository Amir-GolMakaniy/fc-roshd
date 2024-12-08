<div>
    <div class="container">
        <table class="table table-bordered text-center">
            <tr>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>کد ملی</th>
                <th>تلفن</th>
                <th>شهریه</th>
                <th>باقی مانده</th>
                <th>ویرایش</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->family }}</td>
                    <td>{{ $user->national_code }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->fee }}</td>
                    <td>{{ $user->fee - $user->finish }}</td>
                    <td><a class="link-secondary" wire:navigate href="{{ route('users.edit',$user->id) }}">ویرایش</a></td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $users->links() }}
</div>
