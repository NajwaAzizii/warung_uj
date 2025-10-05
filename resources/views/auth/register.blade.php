<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Warung UJ</title>
    <link rel="shortcut icon" href="/pembeli/logo.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #fff5eb 0%, #ffe8d1 50%, #ffd4a8 100%);
            min-height: 100vh;
        }

        /* Animated Background Shapes */
        .bg-shape {
            position: fixed;
            border-radius: 50%;
            opacity: 0.1;
            animation: float 20s infinite ease-in-out;
        }

        .shape-1 {
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            top: -150px;
            right: -100px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, #ffa07a, #ff8c42);
            bottom: -80px;
            left: -80px;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 180px;
            height: 180px;
            background: linear-gradient(135deg, #ffb380, #ff9e5c);
            top: 40%;
            left: 5%;
            animation-delay: 10s;
        }

        .shape-4 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #ffc896, #ffaa6f);
            bottom: 30%;
            right: 8%;
            animation-delay: 15s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1) rotate(0deg);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1) rotate(120deg);
            }
            66% {
                transform: translate(-20px, 30px) scale(0.9) rotate(240deg);
            }
        }

        /* Logo Animation */
        .logo-container {
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Animation */
        .card-container {
            animation: fadeInUp 0.8s ease-out 0.2s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Modern Form Card */
        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            box-shadow: 0 20px 60px rgba(255, 107, 53, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Input Styles */
        .modern-input {
            transition: all 0.3s ease;
            border: 2px solid #ffe8d1;
            background: #fffaf5;
        }

        .modern-input:focus {
            outline: none;
            border-color: #ff8c42;
            background: white;
            box-shadow: 0 0 0 4px rgba(255, 140, 66, 0.1);
            transform: translateY(-2px);
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(255, 107, 53, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        /* Link Hover Effect */
        .link-underline {
            position: relative;
            text-decoration: none;
        }

        .link-underline::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 50%;
            background: linear-gradient(90deg, #ff6b35, #f7931e);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .link-underline:hover::after {
            width: 100%;
        }

        /* Label Animation */
        .form-label {
            transition: all 0.3s ease;
        }

        .modern-input:focus ~ .form-label {
            color: #ff6b35;
        }

        /* Input Container Animation */
        .input-container {
            animation: slideInLeft 0.5s ease-out both;
        }

        .input-container:nth-child(1) { animation-delay: 0.3s; }
        .input-container:nth-child(2) { animation-delay: 0.4s; }
        .input-container:nth-child(3) { animation-delay: 0.5s; }
        .input-container:nth-child(4) { animation-delay: 0.6s; }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Progress Indicator */
        .progress-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ffe8d1;
            transition: all 0.3s ease;
        }

        .progress-dot.active {
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            transform: scale(1.3);
            box-shadow: 0 0 10px rgba(255, 107, 53, 0.5);
        }

        /* Floating Icons */
        .floating-icon {
            animation: floatIcon 3s ease-in-out infinite;
        }

        .floating-icon:nth-child(2) {
            animation-delay: 1s;
        }

        .floating-icon:nth-child(3) {
            animation-delay: 2s;
        }

        @keyframes floatIcon {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        /* Glow Effect */
        .glow-effect {
            position: relative;
        }

        .glow-effect::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #ff6b35, #f7931e, #ffa07a, #ff8c42);
            border-radius: 24px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
            filter: blur(10px);
        }

        .glow-effect:hover::before {
            opacity: 0.7;
            animation: glow 2s linear infinite;
        }

        @keyframes glow {
            0%, 100% {
                filter: blur(10px) brightness(1);
            }
            50% {
                filter: blur(15px) brightness(1.2);
            }
        }

        /* Error Alert Animation */
        .error-alert {
            animation: slideInShake 0.6s ease-out;
            background: linear-gradient(135deg, #fff5f5 0%, #ffe5e5 100%);
            border-left: 4px solid #ef4444;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.2);
        }

        @keyframes slideInShake {
            0% {
                opacity: 0;
                transform: translateX(-100px);
            }
            50% {
                transform: translateX(10px);
            }
            70% {
                transform: translateX(-5px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Error Icon Animation */
        .error-icon {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
    </style>
</head>

<body>
    <!-- Animated Background Shapes -->
    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>
    <div class="bg-shape shape-3"></div>
    <div class="bg-shape shape-4"></div>

    <div class="relative z-10 flex flex-col items-center min-h-screen px-6 py-10">
        <!-- Logo with Animation -->
        <div class="mb-8 logo-container">
            <div class="p-4 bg-white shadow-lg glow-effect rounded-3xl">
                <img src="/pembeli/logo.png" width="130" height="30" alt="Logo Warung UJ" class="object-contain">
            </div>
        </div>

    {{-- 🔔 TAMBAHAN DI SINI --}}
    @if ($errors->any())
        <div class="w-full max-w-[420px] bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 shadow-sm">
            <strong class="font-bold text-red-800">Terjadi Kesalahan:</strong>
            <ul class="mt-2 text-sm list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- 🔔 END TAMBAHAN --}}

        <!-- Form Card with Modern Design -->
        <div class="card-container w-full max-w-[420px] mt-auto">
            <form action="{{ route('register') }}" method="POST" class="p-8 form-card rounded-3xl" id="deliveryForm">
                @csrf

                <!-- Header -->
                <div class="mb-8">
                    <h1 class="mb-2 text-3xl font-bold text-transparent bg-gradient-to-r from-orange-600 to-orange-400 bg-clip-text">
                        Buat Akun Baru 🚀
                    </h1>
                    <p class="text-sm text-gray-600">Bergabunglah dengan kami dan nikmati pengalaman berbelanja yang menyenangkan</p>

                    <!-- Progress Indicator -->
                    <div class="flex gap-2 mt-4">
                        <div class="progress-dot active"></div>
                        <div class="progress-dot"></div>
                        <div class="progress-dot"></div>
                        <div class="progress-dot"></div>
                    </div>
                </div>

                <div class="flex flex-col gap-5">
                    <!-- Nama Lengkap -->
                    <div class="input-container flex flex-col gap-2.5">
                        <label for="fullname" class="text-sm font-semibold text-gray-700 form-label">
                            Nama Lengkap
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2 floating-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input type="text"
                                   name="name"
                                   id="fullname__"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="Tulis nama lengkap Anda"
                                   required>
                        </div>
                    </div>

                    <!-- Alamat Email -->
                    <div class="input-container flex flex-col gap-2.5">
                        <label for="email" class="text-sm font-semibold text-gray-700 form-label">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2 floating-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email"
                                   name="email"
                                   id="email__"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="nama@email.com"
                                   required>
                        </div>
                    </div>

                    <!-- Kata Sandi -->
                    <div class="input-container flex flex-col gap-2.5">
                        <label for="password" class="text-sm font-semibold text-gray-700 form-label">
                            Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2 floating-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password"
                                   name="password"
                                   id="password__"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="Minimal 8 karakter"
                                   required>
                        </div>
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div class="input-container flex flex-col gap-2.5">
                        <label for="confirm-password" class="text-sm font-semibold text-gray-700 form-label">
                            Konfirmasi Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2 floating-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <input type="password"
                                   name="password_confirmation"
                                   id="confirm-password__"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="Ketik ulang kata sandi"
                                   required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="btn-primary relative w-full text-white font-bold text-base rounded-xl py-3.5 mt-4">
                        <span class="relative z-10">Buat Akun Saya</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Login Link -->
        <a href="{{ route('login') }}"
           class="mt-8 text-base font-semibold text-orange-600 link-underline hover:text-orange-700">
            Sudah punya akun? Masuk di sini
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        // Progress indicator animation
        const inputs = document.querySelectorAll('.modern-input');
        const progressDots = document.querySelectorAll('.progress-dot');

        inputs.forEach((input, index) => {
            input.addEventListener('input', () => {
                if (input.value.length > 0) {
                    progressDots[index].classList.add('active');
                } else {
                    progressDots[index].classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>
