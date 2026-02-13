<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GrainRise | Retailer Dashboard</title>

    {{-- Tailwind v4 --}}
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- Chart.js (CDN) --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>

<body class="bg-[#f7f7f4] overflow-x-hidden text-gray-900 antialiased selection:bg-yellow-200/60 selection:text-emerald-950">

@php
    // Route matcher (stable even if URLs change)
    $active = fn($r) => request()->routeIs($r);

    // UI tokens
    $inactive  = 'text-white/80 hover:bg-emerald-950/28 hover:text-white hover:ring-1 hover:ring-white/10 hover:-translate-y-[1px]';
    $activeCls = 'bg-[#f2bd05]/92 text-[#173d22] ring-1 ring-black/10 shadow-sm';
    $link      = fn($isActive) => $isActive ? $activeCls : $inactive;

    $iconWrap = fn($isActive) => $isActive
        ? 'bg-black/10'
        : 'bg-white/10 group-hover:bg-emerald-950/25';

    $row = 'group flex items-center gap-3 rounded-2xl px-2.5 py-2 transition motion-reduce:transition-none';

    $card   = "relative overflow-hidden rounded-[22px] bg-white ring-1 ring-black/10 shadow-[0_10px_22px_rgba(0,0,0,.06)]";
    $panel  = "rounded-[22px] bg-white ring-1 ring-black/10 shadow-[0_10px_22px_rgba(0,0,0,.06)] overflow-hidden";
    $pad    = "p-5";
    $iconBox = "h-11 w-11 rounded-2xl grid place-items-center ring-1 ring-black/10";
    $cornerBlob = "absolute -top-7 -right-7 h-20 w-20 rounded-[28px] opacity-35";

    $btnPrimary = "inline-flex items-center justify-center rounded-2xl bg-[#11452a] text-white font-bold shadow-sm hover:bg-[#0b3520] transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35";
    $btnSecondary = "inline-flex items-center justify-center rounded-2xl bg-white/95 ring-1 ring-emerald-900/15 text-emerald-900 font-bold shadow-sm hover:ring-emerald-900/25 hover:bg-white transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35";
    $btnIcon = "h-9 w-9 grid place-items-center rounded-2xl bg-white/95 ring-1 ring-emerald-900/15 shadow-sm hover:shadow hover:ring-emerald-900/25 transition focus:outline-none focus:ring-4 focus:ring-yellow-300/35";

    $peso = fn($n) => '₱' . number_format($n, 0);

    // Demo data (replace with DB stats later)
    $kpis = [
        'revenue_today' => 92400,
        'transactions'  => 36,
        'aov'           => 2567,
        'items_sold'    => 118,
    ];

    $inventory = [
        'low_stock_count'  => 3,
        'out_stock_count'  => 1,
        'reorder_suggest'  => [
            ['name' => 'Jasmine Rice 25kg', 'sku' => 'JR-25', 'onhand' => 2, 'min' => 10],
            ['name' => 'Basmati Rice 10kg', 'sku' => 'BR-10', 'onhand' => 4, 'min' => 12],
            ['name' => 'White Rice 5kg',    'sku' => 'WR-05', 'onhand' => 6, 'min' => 15],
        ],
    ];

    $po = [
        'pending_po'    => 2,
        'incoming'      => 1,
        'last_pos'      => [
            ['ref' => 'PO-10241', 'status' => 'Sent', 'date' => 'Today'],
            ['ref' => 'PO-10235', 'status' => 'Approved', 'date' => 'Yesterday'],
            ['ref' => 'PO-10210', 'status' => 'Draft', 'date' => 'Feb 10'],
        ],
    ];

    $recentSales = [
        ['label' => 'Sale Completed — Jasmine Rice (25kg)', 'time' => '8 mins ago', 'badge' => 'Paid'],
        ['label' => 'Sale Completed — White Rice (5kg)',   'time' => '1 hr ago',   'badge' => 'Paid'],
        ['label' => 'Refund Processed — Basmati Rice',     'time' => 'Today',      'badge' => 'Refund'],
    ];

    $topProducts = [
        ['name' => 'Jasmine Rice — Premium', 'sales' => 92400, 'tag' => 'Top'],
        ['name' => 'Basmati Rice',           'sales' => 67200, 'tag' => 'Hot'],
        ['name' => 'White Rice — Regular',   'sales' => 52800, 'tag' => 'Rising'],
    ];

    // Store status (demo)
    $storeOpen = true;

    // Chart data (demo)
    $chart = [
        'sales_7d_labels' => ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
        'sales_7d_values' => [12000, 9800, 15400, 13250, 16800, 14200, 17600],

        'category_labels' => ['Jasmine', 'Basmati', 'White', 'Brown'],
        'category_values' => [42, 28, 22, 8],

        'inventory_labels' => ['Healthy', 'Low', 'Out'],
        'inventory_values' => [
            max(0, 20 - (($inventory['low_stock_count'] ?? 0) + ($inventory['out_stock_count'] ?? 0))),
            (int)($inventory['low_stock_count'] ?? 0),
            (int)($inventory['out_stock_count'] ?? 0),
        ],
    ];
