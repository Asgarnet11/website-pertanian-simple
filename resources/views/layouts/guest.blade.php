<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AgriUnaasi') }}</title>

    <!-- Fonts - Updated to use Poppins font for modern agricultural theme -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom styles optimized for AgriUnaasi -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }

        /* Custom scrollbar for better UX */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #16a34a;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #15803d;
        }

        /* Smooth animations */
        * {
            transition: all 0.2s ease-in-out;
        }

        /* Enhanced form inputs */
        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(34, 197, 94, 0.1), 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        /* Floating animation for decorative elements */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(2deg);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="font-sans text-gray-800 antialiased">
    {{ $slot }}

    <!-- Enhanced background decorations for agricultural theme -->
    <div class="fixed inset-0 -z-10 overflow-hidden pointer-events-none">
        <!-- Organic shapes representing fields -->
        <div class="absolute top-20 right-10 w-32 h-32 bg-green-100/30 rounded-full blur-2xl floating"></div>
        <div class="absolute bottom-32 left-16 w-24 h-24 bg-yellow-100/40 rounded-full blur-xl floating"
            style="animation-delay: 2s;"></div>
        <div class="absolute top-1/3 left-1/4 w-16 h-16 bg-emerald-100/50 rounded-full blur-lg floating"
            style="animation-delay: 4s;"></div>

        <!-- Subtle grid pattern -->
        <div class="absolute inset-0 opacity-[0.02]">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="#16a34a" stroke-width="1" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>
    </div>
</body>

</html>
