<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Warung UJ</title>
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
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #ff6b35, #f7931e);
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            background: linear-gradient(135deg, #ffa07a, #ff8c42);
            bottom: -50px;
            left: -50px;
            animation-delay: 5s;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #ffb380, #ff9e5c);
            top: 50%;
            left: 10%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 30px) scale(0.9);
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
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(255, 107, 53, 0.4);
        }

        .btn-primary:active {
            transform: translateY(0);
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

        /* Icon Animation */
        .input-icon {
            transition: all 0.3s ease;
        }

        .modern-input:focus + .input-icon {
            transform: scale(1.2);
            filter: brightness(1.2);
        }

        /* Label Animation */
        .form-label {
            transition: all 0.3s ease;
        }

        .modern-input:focus ~ .form-label {
            color: #ff6b35;
        }
    </style>
</head>

<body>
    <!-- Animated Background Shapes -->
    <div class="bg-shape shape-1"></div>
    <div class="bg-shape shape-2"></div>
    <div class="bg-shape shape-3"></div>

    <div class="relative z-10 flex flex-col items-center min-h-screen px-6 py-10">
        <!-- Logo with Animation -->
        <div class="mb-8 logo-container">
            <div class="p-4 bg-white shadow-lg rounded-3xl">
                <img src="/pembeli/logo.png" width="130" height="30" alt="Logo Warung UJ" class="object-contain">
            </div>
        </div>

        {{-- 🔔 PESAN ERROR DENGAN DESAIN MODERN --}}
        @if ($errors->any())
            <div class="error-alert w-full max-w-[420px] rounded-2xl p-5 mb-6" role="alert">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 error-icon">
                        <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="mb-2 text-lg font-bold text-red-800">Oops! Ada yang tidak beres</h3>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $error)
                                <li class="flex items-center gap-2 text-sm text-red-700">
                                    <span class="w-1.5 h-1.5 bg-red-500 rounded-full"></span>
                                    <span>{{ $error }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        {{-- 🔔 END PESAN ERROR --}}

        <!-- Form Card with Modern Design -->
        <div class="card-container w-full max-w-[420px]">
            <form action="{{ route('login') }}" method="POST" class="p-8 form-card rounded-3xl">
                @csrf

                <!-- Header -->
                <div class="mb-8">
                    <h1 class="mb-2 text-3xl font-bold text-transparent bg-gradient-to-r from-orange-600 to-orange-400 bg-clip-text">
                        Selamat Datang!
                    </h1>
                    <p class="text-sm text-gray-600">Silakan masuk ke akun Anda untuk melanjutkan</p>
                </div>

                <div class="space-y-6">
                    <!-- Email Input -->
                    <div class="relative">
                        <label for="email" class="block mb-2 text-sm font-semibold text-gray-700 form-label">
                            Alamat Email
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}"
                                   required>
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="relative">
                        <label for="password" class="block mb-2 text-sm font-semibold text-gray-700 form-label">
                            Kata Sandi
                        </label>
                        <div class="relative">
                            <div class="absolute text-gray-400 transform -translate-y-1/2 left-4 top-1/2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input type="password"
                                   name="password"
                                   id="password"
                                   class="modern-input w-full pl-12 pr-4 py-3.5 rounded-xl text-gray-700 font-medium"
                                   placeholder="Masukkan kata sandi"
                                   required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="btn-primary w-full text-white font-bold text-base rounded-xl py-3.5 mt-4">
                        Masuk Sekarang
                    </button>
                </div>
            </form>
        </div>

        <!-- Register Link -->
        <a href="{{ route('register') }}"
           class="mt-8 text-base font-semibold text-orange-600 link-underline hover:text-orange-700">
            Belum punya akun? Daftar di sini
        </a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>
