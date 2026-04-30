<section class="section" id="section-dashboard">

    {{-- KPI Row --}}
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

    {{-- Recent orders + quick stats --}}
    <div class="row-2-1">
        <div class="card">
            <div class="card-header">
                <span class="card-title">Recent orders</span>
                <button class="card-action" onclick="navigateTo('orders')">View all →</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Items</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Source</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td-mono">#ORD-0034</td>
                        <td>4</td>
                        <td>87,200</td>
                        <td><span class="pill pill-fiscal">fiscal</span></td>
                        <td>POS</td>
                    </tr>
                    <tr>
                        <td class="td-mono">#ORD-0033</td>
                        <td>2</td>
                        <td>34,000</td>
                        <td><span class="pill pill-done">completed</span></td>
                        <td>Wolt</td>
                    </tr>
                    <tr>
                        <td class="td-mono">#ORD-0032</td>
                        <td>7</td>
                        <td>156,500</td>
                        <td><span class="pill pill-done">completed</span></td>
                        <td>POS</td>
                    </tr>
                    <tr>
                        <td class="td-mono">#ORD-0031</td>
                        <td>1</td>
                        <td>18,900</td>
                        <td><span class="pill pill-new">new</span></td>
                        <td>Mobile</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="display: flex; flex-direction: column; gap: 14px;">
            <div class="card">
                <div class="card-header"><span class="card-title">Sales this week</span></div>
                <div class="mini-chart">
                    <div class="chart-col" style="height: 40%"></div>
                    <div class="chart-col" style="height: 60%"></div>
                    <div class="chart-col" style="height: 45%"></div>
                    <div class="chart-col" style="height: 80%"></div>
                    <div class="chart-col" style="height: 55%"></div>
                    <div class="chart-col" style="height: 70%"></div>
                    <div class="chart-col highlight" style="height: 90%"></div>
                </div>
                <div class="chart-labels">
                    <span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span><span>Today</span>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><span class="card-title">Low stock</span></div>
                <div class="detail-list">
                    <div class="detail-row">
                        <span class="detail-key">Coca-Cola 1L</span>
                        <span style="color: #a32d2d; font-weight: 600;">2 left</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-key">Bread loaf</span>
                        <span style="color: #a32d2d; font-weight: 600;">0 left</span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-key">Milk 1L</span>
                        <span style="color: #854f0b; font-weight: 600;">5 left</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ABC + Wolt --}}
    <div class="row-2">
        <div class="card">
            <div class="card-header"><span class="card-title">ABC breakdown (today)</span></div>
            <div class="abc-summary-grid" style="grid-template-columns: repeat(3,1fr);">
                <div style="background:#eaf3de;border-radius:7px;padding:10px;text-align:center;">
                    <div style="font-size:18px;font-weight:700;color:#27500a;">A</div>
                    <div style="font-size:11px;color:#3b6d11;">82 items · 80%</div>
                </div>
                <div style="background:#faeeda;border-radius:7px;padding:10px;text-align:center;">
                    <div style="font-size:18px;font-weight:700;color:#633806;">B</div>
                    <div style="font-size:11px;color:#854f0b;">154 items · 15%</div>
                </div>
                <div style="background:#fcebeb;border-radius:7px;padding:10px;text-align:center;">
                    <div style="font-size:18px;font-weight:700;color:#791f1f;">C</div>
                    <div style="font-size:11px;color:#a32d2d;">312 items · 5%</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><span class="card-title">Wolt status</span></div>
            <div class="detail-list">
                <div class="detail-row">
                    <span class="detail-key">Connection</span>
                    <span><span class="status-dot status-dot-online"></span><span style="color:#3b6d11;">Online</span></span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Pending orders</span>
                    <span class="detail-val">2</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Token expires</span>
                    <span class="detail-warn">in 3h 12m</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Last webhook</span>
                    <span class="td-muted">2 min ago</span>
                </div>
            </div>
        </div>
    </div>

</section>
