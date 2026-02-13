<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Supplier • Basic Information</title>

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

            <!-- Back button -->
            <a href="{{ route('signup.choose') }}"
               class="group absolute left-4 top-4 sm:left-5 sm:top-5 z-20
                      inline-flex items-center gap-2 rounded-xl
                      bg-white/90 px-3 py-2 text-sm font-extrabold text-green-900
                      ring-1 ring-black/10 shadow-sm backdrop-blur
                      hover:bg-white hover:ring-black/15 hover:shadow-md
                      active:scale-[.98] transition
                      focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
               aria-label="Back to choose role">
                <span class="text-base leading-none">←</span>
                <span class="hidden sm:inline">Back</span>
            </a>

            <!-- Scrollable content area -->
            <div class="mt-12 flex-1 overflow-y-auto pr-1 sm:pr-2
                        [scrollbar-width:thin]
                        max-h-full">

                <!-- Header -->
                <div class="pt-0 sm:pt-1 text-center">

                    <!-- Step badge -->
                    <div class="mx-auto inline-flex items-center gap-2 rounded-full
                                bg-white/70 px-4 py-2
                                ring-1 ring-black/5 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-green-900"></span>
                        <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                            Step 2 of 4 • Basic Information
                        </span>
                    </div>

                    <h1 class="mt-3 text-2xl sm:text-[30px]
                               font-extrabold tracking-tight text-green-900">
                        Create Account <span class="text-yellow-500">(Supplier)</span>
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        Enter your basic details to proceed.
                    </p>

                    <!-- Timeline -->
                    <div class="mt-6 mx-auto w-full max-w-lg">
                        <div class="relative">
                            <div class="absolute top-5 left-3 right-3 h-0.5
                                        bg-gradient-to-r from-green-900/20 via-green-900/25 to-green-900/20"></div>

                            <div class="relative grid grid-cols-4 text-center gap-1">
                                <!-- Step 1 (done) -->
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

                                <!-- Step 2 (active) -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        2
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Basic<br class="sm:hidden"> Info
                                    </div>
                                    <div class="mt-0.5 text-[10px] font-semibold text-green-900/70">
                                        You are here
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-white text-green-900
                                                ring-2 ring-green-900/25 font-extrabold text-sm">
                                        3
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Verification
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

                <!-- Form -->
                <form class="mt-6 sm:mt-7 space-y-4" action="#" method="POST" novalidate>
                    @csrf

                    <input type="hidden" name="role" value="supplier">

                    <!-- Account Type -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-extrabold text-green-900">
                            Account Type
                        </label>
                        <input type="text" value="Supplier" readonly
                               class="input-field bg-emerald-50/70 font-extrabold text-green-900 cursor-not-allowed">
                    </div>

                    <!-- Full Name -->
                    <div class="space-y-1.5">
                        <label class="block text-sm font-extrabold text-green-900">
                            Full Name
                        </label>

                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <input type="text" name="first_name" placeholder="First Name"
                                   class="input-field" autocomplete="given-name" required>
                            <input type="text" name="middle_initial" placeholder="M.I."
                                   class="input-field" maxlength="1" autocomplete="additional-name" aria-label="Middle Initial">
                            <input type="text" name="last_name" placeholder="Last Name"
                                   class="input-field" autocomplete="family-name" required>
                        </div>
                    </div>

                    <!-- Phone + Email -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Phone Number
                            </label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 rounded-l-xl
                                             bg-emerald-100 text-sm font-extrabold
                                             text-green-900 ring-1 ring-black/10">
                                    +63
                                </span>
                                <input type="tel"
                                       name="phone"
                                       class="input-field rounded-l-none"
                                       placeholder="9XXXXXXXXX"
                                       inputmode="numeric"
                                       autocomplete="tel-national"
                                       pattern="^9\d{9}$"
                                       aria-describedby="phone_help"
                                       required>
                            </div>
                            <p id="phone_help" class="text-[11px] font-semibold text-green-900/55">
                                Format: 9XXXXXXXXX
                            </p>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Email Address
                            </label>
                            <input type="email"
                                   name="email"
                                   placeholder="youremail@example.com"
                                   class="input-field"
                                   autocomplete="email"
                                   required>
                        </div>
                    </div>

                    <!-- Passwords -->
                    <div class="space-y-4">

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Password
                            </label>

                            <div class="relative">
                                <input id="password"
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
                                        onclick="togglePassword('password', this)">
                                    <!-- Eye (show) -->
                                    <svg class="h-5 w-5 eye-open" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <!-- Eye-off (HIDE) -->
                                    <svg class="h-5 w-5 eye-off hidden" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M3 3l18 18"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.58 10.58A3 3 0 0 0 12 15a3 3 0 0 0 2.42-4.42"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.88 5.08A10.94 10.94 0 0 1 12 5
                                                c6.5 0 10 7 10 7
                                                a18.54 18.54 0 0 1-3.17 4.23"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.11 6.11C3.73 7.8 2 12 2 12
                                                s3.5 7 10 7
                                                c1.07 0 2.09-.16 3.05-.44"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>

                            <!-- Requirement only (clean) -->
                            <div class="mt-2 flex flex-wrap items-center gap-2 text-[11px] font-semibold">
                                <span id="len_badge"
                                    class="inline-flex items-center gap-1 rounded-full px-2 py-1
                                            bg-white/80 ring-1 ring-black/5 text-green-900/70">
                                    • Minimum 8 characters
                                </span>
                            </div>

                            <!-- Strength Meter (HIDDEN until user types) -->
                            <div id="strength_wrap" class="mt-3 hidden">
                                <div class="flex items-center justify-between text-[11px] font-semibold">
                                    <span class="text-green-900/70">Password strength</span>
                                    <span id="strength_label" class="text-green-900/70 font-extrabold">—</span>
                                </div>

                                <div class="mt-1.5 h-2 w-full overflow-hidden rounded-full bg-black/10 ring-1 ring-black/5">
                                    <div id="strength_bar"
                                         class="h-full w-0 rounded-full bg-green-900/30 transition-[width] duration-200 ease-out">
                                    </div>
                                </div>

                                <div id="strength_hint" class="mt-1 text-[11px] font-semibold text-green-900/55">
                                    Tip: Use 10–12 characters with letters, numbers, and symbols.
                                </div>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Confirm Password
                            </label>

                            <div class="relative">
                                <input id="password_confirmation"
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
                                        onclick="togglePassword('password_confirmation', this)">
                                    <!-- Eye (show) -->
                                    <svg class="h-5 w-5 eye-open" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                    <!-- Eye-off (HIDE) -->
                                    <svg class="h-5 w-5 eye-off hidden" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                        <path d="M3 3l18 18"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M10.58 10.58A3 3 0 0 0 12 15a3 3 0 0 0 2.42-4.42"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.88 5.08A10.94 10.94 0 0 1 12 5
                                                c6.5 0 10 7 10 7
                                                a18.54 18.54 0 0 1-3.17 4.23"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.11 6.11C3.73 7.8 2 12 2 12
                                                s3.5 7 10 7
                                                c1.07 0 2.09-.16 3.05-.44"
                                            stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>

                            <div id="match_row"
                                class="mt-2 text-[11px] font-semibold text-green-900/70">
                                • Passwords must match
                            </div>
                        </div>
                        
                    </div>

                    <!-- Continue -->
                    <a href="{{ route('signup.verify', ['role' => 'supplier']) }}"
                       class="block w-full text-center rounded-2xl bg-green-900
                              py-3.25 text-white font-extrabold text-base sm:text-lg
                              shadow-[0_16px_35px_-18px_rgba(4,120,87,.65)]
                              hover:bg-green-800 transition
                              active:scale-[.99]
                              focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                        Continue to Verification
                    </a>
                </form>

                <!-- Redirect -->
                <p class="mt-4 text-center text-xs sm:text-sm font-semibold text-green-900/60">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="font-extrabold underline underline-offset-4
                              text-green-900 hover:text-green-800 active:text-green-950 transition">
                        Sign in
                    </a>
                </p>

                <!-- Minimal legal note -->
                <div class="mt-4 text-center text-[11px] text-green-900/55 font-semibold">
                    By continuing, you agree to GrainRise’s
                    <a href="#" class="underline underline-offset-2 hover:text-green-900">Terms</a>
                    and
                    <a href="#" class="underline underline-offset-2 hover:text-green-900">Privacy Policy</a>.
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

    // Password logic UPDATED to match your Reset Password page exactly
    (function () {
        const pass = document.getElementById('password');
        const conf = document.getElementById('password_confirmation');

        const lenBadge = document.getElementById('len_badge');
        const matchRow = document.getElementById('match_row');

        const strengthWrap  = document.getElementById('strength_wrap');
        const strengthBar   = document.getElementById('strength_bar');
        const strengthLabel = document.getElementById('strength_label');
        const strengthHint  = document.getElementById('strength_hint');

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

        function scorePassword(p) {
            let score = 0;
            const length = p.length;

            // character variety
            const hasLower = /[a-z]/.test(p);
            const hasUpper = /[A-Z]/.test(p);
            const hasNum   = /[0-9]/.test(p);
            const hasSym   = /[^A-Za-z0-9]/.test(p);

            // length contribution
            if (length >= 8) score += 1;
            if (length >= 10) score += 1;
            if (length >= 12) score += 1;

            const varietyCount = [hasLower, hasUpper, hasNum, hasSym].filter(Boolean).length;
            if (varietyCount >= 2) score += 1;
            if (varietyCount >= 3) score += 1;
            if (varietyCount === 4) score += 1;

            // penalty for obvious patterns
            if (/^(.)\1+$/.test(p)) score = Math.max(0, score - 2);
            if (/1234|abcd|qwerty|password/i.test(p)) score = Math.max(0, score - 2);

            score = Math.min(7, Math.max(0, score));

            // Keep “Too short” ONLY when length < 8
            if (length < 8) {
                return { label: 'Too short', pct: 15, intensity: 'low', hint: 'Must be at least 8 characters.' };
            }

            let label = 'Weak', pct = 35, intensity = 'low', hint = 'Try adding numbers or symbols.';
            if (score <= 2) {
                label = 'Weak';
                pct = 35;
                intensity = 'low';
                hint = 'Try 10–12 characters and mix letters/numbers.';
            } else if (score <= 4) {
                label = 'Fair';
                pct = 60;
                intensity = 'mid';
                hint = 'Good—make it longer and avoid common patterns.';
            } else if (score <= 6) {
                label = 'Good';
                pct = 80;
                intensity = 'high';
                hint = 'Nice—avoid common words and repeated characters.';
            } else {
                label = 'Strong';
                pct = 100;
                intensity = 'max';
                hint = 'Strong password.';
            }

            return { label, pct, intensity, hint };
        }

        function paintStrength(intensity) {
            if (!strengthBar) return;

            strengthBar.classList.remove('bg-green-900/20', 'bg-green-900/35', 'bg-green-900/55', 'bg-green-900/75', 'bg-green-900');

            if (intensity === 'low') strengthBar.classList.add('bg-green-900/25');
            else if (intensity === 'mid') strengthBar.classList.add('bg-green-900/45');
            else if (intensity === 'high') strengthBar.classList.add('bg-green-900/70');
            else if (intensity === 'max') strengthBar.classList.add('bg-green-900');
            else strengthBar.classList.add('bg-green-900/20');
        }

        function update() {
            const p = pass?.value ?? '';
            const c = conf?.value ?? '';

            // required rules only
            const lenOk   = p.length >= 8;
            const matchOk = p.length > 0 && c.length > 0 && p === c;

            // length badge (required)
            setBadge(lenBadge, lenOk, '✓ Minimum 8 characters', '• Minimum 8 characters');

            // Hide strength meter until user types
            if (strengthWrap) {
                strengthWrap.classList.toggle('hidden', p.length === 0);
            }

            // strength meter (guidance) - only update when visible/typing
            if (p.length > 0) {
                const s = scorePassword(p);
                if (strengthBar) strengthBar.style.width = `${s.pct}%`;
                if (strengthLabel) strengthLabel.textContent = s.label;
                if (strengthHint) strengthHint.textContent = s.hint;
                paintStrength(s.intensity);
            } else {
                // reset bar when empty
                if (strengthBar) strengthBar.style.width = '0%';
                if (strengthLabel) strengthLabel.textContent = '—';
                if (strengthHint) strengthHint.textContent = 'Tip: Use 10–12 characters with letters, numbers, and symbols.';
                paintStrength('muted');
            }

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