@endphp

{{-- Chart data bridge (FIX: your JS expects window.__chartData) --}}
<script>
    window.__chartData = @json($chart);
</script>

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
            {{-- FIX: brand row alignment handles collapsed state via JS toggles --}}
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
                <div class="text-[10px] font-bold text-white/85 uppercase tracking-wider">Quick Reminder</div>
                <div class="mt-1 text-[11px] leading-relaxed text-white/70 font-normal">
                    Low stock items:
                    <span class="font-semibold text-white">{{ $inventory['low_stock_count'] }}</span>
                    • Out of stock:
                    <span class="font-semibold text-white">{{ $inventory['out_stock_count'] }}</span>
                    <span class="block mt-1 text-white/70">Tip: Create a PO for critical SKUs.</span>
                </div>
            </div>

            {{-- FIX: status row centers properly when collapsed by toggling justify-center + hiding label --}}
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

        {{-- HEADER (FIX: not scrollable) --}}
        {{-- We keep it FIXED and we adjust left offset on desktop depending on sidebar width via JS --}}
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
                            Retailer Dashboard
                        </h1>
                        <div class="hidden sm:block text-[11px] text-emerald-900/55 truncate font-normal">
                            Monitor sales, inventory, and purchase orders
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
                                   placeholder="Search sales, orders, products…"
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

                {{-- Right: actions + notifications + user menu --}}
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

                    <a href="{{ route('retailer.pos') }}"
                       class="hidden sm:inline-flex h-9 items-center gap-2 rounded-2xl
                              bg-[#11452a] text-white px-3.5 text-[13px] font-bold shadow-sm
                              hover:bg-[#0b3520] transition
                              focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 5v14M5 12h14"/>
                        </svg>
                        New Sale
                    </a>

                    <a href="{{ route('retailer.purchaseorders') }}"
                       class="hidden sm:inline-flex h-9 items-center gap-2 rounded-2xl
                              bg-white/95 ring-1 ring-emerald-900/15 px-3.5 text-[13px] font-bold text-emerald-900 shadow-sm
                              hover:ring-emerald-900/25 hover:bg-white transition
                              focus:outline-none focus:ring-4 focus:ring-yellow-300/35">
                        Create PO
                    </a>

                    <button class="{{ $btnIcon }} relative"
                            type="button"
                            aria-label="Notifications">
                        <img src="{{ asset('images/notification.png') }}" alt="" class="h-[18px] w-[18px] object-contain">
                        @if(($inventory['low_stock_count'] ?? 0) > 0)
                            <span class="absolute -top-1 -right-1 h-5 w-5 rounded-full bg-red-500 text-white
                                         text-[10px] font-bold grid place-items-center ring-2 ring-[#f2f7f3]"
                                  aria-label="{{ $inventory['low_stock_count'] }} notifications">
                                {{ $inventory['low_stock_count'] }}
                            </span>
                        @endif
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
                                        grid place-items-center text-white font-bold">
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
                                    {{ auth()->user()->email ?? 'Retailer Account' }}
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

                </div>
            </div>

            {{-- Mobile search bar (inside fixed header) --}}
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
                    <p class="mt-2 text-[11px] text-black/50">Tip: You can search orders, products, and transactions.</p>
                </div>
            </div>
        </header>

        {{-- Content --}}
        {{-- FIX: since header is fixed, we offset content with padding-top --}}
        <main id="mainContent" class="flex-1 pt-16 p-4 sm:p-6 bg-[#fbfbfa] overflow-x-hidden">
            <div class="mx-auto w-full max-w-[1400px]">

                {{-- Top summary --}}
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-emerald-900">Overview</h2>
                        <p class="mt-1 text-sm text-emerald-900/60 font-normal">
                            Quick snapshot of sales, inventory, and purchase orders.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-2 sm:justify-end">
                        <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                            <span class="h-2 w-2 rounded-full {{ $storeOpen ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                            <span class="text-xs font-semibold text-emerald-900/75">Store: {{ $storeOpen ? 'Open' : 'Closed' }}</span>
                        </div>

                        @if(($inventory['low_stock_count'] ?? 0) > 0)
                            <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                                <span class="h-2 w-2 rounded-full bg-yellow-400"></span>
                                <span class="text-xs font-semibold text-emerald-900/75">Low Stock: {{ $inventory['low_stock_count'] }}</span>
                            </div>
                        @endif

                        @if(($inventory['out_stock_count'] ?? 0) > 0)
                            <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                                <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                <span class="text-xs font-semibold text-emerald-900/75">Out of Stock: {{ $inventory['out_stock_count'] }}</span>
                            </div>
                        @endif

                        @if(($po['pending_po'] ?? 0) > 0)
                            <div class="inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 ring-1 ring-black/10">
                                <span class="h-2 w-2 rounded-full bg-lime-500"></span>
                                <span class="text-xs font-semibold text-emerald-900/75">Pending PO: {{ $po['pending_po'] }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- KPI cards --}}
                <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">
                    <div class="{{ $card }}">
                        <div class="{{ $cornerBlob }} bg-emerald-600/25"></div>
                        <div class="{{ $pad }}">
                            <div class="flex items-start justify-between gap-3">
                                <div class="{{ $iconBox }} bg-emerald-950/10">
                                    <img src="{{ asset('images/profits.png') }}" alt="" class="h-5 w-5 object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-emerald-900/70 rounded-full bg-emerald-50 px-2 py-1 ring-1 ring-emerald-900/10">Today</span>
                            </div>
                            <div class="mt-4 text-[12px] font-semibold text-emerald-900/60">Revenue</div>
                            <div class="mt-1 text-3xl font-black text-emerald-950">{{ $peso($kpis['revenue_today']) }}</div>
                            <div class="mt-1 text-xs text-emerald-900/60 font-normal">Gross sales today</div>
                        </div>
                    </div>

                    <div class="{{ $card }}">
                        <div class="{{ $cornerBlob }} bg-[#f2bd05]/35"></div>
                        <div class="{{ $pad }}">
                            <div class="flex items-start justify-between gap-3">
                                <div class="{{ $iconBox }} bg-[#f2bd05]/15">
                                    <img src="{{ asset('images/invoice.png') }}" alt="" class="h-5 w-5 object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-yellow-900/70 rounded-full bg-yellow-50 px-2 py-1 ring-1 ring-yellow-900/10">Today</span>
                            </div>
                            <div class="mt-4 text-[12px] font-semibold text-emerald-900/60">Transactions</div>
                            <div class="mt-1 text-3xl font-black text-emerald-950">{{ number_format($kpis['transactions']) }}</div>
                            <div class="mt-1 text-xs text-emerald-900/60 font-normal">Completed checkouts</div>
                        </div>
                    </div>

                    <div class="{{ $card }}">
                        <div class="{{ $cornerBlob }} bg-emerald-600/25"></div>
                        <div class="{{ $pad }}">
                            <div class="flex items-start justify-between gap-3">
                                <div class="{{ $iconBox }} bg-emerald-950/10">
                                    <img src="{{ asset('images/box1.png') }}" alt="" class="h-5 w-5 object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-emerald-900/70 rounded-full bg-emerald-50 px-2 py-1 ring-1 ring-emerald-900/10">Today</span>
                            </div>
                            <div class="mt-4 text-[12px] font-semibold text-emerald-900/60">Items Sold</div>
                            <div class="mt-1 text-3xl font-black text-emerald-950">{{ number_format($kpis['items_sold']) }}</div>
                            <div class="mt-1 text-xs text-emerald-900/60 font-normal">Total units sold</div>
                        </div>
                    </div>

                    <div class="{{ $card }}">
                        <div class="{{ $cornerBlob }} bg-[#f2bd05]/35"></div>
                        <div class="{{ $pad }}">
                            <div class="flex items-start justify-between gap-3">
                                <div class="{{ $iconBox }} bg-[#f2bd05]/15">
                                    <img src="{{ asset('images/growth.png') }}" alt="" class="h-5 w-5 object-contain">
                                </div>
                                <span class="text-[11px] font-bold text-yellow-900/70 rounded-full bg-yellow-50 px-2 py-1 ring-1 ring-yellow-900/10">Today</span>
                            </div>
                            <div class="mt-4 text-[12px] font-semibold text-emerald-900/60">Avg Order Value</div>
                            <div class="mt-1 text-3xl font-black text-emerald-950">{{ $peso($kpis['aov']) }}</div>
                            <div class="mt-1 text-xs text-emerald-900/60 font-normal">Revenue / transactions</div>
                        </div>
                    </div>
                </div>

                {{-- Charts --}}
                <div class="mt-6 grid grid-cols-1 xl:grid-cols-3 gap-4">
                    <div class="{{ $panel }} xl:col-span-2">
                        <div class="px-5 py-4 border-b border-black/5 flex items-center justify-between gap-3 bg-white">
                            <div class="flex items-center gap-2">
                                <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                    <img src="{{ asset('images/growth.png') }}" alt="" class="h-4 w-4 object-contain">
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-emerald-900">Sales Trend</div>
                                    <div class="text-xs text-emerald-900/60 font-normal">Last 7 days revenue</div>
                                </div>
                            </div>
                            <span class="text-[11px] font-semibold text-emerald-900/60">Demo data</span>
                        </div>
                        <div class="p-5">
                            <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">
                                <div class="h-[260px]">
                                    <canvas id="salesTrendChart" aria-label="Sales trend chart" role="img"></canvas>
                                </div>
                                <p class="mt-2 text-[11px] text-black/50">Use this to spot peak days and plan restocking.</p>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $panel }}">
                        <div class="px-5 py-4 border-b border-black/5 flex items-center justify-between gap-3 bg-white">
                            <div class="flex items-center gap-2">
                                <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                    <img src="{{ asset('images/top-brand.png') }}" alt="" class="h-4 w-4 object-contain">
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-emerald-900">Sales Mix</div>
                                    <div class="text-xs text-emerald-900/60 font-normal">Category share</div>
                                </div>
                            </div>
                            <span class="text-[11px] font-semibold text-emerald-900/60">Demo data</span>
                        </div>
                        <div class="p-5">
                            <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">
                                <div class="h-[260px]">
                                    <canvas id="categoryShareChart" aria-label="Category share chart" role="img"></canvas>
                                </div>
                                <p class="mt-2 text-[11px] text-black/50">Helps identify best-selling rice types.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 grid grid-cols-1 xl:grid-cols-3 gap-4">
                    <div class="{{ $panel }} xl:col-span-1">
                        <div class="px-5 py-4 border-b border-black/5 flex items-center justify-between gap-3 bg-white">
                            <div class="flex items-center gap-2">
                                <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                    <img src="{{ asset('images/pulse.png') }}" alt="" class="h-4 w-4 object-contain">
                                </span>
                                <div>
                                    <div class="text-sm font-bold text-emerald-900">Inventory Status</div>
                                    <div class="text-xs text-emerald-900/60 font-normal">Healthy vs low vs out</div>
                                </div>
                            </div>
                            <span class="text-[11px] font-semibold text-emerald-900/60">Demo data</span>
                        </div>
                        <div class="p-5">
                            <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">
                                <div class="h-[220px]">
                                    <canvas id="inventoryStatusChart" aria-label="Inventory status chart" role="img"></canvas>
                                </div>
                                <p class="mt-2 text-[11px] text-black/50">Matches your low/out counts above.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Inventory + Purchase Orders --}}
                    <div class="xl:col-span-2 grid grid-cols-1 xl:grid-cols-2 gap-4">
                        {{-- Inventory panel --}}
                        <div class="{{ $panel }}">
                            <div class="px-5 py-4 border-b border-black/5 flex items-center justify-between gap-3 bg-white">
                                <div class="flex items-center gap-2">
                                    <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                        <img src="{{ asset('images/pulse.png') }}" alt="" class="h-4 w-4 object-contain">
                                    </span>
                                    <div>
                                        <div class="text-sm font-bold text-emerald-900">Inventory Health</div>
                                        <div class="text-xs text-emerald-900/60 font-normal">Items that need attention</div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-yellow-50 px-3 py-1.5 ring-1 ring-yellow-900/10">
                                        <span class="h-2 w-2 rounded-full bg-yellow-400"></span>
                                        <span class="text-xs font-bold text-yellow-900/70">Low: {{ $inventory['low_stock_count'] }}</span>
                                    </span>
                                    <span class="inline-flex items-center gap-2 rounded-full bg-red-50 px-3 py-1.5 ring-1 ring-red-900/10">
                                        <span class="h-2 w-2 rounded-full bg-red-500"></span>
                                        <span class="text-xs font-bold text-red-700/80">Out: {{ $inventory['out_stock_count'] }}</span>
                                    </span>
                                </div>
                            </div>

                            <div class="p-5">
                                <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 p-4">
                                    <div class="flex items-center justify-between gap-3">
                                        <div class="text-[12px] font-bold text-emerald-900">Reorder Suggestions</div>
                                        <a href="{{ route('retailer.purchaseorders') }}" class="text-[11px] font-semibold text-emerald-900/70 hover:text-emerald-950">
                                            Manage →
                                        </a>
                                    </div>

                                    <div class="mt-2 space-y-2">
                                        @foreach($inventory['reorder_suggest'] as $it)
                                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 rounded-2xl bg-white ring-1 ring-black/10 px-3 py-3">
                                                <div class="min-w-0">
                                                    <div class="text-sm font-semibold text-emerald-900 truncate">{{ $it['name'] }}</div>
                                                    <div class="text-[11px] text-emerald-900/60 font-normal">
                                                        SKU: <span class="font-medium">{{ $it['sku'] }}</span>
                                                        • On hand: <span class="font-semibold">{{ $it['onhand'] }}</span>
                                                        • Min: <span class="font-semibold">{{ $it['min'] }}</span>
                                                    </div>
                                                </div>

                                                <a href="{{ route('retailer.purchaseorders') }}"
                                                   class="shrink-0 {{ $btnPrimary }} px-3 py-2 text-xs">
                                                    Create PO →
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <div class="rounded-2xl bg-white ring-1 ring-black/10 p-4">
                                        <div class="text-[12px] font-bold text-emerald-900">Restock Priority</div>
                                        <p class="mt-1 text-[11px] text-black/55">
                                            Focus first on Out-of-Stock SKUs, then Low Stock items with high sales.
                                        </p>
                                    </div>
                                    <div class="rounded-2xl bg-white ring-1 ring-black/10 p-4">
                                        <div class="text-[12px] font-bold text-emerald-900">Tip</div>
                                        <p class="mt-1 text-[11px] text-black/55">
                                            Use Purchase Orders to lock supplier quantities and expected delivery dates.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Purchase Orders panel --}}
                        <div class="{{ $panel }}">
                            <div class="px-5 py-4 border-b border-black/5 flex items-center justify-between gap-3 bg-white">
                                <div class="flex items-center gap-2">
                                    <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                        <img src="{{ asset('images/online-shopping.png') }}" alt="" class="h-4 w-4 object-contain">
                                    </span>
                                    <div>
                                        <div class="text-sm font-bold text-emerald-900">Purchase Orders</div>
                                        <div class="text-xs text-emerald-900/60 font-normal">Track your restocking flow</div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 text-xs font-semibold">
                                    <span class="inline-flex items-center rounded-full bg-black/5 ring-1 ring-black/10 px-3 py-1.5 text-emerald-900/70">
                                        Pending: {{ $po['pending_po'] }}
                                    </span>
                                    <span class="inline-flex items-center rounded-full bg-black/5 ring-1 ring-black/10 px-3 py-1.5 text-emerald-900/70">
                                        Incoming: {{ $po['incoming'] }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 space-y-2.5">
                                @foreach($po['last_pos'] as $rowPo)
                                    <a href="{{ route('retailer.purchaseorders') }}"
                                       class="block rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-4 py-3 hover:ring-black/20 transition">
                                        <div class="flex items-center justify-between gap-3">
                                            <div class="min-w-0">
                                                <div class="text-sm font-semibold text-emerald-900 truncate">{{ $rowPo['ref'] }}</div>
                                                <div class="text-xs text-emerald-900/60 font-normal">{{ $rowPo['date'] }}</div>
                                            </div>
                                            <span class="inline-flex items-center rounded-full bg-white ring-1 ring-black/10 px-3 py-1 text-[11px] font-semibold text-emerald-900/70">
                                                {{ $rowPo['status'] }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach

                                <div class="pt-2">
                                    <a href="{{ route('retailer.purchaseorders') }}"
                                       class="{{ $btnPrimary }} w-full px-4 py-2 text-sm">
                                        View Purchase Orders →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Activity + Top products --}}
                <div class="mt-6 grid grid-cols-1 xl:grid-cols-2 gap-4">
                    <div class="{{ $panel }}">
                        <div class="px-5 py-4 border-b border-black/5 flex items-center gap-2 bg-white">
                            <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                <img src="{{ asset('images/recently.png') }}" alt="" class="h-4 w-4 object-contain">
                            </span>
                            <div>
                                <div class="text-sm font-bold text-emerald-900">Recent Activity</div>
                                <div class="text-xs text-emerald-900/60 font-normal">Sales + inventory updates</div>
                            </div>
                        </div>

                        <div class="p-5 space-y-3">
                            @foreach($recentSales as $it)
                                <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-4 py-3 flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <div class="text-sm font-semibold text-emerald-900 truncate">{{ $it['label'] }}</div>
                                        <div class="text-xs text-emerald-900/60 font-normal">{{ $it['time'] }}</div>
                                    </div>
                                    <span class="shrink-0 inline-flex items-center rounded-full bg-white ring-1 ring-black/10 px-3 py-1 text-[11px] font-semibold text-emerald-900/70">
                                        {{ $it['badge'] }}
                                    </span>
                                </div>
                            @endforeach

                            <div class="pt-1">
                                <a href="{{ route('retailer.transactionhistory') }}"
                                   class="{{ $btnSecondary }} w-full px-4 py-2 text-sm">
                                    View Transaction History →
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="{{ $panel }}">
                        <div class="px-5 py-4 border-b border-black/5 flex items-center gap-2 bg-white">
                            <span class="h-9 w-9 rounded-2xl bg-emerald-950/10 ring-1 ring-black/10 grid place-items-center">
                                <img src="{{ asset('images/top-brand.png') }}" alt="" class="h-4 w-4 object-contain">
                            </span>
                            <div>
                                <div class="text-sm font-bold text-emerald-900">Top Products</div>
                                <div class="text-xs text-emerald-900/60 font-normal">Best sellers today</div>
                            </div>
                        </div>

                        <div class="p-5 space-y-3">
                            @foreach($topProducts as $i => $p)
                                <div class="rounded-2xl bg-[#f6f7f5] ring-1 ring-black/10 px-4 py-3 flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-3 min-w-0">
                                        <div class="h-9 w-9 rounded-2xl bg-emerald-950 text-white grid place-items-center font-bold">
                                            {{ $i + 1 }}
                                        </div>
                                        <div class="min-w-0">
                                            <div class="text-sm font-semibold text-emerald-900 truncate">{{ $p['name'] }}</div>
                                            <div class="text-xs text-emerald-900/60 font-normal">{{ $peso($p['sales']) }} total sales</div>
                                        </div>
                                    </div>
                                    <span class="text-xs font-semibold text-emerald-900/70">{{ $p['tag'] }}</span>
                                </div>
                            @endforeach

                            <div class="pt-1">
                                <a href="{{ route('retailer.orders') }}"
                                   class="{{ $btnPrimary }} w-full px-4 py-2 text-sm">
                                    View Sales Orders →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-center text-[11px] text-black/45">
                    © {{ date('Y') }} GrainRise • Retailer Panel
                </div>

            </div>
        </main>

    </div>
