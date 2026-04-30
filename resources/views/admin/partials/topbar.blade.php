<header class="topbar">
    <span class="topbar-title" id="topbar-title">Dashboard</span>
    <span class="env-badge">{{ env('DB_DATABASE') }}</span>
    <span class="topbar-env">Shop #{{ env('SHOP', 1) }} · {{ env('WOLT_SERVICE_NAME', 'POS') }}</span>
    <button class="topbar-btn" onclick="navigateTo('orders')">+ New Order</button>
    <div class="topbar-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'AD', 0, 2)) }}</div>
</header>
