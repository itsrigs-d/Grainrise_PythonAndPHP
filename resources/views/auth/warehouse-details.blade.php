<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Warehouse Manager • Additional Information</title>

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

            <!-- Scrollable content area -->
            <div class="flex-1 overflow-y-auto pr-1 sm:pr-2 [scrollbar-width:thin]">

                <!-- Header -->
                <div class="pt-2 text-center">

                    <!-- Step badge -->
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
                        Warehouse Manager Details
                    </h1>

                    <p class="mt-1.5 text-sm sm:text-[13px]
                              font-semibold text-green-900/70">
                        Provide warehouse and company details to complete registration.
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

                                <!-- Step 3 -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        ✓
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
                                        Verification
                                    </div>
                                </div>

                                <!-- Step 4 active -->
                                <div class="flex flex-col items-center">
                                    <div class="z-10 grid h-10 w-10 place-items-center rounded-full
                                                bg-green-900 text-white
                                                ring-4 ring-green-900/20 font-extrabold text-sm">
                                        4
                                    </div>
                                    <div class="mt-2 text-[10px] sm:text-xs font-extrabold text-green-900 leading-tight">
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

                <!-- Form Block -->
                <div class="mt-7 rounded-3xl bg-white/70 ring-1 ring-black/5 p-4 sm:p-5">

                    <form class="space-y-5" action="#" method="POST" novalidate>
                        @csrf

                        <!-- Role & Authority -->
                        <div class="flex items-center justify-between">
                            <div class="inline-flex items-center gap-2 rounded-full
                                        bg-white/80 px-3 py-1.5
                                        ring-1 ring-black/5 shadow-sm">
                                <span class="h-2 w-2 rounded-full bg-green-900"></span>
                                <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                    Role & Authority
                                </span>
                            </div>

                            <span class="text-[11px] font-semibold text-green-900/55">
                                Required fields are marked by context
                            </span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Position / Title
                            </label>
                            <select name="position_title" class="input-field bg-white" required>
                                <option value="" selected>Select one</option>
                                <option>Owner</option>
                                <option>Operations Head</option>
                                <option>Warehouse Manager</option>
                            </select>
                        </div>

                        <!-- Divider -->
                        <div class="h-px w-full bg-black/5"></div>

                        <!-- Organization & Warehouse -->
                        <div class="inline-flex items-center gap-2 rounded-full
                                    bg-white/80 px-3 py-1.5
                                    ring-1 ring-black/5 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-green-900"></span>
                            <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                Organization & Warehouse
                            </span>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Organization / Company Name
                            </label>
                            <input type="text"
                                   name="company_name"
                                   placeholder="e.g., GrainRise Warehousing Inc."
                                   class="input-field"
                                   autocomplete="organization"
                                   required>
                        </div>

                        <div class="space-y-1.5">
                            <label class="block text-sm font-extrabold text-green-900">
                                Warehouse Name
                            </label>
                            <input type="text"
                                   name="warehouse_name"
                                   placeholder="e.g., GrainRise Central Warehouse"
                                   class="input-field"
                                   required>
                        </div>

                        <!-- Divider -->
                        <div class="h-px w-full bg-black/5"></div>

                        <!-- Warehouse Address -->
                        <div class="inline-flex items-center gap-2 rounded-full
                                    bg-white/80 px-3 py-1.5
                                    ring-1 ring-black/5 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-green-900"></span>
                            <span class="text-xs font-extrabold text-green-900/85 tracking-wide">
                                Warehouse Address
                            </span>
                        </div>

                        <div class="rounded-3xl bg-white/80 ring-1 ring-black/5 p-4 sm:p-5 shadow-sm">
                            <div class="text-sm font-extrabold text-green-900">Location Details</div>
                            <div class="mt-0.5 text-[12px] font-semibold text-green-900/70">
                                This is the primary operational location for your warehouse.
                            </div>

                            <div class="mt-4 space-y-4">
                                <div class="space-y-1.5">
                                    <label class="block text-sm font-extrabold text-green-900">
                                        Address Line
                                    </label>
                                    <input type="text"
                                           name="warehouse_address_line"
                                           placeholder="House/Unit No., Street, Barangay"
                                           class="input-field"
                                           autocomplete="address-line1"
                                           required>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="block text-sm font-extrabold text-green-900">
                                            City / Municipality
                                        </label>
                                        <input type="text"
                                               name="warehouse_city"
                                               placeholder="e.g., Quezon City"
                                               class="input-field"
                                               autocomplete="address-level2"
                                               required>
                                    </div>

                                    <div class="space-y-1.5">
                                        <label class="block text-sm font-extrabold text-green-900">
                                            Province
                                        </label>
                                        <input type="text"
                                               name="warehouse_province"
                                               placeholder="e.g., Metro Manila"
                                               class="input-field"
                                               autocomplete="address-level1"
                                               required>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div class="space-y-1.5">
                                        <label class="block text-sm font-extrabold text-green-900">
                                            ZIP Code
                                        </label>
                                        <input type="text"
                                               name="warehouse_zip"
                                               placeholder="e.g., 1100"
                                               class="input-field"
                                               inputmode="numeric"
                                               autocomplete="postal-code"
                                               required>
                                    </div>

                                    <div class="space-y-1.5">
                                        <label class="block text-sm font-extrabold text-green-900">
                                            Landmark <span class="text-green-900/55 font-semibold">(Optional)</span>
                                        </label>
                                        <input type="text"
                                               name="warehouse_landmark"
                                               placeholder="e.g., Near highway entrance"
                                               class="input-field">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="h-px w-full bg-black/5"></div>

                        <!-- Official Contacts -->
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
                                       placeholder="e.g., admin@company.com"
                                       class="input-field"
                                       autocomplete="email"
                                       required>
                            </div>
                        </div>

                        <!-- Super Admin Confirmation -->
                        <div class="rounded-3xl bg-white/80 ring-1 ring-black/5 p-4 sm:p-5 shadow-sm">
                            <label class="flex items-start gap-3 cursor-pointer select-none">
                                <input id="super_admin_confirm"
                                       type="checkbox"
                                       class="mt-1 h-4 w-4 rounded border-black/20 text-green-900
                                              focus:ring-0 focus:outline-none"
                                       required>
                                <span>
                                    <span class="block text-sm font-extrabold text-green-900">
                                        I acknowledge that this account will manage all internal users.
                                    </span>
                                    <span class="mt-0.5 block text-[12px] font-semibold text-green-900/70">
                                        This includes managing staff access and warehouse-related operations.
                                    </span>
                                </span>
                            </label>
                        </div>

                        <!-- CTA (UI-only: redirect to login to test) -->
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