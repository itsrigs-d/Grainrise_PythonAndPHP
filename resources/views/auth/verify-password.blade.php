<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Verification</title>

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
                    px-5 sm:px-7 py-6 sm:py-8
                    flex flex-col
                    max-h-[calc(100vh-3rem)] sm:max-h-[calc(100vh-4rem)]">

            <!-- Back Button (registration style) -->
            <a href="{{ route('password.request') }}"
               class="group absolute left-4 top-4 sm:left-5 sm:top-5 z-20
                      inline-flex items-center gap-2 rounded-xl
                      bg-white/90 px-3 py-2 text-sm font-extrabold text-green-900
                      ring-1 ring-black/10 shadow-sm backdrop-blur
                      hover:bg-white hover:ring-black/15 hover:shadow-md
                      active:scale-[.98] transition
                      focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
               aria-label="Back to forgot password">
                <span class="text-base leading-none">←</span>
                <span class="hidden sm:inline">Back</span>
            </a>

            <!-- Scrollable Content -->
            <div class="mt-12 flex-1 overflow-y-auto pr-1 sm:pr-2 [scrollbar-width:thin]">

                <!-- Header -->
                <div class="text-center">
                    <div class="mx-auto inline-flex items-center gap-2 rounded-full
                                bg-white/70 px-4 py-2
                                ring-1 ring-black/5 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-green-900"></span>
                        <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                            Verification
                        </span>
                    </div>

                    <h1 class="mt-3 text-2xl sm:text-[30px]
                               font-extrabold tracking-tight text-green-900">
                        Enter Verification Code
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        We sent a 6-digit code to your email.
                    </p>
                </div>

                <!-- Verification Block -->
                <div class="mt-7 rounded-3xl bg-white/70 ring-1 ring-black/5 p-4 sm:p-5">

                    <div class="text-sm font-extrabold text-green-900">
                        Verification Code
                    </div>

                    <div class="mt-1 text-[12px] font-semibold text-green-900/70">
                        Code sent to:
                        <span class="font-extrabold text-green-900">
                            {{ session('reset_email') ?? 'youremail@example.com' }}
                        </span>
                    </div>

                    <form class="mt-4" action="#" method="POST" novalidate>
                        @csrf

                        <!-- OTP Inputs -->
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

                        <!-- Hidden combined OTP -->
                        <input type="hidden" name="otp" id="otp_value">

                        <!-- CTA -->
                        <a href="{{ route('password.reset') }}"
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
                                Resend available in <span class="font-extrabold text-green-900" id="timer">00:45</span>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-5 text-center text-[11px] text-green-900/55 font-semibold">
                    If you don’t receive the email within a minute, check your spam folder.
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
        const hidden = document.getElementById('otp_value');

        function syncHidden() {
            if (!hidden) return;
            hidden.value = inputs.map(i => i.value || '').join('');
        }

        inputs.forEach((input, idx) => {
            input.addEventListener('input', () => {
                input.value = (input.value || '').replace(/\D/g, '').slice(0, 1);
                syncHidden();

                if (input.value && idx < inputs.length - 1) {
                    inputs[idx + 1].focus();
                    inputs[idx + 1].select?.();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && idx > 0) {
                    inputs[idx - 1].focus();
                    inputs[idx - 1].value = '';
                    syncHidden();
                }
                if (e.key === 'ArrowLeft' && idx > 0) inputs[idx - 1].focus();
                if (e.key === 'ArrowRight' && idx < inputs.length - 1) inputs[idx + 1].focus();
            });

            input.addEventListener('paste', (e) => {
                const text = (e.clipboardData || window.clipboardData).getData('text') || '';
                const digits = text.replace(/\D/g, '').slice(0, inputs.length);
                if (!digits) return;

                e.preventDefault();
                digits.split('').forEach((d, i) => {
                    if (inputs[i]) inputs[i].value = d;
                });
                syncHidden();

                const nextIndex = Math.min(digits.length, inputs.length - 1);
                inputs[nextIndex].focus();
            });

            input.addEventListener('focus', () => input.select?.());
        });

        inputs[0]?.focus();
    })();
</script>

</body>
</html>