<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Choose an Account</title>

    {{-- Application assets --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f3f1ea] text-gray-900">

<main class="relative min-h-screen overflow-hidden">

    <!-- Back button -->
    <a href="{{ route('login') }}"
       class="group absolute left-4 top-4 sm:left-8 sm:top-7 z-30
              inline-flex items-center gap-2
              rounded-xl bg-white/90 px-3 py-2
              text-xs sm:text-sm font-extrabold text-green-900
              ring-1 ring-black/10 shadow-md backdrop-blur
              hover:bg-white hover:ring-black/15 hover:shadow-lg
              active:scale-[.97] transition-all
              focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
       aria-label="Back to login">

        <span class="grid h-8 w-8 place-items-center rounded-lg
                     bg-green-50 ring-1 ring-green-900/10
                     group-hover:bg-green-100 transition">
            <svg class="h-4 w-4 -translate-x-[1px] text-green-900"
                 viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M15 18l-6-6 6-6"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>

        <span class="tracking-wide">Back to Login</span>
    </a>

    <!-- Background -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-[#f7f8f6] via-[#f3f1ea] to-[#ebe8dd]"></div>

        <div class="absolute inset-0
            bg-[linear-gradient(to_right,rgba(0,0,0,0.035)_1px,transparent_1px),
                linear-gradient(to_bottom,rgba(0,0,0,0.035)_1px,transparent_1px)]
            bg-[size:36px_36px]">
        </div>

        <div class="absolute inset-0
            bg-[radial-gradient(60%_45%_at_50%_18%,rgba(255,255,255,.95)_0%,rgba(243,241,234,0)_70%)]">
        </div>
    </div>

    <!-- Main content -->
    <section class="relative z-20 mx-auto w-full max-w-screen-xl
                    px-4 sm:px-10 lg:px-14
                    pt-20 sm:pt-24 lg:pt-16
                    pb-14 sm:pb-16">

        <!-- Page header -->
        <div class="mx-auto w-full max-w-4xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full bg-white/70 px-4 py-2
                        ring-1 ring-black/5 shadow-sm backdrop-blur">
                <span class="h-2 w-2 rounded-full bg-green-900"></span>
                <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                    Step 1 of 4 • Choose Role
                </span>
            </div>

            <h1 class="mt-4 text-3xl sm:text-5xl lg:text-5xl font-extrabold tracking-tight leading-[1.05]">
                <span class="text-green-900">Choose your</span>
                <span class="text-yellow-500"> account type</span>
            </h1>

            <p class="mt-4 mx-auto max-w-2xl text-sm sm:text-base font-semibold text-green-900/70 leading-relaxed">
                Select an account type to proceed with registration.
            </p>

            <!-- PROCESS TIMELINE -->
            <div class="mt-8 mx-auto max-w-4xl">
                <div class="relative">

                    <!-- Line -->
                    <div class="absolute top-5 left-0 right-0 h-0.5
                                bg-gradient-to-r from-green-900 via-green-900/40 to-green-900/20">
                    </div>

                    <!-- Steps -->
                    <div class="relative grid grid-cols-4 text-center">

                        <!-- Step 1: Active -->
                        <div class="flex flex-col items-center">
                            <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                        bg-green-900 text-white
                                        ring-4 ring-green-900/20 font-extrabold text-sm">
                                1
                            </div>
                            <div class="mt-2 text-xs sm:text-sm font-extrabold text-green-900">
                                Choose Role
                            </div>
                            <div class="mt-0.5 text-[11px] font-semibold text-green-900/70">
                                You are here
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center">
                            <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                        bg-white text-green-900
                                        ring-2 ring-green-900/25 font-extrabold text-sm">
                                2
                            </div>
                            <div class="mt-2 text-xs sm:text-sm font-extrabold text-green-900">
                                Basic Info
                            </div>
                            <div class="mt-0.5 text-[11px] font-semibold text-green-900/60">
                                Name, email, password
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col items-center">
                            <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                        bg-white text-green-900
                                        ring-2 ring-green-900/25 font-extrabold text-sm">
                                3
                            </div>
                            <div class="mt-2 text-xs sm:text-sm font-extrabold text-green-900">
                                Verification
                            </div>
                            <div class="mt-0.5 text-[11px] font-semibold text-green-900/60">
                                Email / phone check
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="flex flex-col items-center">
                            <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                        bg-white text-green-900
                                        ring-2 ring-green-900/25 font-extrabold text-sm">
                                4
                            </div>
                            <div class="mt-2 text-xs sm:text-sm font-extrabold text-green-900">
                                Additional Details
                            </div>
                            <div class="mt-0.5 text-[11px] font-semibold text-green-900/60">
                                Role-based info
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <!-- Account type cards -->
        <div class="mt-7 sm:mt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 sm:gap-9 lg:gap-10">

                <!-- Retailer -->
                <a href="{{ route('signup.retailer') }}"
                   class="group relative overflow-hidden rounded-[30px]
                          bg-white/90 ring-1 ring-black/10 shadow-lg
                          transition-all duration-300 ease-out
                          hover:-translate-y-1.5 hover:shadow-2xl hover:ring-black/15
                          active:scale-[.99]
                          focus:outline-none focus-visible:ring-4 focus-visible:ring-yellow-300/35">

                    <img src="{{ asset('images/retailer-bg.png') }}" alt="Retailer"
                         class="h-56 sm:h-64 lg:h-72 w-full object-cover
                                transition duration-500 group-hover:scale-[1.04]">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/35 to-transparent"></div>

                    <div class="absolute left-6 top-6">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1.5
                                     text-[11px] font-extrabold text-white ring-1 ring-white/20 backdrop-blur">
                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-300"></span>
                            Retailer
                        </span>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-7">
                        <div class="flex items-end justify-between gap-5">
                            <div>
                                <div class="text-white font-extrabold text-lg sm:text-xl">
                                    Retailer
                                </div>
                                <div class="mt-1.5 text-xs sm:text-sm font-semibold text-white/85">
                                    For ordering products, recording sales, and managing store inventory.
                                </div>

                                <div class="mt-3 inline-flex items-center gap-2 text-[11px] font-extrabold text-white/90">
                                    Continue to Basic Registration <span class="text-white/70">•</span> Step 2
                                </div>
                            </div>

                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/15
                                         ring-1 ring-white/20 backdrop-blur">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18l6-6-6-6"
                                          stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Warehouse Manager -->
                <a href="{{ route('signup.warehouse') }}"
                   class="group relative overflow-hidden rounded-[30px]
                          bg-white/90 ring-1 ring-black/10 shadow-lg
                          transition-all duration-300 ease-out
                          hover:-translate-y-1.5 hover:shadow-2xl hover:ring-black/15
                          active:scale-[.99]
                          focus:outline-none focus-visible:ring-4 focus-visible:ring-yellow-300/35">

                    <img src="{{ asset('images/manager-bg.png') }}" alt="Warehouse Manager"
                         class="h-56 sm:h-64 lg:h-72 w-full object-cover
                                transition duration-500 group-hover:scale-[1.04]">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/35 to-transparent"></div>

                    <div class="absolute left-6 top-6">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1.5
                                     text-[11px] font-extrabold text-white ring-1 ring-white/20 backdrop-blur">
                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-300"></span>
                            Warehouse Manager
                        </span>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-7">
                        <div class="flex items-end justify-between gap-5">
                            <div>
                                <div class="text-white font-extrabold text-lg sm:text-xl">
                                    Warehouse Manager
                                </div>
                                <div class="mt-1.5 text-xs sm:text-sm font-semibold text-white/85">
                                    For managing inventory, receiving, and warehouse operations.
                                </div>

                                <div class="mt-3 inline-flex items-center gap-2 text-[11px] font-extrabold text-white/90">
                                    Continue to Basic Registration <span class="text-white/70">•</span> Step 2
                                </div>
                            </div>

                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/15
                                         ring-1 ring-white/20 backdrop-blur">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18l6-6-6-6"
                                          stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

                <!-- Supplier -->
                <a href="{{ route('signup.supplier') }}"
                   class="group relative overflow-hidden rounded-[30px]
                          bg-white/90 ring-1 ring-black/10 shadow-lg
                          transition-all duration-300 ease-out
                          hover:-translate-y-1.5 hover:shadow-2xl hover:ring-black/15
                          active:scale-[.99]
                          focus:outline-none focus-visible:ring-4 focus-visible:ring-yellow-300/35">

                    <img src="{{ asset('images/supplier-bg.png') }}" alt="Supplier"
                         class="h-56 sm:h-64 lg:h-72 w-full object-cover
                                transition duration-500 group-hover:scale-[1.04]">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/35 to-transparent"></div>

                    <div class="absolute left-6 top-6">
                        <span class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1.5
                                     text-[11px] font-extrabold text-white ring-1 ring-white/20 backdrop-blur">
                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-300"></span>
                            Supplier
                        </span>
                    </div>

                    <div class="absolute inset-x-0 bottom-0 p-6 sm:p-7">
                        <div class="flex items-end justify-between gap-5">
                            <div>
                                <div class="text-white font-extrabold text-lg sm:text-xl">
                                    Supplier
                                </div>
                                <div class="mt-1.5 text-xs sm:text-sm font-semibold text-white/85">
                                    For managing product availability, fulfillment, and deliveries.
                                </div>

                                <div class="mt-3 inline-flex items-center gap-2 text-[11px] font-extrabold text-white/90">
                                    Continue to Basic Registration <span class="text-white/70">•</span> Step 2
                                </div>
                            </div>

                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/15
                                         ring-1 ring-white/20 backdrop-blur">
                                <svg class="h-5 w-5 text-white" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 18l6-6-6-6"
                                          stroke="currentColor" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </a>

            </div>
        </div>

        <!-- Minimal legal note -->
        <div class="mt-12 text-center text-[11px] sm:text-xs text-green-900/60 font-semibold">
            By continuing, you agree to GrainRise’s
            <a href="#" class="underline underline-offset-2 hover:text-green-900">Terms</a>
            and
            <a href="#" class="underline underline-offset-2 hover:text-green-900">Privacy Policy</a>.
        </div>

    </section>

</main>

</body>
</html>