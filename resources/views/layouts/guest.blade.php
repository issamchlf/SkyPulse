<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'SkyPulse') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .gradient-bg {
                background: linear-gradient(135deg, #1E3A8A, #3B82F6, #60A5FA);
                background-size: 400% 400%;
                animation: gradientAnimation 8s ease infinite;
            }

            .glass-container {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
                border-radius: 12px;
                box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .input-field {
                background: rgba(255, 255, 255, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.3);
                color: #fff;
            }

            .input-field::placeholder {
                color: rgba(255, 255, 255, 0.7);
            }

            .btn-primary {
                background: #3B82F6;
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                background: #1E3A8A;
            }
        </style>
    </head>
<body class="font-sans text-gray-100 antialiased gradient-bg flex items-center justify-center min-h-screen">
  <div class="flex flex-col md:flex-row items-center justify-center w-full max-w-4xl bg-white/10 shadow-lg rounded-lg overflow-hidden glass-container">
    @if (Route::currentRouteName() == 'login')
      <div class="hidden md:flex flex-col items-center justify-center w-1/2 text-white p-10 space-y-4">
        <h2 class="text-4xl font-bold font-orbitron tracking-wider text-white/90 drop-shadow-lg">
          Welcome Back!
        </h2>
        <p class="text-lg italic text-white/80 text-center">
          We're excited to have you back! Continue your journey with us and explore new horizons and unforgettable experiences.
        </p>
      </div>
    @elseif (Route::currentRouteName() == 'register')
      <div class="hidden md:flex flex-col items-center justify-center w-1/2 text-white p-10 space-y-4">
        <h2 class="text-4xl font-bold font-orbitron tracking-wider text-white/90 bg-clip-text text-transparent drop-shadow-lg">
          Join Our Familly!
        </h2>
        <p class="text-lg italic text-white/80 text-center">
          Embark on your adventure with us and explore the world like never before. Your journey begins now.
        </p>
      </div>
    @endif
    <div class="w-full md:w-1/2 p-8">
      <div class="flex justify-center mb-6">
        <a href="/" aria-label="Home">
          <x-application-logo class="w-16 h-16 fill-current text-white" />
        </a>
      </div>
      <div class="w-full">
        {{ $slot }}
      </div>
    </div>
  </div>
</body>

      
</html>
