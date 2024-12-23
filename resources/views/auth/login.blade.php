<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Warung UJ</title>
    <link rel="shortcut icon" href="/pembeli/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <div class="flex flex-col items-center px-6 py-10 min-h-dvh">
        <img src="/pembeli/logo.png" width="130" height="30" alt="Logo">
        <form action="{{ route('login') }}" method="POST"
            class="mx-auto max-w-[345px] w-full p-6 bg-white rounded-3xl mt-auto" id="deliveryForm">
            @csrf
            <div class="flex flex-col gap-5">
                <p class="text-[22px] font-bold">Masuk</p>
                <!-- Alamat Email -->
                <div class="flex flex-col gap-2.5">
                    <label for="email" class="text-base font-semibold">Alamat Email</label>
                    <input type="email" name="email" id="email"
                        style="background-image: url('{{ asset('assets/svgs/ic-email.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        class="form-input" placeholder="Alamat email Anda" required>
                </div>
                <!-- Kata Sandi -->
                <div class="flex flex-col gap-2.5">
                    <label for="password" class="text-base font-semibold">Kata Sandi</label>
                    <input type="password" name="password" id="password"
                        style="background-image: url('{{ asset('assets/svgs/ic-lock.svg') }}'); background-repeat: no-repeat; background-position: 10px center; padding-left: 40px;"
                        class="form-input" placeholder="Lindungi kata sandi Anda" required>
                </div>
                <button type="submit"
                    class="inline-flex text-white font-bold text-base bg-primary rounded-full whitespace-nowrap px-[30px] py-3 justify-center items-center">
                    Masuk
                </button>
            </div>
        </form>
        <a href="{{ route('register') }}" class="font-semibold text-base mt-[30px] underline">Buat Akun Baru</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>