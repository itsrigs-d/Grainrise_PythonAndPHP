@php
    $role = request('role', 'retailer');

    $backRoute = match($role) {
        'warehouse' => route('signup.warehouse'),
        'supplier'  => route('signup.supplier'),
        default     => route('signup.retailer'),
    };

    $nextRoute = match($role) {
        'warehouse' => route('signup.warehouse.details'),
        'supplier'  => route('signup.supplier.details'),
        default     => route('signup.retailer.details'),
    };
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Verification</title>

    {{-- Application assets --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-[#f3f1ea] text-gray-900">

<main class="relative min-h-screen">

    <!-- Background Layer -->
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-[#fafbfa] via-[#f3f1ea] to-[#e8e3d6]"></div>

        <div class="absolute inset-0
            bg-[linear-gradient(to_right,rgba(0,0,0,0.028)_1px,transparent_1px),
                linear-gradient(to_bottom,rgba(0,0,0,0.028)_1px,transparent_1px)]
            bg-[size:40px_40px]">
        </div>

        <div class="absolute inset-0
            bg-[radial-gradient(60%_45%_at_50%_16%,rgba(255,255,255,.92)_0%,rgba(243,241,234,0)_72%)]">
        </div>

        <div class="absolute inset-0
            bg-[radial-gradient(120%_100%_at_50%_55%,rgba(0,0,0,0)_55%,rgba(0,0,0,0.06)_100%)]">
        </div>
    </div>

    <!-- Layout Container -->
    <div class="relative mx-auto flex min-h-screen items-center justify-center px-4 py-6 sm:px-8">

        <!-- Card -->
        <div class="relative w-full max-w-lg rounded-3xl
                    bg-white/90 ring-1 ring-black/10
                    shadow-[0_28px_60px_-36px_rgba(0,0,0,.35)]
                    backdrop-blur
                    px-5 sm:px-7 py-6 sm:py-8
                    flex flex-col
                    max-h-[calc(100vh-3rem)] sm:max-h-[calc(100vh-4rem)]">

            <!-- Back Button -->
            <a href="{{ $backRoute }}"
               class="group absolute left-4 top-4 sm:left-5 sm:top-5 z-20
                      inline-flex items-center gap-2 rounded-xl
                      bg-white/90 px-3 py-2 text-sm font-extrabold text-green-900
                      ring-1 ring-black/10 shadow-sm backdrop-blur
                      hover:bg-white hover:ring-black/15 hover:shadow-md
                      active:scale-[.98] transition
                      focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
               aria-label="Back to basic info">
                <span class="text-base leading-none">←</span>
                <span class="hidden sm:inline">Back</span>
            </a>

            <!-- Scrollable Content -->
            <div class="mt-12 flex-1 overflow-y-auto pr-1 sm:pr-2 [scrollbar-width:thin]">

                <!-- Header -->
                <div class="text-center">

                    <!-- Step badge -->
                    <div class="mx-auto inline-flex items-center gap-2 rounded-full
                                bg-white/70 px-4 py-2
                                ring-1 ring-black/5 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-green-900"></span>
                        <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                            Step 3 of 4 • Verification
                        </span>
                    </div>

                    <h1 class="mt-3 text-2xl sm:text-[30px]
                               font-extrabold tracking-tight text-green-900">
                        Verify Your Account
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        Enter the verification code sent to your email.
                    </p>

                    <!-- Timeline -->
                    <div class="mt-6 mx-auto w-full max-w-lg">
                        <div class="relative">
                            <div class="absolute top-5 left-3 right-3 h-0.5
                                        bg-gradient-to-r from-green-900/20 via-green-900/25 to-green-900/20"></div>

                            <div class="relative grid grid-cols-4 text-center gap-1">

                                <!-- Step 1 -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        ✓
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Choose<br class="sm:hidden"> Role
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        ✓
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Basic<br class="sm:hidden"> Info
                                    </div>
                                </div>

                                <!-- Step 3 active -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        3
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Verification
                                    </div>
                                    <div class="mt-0.5 text-[10px] font-semibold text-green-900/70">
                                        You are here
                                    </div>
                                </div>

                                <!-- Step 4 -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-white text-green-900
                                                ring-2 ring-green-900/25 font-extrabold text-sm">
                                        4
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Additional
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Verification Block -->
                <div class="mt-7 rounded-3xl bg-white/70 ring-1 ring-black/5 p-4 sm:p-5">

                    <div class="text-sm font-extrabold text-green-900">
                        Verification Code
                    </div>
                    <div class="mt-1 text-[12px] font-semibold text-green-900/70">
                        Code sent to: <span class="font-extrabold text-green-900">youremail@example.com</span>
                    </div>

                    <!-- OTP Inputs -->
                    <form class="mt-4" action="#" method="POST" novalidate>
                        @csrf

                        <div class="grid grid-cols-6 gap-2 sm:gap-3" id="otp">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 1" autocomplete="one-time-code">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 2">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 3">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 4">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 5">
                            <input inputmode="numeric" maxlength="1"
                                   class="input-field text-center font-extrabold text-lg"
                                   aria-label="Digit 6">
                        </div>

                        <!-- Actions -->
                        <a href="{{ $nextRoute }}"
                        class="mt-4 block w-full text-center rounded-2xl bg-green-900
                                py-3.25 text-white font-extrabold text-base sm:text-lg
                                shadow-[0_16px_35px_-18px_rgba(4,120,87,.65)]
                                hover:bg-green-800 transition
                                active:scale-[.99]
                                focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                            Verify & Continue
                        </a>

                        <div class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-3">
                            <button type="button"
                                    class="inline-flex items-center justify-center rounded-xl
                                           bg-white/90 px-4 py-2 text-sm font-extrabold text-green-900
                                           ring-1 ring-black/10 shadow-sm
                                           hover:bg-white hover:ring-black/15 hover:shadow-md
                                           active:scale-[.98] transition
                                           focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                                Resend Code
                            </button>

                            <div class="text-[12px] font-semibold text-green-900/70">
                                Resend available in <span class="font-extrabold text-green-900">00:45</span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Help -->
                <div class="mt-5 text-center text-[11px] text-green-900/55 font-semibold">
                    Check your spam folder if you do not receive the code within a minute.
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    (function () {
        const wrapper = document.getElementById('otp');
        if (!wrapper) return;

        const inputs = Array.from(wrapper.querySelectorAll('input'));

        // only allow 0-9 and auto-advance
        inputs.forEach((input, idx) => {
            input.addEventListener('input', (e) => {
                // keep digits only
                input.value = (input.value || '').replace(/\D/g, '').slice(0, 1);

                if (input.value && idx < inputs.length - 1) {
                    inputs[idx + 1].focus();
                    inputs[idx + 1].select?.();
                }
            });

            // backspace to previous when empty
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && idx > 0) {
                    inputs[idx - 1].focus();
                    inputs[idx - 1].value = '';
                }
                if (e.key === 'ArrowLeft' && idx > 0) inputs[idx - 1].focus();
                if (e.key === 'ArrowRight' && idx < inputs.length - 1) inputs[idx + 1].focus();
            });

            // paste full code (e.g., 6 digits) into any box
            input.addEventListener('paste', (e) => {
                const text = (e.clipboardData || window.clipboardData).getData('text') || '';
                const digits = text.replace(/\D/g, '').slice(0, inputs.length);
                if (!digits) return;

                e.preventDefault();
                digits.split('').forEach((d, i) => {
                    if (inputs[i]) inputs[i].value = d;
                });

                const nextIndex = Math.min(digits.length, inputs.length - 1);
                inputs[nextIndex].focus();
            });

            // select existing digit on focus
            input.addEventListener('focus', () => {
                input.select?.();
            });
        });

        // autofocus first digit
        inputs[0]?.focus();
    })();
</script>

</body>
</html>