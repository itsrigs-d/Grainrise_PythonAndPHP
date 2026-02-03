<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Landing</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-white text-gray-900 min-h-screen">

<!-- HEADER -->
<header class="w-full">
    <nav class="w-full bg-emerald-900 shadow-lg">
        <div class="flex items-center justify-between px-4 sm:px-8 py-3 sm:py-4">

            <!-- LOGO -->
            <a href="{{ url('/') }}" class="flex items-center gap-2">
                <div class="flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-full
                            bg-gray-50 ring-1 ring-gray-200 shadow-sm">
                    <img 
                        src="{{ asset('images/grainrise-logo.png') }}" 
                        alt="GrainRise Logo"
                        class="h-7 w-7 sm:h-8 sm:w-8 object-contain"
                    />
                </div>

                <span class="text-base sm:text-lg font-semibold tracking-wide">
                    <span class="text-lime-300">Grain</span><span class="text-yellow-300">Rise</span>
                </span>
            </a>

            <!-- DESKTOP LINKS -->
            <div class="hidden md:flex items-center gap-6 text-white">
                <a href="#home" class="text-sm font-medium hover:text-lime-300">Home</a>
                <a href="#services" class="text-sm font-medium hover:text-lime-300">Services</a>
                <a href="#about" class="text-sm font-medium hover:text-lime-300">About</a>
                <a href="#contacts" class="text-sm font-medium hover:text-lime-300">Contacts</a>

                <a href="#"
                   class="rounded-lg bg-green-500 px-5 py-2 text-sm font-semibold text-white hover:bg-green-400 active:bg-green-600">
                    Log In
                </a>
            </div>

            <!-- MOBILE RIGHT -->
            <div class="flex items-center gap-3 md:hidden">
                <a href="#"
                   class="rounded-lg bg-green-500 px-4 py-2 text-sm font-semibold text-white hover:bg-green-400 active:bg-green-600">
                    Log In
                </a>

                <!-- HAMBURGER -->
                <button id="menuBtn"
                        class="grid h-10 w-10 place-items-center rounded-lg bg-white/10 ring-1 ring-white/20 hover:bg-white/15 active:scale-95"
                        aria-label="Open menu"
                        type="button"
                >
                    <span class="block h-[2px] w-5 bg-white"></span>
                    <span class="block h-[2px] w-5 bg-white"></span>
                    <span class="block h-[2px] w-5 bg-white"></span>
                </button>
            </div>

        </div>

        <!-- MOBILE MENU DROPDOWN (FULL WIDTH) -->
        <div id="mobileMenu" class="hidden md:hidden">
            <div class="bg-emerald-950 px-4 sm:px-8 py-4 text-white shadow-lg">
                <div class="flex flex-col gap-3">
                    <a href="#home" class="text-sm font-medium hover:text-lime-300">Home</a>
                    <a href="#services" class="text-sm font-medium hover:text-lime-300">Services</a>
                    <a href="#about" class="text-sm font-medium hover:text-lime-300">About</a>
                    <a href="#contacts" class="text-sm font-medium hover:text-lime-300">Contacts</a>
                </div>
            </div>
        </div>
    </nav>
</header>

<!-- HERO (FULL SCREEN REMAINING HEIGHT) -->
<main id="home" class="relative w-full bg-white">
    <!-- remaining height = viewport - header -->
    <section class="relative min-h-[calc(100vh-64px)] sm:min-h-[calc(100vh-72px)] w-full overflow-hidden">

        <!-- OPTIONAL VIDEO BG (LOW OPACITY) -->
        <video
            id="heroVideo"
            class="absolute inset-0 h-full w-full object-cover opacity-10"
            autoplay
            muted
            loop
            playsinline
            preload="metadata"
        >
            <source src="{{ asset('videos/your-bg-video.mp4') }}" type="video/mp4">
        </video>

        <!-- CONTENT (FULL WIDTH, RESPONSIVE PADDING) -->
        <div class="relative z-10 flex min-h-[calc(100vh-64px)] sm:min-h-[calc(100vh-72px)] items-center px-6 sm:px-12 lg:px-20 py-10">
            <div class="max-w-xl">

                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight">
                    <span class="text-lime-600">Grain</span><span class="text-yellow-500">Rise</span>    
                </h1>

                <p class="mt-4 text-base sm:text-lg font-semibold text-gray-800">
                    Your rice supply chain operations on one platform.
                </p>

                <p class="mt-2 italic text-sm sm:text-base text-gray-600">
                    Simple, efficient, and built for smarter rice distribution.
                </p>

                <div class="mt-7 sm:mt-8">
                    <a href="#"
                       class="inline-flex items-center justify-center rounded-lg bg-green-500 px-6 sm:px-7 py-3 text-sm font-bold text-white shadow hover:bg-green-400 active:bg-green-600">
                        Join Us Now!
                    </a>
                </div>

            </div>
        </div>

        <!-- PLAY BUTTON (CENTER, RESPONSIVE SIZE) -->
        <button
            id="playBtn"
            class="absolute left-1/2 top-1/2 z-20 grid h-14 w-14 sm:h-16 sm:w-16 -translate-x-1/2 -translate-y-1/2 place-items-center rounded-full border border-gray-300 bg-white/90 shadow backdrop-blur hover:bg-white active:scale-95"
            aria-label="Play or pause video"
            type="button"
        >
            <span
                id="playIcon"
                class="ml-1 block h-0 w-0 border-y-[9px] sm:border-y-[10px] border-y-transparent border-l-[14px] sm:border-l-[16px] border-l-gray-800">
            </span>
        </button>

    </section>
</main>

<script>
    // Video control
    const video = document.getElementById('heroVideo');
    const playBtn = document.getElementById('playBtn');

    playBtn?.addEventListener('click', async () => {
        if (!video) return;
        if (video.paused) await video.play();
        else video.pause();
    });

    // Mobile menu toggle
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn?.addEventListener('click', () => {
        mobileMenu?.classList.toggle('hidden');
    });

    // Close mobile menu when clicking a link
    mobileMenu?.querySelectorAll('a').forEach(a => {
        a.addEventListener('click', () => mobileMenu.classList.add('hidden'));
    });
</script>

</body>
</html>