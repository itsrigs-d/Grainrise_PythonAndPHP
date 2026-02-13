<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

    <style>
        /* Hero overlay for improved text readability */
        .hero-overlay{
            background:
                radial-gradient(60% 60% at 50% 40%, rgba(255,255,255,.18) 0%, rgba(0,0,0,.28) 70%, rgba(0,0,0,.35) 100%),
                linear-gradient(to bottom, rgba(255,255,255,.18) 0%, rgba(0,0,0,.18) 55%, rgba(0,0,0,.30) 100%);
        }

        /* About section background pattern */
        .about-bg{
            background-color: #f3f1ea;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(0,0,0,.06) 0 52px, transparent 53px),
                radial-gradient(circle at 22% 55%, rgba(0,0,0,.06) 0 36px, transparent 37px),
                radial-gradient(circle at 15% 85%, rgba(0,0,0,.06) 0 28px, transparent 29px),
                radial-gradient(circle at 75% 18%, rgba(0,0,0,.06) 0 44px, transparent 45px),
                radial-gradient(circle at 88% 48%, rgba(0,0,0,.06) 0 80px, transparent 81px),
                radial-gradient(circle at 92% 82%, rgba(0,0,0,.06) 0 46px, transparent 47px);
            background-repeat: no-repeat;
        }

        /* Services section background */
        .services-bg{
            position: relative;
            background-image:
                linear-gradient(
                    to bottom,
                    rgba(10, 45, 25, 0.55),
                    rgba(10, 45, 25, 0.75)
                ),
                url("/images/rice.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        html { scroll-behavior: smooth; }
        section { scroll-margin-top: 92px; }

        .nav-top{ background: transparent; }
        .nav-scrolled{
            background: rgba(20, 83, 45, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 12px 30px rgba(0,0,0,.18);
            border-bottom: 1px solid rgba(255,255,255,.10);
        }

        .reveal{
            opacity: 0;
            transform: translateY(18px);
            transition: opacity .8s ease, transform .8s ease;
            will-change: opacity, transform;
        }
        .reveal.show{
            opacity: 1;
            transform: translateY(0);
        }

        .reveal[data-delay="1"]{ transition-delay: .08s; }
        .reveal[data-delay="2"]{ transition-delay: .16s; }
        .reveal[data-delay="3"]{ transition-delay: .24s; }
        .reveal[data-delay="4"]{ transition-delay: .32s; }

        @media (prefers-reduced-motion: reduce){
            html { scroll-behavior: auto; }
            .reveal{ transition: none; transform: none; }
            .reveal.show{ transform: none; }
        }

        /* Responsive polish (no comment changes) */
        body{ overflow-x: clip; }
        #services{ overflow-x: clip; }
        #svcTrack{
            -webkit-overflow-scrolling: touch;
            scroll-snap-type: x mandatory;
        }
        #svcTrack > .svcItem{ scroll-snap-align: center; }

        @media (max-width: 639px){
            section{ scroll-margin-top: 84px; }
        }
        @media (min-width: 1024px){
            section{ scroll-margin-top: 96px; }
        }
        @media (min-width: 1536px){
            section{ scroll-margin-top: 104px; }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900 min-h-screen">

<!-- HERO WRAPPER -->
<main id="home" class="relative min-h-screen w-full overflow-hidden">

    <video
        id="heroVideo"
        class="absolute inset-0 h-full w-full object-cover"
        autoplay
        muted
        loop
        playsinline
        preload="metadata"
    >
        <source src="{{ asset('videos/Landing%20Page_GrainRise.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="absolute inset-0 hero-overlay"></div>

    <!-- Fixed header -->
    <header id="siteHeader" class="fixed top-0 left-0 right-0 z-50">
        <nav id="topNav" class="w-full nav-top transition-all duration-300 ease-out">
            <div id="navInner" class="flex items-center justify-between px-4 sm:px-10 py-5 transition-all duration-300 ease-out">

                <a href="{{ url('/') }}" class="flex items-center gap-2" aria-label="GrainRise Home">
                    <img
                        src="{{ asset('images/grainrise-logo.png') }}"
                        alt="GrainRise Logo"
                        class="h-8 w-8 object-contain drop-shadow"
                        loading="eager"
                        decoding="async"
                    />
                    <span class="text-lg font-semibold tracking-wide drop-shadow">
                        <span class="text-lime-400">Grain</span><span class="text-yellow-300">Rise</span>
                    </span>
                </a>

                <div class="hidden md:flex items-center gap-6 text-sm font-semibold text-white/90" role="navigation" aria-label="Primary">
                    <a href="#home" class="hover:text-lime-200 transition">Home</a>
                    <a href="#about" class="hover:text-lime-200 transition">About</a>
                    <a href="#services" class="hover:text-lime-200 transition">Services</a>
                    <a href="#contacts" class="hover:text-lime-200 transition">Contacts</a>

                    <a href="{{ route('login') }}"
                       class="ml-2 rounded-md bg-yellow-400/95 px-4 py-2 text-xs font-bold text-white shadow hover:bg-yellow-300 active:bg-yellow-500 transition">
                        Log In
                    </a>
                </div>

                <div class="flex items-center gap-3 md:hidden">
                    <a href="{{ route('login') }}"
                       class="rounded-md bg-yellow-400/95 px-4 py-2 text-xs font-bold text-white shadow hover:bg-yellow-300 active:bg-yellow-500 transition">
                        Log In
                    </a>

                    <!-- UPDATED: burger menu is now an IMAGE icon -->
                    <button id="menuBtn"
                            class="grid h-10 w-10 place-items-center rounded-lg bg-white/55 ring-1 ring-black/10 backdrop-blur
                                   hover:bg-white/75 active:scale-95 transition"
                            aria-label="Open menu"
                            aria-controls="mobileMenu"
                            aria-expanded="false"
                            type="button">
                        <img
                            src="{{ asset('images/burger-bar.png') }}"
                            alt=""
                            class="h-6 w-6 object-contain"
                            draggable="false"
                            loading="eager"
                            decoding="async"
                        />
                    </button>
                </div>

            </div>

            <!-- MOBILE MENU (fixed: overlay + clickable + hover/tap behavior) -->
            <div id="mobileMenu" class="hidden md:hidden">
                <!-- backdrop -->
                <div id="mobileBackdrop" class="fixed inset-0 bg-black/35 backdrop-blur-[2px]"></div>

                <!-- panel -->
                <div id="mobileMenuPanel" class="fixed left-4 right-4 top-[84px] rounded-2xl bg-white/90 ring-1 ring-black/10 backdrop-blur p-4 text-gray-900 shadow-2xl">
                    <div class="flex flex-col gap-2 text-sm font-semibold">
                        <!-- UPDATED: hover (and tap) is handled by JS below; base classes remain clean -->
                        <a href="#home" class="mLink rounded-xl px-3 py-2 transition">Home</a>
                        <a href="#about" class="mLink rounded-xl px-3 py-2 transition">About</a>
                        <a href="#services" class="mLink rounded-xl px-3 py-2 transition">Services</a>
                        <a href="#contacts" class="mLink rounded-xl px-3 py-2 transition">Contacts</a>
                    </div>
                </div>
            </div>

        </nav>
    </header>

    <section class="relative z-20 min-h-screen flex items-center justify-center text-center px-6" aria-labelledby="heroTitle">
        <div class="max-w-3xl">

            <h1 id="heroTitle" class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tight text-white drop-shadow">
                <span class="text-lime-300">Grain</span><span class="text-yellow-300">Rise</span>
            </h1>

            <p class="mt-5 text-base sm:text-lg font-semibold text-white/90 drop-shadow">
                Your rice supply chain operations on one platform.
            </p>

            <p class="mt-3 text-sm sm:text-base italic font-semibold text-white/80 drop-shadow">
                Simple, efficient, and built for smarter rice distribution.
            </p>

            <div class="mt-10">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center rounded-md bg-green-600 px-8 py-3 text-sm font-bold text-white shadow-lg hover:bg-green-500 active:bg-green-700 transition">
                    Get Started
                </a>
            </div>

        </div>
    </section>
</main>

<!-- ABOUT SECTION -->
<section id="about" class="about-bg w-full relative overflow-hidden reveal" aria-labelledby="aboutTitle">
  <div class="mx-auto max-w-7xl px-6 sm:px-10 py-20 sm:py-28 lg:py-32 pb-28 sm:pb-32">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 lg:gap-20 items-center">

      <!-- Text content -->
      <div class="max-w-xl">
        <p class="inline-flex items-center gap-3 text-lime-700 font-extrabold text-base sm:text-lg tracking-wide">
          <span class="h-4 w-4 rounded-full bg-lime-600"></span>
          About Us
        </p>

        <h2 id="aboutTitle" class="mt-4 text-3xl sm:text-4xl font-extrabold leading-tight text-green-700">
          Transforming Rice Supply Chains Through
          <span class="text-yellow-500">Innovation</span> and
          <span class="text-yellow-500">Technology</span>
        </h2>

        <p class="mt-6 text-base sm:text-lg leading-relaxed text-green-900/75">
          GrainRise modernizes rice distribution through smart tools and sustainable practices.
          We connect key stakeholders across the ecosystem—helping create a clearer, faster, and more reliable supply chain.
        </p>

        <p class="mt-5 text-base sm:text-lg leading-relaxed text-green-900/75">
          Built on innovation and inclusivity, we help businesses reduce waste, improve planning, and increase profitability.
          With AI-driven insights and forecasting, teams can make smarter decisions with confidence.
        </p>
      </div>

      <!-- Image layout -->
      <div class="relative">
        <div class="relative rounded-3xl bg-white/75 p-3 shadow-xl ring-1 ring-black/5">
          <img
            src="{{ asset('images/ricefield.png') }}"
            alt="Rice sacks"
            class="w-full h-[300px] sm:h-[380px] lg:h-[420px] object-cover rounded-2xl"
            loading="lazy"
            decoding="async"
          />
        </div>

        <div class="absolute -bottom-10 right-0 sm:right-4 w-[84%] sm:w-[62%] rounded-3xl bg-white/75 p-3 shadow-xl ring-1 ring-black/5">
          <img
            src="{{ asset('images/sack.jpg') }}"
            alt="Rice field"
            class="w-full h-[200px] sm:h-[220px] object-cover rounded-2xl"
            loading="lazy"
            decoding="async"
          />
        </div>

        <div class="absolute top-8 right-6 sm:right-16 h-20 w-20 rounded-full bg-green-700 ring-4 ring-white shadow-lg grid place-items-center">
          <img
            src="{{ asset('images/wheat.png') }}"
            alt="GrainRise mark"
            class="h-10 w-10 object-contain"
            loading="lazy"
            decoding="async"
          />
        </div>

        <div class="h-12 sm:h-14 lg:hidden"></div>
      </div>

    </div>
  </div>
</section>

<!-- SERVICES SECTION -->
<section id="services" class="relative w-full services-bg reveal" aria-labelledby="servicesTitle">

  <div class="absolute inset-0 services-overlay"></div>

  <div class="relative z-10 mx-auto max-w-7xl px-6 sm:px-10 py-16 sm:py-20 lg:py-24">

    <h2 id="servicesTitle" class="text-center text-5xl sm:text-6xl font-extrabold text-yellow-300 drop-shadow">
      Services
    </h2>

    <div class="mt-12 sm:mt-14 relative">
      <button id="svcPrev"
              class="absolute -left-2 sm:-left-6 top-1/2 -translate-y-1/2 z-30
                     h-14 w-14 sm:h-16 sm:w-16 rounded-full bg-yellow-400 grid place-items-center
                     hover:bg-yellow-300 active:scale-95 transition shadow-xl"
              aria-label="Previous service"
              type="button">
        <img src="{{ asset('images/left-arrow.png') }}"
             alt="Previous"
             class="h-6 w-6 sm:h-8 sm:w-8 object-contain"
             draggable="false"
             loading="lazy"
             decoding="async">
      </button>

      <button id="svcNext"
              class="absolute -right-2 sm:-right-6 top-1/2 -translate-y-1/2 z-30
                     h-14 w-14 sm:h-16 sm:w-16 rounded-full bg-yellow-400 grid place-items-center
                     hover:bg-yellow-300 active:scale-95 transition shadow-xl"
              aria-label="Next service"
              type="button">
        <img src="{{ asset('images/right-arrow.png') }}"
             alt="Next"
             class="h-6 w-6 sm:h-8 sm:w-8 object-contain"
             draggable="false"
             loading="lazy"
             decoding="async">
      </button>

      <div class="mx-auto max-w-6xl px-0 sm:px-8 py-8 overflow-visible">
        <div id="svcTrack"
             class="flex items-stretch justify-start sm:justify-center gap-2 sm:gap-4 lg:gap-5 select-none
                    overflow-x-auto sm:overflow-visible scroll-smooth px-4 sm:px-0">

          <!-- CARD 1 -->
          <div class="svcItem bg-white/95 shadow-xl rounded-3xl text-center
                      ring-1 ring-black/5 backdrop-blur transition-all duration-500 ease-out
                      w-[78vw] max-w-[270px] sm:w-[230px] md:w-[245px]
                      min-h-[285px] h-auto sm:h-[305px] md:h-[320px]
                      px-6 sm:px-7 py-7 sm:py-8 flex flex-col shrink-0">

            <div class="svcIcon mx-auto h-16 w-16 sm:h-18 sm:w-18 rounded-3xl bg-green-900/90
                        grid place-items-center ring-1 ring-white/15 shadow-lg transition-all duration-500">
              <img src="{{ asset('images/shipping.png') }}"
                   class="svcImg h-8 w-8 sm:h-9 sm:w-9 object-contain transition-all duration-500"
                   alt="Stock Awareness"
                   draggable="false"
                   loading="lazy"
                   decoding="async">
            </div>

            <p class="svcTitle mt-5 text-base sm:text-lg font-extrabold text-green-900 tracking-wide">
              STOCK<br>AWARENESS
            </p>

            <p class="svcDesc mt-4 text-sm sm:text-base leading-relaxed text-green-900/75 sm:line-clamp-3">
              See current stock levels instantly to prevent shortages and overstocking.
            </p>

            <div class="mt-auto"></div>
          </div>

          <!-- CARD 2 -->
          <div class="svcItem bg-white/95 shadow-xl rounded-3xl text-center
                      ring-1 ring-black/5 backdrop-blur transition-all duration-500 ease-out
                      w-[78vw] max-w-[270px] sm:w-[230px] md:w-[245px]
                      min-h-[285px] h-auto sm:h-[305px] md:h-[320px]
                      px-6 sm:px-7 py-7 sm:py-8 flex flex-col shrink-0">

            <div class="svcIcon mx-auto h-16 w-16 sm:h-18 sm:w-18 rounded-3xl bg-green-900/90
                        grid place-items-center ring-1 ring-white/15 shadow-lg transition-all duration-500">
              <img src="{{ asset('images/box.png') }}"
                   class="svcImg h-8 w-8 sm:h-9 sm:w-9 object-contain transition-all duration-500"
                   alt="Inventory Control"
                   draggable="false"
                   loading="lazy"
                   decoding="async">
            </div>

            <p class="svcTitle mt-5 text-base sm:text-lg font-extrabold text-green-900 tracking-wide">
              INVENTORY<br>CONTROL
            </p>

            <p class="svcDesc mt-4 text-sm sm:text-base leading-relaxed text-green-900/75 sm:line-clamp-3">
              Track inflow and outflow with accurate inventory records.
            </p>

            <div class="mt-auto"></div>
          </div>

          <!-- CARD 3 -->
          <div class="svcItem bg-white/95 shadow-xl rounded-3xl text-center
                      ring-1 ring-black/5 backdrop-blur transition-all duration-500 ease-out
                      w-[78vw] max-w-[270px] sm:w-[230px] md:w-[245px]
                      min-h-[285px] h-auto sm:h-[305px] md:h-[320px]
                      px-6 sm:px-7 py-7 sm:py-8 flex flex-col shrink-0">

            <div class="svcIcon mx-auto h-16 w-16 sm:h-18 sm:w-18 rounded-3xl bg-green-900/90
                        grid place-items-center ring-1 ring-white/15 shadow-lg transition-all duration-500">
              <img src="{{ asset('images/bar-graph.png') }}"
                   class="svcImg h-8 w-8 sm:h-9 sm:w-9 object-contain transition-all duration-500"
                   alt="Demand Forecasting"
                   draggable="false"
                   loading="lazy"
                   decoding="async">
            </div>

            <p class="svcTitle mt-5 text-base sm:text-lg font-extrabold text-green-900 tracking-wide">
              DEMAND<br>FORECASTING
            </p>

            <p class="svcDesc mt-4 text-sm sm:text-base leading-relaxed text-green-900/75 sm:line-clamp-3">
              Predict demand using historical data for smarter restocking.
            </p>

            <div class="mt-auto"></div>
          </div>

          <!-- CARD 4 -->
          <div class="svcItem bg-white/95 shadow-xl rounded-3xl text-center
                      ring-1 ring-black/5 backdrop-blur transition-all duration-500 ease-out
                      w-[78vw] max-w-[270px] sm:w-[230px] md:w-[245px]
                      min-h-[285px] h-auto sm:h-[305px] md:h-[320px]
                      px-6 sm:px-7 py-7 sm:py-8 flex flex-col shrink-0">

            <div class="svcIcon mx-auto h-16 w-16 sm:h-18 sm:w-18 rounded-3xl bg-green-900/90
                        grid place-items-center ring-1 ring-white/15 shadow-lg transition-all duration-500">
              <img src="{{ asset('images/van.png') }}"
                   class="svcImg h-8 w-8 sm:h-9 sm:w-9 object-contain transition-all duration-500"
                   alt="Delivery Tracking"
                   draggable="false"
                   loading="lazy"
                   decoding="async">
            </div>

            <p class="svcTitle mt-5 text-base sm:text-lg font-extrabold text-green-900 tracking-wide">
              DELIVERY<br>TRACKING
            </p>

            <p class="svcDesc mt-4 text-sm sm:text-base leading-relaxed text-green-900/75 sm:line-clamp-3">
              Monitor deliveries in real-time with clear route visibility.
            </p>

            <div class="mt-auto"></div>
          </div>

          <!-- CARD 5 -->
          <div class="svcItem bg-white/95 shadow-xl rounded-3xl text-center
                      ring-1 ring-black/5 backdrop-blur transition-all duration-500 ease-out
                      w-[78vw] max-w-[270px] sm:w-[230px] md:w-[245px]
                      min-h-[285px] h-auto sm:h-[305px] md:h-[320px]
                      px-6 sm:px-7 py-7 sm:py-8 flex flex-col shrink-0">

            <div class="svcIcon mx-auto h-16 w-16 sm:h-18 sm:w-18 rounded-3xl bg-green-900/90
                        grid place-items-center ring-1 ring-white/15 shadow-lg transition-all duration-500">
              <img src="{{ asset('images/setting.png') }}"
                   class="svcImg h-8 w-8 sm:h-9 sm:w-9 object-contain transition-all duration-500"
                   alt="Operation Tools"
                   draggable="false"
                   loading="lazy"
                   decoding="async">
            </div>

            <p class="svcTitle mt-5 text-base sm:text-lg font-extrabold text-green-900 tracking-wide">
              OPERATION<br>TOOLS
            </p>

            <p class="svcDesc mt-4 text-sm sm:text-base leading-relaxed text-green-900/75 sm:line-clamp-3">
              Built-in tools for smoother workflows and coordination.
            </p>

            <div class="mt-auto"></div>
          </div>

        </div>

        <div class="mt-8 flex items-center justify-center gap-2 sm:gap-3" aria-hidden="true">
          <span class="svcDot h-3 w-3 rounded-full bg-lime-300/40"></span>
          <span class="svcDot h-3 w-3 rounded-full bg-lime-300/40"></span>
          <span class="svcDot h-3 w-10 rounded-full bg-yellow-300"></span>
          <span class="svcDot h-3 w-3 rounded-full bg-lime-300/40"></span>
          <span class="svcDot h-3 w-3 rounded-full bg-lime-300/40"></span>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- WHY SECTION -->
<section id="why" class="w-full bg-[#f3f1ea] reveal" aria-labelledby="whyTitle">
    <div class="mx-auto max-w-7xl px-6 sm:px-10 py-16 sm:py-20">
        <h2 id="whyTitle" class="text-center text-4xl sm:text-5xl font-extrabold text-green-600">
            Why Choose Grain Rise?
        </h2>
        <p class="mx-auto mt-4 max-w-2xl text-center text-sm sm:text-base leading-relaxed text-green-900/70">
            A smarter way to manage rice distribution—built for clarity, speed, and better decision-making.
        </p>

        <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- WHY CARD 1 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="1">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10.5 19a8.5 8.5 0 1 1 0-17 8.5 8.5 0 0 1 0 17Z" stroke="#fff" stroke-width="2"/>
                        <path d="M21 21l-4.3-4.3" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M10.5 7v3.8l2.6 1.5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    REAL-TIME TRACKING
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Monitor your inventory, shipments, and operations in real-time from any device. Stay connected 24/7.
                </p>
            </div>

            <!-- WHY CARD 2 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="2">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 3h6" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 3v2" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M7 9h10a3 3 0 0 1 3 3v3a5 5 0 0 1-5 5H9a5 5 0 0 1-5-5v-3a3 3 0 0 1 3-3Z" stroke="#fff" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M9 13h.01" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                        <path d="M15 13h.01" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                        <path d="M9 16c1.6 1.2 4.4 1.2 6 0" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    AI-POWERED INSIGHTS
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Predict demand patterns, optimize stock levels, and reduce waste using intelligent analytics.
                </p>
            </div>

            <!-- WHY CARD 3 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="3">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M7 11V8a5 5 0 0 1 10 0v3" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M6.5 11h11A2.5 2.5 0 0 1 20 13.5v6A2.5 2.5 0 0 1 17.5 22h-11A2.5 2.5 0 0 1 4 19.5v-6A2.5 2.5 0 0 1 6.5 11Z" stroke="#fff" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M12 15v3" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    SECURE &amp; COMPLIANT
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Strong protection measures ensure your data stays safe, reliable, and standards-ready.
                </p>
            </div>

            <!-- WHY CARD 4 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="1">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M4 19V5" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M4 19h16" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M7 15v-4" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M11 15V8" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M15 15v-6" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M8 9l2-2 3 3 4-5" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    ADVANCED ANALYTICS
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Use dashboards and reports to track performance, spot trends, and improve operations.
                </p>
            </div>

            <!-- WHY CARD 5 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="2">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 22a10 10 0 1 0 0-20 10 10 0 0 0 0 20Z" stroke="#fff" stroke-width="2"/>
                        <path d="M2 12h20" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 2c3 3 3 17 0 20" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                        <path d="M12 2c-3 3-3 17 0 20" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    GLOBAL OPERATIONS
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Coordinate multiple locations with better visibility and smoother workflows across teams.
                </p>
            </div>

            <!-- WHY CARD 6 -->
            <div class="whyCard group bg-white rounded-3xl p-8 text-center
                        shadow-md ring-1 ring-black/5
                        transition-all duration-300 ease-out
                        hover:-translate-y-1 hover:shadow-2xl hover:ring-2 hover:ring-yellow-300
                        reveal" data-delay="3">
                <div class="whyIcon mx-auto h-16 w-16 rounded-2xl bg-green-800 grid place-items-center shadow
                            ring-1 ring-white/10
                            transition-all duration-300
                            group-hover:bg-yellow-300 group-hover:ring-2 group-hover:ring-yellow-200 group-hover:shadow-xl
                            group-hover:scale-105">
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M13 2 4 14h7l-1 8 10-14h-7l0-6Z" fill="#fff"/>
                    </svg>
                </div>

                <p class="mt-5 font-extrabold text-green-900 text-base tracking-wide">
                    LIGHTNING FAST
                </p>
                <p class="mt-3 text-sm leading-relaxed text-green-900/70">
                    Optimized for speed and smooth syncing so your team can move fast without delays.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- CONTACTS SECTION -->
<section id="contacts" class="w-full reveal" aria-labelledby="contactTitle">
    <div class="relative w-full bg-gradient-to-b from-yellow-300 via-yellow-200 to-yellow-100">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/0 via-black/0 to-black/5"></div>

    <div class="relative mx-auto max-w-7xl px-6 sm:px-10 py-16 sm:py-20 text-center">
        <h2 id="contactTitle" class="text-3xl sm:text-5xl font-extrabold tracking-tight text-green-900 leading-tight">
        Ready to Transform Your<br class="hidden sm:block">
        Rice Business?
        </h2>

        <p class="mt-5 mx-auto max-w-2xl text-sm sm:text-base leading-relaxed text-green-900/75">
        Join hundreds of successful rice businesses already using GrainRise to optimize their operations.
        </p>

        <div class="mt-8">
        <a href="{{ route('login') }}"
            class="inline-flex items-center justify-center rounded-xl bg-green-800 px-10 py-3.5
                    text-sm font-extrabold text-white shadow-lg
                    transition-all duration-300
                    hover:-translate-y-0.5 hover:bg-green-700 hover:shadow-xl
                    active:translate-y-0 active:bg-green-900
                    focus:outline-none focus:ring-4 focus:ring-green-800/25">
            Join Us Now!
        </a>
        </div>
    </div>
    </div>

    <footer class="w-full bg-green-900">
        <div class="mx-auto max-w-7xl px-6 sm:px-10 py-14">

        <div class="grid grid-cols-1 gap-10 md:grid-cols-5 md:gap-12 items-start">

            <div class="md:col-span-1">
            <div class="text-3xl font-extrabold tracking-tight leading-none">
                <span class="text-green-300">GRAIN</span><span class="text-yellow-300">RISE</span>
            </div>

            <p class="mt-4 text-sm leading-relaxed text-green-50/80 max-w-[280px]">
                Transforming rice supply chains with intelligent technology and data-driven insights for a sustainable future.
            </p>

            <div class="mt-5 flex items-center gap-3">
                <a href="#" class="h-9 w-9 grid place-items-center rounded-full bg-white/10 ring-1 ring-white/10 hover:bg-white/15 transition" aria-label="Facebook">
                <svg class="h-4 w-4 text-white/80" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M22 12a10 10 0 1 0-11.6 9.9v-7h-2.1V12h2.1V9.8c0-2.1 1.3-3.3 3.2-3.3.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.2l-.4 2.9h-1.8v7A10 10 0 0 0 22 12Z"/>
                </svg>
                </a>
                <a href="#" class="h-9 w-9 grid place-items-center rounded-full bg-white/10 ring-1 ring-white/10 hover:bg-white/15 transition" aria-label="Twitter">
                <svg class="h-4 w-4 text-white/80" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M22 5.8c-.7.3-1.4.5-2.2.6.8-.5 1.3-1.2 1.6-2.1-.7.4-1.5.7-2.4.9A3.7 3.7 0 0 0 12.6 8c0 .3 0 .6.1.9-3-.2-5.7-1.6-7.5-3.9-.3.6-.5 1.2-.5 2 0 1.3.7 2.5 1.7 3.2-.6 0-1.2-.2-1.7-.5v.1c0 1.9 1.4 3.5 3.2 3.9-.3.1-.7.1-1.1.1-.2 0-.5 0-.7-.1.5 1.6 2 2.7 3.8 2.8A7.5 7.5 0 0 1 2 18.4 10.6 10.6 0 0 0 7.7 20c6.8 0 10.6-5.7 10.6-10.6v-.5c.7-.5 1.3-1.1 1.7-1.8Z"/>
                </svg>
                </a>
                <a href="#" class="h-9 w-9 grid place-items-center rounded-full bg-white/10 ring-1 ring-white/10 hover:bg-white/15 transition" aria-label="LinkedIn">
                <svg class="h-4 w-4 text-white/80" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M20.4 20.4h-3.6v-5.6c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.7H9.3V9.2h3.4v1.5h.1c.5-.9 1.6-1.8 3.3-1.8 3.6 0 4.3 2.4 4.3 5.5v6ZM5.3 7.7A2.1 2.1 0 1 1 5.3 3.5a2.1 2.1 0 0 1 0 4.2ZM7.1 20.4H3.5V9.2h3.6v11.2Z"/>
                </svg>
                </a>
            </div>
            </div>

            <div>
            <p class="text-sm font-extrabold text-yellow-300 tracking-wide">COMPANY</p>
            <ul class="mt-4 space-y-2 text-sm text-green-50/80">
                <li><a href="#about" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">About Us</a></li>
                <li><a href="#services" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Services</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Careers</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Press</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Partners</a></li>
            </ul>
            </div>

            <div>
            <p class="text-sm font-extrabold text-yellow-300 tracking-wide">RESOURCES</p>
            <ul class="mt-4 space-y-2 text-sm text-green-50/80">
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Documentation</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">API Reference</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Help Center</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Blog</a></li>
                <li><a href="#" class="relative inline-block hover:text-white transition after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-yellow-300 after:transition-all hover:after:w-full">Webinars</a></li>
            </ul>
            </div>

            <div>
            <p class="text-sm font-extrabold text-yellow-300 tracking-wide">CONTACTS</p>
            <ul class="mt-4 space-y-3 text-sm text-green-50/85">
                <li class="flex items-start gap-3">
                <span class="h-9 w-9 rounded-full bg-white/10 ring-1 ring-white/10 grid place-items-center shrink-0">
                    <svg class="h-4 w-4 text-pink-200" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 7h16v10H4V7Z" stroke="currentColor" stroke-width="2" />
                    <path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2" stroke-linejoin="round" />
                    </svg>
                </span>
                <span class="leading-relaxed">info@grainrise.com</span>
                </li>

                <li class="flex items-start gap-3">
                <span class="h-9 w-9 rounded-full bg-white/10 ring-1 ring-white/10 grid place-items-center shrink-0">
                    <svg class="h-4 w-4 text-lime-200" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6.5 3h3l1.2 5-2 1.2c1.2 2.4 3.1 4.3 5.5 5.5l1.2-2 5 1.2v3c0 1-1 2-2 2C10 21.9 2.1 14 3 6c0-1 1-2 2-2Z"
                            stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                </span>
                <span class="leading-relaxed">+1 (555) 123-4567</span>
                </li>

                <li class="flex items-start gap-3">
                <span class="h-9 w-9 rounded-full bg-white/10 ring-1 ring-white/10 grid place-items-center shrink-0">
                    <svg class="h-4 w-4 text-yellow-200" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 21s7-4.4 7-11a7 7 0 1 0-14 0c0 6.6 7 11 7 11Z"
                            stroke="currentColor" stroke-width="2" />
                    <path d="M12 10.5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" fill="currentColor"/>
                    </svg>
                </span>
                <span class="leading-relaxed">
                    123 Agriculture Lane<br>
                    Metro City, MC 12345
                </span>
                </li>
            </ul>
            </div>

            <div>
            <p class="text-sm font-extrabold text-yellow-300 tracking-wide">NEWSLETTER</p>

            <div class="mt-4 space-y-3">
                <input
                type="email"
                placeholder="Your Email"
                autocomplete="email"
                class="w-full rounded-full bg-white/10 px-4 py-2.5 text-sm text-white
                        placeholder:text-green-100/70 ring-1 ring-white/15
                        focus:outline-none focus:ring-4 focus:ring-yellow-300/25"
                />

                <button
                type="button"
                class="w-full rounded-full bg-green-700 px-4 py-2.5 text-sm font-extrabold text-white
                        shadow-lg transition-all duration-300
                        hover:-translate-y-0.5 hover:bg-green-600 hover:shadow-xl
                        active:translate-y-0 active:bg-green-800
                        focus:outline-none focus:ring-4 focus:ring-green-700/25">
                Subscribe
                </button>

                <p class="text-xs text-green-50/70 leading-relaxed">
                No spam. Only product updates and helpful resources.
                </p>
            </div>
            </div>

        </div>

        <div class="mt-12 h-px w-full bg-white/15"></div>

        <div class="mt-6 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between text-xs text-green-50/75">
            <span>© 2026 GrainRise. All rights reserved.</span>
            <span class="flex flex-wrap gap-x-3 gap-y-1 justify-center">
            <a href="#" class="hover:text-white hover:underline underline-offset-4">Privacy Policy</a>
            <span class="text-white/20">|</span>
            <a href="#" class="hover:text-white hover:underline underline-offset-4">Terms of Service</a>
            <span class="text-white/20">|</span>
            <a href="#" class="hover:text-white hover:underline underline-offset-4">Cookie Policy</a>
            </span>
        </div>

        </div>
    </footer>
</section>

<script>
    /* MOBILE MENU: scroll lock + clean link navigation */
    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileBackdrop = document.getElementById('mobileBackdrop');
    const mobileMenuPanel = document.getElementById('mobileMenuPanel');

    let savedScrollY = 0;

    const isMenuOpen = () => mobileMenu && !mobileMenu.classList.contains('hidden');

    function lockBodyScroll() {
    savedScrollY = window.scrollY || 0;

    document.body.style.position = 'fixed';
    document.body.style.top = `-${savedScrollY}px`;
    document.body.style.left = '0';
    document.body.style.right = '0';
    document.body.style.width = '100%';
    document.body.style.overflow = 'hidden';
    document.body.style.touchAction = 'none';
    }

    function unlockBodyScroll() {
    const top = document.body.style.top;

    document.body.style.position = '';
    document.body.style.top = '';
    document.body.style.left = '';
    document.body.style.right = '';
    document.body.style.width = '';
    document.body.style.overflow = '';
    document.body.style.touchAction = '';

    const y = top ? Math.abs(parseInt(top, 10)) : savedScrollY;
    window.scrollTo(0, y);
    }

    function setMenuState(open) {
    if (!mobileMenu || !menuBtn) return;

    mobileMenu.classList.toggle('hidden', !open);
    menuBtn.setAttribute('aria-expanded', String(open));

    if (open) lockBodyScroll();
    else unlockBodyScroll();
    }

    menuBtn?.addEventListener('click', () => setMenuState(!isMenuOpen()));

    mobileBackdrop?.addEventListener('click', () => setMenuState(false));

    window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') setMenuState(false);
    });

    // Stop “scroll bleed” on overlay
    mobileBackdrop?.addEventListener('touchmove', (e) => e.preventDefault(), { passive: false });
    mobileBackdrop?.addEventListener('wheel', (e) => e.preventDefault(), { passive: false });

    // Close menu + smooth scroll to section (with header offset)
    mobileMenuPanel?.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
        e.preventDefault();

        const href = a.getAttribute('href');
        const target = href ? document.querySelector(href) : null;

        setMenuState(false);

        requestAnimationFrame(() => {
        if (!target) return;

        const header = document.getElementById('siteHeader');
        const offset = header ? header.offsetHeight : 92;

        const y = target.getBoundingClientRect().top + window.scrollY - offset + 8;
        window.scrollTo({ top: y, behavior: 'smooth' });
        });
    });
    });

    /* Header scroll state */
    const topNav = document.getElementById('topNav');
    const navInner = document.getElementById('navInner');

    let navTicking = false;

    function setNavState(){
        navTicking = false;

        const scrolled = window.scrollY > 10;

        if(scrolled){
            topNav?.classList.remove('nav-top');
            topNav?.classList.add('nav-scrolled');

            navInner?.classList.remove('py-5');
            navInner?.classList.add('py-3');
        }else{
            topNav?.classList.remove('nav-scrolled');
            topNav?.classList.add('nav-top');

            navInner?.classList.remove('py-3');
            navInner?.classList.add('py-5');
        }
    }

    window.addEventListener('scroll', () => {
        if (navTicking) return;
        navTicking = true;
        requestAnimationFrame(setNavState);
    }, { passive: true });

    window.addEventListener('load', setNavState);

    /* Section reveal on scroll */
    const revealEls = document.querySelectorAll('.reveal');
    const lastToggle = new WeakMap();
    const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (!reduceMotion) {
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const now = performance.now();
                const last = lastToggle.get(entry.target) || 0;

                if (now - last < 60) return;

                if(entry.isIntersecting){
                    entry.target.classList.add('show');
                } else {
                    entry.target.classList.remove('show');
                }

                lastToggle.set(entry.target, now);
            });
        }, {
            threshold: 0.18,
            rootMargin: "0px 0px -12% 0px"
        });

        revealEls.forEach(el => io.observe(el));
    } else {
        revealEls.forEach(el => el.classList.add('show'));
    }

    /* Services carousel (fixed gaps + stable mobile behavior) */
    const track = document.getElementById('svcTrack');
    const prev = document.getElementById('svcPrev');
    const next = document.getElementById('svcNext');

    const items = () => (track ? Array.from(track.querySelectorAll('.svcItem')) : []);
    const isMobile = () => window.matchMedia && window.matchMedia('(max-width: 639px)').matches;

    function resetCard(card) {
        card.classList.remove(
            'opacity-30','opacity-60','opacity-70','opacity-80','opacity-100',
            'ring-2','ring-yellow-300',
            'shadow-2xl','shadow-xl',
            'pointer-events-none',
            '-translate-y-1','-translate-y-2'
        );

        // IMPORTANT: clear inline transforms so gaps don't "explode"
        card.style.transform = '';
        card.style.zIndex = '';

        card.classList.add('transition-all','duration-500','ease-out');

        const icon = card.querySelector('.svcIcon');
        const img  = card.querySelector('.svcImg');

        if (icon) {
            icon.classList.remove(
                'bg-yellow-300','bg-lime-400',
                'ring-2','ring-yellow-200',
                'shadow-xl'
            );
            icon.classList.add('bg-green-900/90','ring-1','ring-white/15','shadow-md');
        }

        if (img) {
            img.classList.remove('brightness-90','brightness-95','brightness-110','contrast-125','drop-shadow');
            img.classList.add('brightness-110');
        }

        card.onmouseenter = null;
        card.onmouseleave = null;
    }

    function showOnlyIcon(card) {
        card.querySelector('.svcTitle')?.classList.add('hidden');
        card.querySelector('.svcDesc')?.classList.add('hidden');
    }

    function showIconAndTitle(card) {
        card.querySelector('.svcTitle')?.classList.remove('hidden');
        card.querySelector('.svcDesc')?.classList.add('hidden');
    }

    function showAll(card) {
        card.querySelector('.svcTitle')?.classList.remove('hidden');
        card.querySelector('.svcDesc')?.classList.remove('hidden');
    }

    function setActive(card) {
        card.classList.add('opacity-100','ring-2','ring-yellow-300','shadow-2xl');
        card.classList.add('hover:-translate-y-1');
        showAll(card);

        card.style.transform = 'translateX(0px) scale(1.06)';
        card.style.zIndex = '10';

        const icon = card.querySelector('.svcIcon');
        const img  = card.querySelector('.svcImg');

        if (icon) {
            icon.classList.remove('bg-green-900/90','ring-1','ring-white/15','shadow-md');
            icon.classList.add('bg-yellow-300','ring-2','ring-yellow-200','shadow-xl');
        }

        if (img) {
            img.classList.remove('brightness-110');
            img.classList.add('brightness-95','contrast-125','drop-shadow');
        }

        card.onmouseenter = () => {
            if (icon) {
                icon.classList.remove('bg-yellow-300');
                icon.classList.add('bg-lime-400');
            }
            if (img) {
                img.classList.remove('brightness-95');
                img.classList.add('brightness-110');
            }
        };

        card.onmouseleave = () => {
            if (icon) {
                icon.classList.remove('bg-lime-400');
                icon.classList.add('bg-yellow-300');
            }
            if (img) {
                img.classList.remove('brightness-110');
                img.classList.add('brightness-95');
            }
        };

        card.classList.remove('pointer-events-none');
    }

    function setNear(card, side) {
        card.classList.add('opacity-90','shadow-xl','pointer-events-none');
        showIconAndTitle(card);

        // Pull closer to center to reduce “visual gap”
        const pull = side === 'left' ? 16 : -16;
        card.style.transform = `translateX(${pull}px) scale(0.97)`;
        card.style.zIndex = '5';
    }

    function setFar(card, side) {
        card.classList.add('opacity-70','pointer-events-none');
        showOnlyIcon(card);

        const pull = side === 'left' ? 26 : -26;
        card.style.transform = `translateX(${pull}px) scale(0.92)`;
        card.style.zIndex = '1';
    }

    function applyDots(activeIndex) {
        const dots = Array.from(document.querySelectorAll('.svcDot'));
        dots.forEach((d) => {
            d.classList.remove('bg-yellow-300', 'w-8');
            d.classList.add('bg-lime-300/40', 'w-2.5');
        });
        if (dots[activeIndex]) {
            dots[activeIndex].classList.remove('bg-lime-300/40', 'w-2.5');
            dots[activeIndex].classList.add('bg-yellow-300', 'w-8');
        }
    }

    function applyState() {
        const cards = items();
        if (!cards.length) return;

        // MOBILE: no “center-focus transform” (para di magloko habang nagsswipe/scroll)
        if (isMobile()) {
            cards.forEach((card) => {
                resetCard(card);
                card.classList.add('opacity-100','shadow-xl');
                card.classList.remove('pointer-events-none');
                showAll(card);
                card.style.transform = 'translateX(0px) scale(1)';
                card.style.zIndex = '1';
            });
            // dots: highlight nearest center based on scroll (optional stable)
            return;
        }

        const centerIndex = Math.floor(cards.length / 2);

        cards.forEach((card, idx) => {
            resetCard(card);

            const dist = Math.abs(idx - centerIndex);
            const side = idx < centerIndex ? 'left' : 'right';

            if (idx === centerIndex) setActive(card);
            else if (dist === 1) setNear(card, side);
            else setFar(card, side);
        });

        applyDots(centerIndex);
    }

    // MOBILE paging: use scroll-snap paging instead of DOM reorder (prevents “nagloloko”)
    function mobileStep(dir) {
        if (!track) return;
        const cards = items();
        if (!cards.length) return;

        // card width + current gap (we set gap-2 on mobile => ~8px)
        const card = cards[0];
        const gapPx = 8;
        const step = card.getBoundingClientRect().width + gapPx;

        track.scrollBy({ left: dir * step, behavior: 'smooth' });
    }

    // DESKTOP rotate: reorder nodes + applyState (ok kasi overflow-visible)
    function rotateLeftDesktop() {
        const cards = items();
        if (!track || !cards.length) return;
        track.appendChild(cards[0]);
        applyState();
    }
    function rotateRightDesktop() {
        const cards = items();
        if (!track || !cards.length) return;
        track.insertBefore(cards[cards.length - 1], cards[0]);
        applyState();
    }

    prev?.addEventListener('click', () => {
        if (isMobile()) mobileStep(-1);
        else rotateRightDesktop();
    });

    next?.addEventListener('click', () => {
        if (isMobile()) mobileStep(1);
        else rotateLeftDesktop();
    });

    // Re-apply on resize (switch mobile/desktop behavior cleanly)
    window.addEventListener('resize', () => applyState(), { passive: true });

    applyState();

    /* ------------------------------------------------------------
       Hover behavior (mobile + desktop even in mobile width):
       - If device supports real hover (mouse/trackpad): mouseenter/mouseleave
       - If touch: tap-to-hover
    ------------------------------------------------------------ */
    const whyCards = () => Array.from(document.querySelectorAll('.whyCard'));
    const menuLinks = () => Array.from(document.querySelectorAll('#mobileMenuPanel .mLink'));

    const canRealHover = () =>
        window.matchMedia &&
        window.matchMedia('(hover: hover) and (pointer: fine)').matches;

    function clearWhyHover(){
        whyCards().forEach(card => {
            card.classList.remove('-translate-y-1','shadow-2xl','ring-2','ring-yellow-300');

            const icon = card.querySelector('.whyIcon');
            if (icon) {
                icon.classList.remove('bg-yellow-300','ring-2','ring-yellow-200','shadow-xl','scale-105');
                icon.classList.add('bg-green-800','ring-1','ring-white/10');
            }
        });
    }

    function setWhyHover(card){
        whyCards().forEach(c => {
            if (c !== card) {
                c.classList.remove('-translate-y-1','shadow-2xl','ring-2','ring-yellow-300');
                const ic = c.querySelector('.whyIcon');
                if (ic) {
                    ic.classList.remove('bg-yellow-300','ring-2','ring-yellow-200','shadow-xl','scale-105');
                    ic.classList.add('bg-green-800','ring-1','ring-white/10');
                }
            }
        });

        card.classList.add('-translate-y-1','shadow-2xl','ring-2','ring-yellow-300');

        const icon = card.querySelector('.whyIcon');
        if (icon) {
            icon.classList.remove('bg-green-800','ring-1','ring-white/10');
            icon.classList.add('bg-yellow-300','ring-2','ring-yellow-200','shadow-xl','scale-105');
        }
    }

    // UPDATED: mobile menu hover (and tap highlight) for each link
    function clearMenuHover(){
        menuLinks().forEach(a => a.classList.remove('bg-lime-50','text-lime-700'));
    }

    function setMenuHover(a){
        menuLinks().forEach(x => { if (x !== a) x.classList.remove('bg-lime-50','text-lime-700'); });
        a.classList.add('bg-lime-50','text-lime-700');
    }

    function bindHoverHandlers(){
        clearWhyHover();
        clearMenuHover();

        whyCards().forEach(card => {
            if (canRealHover()) {
                card.onmouseenter = () => setWhyHover(card);
                card.onmouseleave = () => clearWhyHover();
                card.ontouchstart = null;
                card.onclick = null;
            } else {
                card.onmouseenter = null;
                card.onmouseleave = null;

                card.ontouchstart = () => setWhyHover(card);
                card.onclick = () => setWhyHover(card);
            }
        });

        // UPDATED: menu links hover/tap highlight
        menuLinks().forEach(a => {
            if (canRealHover()) {
                a.onmouseenter = () => setMenuHover(a);
                a.onmouseleave = () => clearMenuHover();
                a.ontouchstart = null;
                a.onclick = null;
            } else {
                a.onmouseenter = null;
                a.onmouseleave = null;

                a.ontouchstart = () => setMenuHover(a);
                a.onclick = () => setMenuHover(a);
            }
        });
    }

    bindHoverHandlers();
    window.addEventListener('resize', bindHoverHandlers, { passive: true });

    // tap/click outside to clear hover + close menu
    document.addEventListener('click', (e) => {
        const t = e.target;
        if (!(t instanceof Node)) return;

        const clickedWhy = t.closest && t.closest('.whyCard');
        if (!clickedWhy) clearWhyHover();

        const clickedMenu = t.closest && t.closest('#mobileMenuPanel');
        const clickedMenuBtn = t.closest && t.closest('#menuBtn');

        if (isMenuOpen() && !clickedMenu && !clickedMenuBtn) {
            setMenuState(false);
            clearMenuHover();
        }
    });

    // optional: touch scroll clears why hover
    window.addEventListener('scroll', () => {
        if (!canRealHover()) clearWhyHover();
    }, { passive: true });
</script>

</body>
</html>