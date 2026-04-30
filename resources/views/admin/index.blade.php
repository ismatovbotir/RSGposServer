<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>POS Server — Admin</title>
<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
</head>
<body>
<div class="admin-wrapper">

<!-- ===== SIDEBAR ===== -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="sidebar-logo-icon">🏪</div>
        <div>
            <div class="sidebar-logo-name">POS Server</div>
            <div class="sidebar-logo-db">posservice</div>
        </div>
    </div>

    <nav class="nav-section">
        <div class="nav-section-label">Main</div>
        <div class="nav-item" data-section="dashboard">
            <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="1" width="6" height="6" rx="1"/><rect x="9" y="1" width="6" height="6" rx="1"/><rect x="1" y="9" width="6" height="6" rx="1"/><rect x="9" y="9" width="6" height="6" rx="1"/></svg>
            Dashboard
        </div>
        <div class="nav-item" data-section="orders">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 2h12v2H2zm0 4h12v2H2zm0 4h8v2H2z"/></svg>
            Orders <span class="nav-badge">5</span>
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

    <nav class="nav-section">
        <div class="nav-section-label">Catalog</div>
        <div class="nav-item" data-section="items">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1L1 5v6l7 4 7-4V5L8 1zM8 3l5 3-5 3-5-3 5-3zm-6 5.5l5 2.87v3L2 11.5V8.5zm7 5.87V10.5l5-2.87v3L9 14.37z"/></svg>
            Items
        </div>
        <div class="nav-item" data-section="stock">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M2 11h12v2H2zm0-4h12v2H2zm0-4h12v2H2z"/></svg>
            Stock <span class="nav-badge">3</span>
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
        <div class="nav-item" data-section="shops">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M1 6l7-5 7 5v8H1V6zm2 1v6h10V7L8 3 3 7zm3 2h4v4H6V9z"/></svg>
            Shops
        </div>
        <div class="nav-item" data-section="cashdesk">
            <svg viewBox="0 0 16 16" fill="currentColor"><rect x="1" y="4" width="14" height="9" rx="1"/><path d="M5 4V3a3 3 0 016 0v1"/><rect x="6" y="8" width="4" height="2" rx="0.5"/></svg>
            Cash Desk (POS)
        </div>
        <div class="nav-item" data-section="pricechecker">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 1a7 7 0 100 14A7 7 0 008 1zm0 2a5 5 0 110 10A5 5 0 018 3zm-.5 2v4l3 1.5-.5 1L6 10V5h1.5z"/></svg>
            Price Checkers
        </div>
    </nav>

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

    <nav class="nav-section" style="margin-top: auto; padding-bottom: 12px;">
        <div class="nav-section-label">System</div>
        <div class="nav-item" data-section="settings">
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M6.5 1l-.5 1.5-1.5.6-1.4-.9-1.2 1.2.9 1.4-.6 1.5L1 6.5v1.7l1.5.5.6 1.5-.9 1.4 1.2 1.2 1.4-.9 1.5.6.5 1.5h1.7l.5-1.5 1.5-.6 1.4.9 1.2-1.2-.9-1.4.6-1.5L15 8.7V7l-1.5-.5-.6-1.5.9-1.4-1.2-1.2-1.4.9-1.5-.6L9.7 1H6.5zM8 5.5A2.5 2.5 0 118 10.5 2.5 2.5 0 018 5.5z"/></svg>
            Settings
        </div>
    </nav>
</aside>

