<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Sign In</title>

    {{-- Application assets --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-950 text-white">
@php
    $bgImage = asset('images/grain.png');
    $logo    = asset('images/grainrise-logo.png');
@endphp

<main class="relative min-h-screen overflow-hidden">

    <!-- Background image -->
    <div class="absolute inset-0">
        <img src="{{ $bgImage }}" alt="Background" class="h-full w-full object-cover">
    </div>

    <!-- Overlay layers -->
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-950/50 via-emerald-950/25 to-black/55"></div>
    <div class="absolute inset-0 bg-[radial-gradient(70%_70%_at_50%_22%,rgba(255,255,255,.26)_0%,rgba(0,0,0,.10)_60%,rgba(0,0,0,.24)_100%)]"></div>
    <div class="absolute inset-0 bg-white/5"></div>

    <!-- Back to landing page -->
    <a href="{{ url('/') }}"
       class="group absolute left-4 top-4 sm:left-8 sm:top-7 z-30 inline-flex items-center gap-2
              rounded-xl bg-white/10 px-3 py-2 text-xs sm:text-sm font-semibold text-white
              ring-1 ring-white/15 backdrop-blur-md shadow-lg
              hover:bg-white/15 hover:ring-white/25 hover:shadow-xl
              active:scale-[.98] transition-all
              focus:outline-none focus:ring-4 focus:ring-yellow-300/30"
       aria-label="Back to landing page">

        <span class="grid h-8 w-8 place-items-center rounded-lg
                     bg-white/10 ring-1 ring-white/15
                     group-hover:bg-white/15 transition">
            <svg class="h-4 w-4 -translate-x-[1px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="M15 18l-6-6 6-6"
                      stroke="currentColor" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>

        <span class="tracking-wide">Back</span>
    </a>

    <!-- Main content -->
    <section class="relative z-20 mx-auto max-w-7xl px-4 sm:px-10 pt-16 sm:pt-20 pb-10">
        <div class="flex flex-col lg:grid lg:grid-cols-2 gap-10 lg:gap-16 items-center min-h-[calc(100vh-240px)]">

            <!-- Brand information -->
            <div class="order-1 w-full">
                <div class="max-w-xl mx-auto lg:mx-0 text-center lg:text-left">

                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <div class="h-16 w-16 sm:h-20 sm:w-20 rounded-3xl bg-white/10 ring-1 ring-white/15
                                    backdrop-blur-md grid place-items-center shadow-2xl">
                            <img src="{{ $logo }}" alt="GrainRise Logo"
                                 class="h-12 w-12 sm:h-14 sm:w-14 object-contain"
                                 loading="eager" decoding="async">
                        </div>

                        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight leading-none drop-shadow">
                            <span class="text-lime-300">Grain</span><span class="text-yellow-300">Rise</span>
                        </h1>
                    </div>

                    <p class="mt-5 max-w-md mx-auto lg:mx-0 text-sm sm:text-base font-semibold
                              text-white/80 leading-relaxed drop-shadow">
                        Empowering rice businesses with smarter supply chain workflows, real-time tracking, and data-driven insights.
                    </p>

                    <!-- divider -->
                    <div class="mt-6 h-1 w-44 mx-auto lg:mx-0 rounded-full
                                bg-gradient-to-r from-lime-300/85 via-yellow-300/85 to-yellow-300/20"></div>

                    <!-- subtle credibility chips -->
                    <div class="mt-6 flex flex-wrap items-center justify-center lg:justify-start gap-2 text-xs font-semibold text-white/80">
                        <span class="rounded-full bg-white/10 ring-1 ring-white/15 px-3 py-1.5 backdrop-blur-md">Secure Access</span>
                        <span class="rounded-full bg-white/10 ring-1 ring-white/15 px-3 py-1.5 backdrop-blur-md">Role-based Accounts</span>
                        <span class="rounded-full bg-white/10 ring-1 ring-white/15 px-3 py-1.5 backdrop-blur-md">Operational Visibility</span>
                    </div>
                </div>
            </div>

            <!-- Sign-in container -->
            <div class="order-2 w-full">
                <div class="mx-auto w-full max-w-md rounded-3xl bg-white/90 text-gray-900
                            shadow-2xl ring-1 ring-white/25 backdrop-blur-xl p-7 sm:p-8">

                    <div class="text-center">
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-green-900 tracking-tight">
                            Sign In
                        </h2>
                        <p class="mt-2 text-xs sm:text-sm font-semibold text-yellow-500">
                            Enter your credentials to continue.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="mt-5 rounded-2xl bg-lime-50 px-4 py-3 text-sm text-lime-800 ring-1 ring-lime-200">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mt-5 rounded-2xl bg-red-50 px-4 py-3 text-sm text-red-700 ring-1 ring-red-200">
                            <p class="font-extrabold">Please check the following:</p>
                            <ul class="mt-2 list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Login form -->
                    <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4" id="loginForm">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-extrabold text-green-900">
                                Email Address
                            </label>

                            <input id="email"
                                name="email"
                                type="email"
                                value="{{ old('email') }}"
                                placeholder="youremail@example.com"
                                autocomplete="email"
                                required
                                class="mt-2 w-full rounded-2xl border border-emerald-200/70
                                        bg-white px-4 py-3 text-sm font-semibold
                                        shadow-sm
                                        focus:outline-none focus:ring-4 focus:ring-lime-300/25
                                        focus:border-emerald-300">
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-extrabold text-green-900">Password</label>
                            <div class="mt-2 relative">
                                <input id="password" name="password" type="password"
                                       placeholder="Enter your password" autocomplete="current-password" required
                                       class="w-full rounded-2xl border border-emerald-200/70 bg-white px-4 py-3 pr-12 text-sm font-semibold
                                              shadow-sm
                                              focus:outline-none focus:ring-4 focus:ring-lime-300/25 focus:border-emerald-300">

                                <button type="button" id="togglePwd"
                                        class="absolute inset-y-0 right-2 my-auto h-9 w-9 grid place-items-center rounded-xl
                                               text-emerald-950/70 hover:bg-emerald-50 transition
                                               focus:outline-none focus:ring-4 focus:ring-lime-300/25"
                                        aria-label="Toggle password visibility"
                                        aria-pressed="false"
                                        title="Show password">
                                    <!-- eye open (VISIBLE by default) -->
                                    <svg id="eyeOpen" class="h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.6-7 10-7 10 7 10 7-3.6 7-10 7S2 12 2 12Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <!-- eye off (HIDDEN by default) -->
                                    <svg id="eyeOff" class="hidden h-5 w-5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M10.58 10.58A3 3 0 0 0 12 15a3 3 0 0 0 2.42-4.42"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.38 6.38C4.02 7.85 2 12 2 12s3.6 7 10 7c1.62 0 3.06-.31 4.31-.83"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M14.12 9.88A3 3 0 0 0 12 9c-.36 0-.7.06-1.02.17"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M22 12s-1.78-3.44-4.95-5.61"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 3l18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="flex items-center justify-between pt-1">
                            <label class="inline-flex items-center gap-2 text-xs font-semibold text-emerald-950">
                                <input type="checkbox" name="remember"
                                       class="h-4 w-4 rounded border-emerald-300 focus:ring-lime-300/30"
                                       {{ old('remember') ? 'checked' : '' }}>
                                Remember me
                            </label>

                            <a href="{{ route('password.request') }}"
                               class="text-xs font-extrabold text-green-900 hover:text-green-800 active:text-green-950 transition underline underline-offset-4">
                                Forgot Password?
                            </a>
                        </div>

                        <button type="submit" id="loginBtn"
                                class="mt-2 w-full rounded-2xl bg-green-900 px-5 py-3 text-sm font-extrabold text-white
                                       shadow-lg shadow-green-900/20
                                       hover:bg-green-800 active:bg-green-950 transition
                                       focus:outline-none focus:ring-4 focus:ring-lime-300/25
                                       disabled:opacity-70 disabled:cursor-not-allowed">
                            <span id="btnText">Sign In</span>
                            <span id="btnLoading" class="hidden items-center gap-2">
                                <svg class="h-4 w-4 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                    <path d="M12 2a10 10 0 1 0 10 10"
                                          stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                                </svg>
                                Signing in...
                            </span>
                        </button>

                        <div class="pt-2">
                            <div class="h-px w-full bg-emerald-100"></div>
                            <p class="pt-3 text-center text-xs font-semibold text-gray-700">
                                Don’t have an account?
                                <a href="{{ route('signup.choose') }}"
                                   class="font-extrabold text-green-900 hover:text-green-800 active:text-green-950 transition underline underline-offset-4">
                                    Sign up
                                </a>
                            </p>
                        </div>
                    </form>
                </div>

                <!-- compliance note -->
                <p class="mx-auto mt-4 max-w-md text-center text-[11px] leading-relaxed text-white/65">
                    By signing in, you agree to our Terms and acknowledge our Privacy Policy.
                </p>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-20 pb-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-10">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-3
                        rounded-2xl bg-white/10 ring-1 ring-white/15 backdrop-blur-md
                        px-5 py-4 shadow-xl text-xs text-white/80">
                <span class="font-semibold">© {{ date('Y') }} GrainRise. All rights reserved.</span>

                <div class="flex items-center gap-3 font-semibold">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                    <span class="text-white/25">|</span>
                    <a href="#" class="hover:underline">Terms</a>
                    <span class="text-white/25">|</span>
                    <a href="#" class="hover:underline">Support</a>
                </div>
            </div>
        </div>
    </footer>
</main>

<script>
    // Password visibility toggle and submit loading state
    (function () {
        const pwd = document.getElementById('password');
        const toggle = document.getElementById('togglePwd');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeOff = document.getElementById('eyeOff');

        const form = document.getElementById('loginForm');
        const btnText = document.getElementById('btnText');
        const btnLoading = document.getElementById('btnLoading');
        const btn = document.getElementById('loginBtn');

        // Ensure initial state is: password hidden -> OPEN eye shown
        if (pwd && eyeOpen && eyeOff) {
            const isHidden = pwd.type === 'password';
            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeOff.classList.toggle('hidden', isHidden);
            toggle?.setAttribute('aria-pressed', String(!isHidden));
            toggle?.setAttribute('title', isHidden ? 'Show password' : 'Hide password');
        }

        toggle?.addEventListener('click', () => {
            const isHidden = pwd.type === 'password';

            // if currently hidden -> reveal (text) and show SLASH eye
            pwd.type = isHidden ? 'text' : 'password';

            eyeOpen.classList.toggle('hidden', isHidden);
            eyeOff.classList.toggle('hidden', !isHidden);   

            toggle.setAttribute('aria-pressed', String(isHidden)); 
            toggle.setAttribute('title', isHidden ? 'Hide password' : 'Show password');
        });

        form?.addEventListener('submit', () => {
            btn.disabled = true;
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            btnLoading.classList.add('inline-flex');
        });
    })();
</script>

</body>
</html>