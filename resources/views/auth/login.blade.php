<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in — POS Server</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            font-size: 14px;
            display: flex;
            height: 100vh;
            background: #0f1117;
        }

        /* ── Left panel ── */
        .login-panel {
            flex: 1;
            background: linear-gradient(145deg, #0f1117 0%, #141923 50%, #0f1a2e 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 48px;
            position: relative;
            overflow: hidden;
        }

        .login-panel::before {
            content: '';
            position: absolute;
            top: -120px; left: -120px;
            width: 420px; height: 420px;
            background: radial-gradient(circle, rgba(59,130,246,.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .login-panel::after {
            content: '';
            position: absolute;
            bottom: -80px; right: -80px;
            width: 320px; height: 320px;
            background: radial-gradient(circle, rgba(16,185,129,.09) 0%, transparent 70%);
            pointer-events: none;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 1;
        }

        .brand-icon {
            width: 40px; height: 40px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px;
        }

        .brand-name {
            font-size: 18px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -.3px;
        }

        .brand-sub {
            font-size: 11px;
            color: #4b5563;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-top: 1px;
        }

        /* KPI grid */
        .kpi-showcase {
            z-index: 1;
        }

        .kpi-showcase-title {
            font-size: 11px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: .8px;
            margin-bottom: 20px;
        }

        .kpi-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }

        .kpi-tile {
            background: rgba(255,255,255,.04);
            border: 1px solid rgba(255,255,255,.07);
            border-radius: 12px;
            padding: 16px 18px;
            backdrop-filter: blur(4px);
        }

        .kpi-tile-label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .kpi-tile-value {
            font-size: 22px;
            font-weight: 700;
            color: #f9fafb;
            letter-spacing: -.5px;
        }

        .kpi-tile-delta {
            font-size: 11px;
            margin-top: 4px;
        }

        .delta-up   { color: #10b981; }
        .delta-down { color: #ef4444; }

        /* Sparkline bars */
        .sparkline {
            display: flex;
            align-items: flex-end;
            gap: 3px;
            height: 32px;
            margin-top: 10px;
        }

        .spark-bar {
            flex: 1;
            border-radius: 2px;
            background: rgba(59,130,246,.35);
            transition: background .2s;
        }

        .spark-bar.today { background: #3b82f6; }

        .panel-footer {
            font-size: 11px;
            color: #374151;
            z-index: 1;
        }

        /* ── Right panel (form) ── */
        .login-form-wrap {
            width: 420px;
            min-width: 420px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 56px 48px;
        }

        .form-heading {
            font-size: 24px;
            font-weight: 700;
            color: #111827;
            letter-spacing: -.4px;
            margin-bottom: 6px;
        }

        .form-sub {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 36px;
        }

        .field {
            margin-bottom: 20px;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
            letter-spacing: .2px;
        }

        .field input {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            font-family: inherit;
            color: #111827;
            background: #f9fafb;
            outline: none;
            transition: border-color .15s, box-shadow .15s;
        }

        .field input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59,130,246,.12);
            background: #fff;
        }

        .field input.is-invalid {
            border-color: #ef4444;
        }

        .field input.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(239,68,68,.12);
        }

        .invalid-msg {
            font-size: 12px;
            color: #ef4444;
            margin-top: 4px;
        }

        .row-remember {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #6b7280;
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 15px; height: 15px;
            accent-color: #3b82f6;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 11px;
            background: #1d4ed8;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            font-family: inherit;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background .15s, transform .1s;
            letter-spacing: .1px;
        }

        .btn-login:hover  { background: #1e40af; }
        .btn-login:active { transform: scale(.99); }

        .form-error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 13px;
            color: #b91c1c;
            margin-bottom: 20px;
        }

        .form-footer {
            margin-top: 32px;
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
        }

        @media (max-width: 768px) {
            .login-panel { display: none; }
            .login-form-wrap { width: 100%; min-width: unset; }
        }
    </style>
</head>
<body>

<!-- ── Left: retail analytics panel ── -->
<div class="login-panel">

    <div class="brand">
        <div class="brand-icon">🏪</div>
        <div>
            <div class="brand-name">POS Server</div>
            <div class="brand-sub">Retail Analytics</div>
        </div>
    </div>

    <div class="kpi-showcase">
        <div class="kpi-showcase-title">Today's snapshot</div>

        <div class="kpi-row">
            <div class="kpi-tile">
                <div class="kpi-tile-label">Revenue</div>
                <div class="kpi-tile-value">2,847,500</div>
                <div class="kpi-tile-delta delta-up">↑ 12.4% vs yesterday</div>
            </div>
            <div class="kpi-tile">
                <div class="kpi-tile-label">Receipts</div>
                <div class="kpi-tile-value">184</div>
                <div class="kpi-tile-delta delta-up">↑ 8 more</div>
            </div>
        </div>

        <div class="kpi-row">
            <div class="kpi-tile">
                <div class="kpi-tile-label">Avg basket</div>
                <div class="kpi-tile-value">15,475</div>
                <div class="kpi-tile-delta delta-down">↓ 3.1%</div>
            </div>
            <div class="kpi-tile">
                <div class="kpi-tile-label">Items sold</div>
                <div class="kpi-tile-value">1,032</div>
                <div class="kpi-tile-delta delta-up">↑ 5.7%</div>
            </div>
        </div>

        <div class="kpi-tile" style="margin-top:0;">
            <div class="kpi-tile-label">Hourly revenue — last 7 hours</div>
            <div class="sparkline">
                <div class="spark-bar" style="height:40%"></div>
                <div class="spark-bar" style="height:55%"></div>
                <div class="spark-bar" style="height:72%"></div>
                <div class="spark-bar" style="height:60%"></div>
                <div class="spark-bar" style="height:85%"></div>
                <div class="spark-bar" style="height:68%"></div>
                <div class="spark-bar today" style="height:100%"></div>
            </div>
        </div>
    </div>

    <div class="panel-footer">
        {{ config('app.name') }} · {{ env('DB_DATABASE') }} · Shop #{{ env('SHOP', 1) }}
    </div>

</div>

<!-- ── Right: login form ── -->
<div class="login-form-wrap">

    <div class="form-heading">Welcome back</div>
    <div class="form-sub">Sign in to your POS dashboard</div>

    @if ($errors->any())
    <div class="form-error-box">
        {{ $errors->first() }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Email address</label>
            <input id="email"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   autocomplete="email"
                   autofocus
                   class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                   placeholder="you@example.com">
            @error('email')
            <div class="invalid-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="field">
            <label for="password">Password</label>
            <input id="password"
                   type="password"
                   name="password"
                   autocomplete="current-password"
                   class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="••••••••">
            @error('password')
            <div class="invalid-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="row-remember">
            <label class="remember-label">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
            </label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" style="font-size:13px;color:#3b82f6;text-decoration:none;">
                Forgot password?
            </a>
            @endif
        </div>

        <button type="submit" class="btn-login">Sign in</button>
    </form>

    <div class="form-footer">
        POS Server &mdash; internal use only
    </div>

</div>

</body>
</html>