<!-- ===== MAIN ===== -->
<div class="main">

    <!-- TOPBAR -->
    <header class="topbar">
        <span class="topbar-title" id="topbar-title">Dashboard</span>
        <span class="env-badge">posservice</span>
        <span class="topbar-env">Shop #1 · Andalus</span>
        <button class="topbar-btn" onclick="navigateTo('orders')">+ New Order</button>
        <div class="topbar-avatar">AD</div>
    </header>

    <!-- CONTENT -->
    <div class="content">

        <!-- ==================== DASHBOARD ==================== -->
        <section class="section" id="section-dashboard">
            <div class="kpi-grid">
                <div class="kpi-card">
                    <div class="kpi-label">Today's sales</div>
                    <div class="kpi-value">1,248,500</div>
                    <div class="kpi-sub kpi-good">+12% vs yesterday</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Orders today</div>
                    <div class="kpi-value">34</div>
                    <div class="kpi-sub">5 pending</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Receipts issued</div>
                    <div class="kpi-value">28</div>
                    <div class="kpi-sub">6 fiscalized</div>
                </div>
                <div class="kpi-card">
                    <div class="kpi-label">Stock alerts</div>
                    <div class="kpi-value kpi-bad">3</div>
                    <div class="kpi-sub kpi-bad">Below minimum</div>
                </div>
            </div>

            <div class="row-2-1">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Recent orders</span>
                        <button class="card-action" onclick="navigateTo('orders')">View all →</button>
                    </div>
                    <table>
                        <thead><tr><th>Code</th><th>Items</th><th>Total</th><th>Status</th><th>Source</th></tr></thead>
                        <tbody>
                            <tr><td class="td-mono">#ORD-0034</td><td>4</td><td>87,200</td><td><span class="pill pill-fiscal">fiscal</span></td><td>POS</td></tr>
                            <tr><td class="td-mono">#ORD-0033</td><td>2</td><td>34,000</td><td><span class="pill pill-done">completed</span></td><td>Mobile</td></tr>
                            <tr><td class="td-mono">#ORD-0032</td><td>7</td><td>156,500</td><td><span class="pill pill-done">completed</span></td><td>POS</td></tr>
                            <tr><td class="td-mono">#ORD-0031</td><td>1</td><td>18,900</td><td><span class="pill pill-new">new</span></td><td>Mobile</td></tr>
                        </tbody>
                    </table>
                </div>
                <div style="display:flex;flex-direction:column;gap:14px;">
                    <div class="card">
                        <div class="card-header"><span class="card-title">Sales this week</span></div>
                        <div class="mini-chart">
                            <div class="chart-col" style="height:40%"></div>
                            <div class="chart-col" style="height:60%"></div>
                            <div class="chart-col" style="height:45%"></div>
                            <div class="chart-col" style="height:80%"></div>
                            <div class="chart-col" style="height:55%"></div>
                            <div class="chart-col" style="height:70%"></div>
                            <div class="chart-col highlight" style="height:90%"></div>
                        </div>
                        <div class="chart-labels"><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Today</span></div>
                    </div>
                    <div class="card">
                        <div class="card-header"><span class="card-title">Low stock</span></div>
                        <div class="detail-list">
                            <div class="detail-row"><span class="detail-key">Coca-Cola 1L</span><span style="color:#a32d2d;font-weight:600;">2 left</span></div>
                            <div class="detail-row"><span class="detail-key">Bread loaf</span><span style="color:#a32d2d;font-weight:600;">0 left</span></div>
                            <div class="detail-row"><span class="detail-key">Milk 1L</span><span style="color:#854f0b;font-weight:600;">5 left</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-2">
                <div class="card">
                    <div class="card-header"><span class="card-title">ABC breakdown (today)</span></div>
                    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;">
                        <div style="background:#eaf3de;border-radius:7px;padding:10px;text-align:center;"><div style="font-size:18px;font-weight:700;color:#27500a;">A</div><div style="font-size:11px;color:#3b6d11;">82 items · 80%</div></div>
                        <div style="background:#faeeda;border-radius:7px;padding:10px;text-align:center;"><div style="font-size:18px;font-weight:700;color:#633806;">B</div><div style="font-size:11px;color:#854f0b;">154 items · 15%</div></div>
                        <div style="background:#fcebeb;border-radius:7px;padding:10px;text-align:center;"><div style="font-size:18px;font-weight:700;color:#791f1f;">C</div><div style="font-size:11px;color:#a32d2d;">312 items · 5%</div></div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><span class="card-title">POS terminals</span></div>
                    <div class="detail-list">
                        <div class="detail-row"><span class="detail-key">Online</span><span><span class="status-dot status-dot-online"></span><span style="color:#3b6d11;">2 active</span></span></div>
                        <div class="detail-row"><span class="detail-key">Offline</span><span style="color:#a32d2d;font-weight:600;">1</span></div>
                        <div class="detail-row"><span class="detail-key">Price checkers</span><span class="detail-val">3</span></div>
                        <div class="detail-row"><span class="detail-key">Active shop</span><span class="detail-val">Shop #1</span></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ==================== ORDERS ==================== -->
        <section class="section" id="section-orders">
            <div class="page-header">
                <h1 class="page-title">Orders</h1>
                <button class="btn btn-primary">+ New order</button>
            </div>
            <div class="filter-row">
                <select><option>All statuses</option><option>new</option><option>fiscal</option><option>completed</option><option>cancelled</option></select>
                <select><option>All sources</option><option>POS</option><option>Mobile</option></select>
                <input type="text" placeholder="Search by code or UUID...">
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>UUID</th><th>Code</th><th>Items</th><th>Total</th><th>Fiscal URL</th><th>Status</th><th>Source</th><th>Created</th></tr></thead>
                    <tbody>
                        <tr><td class="td-mono">3fa85f64...</td><td class="td-strong">#0034</td><td>4</td><td>87,200</td><td class="td-link">receipt.uz/f/abc123</td><td><span class="pill pill-fiscal">fiscal</span></td><td>POS</td><td class="td-muted">10:42</td></tr>
                        <tr><td class="td-mono">7c2a1b9e...</td><td class="td-strong">#0033</td><td>2</td><td>34,000</td><td class="td-link">receipt.uz/f/xyz789</td><td><span class="pill pill-done">completed</span></td><td>Mobile</td><td class="td-muted">10:15</td></tr>
                        <tr><td class="td-mono">a1d3f820...</td><td class="td-strong">#0032</td><td>7</td><td>156,500</td><td class="td-link">receipt.uz/f/def456</td><td><span class="pill pill-done">completed</span></td><td>POS</td><td class="td-muted">09:58</td></tr>
                        <tr><td class="td-mono">f9c02e71...</td><td class="td-strong">#0031</td><td>1</td><td>18,900</td><td class="td-muted">—</td><td><span class="pill pill-new">new</span></td><td>Mobile</td><td class="td-muted">09:31</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== RECEIPTS ==================== -->
        <section class="section" id="section-receipts">
            <div class="page-header">
                <h1 class="page-title">Receipts</h1>
            </div>
            <div class="filter-row">
                <input type="date">
                <select><option>All cashiers</option><option>User #1</option><option>User #2</option></select>
                <select><option>All payments</option><option>Cash</option><option>Card</option></select>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Receipt #</th><th>Items</th><th>Total</th><th>Payment</th><th>Cashier</th><th>Time</th></tr></thead>
                    <tbody>
                        <tr><td class="td-strong">#RCP-0128</td><td>3</td><td>42,500</td><td>Cash</td><td>User #1</td><td class="td-muted">11:02</td></tr>
                        <tr><td class="td-strong">#RCP-0127</td><td>6</td><td>98,300</td><td>Card</td><td>User #1</td><td class="td-muted">10:55</td></tr>
                        <tr><td class="td-strong">#RCP-0126</td><td>1</td><td>8,500</td><td>Cash</td><td>User #2</td><td class="td-muted">10:38</td></tr>
                        <tr><td class="td-strong">#RCP-0125</td><td>4</td><td>67,000</td><td>Card</td><td>User #2</td><td class="td-muted">10:21</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== SELLS ==================== -->
        <section class="section" id="section-sells">
            <div class="page-header">
                <h1 class="page-title">Sells</h1>
            </div>
            <div class="kpi-grid kpi-grid-3">
                <div class="kpi-card"><div class="kpi-label">Total sells today</div><div class="kpi-value">312</div></div>
                <div class="kpi-card"><div class="kpi-label">Revenue today</div><div class="kpi-value">1,248,500</div></div>
                <div class="kpi-card"><div class="kpi-label">Avg basket</div><div class="kpi-value">36,700</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Item</th><th>Qty sold</th><th>Unit price</th><th>Total</th><th>Date</th></tr></thead>
                    <tbody>
                        <tr><td class="td-strong">Orange juice 0.5L</td><td>22</td><td>6,800</td><td>149,600</td><td class="td-muted">today</td></tr>
                        <tr><td class="td-strong">Coca-Cola 1L</td><td>14</td><td>8,500</td><td>119,000</td><td class="td-muted">today</td></tr>
                        <tr><td class="td-strong">Butter 200g</td><td>6</td><td>9,500</td><td>57,000</td><td class="td-muted">today</td></tr>
                        <tr><td class="td-strong">Milk 1L</td><td>9</td><td>5,000</td><td>45,000</td><td class="td-muted">today</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== ITEMS ==================== -->
        <section class="section" id="section-items">
            <div class="page-header">
                <h1 class="page-title">Items</h1>
                <button class="btn btn-primary">+ Add item</button>
            </div>
            <div class="filter-row">
                <select><option>All categories</option><option>Beverages</option><option>Dairy</option><option>Bakery</option></select>
                <select><option>All partners</option><option>Coca-Cola Co.</option><option>Farm Fresh</option></select>
                <input type="text" placeholder="Search by name or barcode...">
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>ID</th><th>Name</th><th>Category</th><th>Partner</th><th>Sell price</th><th>Barcodes</th><th>Stock</th></tr></thead>
                    <tbody>
                        <tr><td class="td-muted">1042</td><td class="td-strong">Coca-Cola 1L</td><td><span class="pill pill-info">Beverages</span></td><td>Coca-Cola Co.</td><td>8,500</td><td>2</td><td><span class="pill pill-low">2</span></td></tr>
                        <tr><td class="td-muted">1041</td><td class="td-strong">White bread loaf</td><td><span class="pill pill-warning">Bakery</span></td><td>Bakery LLC</td><td>3,200</td><td>1</td><td><span class="pill pill-low">0</span></td></tr>
                        <tr><td class="td-muted">1040</td><td class="td-strong">Milk 1L</td><td><span class="pill pill-ok">Dairy</span></td><td>Farm Fresh</td><td>5,000</td><td>3</td><td><span class="pill pill-ok">48</span></td></tr>
                        <tr><td class="td-muted">1039</td><td class="td-strong">Orange juice 0.5L</td><td><span class="pill pill-info">Beverages</span></td><td>JuiceCo</td><td>6,800</td><td>1</td><td><span class="pill pill-ok">120</span></td></tr>
                        <tr><td class="td-muted">1038</td><td class="td-strong">Butter 200g</td><td><span class="pill pill-ok">Dairy</span></td><td>Farm Fresh</td><td>9,500</td><td>2</td><td><span class="pill pill-ok">34</span></td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== STOCK ==================== -->
        <section class="section" id="section-stock">
            <div class="page-header">
                <h1 class="page-title">Stock</h1>
                <span class="td-muted" style="font-size:12px;">Shop #1 · Last updated: today</span>
            </div>
            <div class="kpi-grid kpi-grid-3">
                <div class="kpi-card"><div class="kpi-label">Total items tracked</div><div class="kpi-value">548</div></div>
                <div class="kpi-card"><div class="kpi-label">Low stock (≤ 5)</div><div class="kpi-value kpi-bad">3</div></div>
                <div class="kpi-card"><div class="kpi-label">Out of stock</div><div class="kpi-value kpi-bad">1</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Item</th><th>Category</th><th>Qty</th><th>Level</th><th>Stock date</th><th>Shop</th></tr></thead>
                    <tbody>
                        <tr><td class="td-strong">White bread loaf</td><td>Bakery</td><td style="color:#a32d2d;font-weight:600;">0</td><td><div class="stock-bar-wrap"><div class="stock-bar-fill stock-bar-low" style="width:0%"></div></div></td><td class="td-muted">2026-04-30</td><td>1</td></tr>
                        <tr><td class="td-strong">Coca-Cola 1L</td><td>Beverages</td><td style="color:#993c1d;font-weight:600;">2</td><td><div class="stock-bar-wrap"><div class="stock-bar-fill stock-bar-low" style="width:4%"></div></div></td><td class="td-muted">2026-04-30</td><td>1</td></tr>
                        <tr><td class="td-strong">Milk 1L</td><td>Dairy</td><td>5</td><td><div class="stock-bar-wrap"><div class="stock-bar-fill stock-bar-low" style="width:10%"></div></div></td><td class="td-muted">2026-04-29</td><td>1</td></tr>
                        <tr><td class="td-strong">Butter 200g</td><td>Dairy</td><td>34</td><td><div class="stock-bar-wrap"><div class="stock-bar-fill stock-bar-ok" style="width:68%"></div></div></td><td class="td-muted">2026-04-29</td><td>1</td></tr>
                        <tr><td class="td-strong">Orange juice 0.5L</td><td>Beverages</td><td>120</td><td><div class="stock-bar-wrap"><div class="stock-bar-fill stock-bar-ok" style="width:100%"></div></div></td><td class="td-muted">2026-04-28</td><td>1</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== CATEGORIES ==================== -->
        <section class="section" id="section-categories">
            <div class="page-header">
                <h1 class="page-title">Categories</h1>
                <button class="btn btn-primary">+ Add category</button>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>ID</th><th>Name</th><th>Items</th><th>Revenue share</th></tr></thead>
                    <tbody>
                        <tr><td class="td-muted">1</td><td class="td-strong">Beverages</td><td>124</td><td>34%</td></tr>
                        <tr><td class="td-muted">2</td><td class="td-strong">Dairy</td><td>88</td><td>22%</td></tr>
                        <tr><td class="td-muted">3</td><td class="td-strong">Bakery</td><td>45</td><td>18%</td></tr>
                        <tr><td class="td-muted">4</td><td class="td-strong">Snacks</td><td>212</td><td>15%</td></tr>
                        <tr><td class="td-muted">5</td><td class="td-strong">Household</td><td>79</td><td>11%</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== PARTNERS ==================== -->
        <section class="section" id="section-partners">
            <div class="page-header">
                <h1 class="page-title">Partners</h1>
                <button class="btn btn-primary">+ Add partner</button>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>ID</th><th>Name</th><th>Items supplied</th><th>Contact</th></tr></thead>
                    <tbody>
                        <tr><td class="td-muted">1</td><td class="td-strong">Coca-Cola Co.</td><td>8</td><td class="td-muted">+998 71 200-00-00</td></tr>
                        <tr><td class="td-muted">2</td><td class="td-strong">Farm Fresh</td><td>22</td><td class="td-muted">+998 90 123-45-67</td></tr>
                        <tr><td class="td-muted">3</td><td class="td-strong">Bakery LLC</td><td>45</td><td class="td-muted">+998 71 300-10-20</td></tr>
                        <tr><td class="td-muted">4</td><td class="td-strong">JuiceCo</td><td>12</td><td class="td-muted">+998 77 500-00-11</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== PRICES ==================== -->
        <section class="section" id="section-prices">
            <div class="page-header">
                <h1 class="page-title">Prices</h1>
                <button class="btn btn-primary">+ Add price type</button>
            </div>
            <div class="row-2" style="margin-bottom:16px;">
                <div class="kpi-card"><div class="kpi-label">Price types defined</div><div class="kpi-value">4</div></div>
                <div class="kpi-card"><div class="kpi-label">Default sell price ID</div><div class="kpi-value">2</div><div class="kpi-sub">used in Item::sellPrice()</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Items with price</th></tr></thead>
                    <tbody>
                        <tr><td>1</td><td class="td-strong">Purchase</td><td class="td-muted">Buying price from partner</td><td>548</td></tr>
                        <tr><td>2</td><td class="td-strong">Sell <span class="pill pill-new" style="font-size:9px;">default</span></td><td class="td-muted">Retail sell price</td><td>548</td></tr>
                        <tr><td>3</td><td class="td-strong">Wholesale</td><td class="td-muted">Bulk buyer price</td><td>210</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== ABC ANALYSIS ==================== -->
        <section class="section" id="section-abc">
            <div class="page-header">
                <h1 class="page-title">ABC Analysis</h1>
                <div class="btn-group">
                    <input type="date" style="padding:6px 10px;border:1px solid #d0d0ce;border-radius:7px;font-size:12px;font-family:inherit;">
                    <button class="btn btn-secondary">Recalculate</button>
                </div>
            </div>
            <div class="abc-summary-grid">
                <div class="abc-summary-card a"><div class="abc-class-label">A</div><div class="abc-class-sub">82 items · 80% of revenue</div></div>
                <div class="abc-summary-card b"><div class="abc-class-label">B</div><div class="abc-class-sub">154 items · 15% of revenue</div></div>
                <div class="abc-summary-card c"><div class="abc-class-label">C</div><div class="abc-class-sub">312 items · 5% of revenue</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Item</th><th>Revenue</th><th>Cumulative %</th><th>Class</th><th>Qty sold</th></tr></thead>
                    <tbody>
                        <tr><td class="td-strong">Orange juice 0.5L</td><td>149,600</td><td>12%</td><td><span class="pill pill-abc-a">A</span></td><td>22</td></tr>
                        <tr><td class="td-strong">Coca-Cola 1L</td><td>119,000</td><td>22%</td><td><span class="pill pill-abc-a">A</span></td><td>14</td></tr>
                        <tr><td class="td-strong">Butter 200g</td><td>57,000</td><td>26%</td><td><span class="pill pill-abc-a">A</span></td><td>6</td></tr>
                        <tr><td class="td-strong">Milk 1L</td><td>45,000</td><td>30%</td><td><span class="pill pill-abc-b">B</span></td><td>9</td></tr>
                        <tr><td class="td-strong">White bread loaf</td><td>6,400</td><td>30.5%</td><td><span class="pill pill-abc-c">C</span></td><td>2</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== FISCALS ==================== -->
        <section class="section" id="section-fiscal">
            <div class="page-header">
                <h1 class="page-title">Fiscals</h1>
                <div class="btn-group">
                    <button class="btn btn-secondary">Open shift</button>
                    <button class="btn btn-primary">Close shift</button>
                </div>
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Order UUID</th><th>Type</th><th>Total</th><th>Fiscal URL</th><th>Created</th></tr></thead>
                    <tbody>
                        <tr><td class="td-mono">3fa85f64...</td><td><span class="pill pill-new">items</span></td><td>87,200</td><td class="td-link">receipt.uz/f/abc123</td><td class="td-muted">10:42</td></tr>
                        <tr><td class="td-mono">7c2a1b9e...</td><td><span class="pill pill-new">items</span></td><td>34,000</td><td class="td-link">receipt.uz/f/xyz789</td><td class="td-muted">10:15</td></tr>
                        <tr><td class="td-mono">a1d3f820...</td><td><span class="pill pill-new">items</span></td><td>156,500</td><td class="td-link">receipt.uz/f/def456</td><td class="td-muted">09:58</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== API LOGS ==================== -->
        <section class="section" id="section-apilogs">
            <div class="page-header">
                <h1 class="page-title">API Logs</h1>
                <button class="btn btn-danger">Cleanup old logs</button>
            </div>
            <div class="filter-row">
                <select><option>All methods</option><option>GET</option><option>POST</option><option>PUT</option><option>DELETE</option></select>
                <select><option>All statuses</option><option>200</option><option>422</option><option>401</option><option>500</option></select>
                <input type="text" placeholder="Filter by path or IP...">
            </div>
            <div class="full-card">
                <table>
                    <thead><tr><th>Method</th><th>Path</th><th>Status</th><th>IP</th><th>Duration</th><th>Time</th></tr></thead>
                    <tbody>
                        <tr><td><span class="pill pill-post">POST</span></td><td class="td-mono">/api/mobApp/order</td><td style="color:#3b6d11;font-weight:600;">200</td><td class="td-muted">192.168.1.5</td><td>42ms</td><td class="td-muted">11:05:22</td></tr>
                        <tr><td><span class="pill pill-get">GET</span></td><td class="td-mono">/api/item</td><td style="color:#3b6d11;font-weight:600;">200</td><td class="td-muted">127.0.0.1</td><td>18ms</td><td class="td-muted">11:04:55</td></tr>
                        <tr><td><span class="pill pill-put">PUT</span></td><td class="td-mono">/api/mobApp/order/3fa8...</td><td style="color:#a32d2d;font-weight:600;">422</td><td class="td-muted">192.168.1.5</td><td>12ms</td><td class="td-muted">11:01:44</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

                <div class="kpi-card"><div class="kpi-label">Active shop (env)</div><div class="kpi-value">1</div><div class="kpi-sub">SHOP=1</div></div>
                <div class="kpi-card"><div class="kpi-label">Companies</div><div class="kpi-value">1</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Price type</th>
                            <th>Area (m²)</th>
                            <th>POS terminals</th>
                            <th>Price checkers</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-muted">1</td>
                            <td class="td-strong">Main Shop <span class="pill pill-new" style="font-size:9px;">active</span></td>
                            <td>Andalus LLC</td>
                            <td>Sell (id=2)</td>
                            <td>120.000</td>
                            <td>2</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td class="td-muted">2</td>
                            <td class="td-strong">Branch #2</td>
                            <td>Andalus LLC</td>
                            <td>Sell (id=2)</td>
                            <td>85.500</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td class="td-muted">3</td>
                            <td class="td-strong">Warehouse</td>
                            <td>Andalus LLC</td>
                            <td>Purchase (id=1)</td>
                            <td>340.000</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== CASH DESK (POS) ==================== -->
        <section class="section" id="section-cashdesk">
            <div class="page-header">
                <h1 class="page-title">Cash Desk (POS)</h1>
                <button class="btn btn-primary">+ Add terminal</button>
            </div>
            <div class="kpi-grid kpi-grid-3">
                <div class="kpi-card"><div class="kpi-label">Total terminals</div><div class="kpi-value">3</div></div>
                <div class="kpi-card"><div class="kpi-label">Online now</div><div class="kpi-value kpi-good">2</div></div>
                <div class="kpi-card"><div class="kpi-label">Shops covered</div><div class="kpi-value">2</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead>
                        <tr>
                            <th>UUID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Shop</th>
                            <th>Status</th>
                            <th>Last receipt</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-mono">a1b2c3d4...</td>
                            <td class="td-strong">POS-01</td>
                            <td>Main cashier desk</td>
                            <td>Main Shop</td>
                            <td><span class="status-dot status-dot-online"></span><span style="color:#3b6d11;font-size:12px;">Online</span></td>
                            <td class="td-muted">11:02</td>
                        </tr>
                        <tr>
                            <td class="td-mono">e5f6g7h8...</td>
                            <td class="td-strong">POS-02</td>
                            <td>Self-checkout #1</td>
                            <td>Main Shop</td>
                            <td><span class="status-dot status-dot-online"></span><span style="color:#3b6d11;font-size:12px;">Online</span></td>
                            <td class="td-muted">10:55</td>
                        </tr>
                        <tr>
                            <td class="td-mono">i9j0k1l2...</td>
                            <td class="td-strong">POS-03</td>
                            <td>Branch cashier</td>
                            <td>Branch #2</td>
                            <td><span class="status-dot status-dot-offline"></span><span style="color:#a32d2d;font-size:12px;">Offline</span></td>
                            <td class="td-muted">yesterday</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== PRICE CHECKERS ==================== -->
        <section class="section" id="section-pricechecker">
            <div class="page-header">
                <h1 class="page-title">Price Checkers</h1>
                <button class="btn btn-primary">+ Add device</button>
            </div>
            <div class="kpi-grid kpi-grid-3">
                <div class="kpi-card"><div class="kpi-label">Total devices</div><div class="kpi-value">3</div></div>
                <div class="kpi-card"><div class="kpi-label">Scans today</div><div class="kpi-value">248</div></div>
                <div class="kpi-card"><div class="kpi-label">Not found rate</div><div class="kpi-value kpi-bad">2.8%</div></div>
            </div>
            <div class="full-card">
                <table>
                    <thead>
                        <tr>
                            <th>UUID</th>
                            <th>Name</th>
                            <th>Shop</th>
                            <th>Theme</th>
                            <th>Sleep (s)</th>
                            <th>Scans today</th>
                            <th>Last seen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-mono">fa3b1c2d...</td>
                            <td class="td-strong">Checker #1</td>
                            <td>Main Shop</td>
                            <td>Default</td>
                            <td>5</td>
                            <td>148</td>
                            <td class="td-muted">2 min ago</td>
                        </tr>
                        <tr>
                            <td class="td-mono">9e8d7f6a...</td>
                            <td class="td-strong">Checker #2</td>
                            <td>Main Shop</td>
                            <td>Dark</td>
                            <td>5</td>
                            <td>100</td>
                            <td class="td-muted">14 min ago</td>
                        </tr>
                        <tr>
                            <td class="td-mono">b5c4d3e2...</td>
                            <td class="td-strong">Checker #3</td>
                            <td>Branch #2</td>
                            <td>Default</td>
                            <td>10</td>
                            <td>0</td>
                            <td class="td-muted" style="color:#a32d2d;">offline</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="full-card">
                <div class="card-title" style="margin-bottom:12px;">Scan statistics (today)</div>
                <table>
                    <thead>
                        <tr><th>Device</th><th>Total scans</th><th>Found</th><th>Not found</th><th>Most scanned item</th></tr>
                    </thead>
                    <tbody>
                        <tr><td class="td-strong">Checker #1</td><td>148</td><td style="color:#3b6d11;font-weight:600;">144</td><td style="color:#a32d2d;font-weight:600;">4</td><td>Coca-Cola 1L</td></tr>
                        <tr><td class="td-strong">Checker #2</td><td>100</td><td style="color:#3b6d11;font-weight:600;">97</td><td style="color:#a32d2d;font-weight:600;">3</td><td>Milk 1L</td></tr>
                        <tr><td class="td-strong">Checker #3</td><td>0</td><td>0</td><td>0</td><td class="td-muted">—</td></tr>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- ==================== SETTINGS ==================== -->
        <section class="section" id="section-settings">
            <div class="page-header">
                <h1 class="page-title">Settings</h1>
            </div>
            <div class="full-card" style="max-width:480px;">
                <div class="form-group"><label class="form-label">App name</label><input class="form-input" type="text" value="Laravel"></div>
                <div class="form-group"><label class="form-label">Active shop ID (SHOP env)</label><input class="form-input" type="number" value="1" style="width:120px;"></div>
                <div class="form-group"><label class="form-label">Database (read-only)</label><input class="form-input" type="text" value="posservice" disabled></div>
                <div class="form-group"><label class="form-label">App URL</label><input class="form-input" type="text" value="http://localhost"></div>
                <div class="form-group"><label class="form-label">API Token</label><input class="form-input" type="password" value="xF38j92x81Sdf93Jskd82HsPzks82ks9aP9a"></div>
                <button class="btn btn-primary">Save settings</button>
            </div>
        </section>

    </div><!-- /content -->
</div><!-- /main -->
</div><!-- /admin-wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      