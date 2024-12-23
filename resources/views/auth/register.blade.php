<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Warung UJ</title>
    <link rel="shortcut icon" href="/pembeli/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <div class="flex flex-col items-center px-6 py-10 min-h-dvh">
        <img src="/pembeli/logo.png" width="130" height="30" alt="Logo">
        <form action="{{ route('register') }}" method="POST"
            class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto" id="deliveryForm">
            @csrf
            <div class="flex flex-col gap-5">
                <p class="text-[22px] font-bold">Akun Baru</p>
                <!-- Nama Lengkap -->
                <div class="flex flex-col gap-2.5">
                    <label for="fullname" class="text-base font-semibold">Nama Lengkap</label>
                    <input
                        style="background-image: url('{{ asset('assets/svgs/ic-profile.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        type="text" name="name" id="fullname__" class="form-input" placeholder="Tulis nama lengkap Anda"
                        required>
                </div>
                <!-- Alamat Email -->
                <div class="flex flex-col gap-2.5">
                    <label for="email" class="text-base font-semibold">Alamat Email</label>
                    <input type="email" name="email" id="email__"
                        style="background-image: url('{{ asset('assets/svgs/ic-email.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        class="form-input" placeholder="Alamat email Anda" required>
                </div>
                <!-- Kata Sandi -->
                <div class="flex flex-col gap-2.5">
                    <label for="password" class="text-base font-semibold">Kata Sandi</label>
                    <input type="password" name="password" id="password__"
                        style="background-image: url('{{ asset('assets/svgs/ic-lock.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        class="form-input" placeholder="Lindungi kata sandi Anda" required>
                </div>
                <!-- Konfirmasi Kata Sandi -->
                <div class="flex flex-col gap-2.5">
                    <label for="confirm-password" class="text-base font-semibold">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" id="confirm-password__"
                        style="background-image: url('{{ asset('assets/svgs/ic-lock.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        class="form-input" placeholder="Lindungi kata sandi Anda" required>
                </div>
                <button type="submit"
                    class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
                    Buat Akun Saya
                </button>
            </div>
        </form>
        <a href="{{ route('login') }}" class="font-semibold text-base mt-[30px] underline">Masuk ke Akun Saya</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>