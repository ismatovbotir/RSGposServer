@extends('admin.layout')

@section('title', 'Prices')

@section('content')
<div class="page-header">
        <h1 class="page-title">Prices</h1>
        <button class="btn btn-primary">+ Add price type</button>
    </div>

    <div class="row-2" style="margin-bottom: 16px;">
        <div class="kpi-card">
            <div class="kpi-label">Price types defined</div>
            <div class="kpi-value">4</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Default sell price (ID)</div>
            <div class="kpi-value">2</div>
            <div class="kpi-sub">used in Item::sellPrice()</div>
        </div>
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Items with price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="td-strong">Purchase</td>
                    <td class="td-muted">Buying price from partner</td>
                    <td>548</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td class="td-strong">Sell <span class="pill pill-new" style="font-size: 9px;">default</span></td>
                    <td class="td-muted">Retail sell price</td>
                    <td>548</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td class="td-strong">Wholesale</td>
                    <td class="td-muted">Bulk buyer price</td>
                    <td>210</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td class="td-strong">Wolt</td>
                    <td class="td-muted">Delivery platform price</td>
                    <td>180</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
