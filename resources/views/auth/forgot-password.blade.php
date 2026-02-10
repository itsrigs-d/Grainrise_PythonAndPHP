<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Forgot Password</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f3f1ea] text-gray-900 overflow-auto sm:h-screen sm:overflow-hidden">

<main class="relative min-h-screen overflow-hidden sm:h-screen">

    <!-- Background Layer -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-[#fafbfa] via-[#f3f1ea] to-[#e8e3d6]"></div>

        <div class="absolute inset-0
            bg-[linear-gradient(to_right,rgba(0,0,0,0.028)_1px,transparent_1px),
                linear-gradient(to_bottom,rgba(0,0,0,0.028)_1px,transparent_1px)]
            bg-[size:44px_44px]">
        </div>

        <div class="absolute inset-0
            bg-[radial-gradient(60%_45%_at_50%_16%,rgba(255,255,255,.92)_0%,rgba(243,241,234,0)_74%)]">
        </div>

        <div class="absolute inset-0
            bg-[radial-gradient(120%_100%_at_50%_55%,rgba(0,0,0,0)_55%,rgba(0,0,0,0.06)_100%)]">
        </div>
    </div>

    <!-- Layout Container -->
    <div class="relative mx-auto flex min-h-screen items-center justify-center px-4 py-6 sm:h-screen sm:px-8 sm:py-6">

        <!-- Card Container -->
        <div class="relative w-full max-w-md sm:max-w-lg rounded-[28px] sm:rounded-3xl
                    bg-white/90 ring-1 ring-black/10
                    shadow-[0_28px_60px_-36px_rgba(0,0,0,.35)]
                    backdrop-blur
                    px-5 sm:px-7 py-6 sm:py-8">

            <!-- Back Button -->
            <a href="{{ route('login') }}"
            class="group absolute left-4 top-4 sm:left-5 sm:top-5 z-20
                    inline-flex items-center gap-2 rounded-xl
                    bg-white/90 px-3 py-2 text-sm font-extrabold text-green-900
                    ring-1 ring-black/10 shadow-sm backdrop-blur
                    hover:bg-white hover:ring-black/15 hover:shadow-md
                    active:scale-[.98] transition
                    focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
            aria-label="Back to login">
                <span class="text-base leading-none">←</span>
                <span class="hidden sm:inline">Back</span>
            </a>

            <!-- Header -->
            <div class="pt-10 sm:pt-11 text-center">
                <!-- Micro badge (optional, keeps the style consistent) -->
                <div class="mx-auto inline-flex items-center gap-2 rounded-full
                            bg-white/70 px-4 py-2
                            ring-1 ring-black/5 shadow-sm backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-green-900"></span>
                    <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                        Password Recovery
                    </span>
                </div>

                <h1 class="mt-3 text-2xl sm:text-[30px] font-extrabold tracking-tight text-green-900 leading-tight">
                    Forgot your password?
                </h1>

                <p class="mt-2 mx-auto max-w-sm text-sm sm:text-[13px] font-semibold text-green-900/70 leading-relaxed">
                    Enter your email address. We’ll send a verification code to reset your password.
                </p>
            </div>

            <!-- Form -->
            <form class="mt-6 sm:mt-7 space-y-4" action="#" method="POST" novalidate>
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-sm font-extrabold text-green-900">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           placeholder="youremail@example.com"
                           autocomplete="email"
                           required
                           class="input-field">
                    <p class="text-[11px] font-semibold text-green-900/55">
                        Tip: Use the email you used to create your GrainRise account.
                    </p>
                </div>

                <a href="{{ route('password.verify') }}"
                   class="block w-full text-center rounded-2xl bg-green-900
                          py-3 sm:py-3.25 text-white font-extrabold text-base sm:text-lg
                          shadow-[0_16px_35px_-18px_rgba(4,120,87,.65)]
                          hover:bg-green-800 transition
                          active:scale-[.99]
                          focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                    Send Verification Code
                </a>

                <!-- Secondary action -->
                <div class="rounded-2xl bg-white/70 ring-1 ring-black/5 p-4">
                    <div class="text-[12px] font-extrabold text-green-900">
                        What happens next?
                    </div>
                    <ul class="mt-2 space-y-1 text-[12px] font-semibold text-green-900/70">
                        <li>• We’ll send a 6-digit code to your email.</li>
                        <li>• Enter the code on the next page.</li>
                        <li>• Create a new password and sign in.</li>
                    </ul>
                </div>
            </form>

            <!-- Footer -->
            <div class="mt-5 sm:mt-6">
                <div class="mx-auto h-px w-full bg-black/5"></div>

                <p class="mt-4 text-center text-xs sm:text-sm font-semibold text-green-900/60">
                    Remember your password?
                    <a href="{{ route('login') }}"
                       class="font-extrabold underline underline-offset-4
                              text-green-900 hover:text-green-800 active:text-green-950 transition">
                        Sign in
                    </a>
                </p>

                <div class="mt-3 text-center text-[11px] text-green-900/55 font-semibold">
                    If you don’t receive the email within a minute, check your spam folder.
                </div>
            </div>

        </div>
    </div>
</main>

</body>
</html>