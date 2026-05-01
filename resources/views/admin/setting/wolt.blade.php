@extends('admin.layout')

@section('title', 'Wolt Settings')

@section('content')
<div class="page-header">
    <h1 class="page-title">Wolt Settings</h1>
</div>

<div class="row-2">

    <div class="card">
        <div class="card-header"><span class="card-title">Wolt User</span></div>
        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-key">Client ID</span>
                <span class="detail-val td-mono">{{ $wolt_user->client_id ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Client Secret</span>
                <span class="detail-val td-mono">{{ $wolt_user->client_secret ?? '—' }}</span>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><span class="card-title">Wolt Venue</span></div>
        <div class="detail-list">
            <div class="detail-row">
                <span class="detail-key">Redirect URL</span>
                <span class="detail-val">{{ $wolt->redirect_url ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Partner Venue ID</span>
                <span class="detail-val td-mono">{{ $wolt->partner_venue_id ?? '—' }}</span>
            </div>
            <div class="detail-row">
                <span class="detail-key">Authorization Code</span>
                <span class="detail-val td-mono" style="word-break:break-all;font-size:11px;">{{ $wolt->authorization_code ?? '—' }}</span>
            </div>
        </div>
    </div>

</div>

<div class="card" style="margin-top:16px;">
    <div class="card-header"><span class="card-title">Wolt Token</span></div>
    <livewire:wolt.token />
</div>
@endsection
