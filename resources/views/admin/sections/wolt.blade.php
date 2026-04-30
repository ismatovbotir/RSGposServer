<section class="section" id="section-wolt">

    <div class="page-header">
        <h1 class="page-title">Wolt Integration</h1>
    </div>

    <div class="row-2">

        <div class="card">
            <div class="card-header"><span class="card-title">Connection</span></div>
            <div class="detail-list">
                <div class="detail-row">
                    <span class="detail-key">Service name</span>
                    <span class="detail-val">{{ env('WOLT_SERVICE_NAME') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Status</span>
                    <span>
                        <span class="status-dot status-dot-online"></span>
                        <span style="color: #3b6d11;">Online</span>
                    </span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Token expires</span>
                    <span class="detail-warn">in 3h 12m</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Redirect URL</span>
                    <span class="detail-link">{{ env('WOLT_REDIRECT_URL') }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Events</span>
                    <span class="td-muted" style="font-size: 11px;">{{ env('WOLT_ORDER_EVENTS') }}</span>
                </div>
            </div>
            <div class="btn-group" style="margin-top: 14px;">
                <button class="btn btn-secondary">Refresh token</button>
                <button class="btn btn-secondary">Push prices</button>
                <button class="btn btn-secondary">Push stock</button>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><span class="card-title">Wolt orders today</span></div>
            <table>
                <thead>
                    <tr>
                        <th>Wolt ID</th>
                        <th>Items</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="td-muted">wlt_9821</td><td>3</td><td><span class="pill pill-new">created</span></td></tr>
                    <tr><td class="td-muted">wlt_9820</td><td>5</td><td><span class="pill pill-done">delivered</span></td></tr>
                    <tr><td class="td-muted">wlt_9819</td><td>2</td><td><span class="pill pill-done">delivered</span></td></tr>
                </tbody>
            </table>
        </div>

    </div>

    <div class="full-card">
        <div class="card-title" style="margin-bottom: 12px;">Webhooks received</div>
        <table>
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Wolt order ID</th>
                    <th>Payload size</th>
                    <th>Received at</th>
                </tr>
            </thead>
            <tbody>
                <tr><td><span class="pill pill-new">created</span></td><td class="td-muted">wlt_9821</td><td>1.2 KB</td><td class="td-muted">11:03:10</td></tr>
                <tr><td><span class="pill pill-done">delivered</span></td><td class="td-muted">wlt_9820</td><td>0.9 KB</td><td class="td-muted">10:48:33</td></tr>
                <tr><td><span class="pill pill-fiscal">production</span></td><td class="td-muted">wlt_9820</td><td>0.8 KB</td><td class="td-muted">10:22:11</td></tr>
            </tbody>
        </table>
    </div>

</section>
