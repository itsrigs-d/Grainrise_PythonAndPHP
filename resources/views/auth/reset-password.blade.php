<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Reset Password</title>

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

            <!-- Scrollable Content -->
            <div class="mt-2 flex-1 overflow-y-auto pr-1 sm:pr-2 [scrollbar-width:thin]">

                <!-- Header -->
                <div class="text-center">
                    <div class="mx-auto inline-flex items-center gap-2 rounded-full
                                bg-white/70 px-4 py-2
                                ring-1 ring-black/5 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-green-900"></span>
                        <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                            Change Password
                        </span>
                    </div>

                    <h1 class="mt-3 text-2xl sm:text-[30px]
                               font-extrabold tracking-tight text-green-900">
                        Create a New Password
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        Choose a strong password to secure your account.
                    </p>
                </div>

                <!-- Form Block -->
                <div class="mt-7 rounded-3xl bg-white/70 ring-1 ring-black/5 p-4 sm:p-5">
                    <form class="space-y-4" action="#" method="POST" novalidate>
                        @csrf

                        <!-- New Password -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                New Password
                            </label>

                            <div class="relative">
                                <input id="new_password"
                                       type="password"
                                       name="password"
                                       placeholder="Create a strong password"
                                       class="input-field pr-12"
                                       autocomplete="new-password"
                                       minlength="8"
                                       required>

                                <button type="button"
                                        class="absolute inset-y-0 right-3 inline-flex items-center
                                               text-green-900/60 hover:text-green-900
                                               transition focus:outline-none rounded-lg"
                                        aria-label="Show password"
                                        onclick="togglePassword('new_password', this)">
                                    <svg class="h-5 w-5 eye-open" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <svg class="h-5 w-5 eye-off hidden" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M3 3l18 18"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.58 10.58A3 3 0 0 0 12 15a3 3 0 0 0 2.42-4.42"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.88 5.08A10.94 10.94 0 0 1 12 5c6.5 0 10 7 10 7a18.54 18.54 0 0 1-3.17 4.23"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.11 6.11C3.73 7.8 2 12 2 12s3.5 7 10 7c1.07 0 2.09-.16 3.05-.44"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Indicators (UPDATED to: required only + suggestion) -->
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span id="len_badge"
                                      class="inline-flex items-center gap-1 rounded-full px-2 py-1
                                             bg-white/80 ring-1 ring-black/5 text-green-900/70">
                                    • Minimum 8 characters
                                </span>

                                <!-- Suggestion only (not required) -->
                                <span id="suggest_badge"
                                      class="inline-flex items-center gap-1 rounded-full px-2 py-1
                                             bg-white/70 ring-1 ring-black/5 text-green-900/55">
                                    ◦ Tip: 10–12 characters is more secure
                                </span>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Confirm New Password
                            </label>

                            <div class="relative">
                                <input id="confirm_password"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="Re-enter your password"
                                       class="input-field pr-12"
                                       autocomplete="new-password"
                                       minlength="8"
                                       required>

                                <button type="button"
                                        class="absolute inset-y-0 right-3 inline-flex items-center
                                               text-green-900/60 hover:text-green-900
                                               transition focus:outline-none rounded-lg"
                                        aria-label="Show confirm password"
                                        onclick="togglePassword('confirm_password', this)">
                                    <svg class="h-5 w-5 eye-open" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <svg class="h-5 w-5 eye-off hidden" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M3 3l18 18"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.58 10.58A3 3 0 0 0 12 15a3 3 0 0 0 2.42-4.42"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.88 5.08A10.94 10.94 0 0 1 12 5c6.5 0 10 7 10 7a18.54 18.54 0 0 1-3.17 4.23"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.11 6.11C3.73 7.8 2 12 2 12s3.5 7 10 7c1.07 0 2.09-.16 3.05-.44"
                                              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>

                            <div id="match_row" class="mt-2 text-[11px] font-semibold text-green-900/70">
                                • Passwords must match
                            </div>
                        </div>

                        <!-- CTA (UPDATED: no disabling / no click-guard) -->
                        <a id="reset_btn"
                           href="{{ route('login') }}"
                           class="mt-2 block w-full text-center rounded-2xl bg-green-900
                                  py-3.25 text-white font-extrabold text-base sm:text-lg
                                  shadow-[0_16px_35px_-18px_rgba(4,120,87,.65)]
                                  hover:bg-green-800 transition
                                  active:scale-[.99]
                                  focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                            Reset Password
                        </a>

                        <!-- Combined note + cancel link -->
                        <div class="mt-3 text-center text-[11px] font-semibold text-green-900/55 leading-relaxed">
                            <span class="block">
                                After resetting, you’ll be redirected to the Sign In page to log in with your new password.
                            </span>

                            <a href="{{ route('login') }}"
                               class="mt-1 inline-flex items-center justify-center
                                      text-green-900/70 hover:text-green-900
                                      underline underline-offset-4">
                                Cancel and return to Sign In
                            </a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

<script>
    function togglePassword(id, btn) {
        const input = document.getElementById(id);
        const isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';

        const openIcon = btn.querySelector('.eye-open');
        const offIcon  = btn.querySelector('.eye-off');
        if (openIcon && offIcon) {
            openIcon.classList.toggle('hidden', isHidden);
            offIcon.classList.toggle('hidden', !isHidden);
        }

        btn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
    }

    (function () {
        const pass = document.getElementById('new_password');
        const conf = document.getElementById('confirm_password');

        const lenBadge = document.getElementById('len_badge');
        const matchRow = document.getElementById('match_row');

        function setBadge(badgeEl, ok, okText, badText) {
            if (!badgeEl) return;

            badgeEl.classList.toggle('text-green-900/70', !ok);
            badgeEl.classList.toggle('text-green-900', ok);
            badgeEl.classList.toggle('ring-black/5', !ok);
            badgeEl.classList.toggle('ring-green-900/20', ok);
            badgeEl.classList.toggle('bg-white/80', !ok);
            badgeEl.classList.toggle('bg-emerald-50', ok);

            badgeEl.textContent = ok ? okText : badText;
        }

        function update() {
            const p = pass?.value ?? '';
            const c = conf?.value ?? '';

            // required rules only
            const lenOk   = p.length >= 8;
            const matchOk = p.length > 0 && c.length > 0 && p === c;

            // length badge
            setBadge(lenBadge, lenOk, '✓ Minimum 8 characters', '• Minimum 8 characters');

            // match indicator behavior
            if (matchRow) {
                const pHas = p.length > 0;
                const cHas = c.length > 0;

                if (!pHas && !cHas) {
                    matchRow.textContent = '• Passwords must match';
                    matchRow.className = 'mt-2 text-[11px] font-semibold text-green-900/70';
                } else if (pHas && cHas && matchOk) {
                    matchRow.textContent = '✓ Passwords match';
                    matchRow.className = 'mt-2 text-[11px] font-extrabold text-green-900';
                } else if (cHas) {
                    matchRow.textContent = '✕ Passwords do not match';
                    matchRow.className = 'mt-2 text-[11px] font-extrabold text-red-600';
                } else {
                    matchRow.textContent = '• Passwords must match';
                    matchRow.className = 'mt-2 text-[11px] font-semibold text-green-900/70';
                }
            }
        }

        pass?.addEventListener('input', update);
        conf?.addEventListener('input', update);

        update();
    })();
</script>

</body>
</html>