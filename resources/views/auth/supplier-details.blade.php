<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Supplier • Additional Information</title>

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

            <!-- Scrollable content -->
            <div class="mt-2 flex-1 overflow-y-auto pr-1 sm:pr-2 [scrollbar-width:thin]">

                <!-- Header -->
                <div class="text-center">

                    <div class="mx-auto inline-flex items-center gap-2 rounded-full
                                bg-white/70 px-4 py-2
                                ring-1 ring-black/5 shadow-sm backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-green-900"></span>
                        <span class="text-xs sm:text-sm font-extrabold text-green-900/80 tracking-wide">
                            Step 4 of 4 • Additional Information
                        </span>
                    </div>

                    <h1 class="mt-3 text-2xl sm:text-[30px]
                               font-extrabold tracking-tight text-green-900">
                        Supplier Details
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        Provide supply, location, and availability details to complete registration.
                    </p>

                    <!-- Timeline -->
                    <div class="mt-6 mx-auto w-full max-w-lg">
                        <div class="relative">
                            <div class="absolute top-5 left-3 right-3 h-0.5
                                        bg-gradient-to-r from-green-900/20 via-green-900/25 to-green-900/20"></div>

                            <div class="relative grid grid-cols-4 text-center gap-1">
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white ring-4 ring-green-900/20
                                                font-extrabold text-sm">✓</div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900">
                                        Choose Role
                                    </div>
                                </div>

                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white ring-4 ring-green-900/20
                                                font-extrabold text-sm">✓</div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900">
                                        Basic Info
                                    </div>
                                </div>

                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white ring-4 ring-green-900/20
                                                font-extrabold text-sm">✓</div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900">
                                        Verification
                                    </div>
                                </div>

                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white ring-4 ring-green-900/20
                                                font-extrabold text-sm">4</div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900">
                                        Additional
                                    </div>
                                    <div class="mt-0.5 text-[10px] font-semibold text-green-900/70">
                                        You are here
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="mt-7 rounded-3xl bg-white/70 ring-1 ring-black/5 p-4 sm:p-5">
                    <form class="space-y-5" action="#" method="POST" novalidate>
                        @csrf

                        <!-- Rice Supply Details -->
                        <div class="flex items-center justify-between">
                            <div class="inline-flex items-center gap-2 rounded-full
                                        bg-white/80 px-3 py-1.5
                                        ring-1 ring-black/5 shadow-sm">
                                <span class="h-2 w-2 rounded-full bg-green-900"></span>
                                <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                    Rice Supply Details
                                </span>
                            </div>

                            <span class="text-[11px] font-semibold text-green-900/55">
                                Required fields are marked by context
                            </span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Rice Category
                            </label>
                            <input type="text"
                                   name="rice_category"
                                   placeholder="e.g., Premium, Regular Milled, Organic"
                                   class="input-field"
                                   required>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Rice Variety
                            </label>
                            <input type="text"
                                   name="rice_variety"
                                   placeholder="e.g., Dinorado, Sinandomeng, Jasmine"
                                   class="input-field"
                                   required>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Rice Grade <span class="text-green-900/55 font-semibold">(Optional)</span>
                            </label>
                            <input type="text"
                                   name="rice_grade"
                                   placeholder="e.g., Grade A, Commercial, Special"
                                   class="input-field">
                        </div>

                        <div class="h-px w-full bg-black/5"></div>

                        <!-- Location & Coverage -->
                        <div class="inline-flex items-center gap-2 rounded-full
                                    bg-white/80 px-3 py-1.5
                                    ring-1 ring-black/5 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-green-900"></span>
                            <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                Location & Coverage
                            </span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Warehouse / Store Address
                            </label>
                            <input type="text"
                                   name="supplier_address"
                                   placeholder="House/Unit No., Street, Barangay"
                                   class="input-field"
                                   required>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-sm font-extrabold text-green-900">
                                    Delivery City
                                </label>
                                <input type="text"
                                       name="delivery_city"
                                       placeholder="e.g., Quezon City"
                                       class="input-field"
                                       required>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-sm font-extrabold text-green-900">
                                    Delivery Province
                                </label>
                                <input type="text"
                                       name="delivery_province"
                                       placeholder="e.g., Metro Manila"
                                       class="input-field"
                                       required>
                            </div>
                        </div>

                        <div class="h-px w-full bg-black/5"></div>

                        <!-- Availability -->
                        <div class="inline-flex items-center gap-2 rounded-full
                                    bg-white/80 px-3 py-1.5
                                    ring-1 ring-black/5 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-green-900"></span>
                            <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                Availability
                            </span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Supply Availability
                            </label>
                            <select name="availability_type" class="input-field bg-white" required>
                                <option value="" selected>Select availability</option>
                                <option>Regular</option>
                                <option>Seasonal</option>
                            </select>
                        </div>

                        <div class="h-px w-full bg-black/5"></div>

                        <div class="inline-flex items-center gap-2 rounded-full
                                    bg-white/80 px-3 py-1.5
                                    ring-1 ring-black/5 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-green-900"></span>
                            <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                Official Contacts
                            </span>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="space-y-1.5">
                                <label class="block text-sm font-extrabold text-green-900">
                                    Official Contact Number
                                </label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 rounded-l-xl
                                                 bg-emerald-100 text-sm font-extrabold
                                                 text-green-900 ring-1 ring-black/10">
                                        +63
                                    </span>
                                    <input type="tel"
                                           name="official_contact"
                                           class="input-field rounded-l-none"
                                           placeholder="9XXXXXXXXX"
                                           inputmode="numeric"
                                           autocomplete="tel-national"
                                           pattern="^9\\d{9}$"
                                           aria-describedby="official_contact_help"
                                           required>
                                </div>
                                <p id="official_contact_help" class="text-[11px] font-semibold text-green-900/55">
                                    Format: 9XXXXXXXXX
                                </p>
                            </div>

                            <div class="space-y-1.5">
                                <label class="block text-sm font-extrabold text-green-900">
                                    Recovery Email Address
                                </label>
                                <input type="email"
                                       name="recovery_email"
                                       placeholder="e.g., admin@supplier.com"
                                       class="input-field"
                                       autocomplete="email"
                                       required>
                            </div>
                        </div>

                        <!-- Admin Confirmation -->
                        <div class="rounded-3xl bg-white/80 ring-1 ring-black/5 p-4 sm:p-5 shadow-sm">
                            <label class="flex items-start gap-3 cursor-pointer select-none">
                                <input type="checkbox"
                                       name="supplier_admin_confirm"
                                       class="mt-1 h-4 w-4 rounded border-black/20 text-green-900
                                              focus:ring-0 focus:outline-none"
                                       required>
                                <span>
                                    <span class="block text-sm font-extrabold text-green-900">
                                        I acknowledge that this account will manage supplier operations.
                                    </span>
                                    <span class="mt-0.5 block text-[12px] font-semibold text-green-900/70">
                                        This includes product availability and delivery coordination.
                                    </span>
                                </span>
                            </label>
                        </div>

                        <!-- CTA -->
                        <a href="{{ route('login') }}"
                           class="block w-full text-center rounded-2xl bg-green-900
                                  py-3.25 text-white font-extrabold text-base sm:text-lg
                                  shadow-[0_16px_35px_-18px_rgba(4,120,87,.65)]
                                  hover:bg-green-800 transition
                                  active:scale-[.99]
                                  focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                            Complete Registration
                        </a>

                        <!-- UPDATED: combined note + return link -->
                        <div class="mt-3 text-center text-[11px] font-semibold text-green-900/55 leading-relaxed">
                            <span class="block">
                                You can update these details later in your profile.
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

</body>
</html>