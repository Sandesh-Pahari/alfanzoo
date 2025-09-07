<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.Name', 'Alfanzoo Resort') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Dancing+Script:wght@700&display=swap"
        rel="stylesheet">
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Ensure active color overrides other states */
        [data-active] {
            color: #D4A76A !important;
        }

        .no-top-margin {
            margin-top: 0 !important;
        }


        /* testimonials */
        /* Card Flip Styles */
        .card-flip {
            perspective: 1000px;
        }

        .card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            transition: transform 0.7s;
            transform-style: preserve-3d;
        }

        .card-flip:hover .card-inner {
            transform: rotateY(180deg);
        }

        .card-front,
        .card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
        }

        .card-back {
            transform: rotateY(180deg);
        }

        /* testimonials */
        html {
            scroll-behavior: smooth;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }
    </style>

</head>

<body class="min-h-screen flex flex-col">
    <section id="header">
        @include('layouts.header')
    </section>
    <section class="">
        @yield('pagecontent')
    </section>

    <section id="footer">
        @include('layouts.footer')
    </section>

    <!-- Scroll to Top Button -->
    <!-- Scroll to Top Button -->
    <button id="scrollTopBtn"
        class="fixed bottom-6 right-6 z-50 bg-[#8B4513] text-white text-xl rounded-full w-12 h-12 flex items-center justify-center shadow-lg hover:bg-[#A0522D] transition">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- WhatsApp Chat Button -->
    <a href="https://wa.me/9779812345678" target="_blank"
        class="fixed z-50 bottom-6 left-6 bg-amber-800 text-white font-medium 
          flex items-center gap-2 px-5 py-2.5 rounded-full shadow-lg 
          hover:bg-orange-600 transition">
        <!-- WhatsApp Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-5 h-5">
            <path
                d="M20.52 3.48A11.93 11.93 0 0012 0C5.37 0 .05 5.31.05 11.92c0 2.1.55 4.15 1.6 5.95L0 24l6.3-1.64a11.94 11.94 0 005.7 1.45h.01c6.62 0 11.95-5.32 11.95-11.93 0-3.18-1.24-6.16-3.44-8.4zM12 21.54c-1.83 0-3.63-.49-5.2-1.42l-.37-.22-3.74.97.99-3.64-.24-.37a9.49 9.49 0 01-1.46-5.01c0-5.25 4.28-9.52 9.52-9.52 2.54 0 4.93.99 6.73 2.8a9.46 9.46 0 012.79 6.72c0 5.25-4.27 9.52-9.52 9.52zm5.44-7.08c-.3-.15-1.79-.88-2.07-.98-.28-.1-.48-.15-.67.15-.2.3-.77.98-.94 1.18-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.38-1.46-.88-.79-1.48-1.76-1.65-2.06-.17-.3-.02-.46.13-.61.13-.13.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.57-.49-.5-.67-.51h-.57c-.2 0-.52.07-.79.37s-1.04 1.02-1.04 2.48 1.07 2.88 1.22 3.08c.15.2 2.11 3.23 5.12 4.52.71.31 1.27.5 1.7.64.72.23 1.37.2 1.88.12.58-.09 1.79-.73 2.04-1.44.25-.71.25-1.31.17-1.44-.07-.13-.27-.2-.57-.35z" />
        </svg>
        Chat with us
    </a>


    <script>
        const scrollTopBtn = document.getElementById('scrollTopBtn');

        window.addEventListener('scroll', () => {
            scrollTopBtn.classList.toggle('hidden', window.scrollY < 300);
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>


</body>

</html>
