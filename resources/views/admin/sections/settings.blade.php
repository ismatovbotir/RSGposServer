<section class="section" id="section-settings">

    <div class="page-header">
        <h1 class="page-title">Settings</h1>
    </div>

    <div class="full-card" style="max-width: 480px;">

        <div class="form-group">
            <label class="form-label">App name</label>
            <input class="form-input" type="text" value="{{ env('APP_NAME') }}">
        </div>

        <div class="form-group">
            <label class="form-label">Active shop ID (SHOP env)</label>
            <input class="form-input" type="number" value="{{ env('SHOP', 1) }}" style="width: 120px;">
        </div>

        <div class="form-group">
            <label class="form-label">Database (read-only)</label>
            <input class="form-input" type="text" value="{{ env('DB_DATABASE') }}" disabled>
        </div>

        <div class="form-group">
            <label class="form-label">App URL</label>
            <input class="form-input" type="text" value="{{ env('APP_URL') }}">
        </div>

        <div class="form-group">
            <label class="form-label">API Token</label>
            <input class="form-input" type="password" value="{{ env('APP_TOKEN') }}">
        </div>

        <div class="form-group">
            <label class="form-label">Wolt service name</label>
            <input class="form-input" type="text" value="{{ env('WOLT_SERVICE_NAME') }}">
        </div>

        <button class="btn btn-primary">Save settings</button>

    </div>

</section>
