<aside class="sidebar">

    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">🏪</div>
        <div>
            <div class="sidebar-logo-name">POS Server</div>
            <div class="sidebar-logo-db">{{ env('DB_DATABASE') }}</div>
        </div>
    </div>

    {{-- Main --}}
    <nav class="nav-section">
        <div class="nav-section-label">Main</div>
        <div class="nav-item" data-section="dashboard">
            <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
            Dashboard
        </div>
        <div class="nav-item" data-section="orders">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h12v2H2zm0 4h12v2H2zm0 4h8v2H2z"/></svg>
            Orders
            <span class="nav-badge">5</span>
        </div>
        <div class="nav-item" data-section="receipts">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M3 1h10v14l-2-1.5-2 1.5-2-1.5-2 1.5L3 15V1zm2 3h6v1H5zm0 3h6v1H5zm0 3h4v1H5z"/></svg>
            Receipts
        </div>
        <div class="nav-item" data-section="sells">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 12L5 5l3 4 2-3 5 6H1z"/></svg>
            Sells
        </div>
    </nav>

    {{-- Catalog --}}
    <nav class="nav-section">
        <div class="nav-section-label">Catalog</div>
        <div class="nav-item" data-section="items">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1L1 5v6l7 4 7-4V5L8 1zM8 3l5 3-5 3-5-3 5-3zm-6 5.5l5 2.87v3L2 11.5V8.5zm7 5.87V10.5l5-2.87v3L9 14.37z"/></svg>
            Items
        </div>
        <div class="nav-item" data-section="stock">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 11h12v2H2zm0-4h12v2H2zm0-4h12v2H2z"/></svg>
            Stock
            <span class="nav-badge">3</span>
        </div>
        <div class="nav-item" data-section="categories">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 3h6v3H1zm8 0h6v3H9zM1 9h6v3H1zm8 0h6v3H9z"/></svg>
            Categories
        </div>
        <div class="nav-item" data-section="partners">
            <svg viewBox="0 0 16 16" fill="currentColor"><circle cx="6" cy="5" r="3"/><path d="M1 14c0-3 2-5 5-5h2c3 0 5 2 5 5"/></svg>
            Partners
        </div>
        <div class="nav-item" data-section="prices">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a7 7 0 100 14A7 7 0 008 1zm.5 10.5h-1v-1h1v1zm0-3h-1V4.5h1V8.5z"/></svg>
            Prices
        </div>
    </nav>

    {{-- Reports --}}
    <nav class="nav-section">
        <div class="nav-section-label">Reports</div>
        <div class="nav-item" data-section="abc">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 13L5 5l3 5 2-3 3 6H1z"/></svg>
            ABC Analysis
        </div>
        <div class="nav-item" data-section="fiscal">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M3 1h10v14l-2-1.5L9 15l-2-1.5L5 15 3 13.5V1zm2 3h6v1H5zm0 3h4v1H5z"/></svg>
            Fiscals
        </div>
        <div class="nav-item" data-section="apilogs">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h12v1H2zm0 3h12v1H2zm0 3h8v1H2zm0 3h5v1H2z"/></svg>
            API Logs
        </div>
    </nav>

    {{-- Integrations --}}
    <nav class="nav-section">
        <div class="nav-section-label">Integrations</div>
        <div class="nav-item" data-section="wolt">
            <div class="wolt-icon">W</div>
            Wolt
        </div>
        <div class="nav-item" data-section="pricechecker">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a7 7 0 100 14A7 7 0 008 1zm0 2a5 5 0 110 10A5 5 0 018 3zm-.5 2v4l3 1.5-.5 1L6 10V5h1.5z"/></svg>
            Price Checker
        </div>
    </nav>

    {{-- System --}}
    <nav class="nav-section" style="margin-top: auto; padding-bottom: 12px;">
        <div class="nav-section-label">System</div>
        <div class="nav-item" data-section="settings">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M6.5 1l-.5 1.5-1.5.6-1.4-.9-1.2 1.2.9 1.4-.6 1.5L1 6.5v1.7l1.5.5.6 1.5-.9 1.4 1.2 1.2 1.4-.9 1.5.6.5 1.5h1.7l.5-1.5 1.5-.6 1.4.9 1.2-1.2-.9-1.4.6-1.5L15 8.7V7l-1.5-.5-.6-1.5.9-1.4-1.2-1.2-1.4.9-1.5-.6L9.7 1H6.5zM8 5.5A2.5 2.5 0 118 10.5 2.5 2.5 0 018 5.5z"/></svg>
            Settings
        </div>
    </nav>

</aside>
