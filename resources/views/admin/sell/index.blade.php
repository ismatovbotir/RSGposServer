@extends('admin.layout')

@section('title', 'Sells')

@section('content')
<div class="page-header">
        <h1 class="page-title">Sells</h1>
    </div>

    <div class="kpi-grid kpi-grid-3" style="margin-bottom: 16px;">
        <div class="kpi-card">
            <div class="kpi-label">Total sells today</div>
            <div class="kpi-value">312</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Revenue today</div>
            <div class="kpi-value">1,248,500</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Avg basket</div>
            <div class="kpi-value">36,700</div>
        </div>
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty sold</th>
                    <th>Unit price</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr><td class="td-strong">Orange juice 0.5L</td><td>22</td><td>6,800</td><td>149,600</td><td class="td-muted">today</td></tr>
                <tr><td class="td-strong">Coca-Cola 1L</td><td>14</td><td>8,500</td><td>119,000</td><td class="td-muted">today</td></tr>
                <tr><td class="td-strong">Butter 200g</td><td>6</td><td>9,500</td><td>57,000</td><td class="td-muted">today</td></tr>
                <tr><td class="td-strong">Milk 1L</td><td>9</td><td>5,000</td><td>45,000</td><td class="td-muted">today</td></tr>
            </tbody>
        </table>
    </div>

@endsection
