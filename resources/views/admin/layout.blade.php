<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — POS Server</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    @livewireStyles
    @stack('styles')
</head>
<body>
<div class="admin-wrapper">

    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="sidebar-logo-icon">🏪</div>
            <div>
                <div class="sidebar-logo-name">POS Server</div>
                <div class="sidebar-logo-db">{{ env('DB_DATABASE') }}</div>
            </div>
        </div>

        <nav class="nav-section">
            <div class="nav-section-label">Main</div>
            <a href="{{ route('admin.index') }}" class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
                Dashboard
            </a>
            <a href="{{ route('admin.order.index') }}" class="nav-item {{ request()->routeIs('admin.order.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h12v2H2zm0 4h12v2H2zm0 4h8v2H2z"/></svg>
                Orders
            </a>
            <a href="{{ route('admin.receipt.index') }}" class="nav-item {{ request()->routeIs('admin.receipt.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M3 1h10v14l-2-1.5-2 1.5-2-1.5-2 1.5L3 15V1zm2 3h6v1H5zm0 3h6v1H5zm0 3h4v1H5z"/></svg>
                Receipts
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 12L5 5l3 4 2-3 5 6H1z"/></svg>
                Sells
            </a>
        </nav>

        <nav class="nav-section">
            <div class="nav-section-label">Catalog</div>
            <a href="{{ route('admin.item.index') }}" class="nav-item {{ request()->routeIs('admin.item.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1L1 5v6l7 4 7-4V5L8 1zM8 3l5 3-5 3-5-3 5-3zm-6 5.5l5 2.87v3L2 11.5V8.5zm7 5.87V10.5l5-2.87v3L9 14.37z"/></svg>
                Items
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 11h12v2H2zm0-4h12v2H2zm0-4h12v2H2z"/></svg>
                Stock
            </a>
            <a href="{{ route('admin.category.index') }}" class="nav-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 3h6v3H1zm8 0h6v3H9zM1 9h6v3H1zm8 0h6v3H9z"/></svg>
                Categories
            </a>
            <a href="{{ route('admin.partner.index') }}" class="nav-item {{ request()->routeIs('admin.partner.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><circle cx="6" cy="5" r="3"/><path d="M1 14c0-3 2-5 5-5h2c3 0 5 2 5 5"/></svg>
                Partners
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a7 7 0 100 14A7 7 0 008 1zm.5 10.5h-1v-1h1v1zm0-3h-1V4.5h1V8.5z"/></svg>
                Prices
            </a>
            <a href="{{ route('admin.shop.index') }}" class="nav-item {{ request()->routeIs('admin.shop.*') ? 'active' : '' }}">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 6l7-5 7 5v8H1V6zm2 1v6h10V7L8 3 3 7zm3 2h4v4H6V9z"/></svg>
                Shops
            </a>
        </nav>

        <nav class="nav-section">
            <div class="nav-section-label">Reports</div>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 13L5 5l3 5 2-3 3 6H1z"/></svg>
                ABC Analysis
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M3 1h10v14l-2-1.5L9 15l-2-1.5L5 15 3 13.5V1zm2 3h6v1H5zm0 3h4v1H5z"/></svg>
                Fiscals
            </a>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h12v1H2zm0 3h12v1H2zm0 3h8v1H2zm0 3h5v1H2z"/></svg>
                API Logs
            </a>
        </nav>

        <nav class="nav-section">
            <div class="nav-section-label">Integrations</div>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a7 7 0 100 14A7 7 0 008 1zm0 2a5 5 0 110 10A5 5 0 018 3zm-.5 2v4l3 1.5-.5 1L6 10V5h1.5z"/></svg>
                Price Checker
            </a>
        </nav>

        <nav class="nav-section" style="margin-top:auto;padding-bottom:12px;">
            <div class="nav-section-label">System</div>
            <a href="#" class="nav-item">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M6.5 1l-.5 1.5-1.5.6-1.4-.9-1.2 1.2.9 1.4-.6 1.5L1 6.5v1.7l1.5.5.6 1.5-.9 1.4 1.2 1.2 1.4-.9 1.5.6.5 1.5h1.7l.5-1.5 1.5-.6 1.4.9 1.2-1.2-.9-1.4.6-1.5L15 8.7V7l-1.5-.5-.6-1.5.9-1.4-1.2-1.2-1.4.9-1.5-.6L9.7 1H6.5zM8 5.5A2.5 2.5 0 118 10.5 2.5 2.5 0 018 5.5z"/></svg>
                Settings
            </a>
            <a href="{{ route('logout') }}"
               class="nav-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg viewBox="0 0 16 16" fill="currentColor"><path d="M6 2H2v12h4v-1H3V3h3V2zm5 4l-1 1 2 2H5v1h7l-2 2 1 1 3-3-3-3z"/></svg>
                Sign out
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
        </nav>
    </aside>

    <div class="main">
        <header class="topbar">
            <span class="topbar-title">@yield('title', 'Dashboard')</span>
            <span class="env-badge">{{ env('DB_DATABASE') }}</span>
            <span class="topbar-env">Shop #{{ env('SHOP', 1) }}</span>
            <div class="topbar-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}</div>
        </header>

        <div class="content">
            @yield('content')
        </div>
    </div>

</div>
<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
@livewireScripts
@stack('scripts')
</body>
</html>
