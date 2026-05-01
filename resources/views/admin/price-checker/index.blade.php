@extends('admin.layout')

@section('title', 'Price Checker')

@section('content')
<div class="page-header">
        <h1 class="page-title">Price Checker</h1>
    </div>

    <div class="row-2">

        <div class="card">
            <div class="card-header"><span class="card-title">Devices</span></div>
            <table>
                <thead>
                    <tr>
                        <th>Device</th>
                        <th>Theme</th>
                        <th>Last seen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="td-strong">Checker #1</td><td>Default</td><td class="td-muted">2 min ago</td></tr>
                    <tr><td class="td-strong">Checker #2</td><td>Dark</td><td class="td-muted">14 min ago</td></tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <div class="card-header"><span class="card-title">Scan statistics (today)</span></div>
            <div class="detail-list">
                <div class="detail-row">
                    <span class="detail-key">Total scans</span>
                    <span class="detail-val">248</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Found</span>
                    <span style="color: #3b6d11; font-weight: 600;">241</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Not found</span>
                    <span style="color: #a32d2d; font-weight: 600;">7</span>
                </div>
                <div class="detail-row">
                    <span class="detail-key">Most scanned</span>
                    <span class="detail-val">Coca-Cola 1L</span>
                </div>
            </div>
        </div>

    </div>

@endsection