</div>

<script>
(function () {
    // Sidebar elements
    const sidebar = document.getElementById('retailerSidebar');
    const backdrop = document.getElementById('sbBackdrop');
    const pageShell = document.getElementById('pageShell');

    // Header + main (FIX: fixed header offset + left align)
    const header = document.getElementById('topHeader');
    const mainContent = document.getElementById('mainContent');

    // Sidebar controls
    const btnOpen = document.getElementById('sbOpen');
    const btnClose = document.getElementById('sbClose');
    const btnCollapse = document.getElementById('sbCollapse');
    const btnCollapseIcon = document.getElementById('sbCollapseIcon');

    // User menu controls
    const userBtn = document.getElementById('userMenuBtn');
    const userMenu = document.getElementById('userMenu');
    const userWrap = document.getElementById('userMenuWrap');

    // Search controls
    const mobileSearchBtn = document.getElementById('mobileSearchBtn');
    const mobileSearchBar = document.getElementById('mobileSearchBar');
    const mobileSearch = document.getElementById('mobileSearch');
    const desktopSearch = document.getElementById('globalSearch');

    // Brand/status rows (FIX centering when collapsed)
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

    // Keep keyboard navigation inside the mobile sidebar while open
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

    // Mobile open/close
    const setMobileOpen = (open) => {
        if (open) lastFocused = document.activeElement;

        sidebar.classList.toggle('-translate-x-full', !open);
        backdrop?.classList.toggle('hidden', !open);
        btnOpen?.setAttribute('aria-expanded', String(open));
        document.body.classList.toggle('overflow-hidden', open);

        if (open) {
            // focus first focusable
            sidebar.querySelector(focusableSelector)?.focus();
        } else {
            lastFocused?.focus?.();
        }
    };

    // Desktop padding (page)
    const setDesktopPadding = (collapsed) => {
        if (!pageShell) return;
        pageShell.classList.toggle('md:pl-[84px]', collapsed);
        pageShell.classList.toggle('md:pl-[272px]', !collapsed);
    };

    // Desktop header left offset (FIX: fixed header should align with content)
    const setHeaderLeft = (collapsed) => {
        if (!header) return;
        header.classList.toggle('md:left-[84px]', collapsed);
        header.classList.toggle('md:left-[272px]', !collapsed);
    };

    // Collapse/expand sidebar on desktop
    const setCollapsed = (collapsed) => {
        if (isMobile()) return;

        sidebar.classList.toggle('w-[84px]', collapsed);
        sidebar.classList.toggle('w-[272px]', !collapsed);

        // Hide labels
        document.querySelectorAll('.sidebarLabel').forEach(el => {
            el.classList.toggle('hidden', collapsed);
        });

        // Nav row alignment
        document.querySelectorAll('[data-sb-link]').forEach(a => {
            a.classList.toggle('justify-center', collapsed);
            a.classList.toggle('px-0', collapsed);
            a.classList.toggle('px-2.5', !collapsed);
            a.classList.toggle('gap-0', collapsed);
            a.classList.toggle('gap-3', !collapsed);
        });

        // FIX: ensure brand + status rows truly center when collapsed
        brandRow?.classList.toggle('justify-center', collapsed);
        brandRow?.classList.toggle('justify-start', !collapsed);

        statusRow?.classList.toggle('justify-center', collapsed);
        statusRow?.classList.toggle('gap-0', collapsed);
        statusRow?.classList.toggle('gap-3', !collapsed);

        brandIcon?.classList.toggle('!mx-auto', collapsed);
        statusDot?.classList.toggle('!mx-auto', collapsed);

        // Arrow icon swap
        if (btnCollapseIcon) {
            btnCollapseIcon.src = collapsed
                ? "{{ asset('images/right-arrow1.png') }}"
                : "{{ asset('images/left-arrow1.png') }}";

            // force repaint for some browsers
            btnCollapseIcon.style.display = 'none';
            requestAnimationFrame(() => { btnCollapseIcon.style.display = 'block'; });

            btnCollapseIcon.alt = collapsed ? "Expand" : "Collapse";
        }

        btnCollapse?.setAttribute('aria-expanded', String(!collapsed));
        localStorage.setItem(STORAGE_KEY, collapsed ? '1' : '0');

        setDesktopPadding(collapsed);
        setHeaderLeft(collapsed);
    };

    // User dropdown close
    const closeUserMenu = () => {
        if (!userMenu) return;
        userMenu.classList.add('hidden');
        userBtn?.setAttribute('aria-expanded', 'false');
    };

    // Mobile search (FIX: when open, increase main padding-top so content won't go under header)
    const setMobileSearchOpen = (open) => {
        if (!mobileSearchBar || !mainContent || !mobileSearchBtn) return;

        mobileSearchBar.classList.toggle('hidden', !open);
        mobileSearchBtn.setAttribute('aria-expanded', String(open));

        // header is fixed: base is pt-16; when search open add more top padding
        mainContent.classList.toggle('pt-16', !open);
        mainContent.classList.toggle('pt-[132px]', open);

        if (open) setTimeout(() => mobileSearch?.focus(), 0);
    };

    const toggleMobileSearch = () => {
        if (!mobileSearchBar) return;
        const willOpen = mobileSearchBar.classList.contains('hidden');
        setMobileSearchOpen(willOpen);
    };

    // Init state
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

    userBtn?.addEventListener('click', () => {
        if (!userMenu) return;
        const willOpen = userMenu.classList.contains('hidden');
        userMenu.classList.toggle('hidden', !willOpen);
        userBtn.setAttribute('aria-expanded', String(willOpen));
    });

    mobileSearchBtn?.addEventListener('click', toggleMobileSearch);

    // Ctrl+K focus
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

    // Escape behavior
    window.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;

        if (isMobile() && !sidebar.classList.contains('-translate-x-full')) {
            setMobileOpen(false);
        }
        if (userMenu && !userMenu.classList.contains('hidden')) closeUserMenu();
        if (mobileSearchBar && !mobileSearchBar.classList.contains('hidden')) {
            setMobileSearchOpen(false);
        }
    });

    // Resize behavior (FIX: keep layout consistent)
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
                setMobileSearchOpen(false); // mobile-only UI
                return;
            }

            sidebar.classList.add('-translate-x-full');
            backdrop?.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
            setMobileSearchOpen(false);
            // header on mobile should be full width
            header?.classList.add('left-0');
        }, 80);
    });

    // Outside click closes dropdown; and clicking a link on mobile closes sidebar
    document.addEventListener('click', (e) => {
        if (userWrap && !userWrap.contains(e.target)) closeUserMenu();

        if (isMobile()) {
            const a = e.target.closest('a');
            if (a && sidebar.contains(a)) setMobileOpen(false);
        }
    });

    // ===== Chart.js setup =====
    const chartData = window.__chartData || {};

    const gridColor = 'rgba(0,0,0,0.08)';
    const tickColor = 'rgba(0,0,0,0.55)';

    const salesLabels = chartData.sales_7d_labels ?? [];
    const salesValues = chartData.sales_7d_values ?? [];

    const categoryLabels = chartData.category_labels ?? [];
    const categoryValues = chartData.category_values ?? [];

    const invLabels = chartData.inventory_labels ?? [];
    const invValues = chartData.inventory_values ?? [];

    // Sales trend (line)
    const ctxSales = document.getElementById('salesTrendChart');
    if (ctxSales && salesLabels.length) {
        new Chart(ctxSales, {
            type: 'line',
            data: {
                labels: salesLabels,
                datasets: [{
                    label: 'Revenue',
                    data: salesValues,
                    tension: 0.35,
                    borderWidth: 2,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            label: (ctx) => ` ₱${Number(ctx.raw || 0).toLocaleString()}`
                        }
                    }
                },
                scales: {
                    x: { grid: { display: false }, ticks: { color: tickColor } },
                    y: {
                        grid: { color: gridColor },
                        ticks: {
                            color: tickColor,
                            callback: (v) => `₱${Number(v).toLocaleString()}`
                        }
                    }
                }
            }
        });
    }

    // Category mix (doughnut)
    const ctxCat = document.getElementById('categoryShareChart');
    if (ctxCat && categoryLabels.length) {
        new Chart(ctxCat, {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    label: 'Share',
                    data: categoryValues,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { boxWidth: 10 } }
                },
                cutout: '62%'
            }
        });
    }

    // Inventory status (bar)
    const ctxInv = document.getElementById('inventoryStatusChart');
    if (ctxInv && invLabels.length) {
        new Chart(ctxInv, {
            type: 'bar',
            data: {
                labels: invLabels,
                datasets: [{
                    label: 'Count',
                    data: invValues,
                    borderWidth: 1,
                    borderRadius: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: tickColor } },
                    y: { grid: { color: gridColor }, ticks: { color: tickColor, precision: 0 } }
                }
            }
        });
    }
})();
</script>

</body>
</html>