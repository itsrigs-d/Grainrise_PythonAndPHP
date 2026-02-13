{{-- resources/views/retailer/r-pos.blade.php --}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Retailer POS</title>

    {{-- Tailwind v4 --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-[#f7f7f4] overflow-x-hidden text-gray-900 antialiased selection:bg-yellow-200/60 selection:text-emerald-950">

@php
    // Route matcher (stable even if URLs change)
    $active = fn($r) => request()->routeIs($r);

    // UI tokens (same as r-dashboards)
    $inactive  = 'text-white/80 hover:bg-emerald-950/28 hover:text-white hover:ring-1 hover:ring-white/10 hover:-translate-y-[1px]';
    $activeCls = 'bg-[#f2bd05]/92 text-[#173d22] ring-1 ring-black/10 shadow-sm';
    $link      = fn($isActive) => $isActive ? $activeCls : $inactive;

    $iconWrap = fn($isActive) => $isActive
        ? 'bg-black/10'
        : 'bg-white/10 group-hover:bg-emerald-950/25';

    $row = 'group flex items-center gap-3 rounded-2xl px-2.5 py-2 transition motion-reduce:transition-none';

    $panel  = "rounded-[22px] bg-white ring-1 ring-black/10 shadow-[0_10px_22px_rgba(0,0,0,.06)] overflow-hidden";

    $btnPrimary = "inline-flex items-center justify-center rounded-2xl bg-[#11452a] text-white font-black shadow-sm hover:bg-[#0b3520] transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35 disabled:opacity-50 disabled:cursor-not-allowed";
    $btnSecondary = "inline-flex items-center justify-center rounded-2xl bg-white/95 ring-1 ring-emerald-900/15 text-emerald-900 font-bold shadow-sm hover:ring-emerald-900/25 hover:bg-white transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35";
    $btnIcon = "h-9 w-9 grid place-items-center rounded-2xl bg-white/95 ring-1 ring-emerald-900/15 shadow-sm hover:shadow hover:ring-emerald-900/25 transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35";

    $peso = fn($n) => '₱' . number_format($n, 0);

    // Demo store status (for indicator only)
    $storeOpen = true;

    // STATIC demo products (pure UI, no backend)
    $products = [
        ['id'=>1,'name'=>'Jasmine Rice','variant'=>'25kg bag','price'=>1850,'stock'=>250,'badge'=>'High Stock','badge_cls'=>'bg-emerald-50 text-emerald-900/75 ring-emerald-900/10','tag_dot'=>'bg-emerald-500'],
        ['id'=>2,'name'=>'White Rice','variant'=>'25kg bag','price'=>1850,'stock'=>20,'badge'=>'Low Stock','badge_cls'=>'bg-yellow-50 text-yellow-900/70 ring-yellow-900/10','tag_dot'=>'bg-yellow-400'],
        ['id'=>3,'name'=>'Red Rice — Premium','variant'=>'25kg bag','price'=>2250,'stock'=>0,'badge'=>'Out of Stock','badge_cls'=>'bg-red-50 text-red-700/80 ring-red-900/10','tag_dot'=>'bg-red-500'],
        ['id'=>4,'name'=>'Brown Rice','variant'=>'25kg bag','price'=>2100,'stock'=>12,'badge'=>'Low Stock','badge_cls'=>'bg-yellow-50 text-yellow-900/70 ring-yellow-900/10','tag_dot'=>'bg-yellow-400'],
        ['id'=>5,'name'=>'Basmati Rice','variant'=>'10kg bag','price'=>1350,'stock'=>55,'badge'=>'Healthy','badge_cls'=>'bg-emerald-50 text-emerald-900/75 ring-emerald-900/10','tag_dot'=>'bg-emerald-500'],
        ['id'=>6,'name'=>'White Rice — Regular','variant'=>'5kg bag','price'=>385,'stock'=>120,'badge'=>'High Stock','badge_cls'=>'bg-emerald-50 text-emerald-900/75 ring-emerald-900/10','tag_dot'=>'bg-emerald-500'],
        ['id'=>7,'name'=>'Dinorado Rice','variant'=>'25kg bag','price'=>2050,'stock'=>33,'badge'=>'Low Stock','badge_cls'=>'bg-yellow-50 text-yellow-900/70 ring-yellow-900/10','tag_dot'=>'bg-yellow-400'],
        ['id'=>8,'name'=>'Black Rice','variant'=>'5kg bag','price'=>520,'stock'=>9,'badge'=>'Low Stock','badge_cls'=>'bg-yellow-50 text-yellow-900/70 ring-yellow-900/10','tag_dot'=>'bg-yellow-400'],
    ];

    // STATIC status pills (UI only)
    $systemOnline = true;
    $stockSynced = true;
    $activeOrders = 5;
@endphp

{{-- Page shell --}}
<div id="pageShell"
     class="min-h-screen flex md:pl-[272px] transition-[padding] duration-200 bg-[#f7f7f4] overflow-x-hidden">

    {{-- Mobile backdrop (sidebar overlay) --}}
    <div id="sbBackdrop"
         class="fixed inset-0 z-40 hidden bg-black/35 backdrop-blur-sm md:hidden"
         aria-hidden="true"></div>

    {{-- Sidebar --}}
    <aside id="retailerSidebar"
           class="fixed top-0 left-0 z-50 h-screen w-[272px] shrink-0 text-white
                  bg-gradient-to-b from-[#155a33] via-[#11452a] to-[#0b3520]
                  ring-1 ring-black/10 shadow-[0_14px_34px_rgba(0,0,0,.18)]
                  transition-[width,transform] duration-200 ease-out -translate-x-full md:translate-x-0
                  flex flex-col"
           aria-label="Retailer sidebar navigation">

        {{-- Brand --}}
        <div class="px-4 py-4 border-b border-white/10 relative">
            <div id="sbBrandRow" class="flex items-center gap-3 justify-start">
                <div id="sbBrandIcon"
                     class="h-10 w-10 rounded-2xl bg-white/10 ring-1 ring-white/15 grid place-items-center mx-auto md:mx-0">
                    <img src="{{ asset('images/grainrise-logo.png') }}"
                         alt="GrainRise Logo"
                         class="h-5 w-5 object-contain">
                </div>

                <div class="sidebarLabel min-w-0">
                    <div class="text-[17px] font-black tracking-tight text-lime-200 truncate">
                        Grain<span class="text-yellow-300">Rise</span>
                    </div>
                    <div class="text-[11px] text-white/60 font-medium">Retailer Panel</div>
                </div>

                <button id="sbClose"
                        class="md:hidden absolute right-4 top-4 h-9 w-9 rounded-2xl bg-white/10 ring-1 ring-white/10
                               hover:bg-emerald-950/25 transition grid place-items-center
                               focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
                        type="button"
                        aria-label="Close sidebar">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="px-2.5 py-3 space-y-1 text-[13px] font-semibold overflow-y-auto">
            <div class="px-2.5 pb-1.5 text-[10px] uppercase tracking-[0.18em] text-white/45 sidebarLabel font-medium">
                Main
            </div>

            @php
                $nav = [
                    ['route' => 'retailer.dashboard',         'label' => 'Dashboard',            'icon' => 'dashboard.png'],
                    ['route' => 'retailer.pos',               'label' => 'Point of Sale',        'icon' => 'point-of-sale.png'],
                    ['route' => 'retailer.orders',            'label' => 'Sales Orders',         'icon' => 'sales-orders.png'],
                    ['route' => 'retailer.purchaseorders',    'label' => 'Purchase Orders',      'icon' => 'purchase-orders.png'],
                    ['route' => 'retailer.transactionhistory','label' => 'Transaction History',  'icon' => 'transaction-history.png'],
                ];

                $support = [
                    ['route' => 'retailer.messages', 'label' => 'Messages', 'icon' => 'message.png'],
                    ['route' => 'retailer.settings', 'label' => 'Settings', 'icon' => 'settings.png'],
                ];
            @endphp

            @foreach($nav as $item)
                @php $is = $active($item['route']); @endphp
                <a data-sb-link
                   href="{{ route($item['route']) }}"
                   class="{{ $row }} {{ $link($is) }}"
                   aria-current="{{ $is ? 'page' : 'false' }}"
                   title="{{ $item['label'] }}">
                    <span data-sb-icon class="h-9 w-9 rounded-2xl grid place-items-center ring-1 ring-white/5 {{ $iconWrap($is) }}">
                        <img src="{{ asset('images/'.$item['icon']) }}" alt="" class="h-[18px] w-[18px] object-contain">
                    </span>
                    <span class="sidebarLabel font-bold text-white/90">{{ $item['label'] }}</span>
                </a>
            @endforeach

            <div class="my-2.5 border-t border-white/10 sidebarLabel"></div>

            <div class="px-2.5 pb-1.5 text-[10px] uppercase tracking-[0.18em] text-white/45 sidebarLabel font-medium">
                Support
            </div>

            @foreach($support as $item)
                @php $is = $active($item['route']); @endphp
                <a data-sb-link
                   href="{{ route($item['route']) }}"
                   class="{{ $row }} {{ $link($is) }}"
                   aria-current="{{ $is ? 'page' : 'false' }}"
                   title="{{ $item['label'] }}">
                    <span data-sb-icon class="h-9 w-9 rounded-2xl grid place-items-center ring-1 ring-white/5 {{ $iconWrap($is) }}">
                        <img src="{{ asset('images/'.$item['icon']) }}" alt="" class="h-[18px] w-[18px] object-contain">
                    </span>
                    <span class="sidebarLabel font-bold text-white/90">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        {{-- Sidebar footer --}}
        <div class="mt-auto px-2.5 pb-3 space-y-2.5">
            <div class="rounded-2xl bg-white/10 ring-1 ring-white/10 p-3 sidebarLabel">
                <div class="text-[10px] font-bold text-white/85 uppercase tracking-wider">Quick Tip</div>
                <div class="mt-1 text-[11px] leading-relaxed text-white/70 font-normal">
                    Use POS to record walk-in sales quickly, then track them in Transaction History.
                </div>
            </div>

            <div id="sbStatusRow" class="rounded-2xl bg-black/20 ring-1 ring-white/10 px-3 py-2.5 flex items-center gap-3">
                <span id="sbStatusDot"
                      class="h-9 w-9 rounded-2xl {{ $storeOpen ? 'bg-emerald-500/20 ring-1 ring-emerald-400/20' : 'bg-red-500/15 ring-1 ring-red-400/20' }} grid place-items-center mx-auto md:mx-0"
                      aria-label="{{ $storeOpen ? 'Store open' : 'Store closed' }}">
                    ●
                </span>

                <div class="sidebarLabel">
                    <div class="text-[10px] text-white/60 uppercase tracking-wider font-medium">Store Status</div>
                    <div class="text-[12px] font-semibold text-white">{{ $storeOpen ? 'Open' : 'Closed' }}</div>
                </div>
            </div>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 min-w-0 flex flex-col overflow-x-hidden">

        {{-- HEADER --}}
        <header id="topHeader"
                class="fixed top-0 right-0 z-40 border-b border-black/10 bg-[#f2f7f3]/90 backdrop-blur
                       transition-[left] duration-200 left-0 md:left-[272px]">
            <div class="h-16 px-4 sm:px-6 flex items-center justify-between gap-3">

                {{-- Left: sidebar controls + page title --}}
                <div class="flex items-center gap-3 min-w-0">
                    <button id="sbOpen"
                            class="md:hidden h-9 w-9 rounded-2xl bg-white/95 ring-1 ring-black/10 shadow-sm
                                   hover:shadow hover:ring-black/20 transition grid place-items-center
                                   focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
                            type="button"
                            aria-label="Open sidebar"
                            aria-expanded="false">
                        <svg class="h-5 w-5 text-emerald-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>

                    <button id="sbCollapse"
                            class="hidden md:grid h-9 w-9 rounded-2xl bg-white/95 ring-1 ring-black/10 shadow-sm
                                   hover:shadow hover:ring-black/20 transition place-items-center
                                   focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
                            type="button"
                            aria-label="Collapse sidebar"
                            aria-expanded="true">
                        <img id="sbCollapseIcon"
                             src="{{ asset('images/left-arrow1.png') }}"
                             alt="Collapse"
                             class="block h-5 w-5 object-contain pointer-events-none select-none">
                    </button>

                    <div class="min-w-0">
                        <h1 class="text-[17px] sm:text-[18px] font-bold tracking-tight text-emerald-900 truncate">
                            Point of Sale
                        </h1>
                        <div class="hidden sm:block text-[11px] text-emerald-900/55 truncate font-normal">
                            Add items to cart and complete checkout
                        </div>
                    </div>
                </div>

                {{-- Center: desktop search --}}
                <div class="hidden lg:flex flex-1 justify-center">
                    <div class="w-full max-w-xl">
                        <label class="relative block">
                            <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-emerald-900/45">
                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M21 21l-4.35-4.35"/>
                                    <circle cx="11" cy="11" r="7"/>
                                </svg>
                            </span>

                            <input id="globalSearch"
                                   type="search"
                                   placeholder="Search products…"
                                   class="w-full h-10 rounded-2xl bg-white/95 ring-1 ring-black/10
                                          pl-10 pr-16 text-[13px] outline-none shadow-sm
                                          placeholder:text-black/35
                                          focus:ring-4 focus:ring-yellow-300/35">

                            <span class="pointer-events-none absolute inset-y-0 right-3 hidden xl:flex items-center">
                                <span class="inline-flex items-center rounded-xl bg-black/5 ring-1 ring-black/10
                                             px-2 py-1 text-[10px] font-semibold text-black/55">
                                    Ctrl K
                                </span>
                            </span>
                        </label>
                    </div>
                </div>

                {{-- Right: actions + notifications + user dropdown --}}
                <div class="flex items-center gap-2 sm:gap-3">
                    <button id="mobileSearchBtn"
                            class="lg:hidden {{ $btnIcon }}"
                            type="button"
                            aria-label="Open search"
                            aria-expanded="false">
                        <svg class="h-4 w-4 text-emerald-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M21 21l-4.35-4.35"/>
                            <circle cx="11" cy="11" r="7"/>
                        </svg>
                    </button>

                    <a href="{{ route('retailer.transactionhistory') }}"
                       class="hidden sm:inline-flex h-9 items-center gap-2 rounded-2xl
                              bg-white/95 ring-1 ring-emerald-900/15 px-3.5 text-[13px] font-bold text-emerald-900 shadow-sm
                              hover:ring-emerald-900/25 hover:bg-white transition
                              focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                        History
                    </a>

                    <button class="{{ $btnIcon }} relative" type="button" aria-label="Notifications">
                        <img src="{{ asset('images/notification.png') }}" alt="" class="h-[18px] w-[18px] object-contain">
                        <span class="absolute -top-1 -right-1 h-4 min-w-[16px] px-1 rounded-full bg-[#f2bd05] text-[10px] font-black text-[#173d22] grid place-items-center ring-1 ring-black/10">
                            3
                        </span>
                    </button>

                    {{-- User menu --}}
                    <div class="relative" id="userMenuWrap">
                        <button type="button"
                                id="userMenuBtn"
                                class="flex items-center gap-2 rounded-2xl bg-white/90 ring-1 ring-emerald-900/15 px-2 py-1.5 shadow-sm
                                       hover:ring-emerald-900/25 transition
                                       focus:outline-none focus:ring-4 focus:ring-yellow-300/35"
                                aria-label="User menu"
                                aria-expanded="false">
                            <div class="h-9 w-9 rounded-2xl bg-gradient-to-br from-emerald-800 to-emerald-950
                                        grid place-items-center text-white font-black">
                                {{ strtoupper(substr(auth()->user()->name ?? 'R', 0, 1)) }}
                            </div>
                            <div class="hidden sm:block leading-tight text-left">
                                <div class="text-[13px] font-bold text-emerald-900">
                                    {{ auth()->user()->name ?? 'Retailer User' }}
                                </div>
                                <div class="text-[11px] text-emerald-900/55 font-normal">Retailer Account</div>
                            </div>
                            <svg class="hidden sm:block h-4 w-4 text-emerald-900/45" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M6 9l6 6 6-6"/>
                            </svg>
                        </button>

                        <div id="userMenu"
                             class="hidden absolute right-0 mt-2 w-60 rounded-2xl bg-white ring-1 ring-black/10 shadow-lg overflow-hidden">
                            <div class="px-4 py-3 border-b border-black/5">
                                <div class="text-sm font-bold text-emerald-900">
                                    {{ auth()->user()->name ?? 'Retailer User' }}
                                </div>
                                <div class="text-[11px] text-black/55 font-normal">
                                    {{ auth()->user()->email ?? 'retailer@example.com' }}
                                </div>
                            </div>

                            <a href="#"
                               class="flex items-center gap-2 px-4 py-3 text-[13px] font-semibold text-emerald-900/80 hover:bg-emerald-950/5">
                                <span class="h-8 w-8 rounded-xl bg-emerald-950/5 ring-1 ring-black/5 grid place-items-center">
                                    <img src="{{ asset('images/settings1.png') }}" alt="" class="h-4 w-4 object-contain">
                                </span>
                                Account Settings
                            </a>

                            <a href="#"
                               class="flex items-center gap-2 px-4 py-3 text-[13px] font-semibold text-emerald-900/80 hover:bg-emerald-950/5">
                                <span class="h-8 w-8 rounded-xl bg-emerald-950/5 ring-1 ring-black/5 grid place-items-center">
                                    <img src="{{ asset('images/chat.png') }}" alt="" class="h-4 w-4 object-contain">
                                </span>
                                Messages
                            </a>

                            <div class="border-t border-black/5">
                                <form method="POST" action="#">
                                    @csrf
                                    <button type="submit"
                                            class="w-full flex items-center gap-2 px-4 py-3 text-[13px] font-semibold text-red-600 hover:bg-red-50">
                                        <span class="h-8 w-8 rounded-xl bg-red-50 ring-1 ring-red-100 grid place-items-center">
                                            <img src="{{ asset('images/logout.png') }}" alt="" class="h-4 w-4 object-contain">
                                        </span>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- /User menu --}}
                </div>
            </div>

            {{-- Mobile search bar (toggleable) --}}
            <div id="mobileSearchBar" class="hidden lg:hidden border-t border-black/10 bg-white/85 backdrop-blur">
                <div class="px-4 py-3">
                    <label class="relative block">
                        <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-emerald-900/45">
                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 21l-4.35-4.35"/>
                                <circle cx="11" cy="11" r="7"/>
                            </svg>
                        </span>
                        <input id="mobileSearch"
                               type="search"
                               placeholder="Search…"
                               class="w-full h-10 rounded-2xl bg-white ring-1 ring-black/10
                                      pl-10 pr-3 text-[13px] outline-none shadow-sm
                                      placeholder:text-black/35
                                      focus:ring-4 focus:ring-yellow-300/35">
                    </label>
                    <p class="mt-2 text-[11px] text-black/50">Tip: Type product name or variant.</p>
                </div>
            </div>
        </header>

        {{-- CONTENT --}}
        {{-- ✅ FIX: add top margin/padding like r-dashboard so the heading is not hidden by header --}}
        <main id="mainContent" class="flex-1 pt-[88px] p-4 sm:p-6 bg-[#fbfbfa] overflow-x-hidden">
            <div class="mx-auto w-full max-w-[1400px]">

                {{-- Top row --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-emerald-900">Rice Products</h2>
                        <p class="mt-1 text-sm text-emerald-900/60 font-normal">
                            Select items on the left, review your cart on the right. (Static UI)
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                            <span class="h-2 w-2 rounded-full {{ $systemOnline ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                            <span class="text-xs font-semibold text-emerald-900/75">All Systems Operational</span>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                            <span class="h-2 w-2 rounded-full {{ $stockSynced ? 'bg-lime-500' : 'bg-yellow-400' }}"></span>
                            <span class="text-xs font-semibold text-emerald-900/75">Stock Matches</span>
                        </div>

                        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                            <span class="h-2 w-2 rounded-full bg-emerald-700"></span>
                            <span class="text-xs font-semibold text-emerald-900/75">Active Orders: {{ $activeOrders }}</span>
                        </div>
                    </div>
                </div>

                {{-- POS layout --}}
                <div class="mt-6 grid grid-cols-1 xl:grid-cols-3 gap-4">

                    {{-- LEFT: Products --}}
                    <section class="{{ $panel }} xl:col-span-2">
                        <div class="px-5 py-4 border-b border-black/5 bg-white">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                                <div class="flex items-center gap-2">
                                    <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                        <svg class="h-4 w-4 text-emerald-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 7h18M6 7l2 14h8l2-14"/>
                                            <path d="M9 7V5a3 3 0 0 1 6 0v2"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <div class="text-sm font-bold text-emerald-900">Available Products</div>
                                        <div class="text-xs text-emerald-900/60 font-normal">Tap a card to add (static)</div>
                                    </div>
                                </div>

                                <div class="flex-1 sm:max-w-[420px]">
                                    <label class="relative block">
                                        <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-emerald-900/45">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M21 21l-4.35-4.35"/>
                                                <circle cx="11" cy="11" r="7"/>
                                            </svg>
                                        </span>
                                        <input type="search"
                                               placeholder="Search Products…"
                                               class="w-full h-10 rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10
                                                      pl-10 pr-3 text-[13px] outline-none
                                                      placeholder:text-black/35
                                                      focus:ring-4 focus:ring-yellow-300/35">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="p-5">
                            <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">

                                {{-- Filter chips --}}
                                <div class="flex flex-wrap items-center gap-2 mb-3">
                                    <button type="button" class="inline-flex items-center rounded-full px-3 py-1.5 text-[11px] font-black ring-1 ring-black/10 bg-white hover:bg-emerald-950/5 transition">All</button>
                                    <button type="button" class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-[11px] font-black ring-1 ring-black/10 bg-white hover:bg-emerald-950/5 transition">
                                        <span class="h-2 w-2 rounded-full bg-emerald-500"></span> High stock
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-[11px] font-black ring-1 ring-black/10 bg-white hover:bg-emerald-950/5 transition">
                                        <span class="h-2 w-2 rounded-full bg-yellow-400"></span> Low stock
                                    </button>
                                    <button type="button" class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-[11px] font-black ring-1 ring-black/10 bg-white hover:bg-emerald-950/5 transition">
                                        <span class="h-2 w-2 rounded-full bg-red-500"></span> Out of stock
                                    </button>
                                </div>

                                {{-- Product grid --}}
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                                    @foreach($products as $p)
                                        @php $isOut = ($p['stock'] ?? 0) <= 0; @endphp

                                        <button type="button"
                                                class="group text-left rounded-2xl bg-white ring-1 ring-black/10 shadow-sm
                                                       hover:ring-black/20 hover:-translate-y-[1px] transition
                                                       focus:outline-none focus:ring-4 focus:ring-yellow-300/35
                                                       {{ $isOut ? 'opacity-60' : '' }}">
                                            <div class="p-3">
                                                <div class="flex items-start justify-between gap-2">
                                                    <div class="h-10 w-10 rounded-2xl bg-emerald-950/8 ring-1 ring-black/10 grid place-items-center">
                                                        <svg class="h-5 w-5 text-emerald-950/80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                            <path d="M8 7c1.5-2 6.5-2 8 0"/>
                                                            <path d="M7 7l-2 5a10 10 0 0 0 0 6l2 3h10l2-3a10 10 0 0 0 0-6l-2-5"/>
                                                            <path d="M9 12h6"/>
                                                        </svg>
                                                    </div>

                                                    <span class="inline-flex items-center gap-1.5 rounded-full px-2 py-1 text-[10px] font-black ring-1 {{ $p['badge_cls'] }}">
                                                        <span class="h-1.5 w-1.5 rounded-full {{ $p['tag_dot'] }}"></span>
                                                        {{ $p['badge'] }}
                                                    </span>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="text-[12px] font-extrabold text-emerald-900 leading-snug line-clamp-2">
                                                        {{ $p['name'] }}
                                                    </div>
                                                    <div class="text-[10px] text-emerald-900/55 font-normal">
                                                        {{ $p['variant'] }} • {{ number_format($p['stock']) }} bags
                                                    </div>
                                                </div>

                                                <div class="mt-3 flex items-end justify-between gap-2">
                                                    <div class="text-[13px] font-black text-emerald-950">
                                                        {{ $peso($p['price']) }}
                                                    </div>
                                                    <div class="text-[10px] font-semibold text-emerald-900/55">
                                                        {{ $isOut ? 'Unavailable' : 'Tap to add' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    @endforeach
                                </div>

                                {{-- Visual pagination --}}
                                <div class="mt-4 flex items-center justify-center gap-2">
                                    <span class="h-2 w-2 rounded-full bg-emerald-900/25"></span>
                                    <span class="h-2 w-6 rounded-full bg-[#f2bd05]/90"></span>
                                    <span class="h-2 w-2 rounded-full bg-emerald-900/25"></span>
                                    <span class="h-2 w-2 rounded-full bg-emerald-900/25"></span>
                                </div>

                            </div>
                        </div>
                    </section>

                    {{-- RIGHT: Cart --}}
                    <aside class="{{ $panel }}">
                        <div class="px-5 py-4 border-b border-black/5 bg-white flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                    <svg class="h-4 w-4 text-emerald-950" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M6 6h15l-1.5 9h-12z"/>
                                        <path d="M6 6l-2-2H2"/>
                                        <circle cx="9" cy="20" r="1"/>
                                        <circle cx="18" cy="20" r="1"/>
                                    </svg>
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-emerald-900">Shopping Cart</div>
                                    <div class="text-xs text-emerald-900/60 font-normal">Checkout summary (static)</div>
                                </div>
                            </div>

                            <span class="inline-flex items-center justify-center min-w-[34px] h-8 rounded-2xl bg-emerald-900 text-white text-[12px] font-black px-2">
                                3
                            </span>
                        </div>

                        <div class="p-5">
                            {{-- Sample items (static) --}}
                            <div class="space-y-2">
                                <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-3 py-3">
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="min-w-0">
                                            <div class="text-[12px] font-extrabold text-emerald-900 truncate">Jasmine Rice</div>
                                            <div class="text-[11px] text-emerald-900/60 font-normal">25kg bag • ₱1,850 each</div>
                                            <div class="mt-1 text-[10px] text-black/45">Qty: <span class="font-black text-emerald-950">1</span></div>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <button class="h-9 w-9 rounded-2xl bg-white ring-1 ring-black/10 hover:ring-black/20 grid place-items-center focus:outline-none focus:ring-4 focus:ring-yellow-300/35" type="button">−</button>
                                            <div class="min-w-[26px] text-center text-[12px] font-black text-emerald-950">1</div>
                                            <button class="h-9 w-9 rounded-2xl bg-white ring-1 ring-black/10 hover:ring-black/20 grid place-items-center focus:outline-none focus:ring-4 focus:ring-yellow-300/35" type="button">+</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-3 py-3">
                                    <div class="flex items-start justify-between gap-3">
                                        <div class="min-w-0">
                                            <div class="text-[12px] font-extrabold text-emerald-900 truncate">White Rice</div>
                                            <div class="text-[11px] text-emerald-900/60 font-normal">25kg bag • ₱1,850 each</div>
                                            <div class="mt-1 text-[10px] text-black/45">Qty: <span class="font-black text-emerald-950">2</span></div>
                                        </div>
                                        <div class="flex items-center gap-2 shrink-0">
                                            <button class="h-9 w-9 rounded-2xl bg-white ring-1 ring-black/10 hover:ring-black/20 grid place-items-center focus:outline-none focus:ring-4 focus:ring-yellow-300/35" type="button">−</button>
                                            <div class="min-w-[26px] text-center text-[12px] font-black text-emerald-950">2</div>
                                            <button class="h-9 w-9 rounded-2xl bg-white ring-1 ring-black/10 hover:ring-black/20 grid place-items-center focus:outline-none focus:ring-4 focus:ring-yellow-300/35" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Totals (static) --}}
                            <div class="mt-4 rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">
                                <div class="flex items-center justify-between text-[12px] font-semibold text-emerald-900/70">
                                    <span>Subtotal:</span>
                                    <span>₱5,550</span>
                                </div>
                                <div class="mt-2 flex items-center justify-between text-[12px] font-semibold text-emerald-900/70">
                                    <span>Tax (12%):</span>
                                    <span>₱666</span>
                                </div>
                                <div class="mt-3 pt-3 border-t border-black/10 flex items-center justify-between">
                                    <span class="text-[13px] font-black text-emerald-900">Total:</span>
                                    <span class="text-[14px] font-black text-emerald-950">₱6,216</span>
                                </div>
                            </div>

                            {{-- Payment summary (static) --}}
                            <div class="mt-4 rounded-2xl bg-white ring-1 ring-black/10 p-4">
                                <div class="text-[12px] font-black text-emerald-900">Payment</div>

                                <div class="mt-3 grid grid-cols-2 gap-3">
                                    <div class="col-span-2">
                                        <div class="text-[11px] font-semibold text-black/55">Customer</div>
                                        <div class="mt-1 h-10 rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-3 grid items-center text-[13px] text-black/70">
                                            Walk-in Customer
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-[11px] font-semibold text-black/55">Method</div>
                                        <div class="mt-1 h-10 rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-3 grid items-center text-[13px] text-black/70">
                                            Cash
                                        </div>
                                    </div>

                                    <div>
                                        <div class="text-[11px] font-semibold text-black/55">Tendered</div>
                                        <div class="mt-1 h-10 rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-3 grid items-center text-[13px] text-black/70">
                                            ₱7,000
                                        </div>
                                    </div>

                                    <div class="col-span-2 flex items-center justify-between mt-1 text-[11px] font-semibold text-black/55">
                                        <span>Change</span>
                                        <span class="font-black text-emerald-950">₱784</span>
                                    </div>
                                </div>
                            </div>

                            <button class="mt-4 w-full {{ $btnPrimary }} px-4 py-3 text-sm" type="button">
                                Complete Sale
                            </button>

                            <div class="mt-2 flex items-center justify-between gap-2">
                                <button type="button" class="w-full {{ $btnSecondary }} px-4 py-3 text-[13px]">Save Draft</button>
                                <button type="button" class="w-full {{ $btnSecondary }} px-4 py-3 text-[13px]">Print Receipt</button>
                            </div>

                            <p class="mt-2 text-[11px] text-black/50">
                                Static POS UI only (no backend / database included).
                            </p>
                        </div>
                    </aside>
                </div>

                <div class="mt-8 text-center text-[11px] text-black/45">
                    © {{ date('Y') }} GrainRise • Retailer POS
                </div>
            </div>
        </main>

    </div>
</div>

<script>
(function () {
    // =========================
    // SIDEBAR + HEADER (same logic as r-dashboards)
    // - includes USER DROPDOWN
    // =========================

    const sidebar = document.getElementById('retailerSidebar');
    const backdrop = document.getElementById('sbBackdrop');
    const pageShell = document.getElementById('pageShell');

    const header = document.getElementById('topHeader');
    const mainContent = document.getElementById('mainContent');

    const btnOpen = document.getElementById('sbOpen');
    const btnClose = document.getElementById('sbClose');
    const btnCollapse = document.getElementById('sbCollapse');
    const btnCollapseIcon = document.getElementById('sbCollapseIcon');

    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearchBar = document.getElementById('mobileSearchBar');
    const mobileSearch = document.getElementById('mobileSearch');
    const desktopSearch = document.getElementById('globalSearch');

    // User dropdown
    const userBtn = document.getElementById('userMenuBtn');
    const userMenu = document.getElementById('userMenu');
    const userWrap = document.getElementById('userMenuWrap');

    const brandRow = document.getElementById('sbBrandRow');
    const statusRow = document.getElementById('sbStatusRow');
    const brandIcon = document.getElementById('sbBrandIcon');
    const statusDot = document.getElementById('sbStatusDot');

    if (!sidebar) return;

    const STORAGE_KEY = 'retailer_sidebar_collapsed';
    const isMobile = () => window.matchMedia('(max-width: 767px)').matches;

    const focusableSelector = [
        'a[href]',
        'button:not([disabled])',
        'input:not([disabled])',
        'select:not([disabled])',
        'textarea:not([disabled])',
        '[tabindex]:not([tabindex="-1"])'
    ].join(',');

    let lastFocused = null;

    const trapFocus = (container, e) => {
        if (e.key !== 'Tab') return;

        const focusables = Array.from(container.querySelectorAll(focusableSelector))
            .filter(el => el.offsetParent !== null);

        if (!focusables.length) return;

        const first = focusables[0];
        const last = focusables[focusables.length - 1];

        if (e.shiftKey && document.activeElement === first) {
            e.preventDefault();
            last.focus();
            return;
        }

        if (!e.shiftKey && document.activeElement === last) {
            e.preventDefault();
            first.focus();
        }
    };

    const setMobileOpen = (open) => {
        if (open) lastFocused = document.activeElement;

        sidebar.classList.toggle('-translate-x-full', !open);
        backdrop?.classList.toggle('hidden', !open);
        btnOpen?.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('overflow-hidden', open);

        if (open) {
            setTimeout(() => sidebar.querySelector(focusableSelector)?.focus(), 0);
        } else {
            lastFocused?.focus?.();
        }
    };

    const setDesktopPadding = (collapsed) => {
        if (!pageShell) return;
        pageShell.classList.toggle('md:pl-[84px]', collapsed);
        pageShell.classList.toggle('md:pl-[272px]', !collapsed);
    };

    const setHeaderLeft = (collapsed) => {
        if (!header) return;
        header.classList.toggle('md:left-[84px]', collapsed);
        header.classList.toggle('md:left-[272px]', !collapsed);
    };

    const setCollapsed = (collapsed) => {
        if (isMobile()) return;

        sidebar.classList.toggle('w-[84px]', collapsed);
        sidebar.classList.toggle('w-[272px]', !collapsed);

        document.querySelectorAll('.sidebarLabel').forEach(el => {
            el.classList.toggle('hidden', collapsed);
        });

        document.querySelectorAll('[data-sb-link]').forEach(a => {
            a.classList.toggle('justify-center', collapsed);
            a.classList.toggle('px-0', collapsed);
            a.classList.toggle('px-2.5', !collapsed);
            a.classList.toggle('gap-0', collapsed);
            a.classList.toggle('gap-3', !collapsed);
        });

        document.querySelectorAll('[data-sb-icon]').forEach(w => {
            w.classList.toggle('mx-auto', collapsed);
        });

        // center brand icon + status dot when collapsed
        brandRow?.classList.toggle('justify-center', collapsed);
        brandRow?.classList.toggle('justify-start', !collapsed);

        statusRow?.classList.toggle('justify-center', collapsed);
        statusRow?.classList.toggle('gap-0', collapsed);
        statusRow?.classList.toggle('gap-3', !collapsed);

        brandIcon?.classList.toggle('!mx-auto', collapsed);
        statusDot?.classList.toggle('!mx-auto', collapsed);

        if (btnCollapseIcon) {
            btnCollapseIcon.src = collapsed
                ? "{{ asset('images/right-arrow1.png') }}"
                : "{{ asset('images/left-arrow1.png') }}";

            btnCollapseIcon.style.display = 'none';
            requestAnimationFrame(() => { btnCollapseIcon.style.display = 'block'; });

            btnCollapseIcon.alt = collapsed ? "Expand" : "Collapse";
        }

        btnCollapse?.setAttribute('aria-expanded', String(!collapsed));
        localStorage.setItem(STORAGE_KEY, collapsed ? '1' : '0');

        setDesktopPadding(collapsed);
        setHeaderLeft(collapsed);
    };

    const closeUserMenu = () => {
        if (!userMenu) return;
        userMenu.classList.add('hidden');
        userBtn?.setAttribute('aria-expanded', 'false');
    };

    const setMobileSearchOpen = (open) => {
        if (!mobileSearchBar || !mainContent || !mobileSearchBtn) return;

        mobileSearchBar.classList.toggle('hidden', !open);
        mobileSearchBtn.setAttribute('aria-expanded', String(open));

        // ✅ match r-dashboard feel: keep extra spacing when mobile search is open
        mainContent.classList.toggle('pt-[88px]', !open);
        mainContent.classList.toggle('pt-[156px]', open);

        if (open) setTimeout(() => mobileSearch?.focus(), 0);
    };

    const toggleMobileSearch = () => {
        if (!mobileSearchBar) return;
        const willOpen = mobileSearchBar.classList.contains('hidden');
        setMobileSearchOpen(willOpen);
    };

    // init
    const initialCollapsed = localStorage.getItem(STORAGE_KEY) === '1';
    setCollapsed(initialCollapsed);
    setHeaderLeft(initialCollapsed);

    btnCollapse?.addEventListener('click', () => {
        const shouldCollapse = sidebar.classList.contains('w-[272px]');
        setCollapsed(shouldCollapse);
    });

    btnOpen?.addEventListener('click', () => setMobileOpen(true));
    btnClose?.addEventListener('click', () => setMobileOpen(false));
    backdrop?.addEventListener('click', () => setMobileOpen(false));

    sidebar.addEventListener('keydown', (e) => {
        if (!isMobile()) return;
        if (sidebar.classList.contains('-translate-x-full')) return;
        trapFocus(sidebar, e);
    });

    // user dropdown
    userBtn?.addEventListener('click', () => {
        if (!userMenu) return;
        const willOpen = userMenu.classList.contains('hidden');
        userMenu.classList.toggle('hidden', !willOpen);
        userBtn.setAttribute('aria-expanded', String(willOpen));
    });

    mobileSearchBtn?.addEventListener('click', toggleMobileSearch);

    // Ctrl/Cmd + K focuses search
    window.addEventListener('keydown', (e) => {
        const isCtrlK = (e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k';
        if (!isCtrlK) return;

        e.preventDefault();
        if (isMobile()) {
            if (mobileSearchBar?.classList.contains('hidden')) setMobileSearchOpen(true);
            mobileSearch?.focus();
            return;
        }
        desktopSearch?.focus();
    });

    // Escape closes overlays
    window.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;

        if (isMobile() && !sidebar.classList.contains('-translate-x-full')) setMobileOpen(false);
        if (userMenu && !userMenu.classList.contains('hidden')) closeUserMenu();
        if (mobileSearchBar && !mobileSearchBar.classList.contains('hidden')) setMobileSearchOpen(false);
    });

    let resizeTimer = null;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (!isMobile()) {
                backdrop?.classList.add('hidden');
                sidebar.classList.remove('-translate-x-full');
                document.body.classList.remove('overflow-hidden');

                const collapsed = localStorage.getItem(STORAGE_KEY) === '1';
                setCollapsed(collapsed);
                setMobileSearchOpen(false);
                return;
            }

            sidebar.classList.add('-translate-x-full');
            backdrop?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            setMobileSearchOpen(false);
            header?.classList.add('left-0');
        }, 80);
    });

    // click outside closes user menu; on mobile, clicking nav closes sidebar
    document.addEventListener('click', (e) => {
        if (userWrap && !userWrap.contains(e.target)) closeUserMenu();

        if (isMobile()) {
            const a = e.target.closest('a');
            if (a && sidebar.contains(a)) setMobileOpen(false);
        }
    });
})();
</script>

</body>
</html>