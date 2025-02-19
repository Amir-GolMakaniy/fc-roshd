<div class="d-flex align-items-center justify-content-center min-vh-100 bg-dark">
    <x-slot:title>ورود</x-slot>
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; background-color: #2c3e50; border-radius: 10px;">
        <div class="text-center mb-3">
            <h3 class="text-white">باشگاه رشد</h3>
        </div>

        @if (session()->has('error'))
            <div class="mb-3 text-danger">{{ session('error') }}</div>
        @endif

        <form wire:submit.prevent="login">
            <!-- نام -->
            <div class="mb-3">
                <label for="name" class="form-label text-white">نام</label>
                <input type="text" id="name" wire:model="name" class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- نام خانوادگی -->
            <div class="mb-3">
                <label for="family" class="form-label text-white">نام خانوادگی</label>
                <input type="text" id="family" wire:model="family" class="form-control @error('family') is-invalid @enderror">
                @error('family') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- یادآوری ورود -->
            <div class="mb-3 form-check">
                <input type="checkbox" wire:model="remember" class="form-check-input" id="remember">
                <label class="form-check-label text-white" for="remember">مرا به خاطر بسپار</label>
            </div>

            <!-- دکمه ورود -->
            <div class="mt-4">
                <button type="submit" class="btn btn-success w-100">ورود</button>
            </div>

            <!-- لینک به صفحه ثبت نام -->
            <div class="text-center mt-3">
                <a href="{{ route('register') }}" class="text-white">حساب کاربری ندارید؟ ثبت نام کنید</a>
            </div>
        </form>
    </div>
</div>