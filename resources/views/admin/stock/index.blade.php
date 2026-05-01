@extends('admin.layout')

@section('title', 'Stock')

@section('content')
<div class="page-header">
        <h1 class="page-title">Stock</h1>
        <span class="td-muted" style="font-size: 12px;">Shop #{{ env('SHOP', 1) }} · Last updated: today</span>
    </div>

    <div class="kpi-grid kpi-grid-3">
        <div class="kpi-card">
            <div class="kpi-label">Total items tracked</div>
            <div class="kpi-value">548</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Low stock (≤ 5)</div>
            <div class="kpi-value kpi-bad">3</div>
        </div>
        <div class="kpi-card">
            <div class="kpi-label">Out of stock</div>
            <div class="kpi-value kpi-bad">1</div>
        </div>
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Category</th>
                    <th>Qty</th>
                    <th>Level</th>
                    <th>Stock date</th>
                    <th>Shop</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-strong">White bread loaf</td>
                    <td>Bakery</td>
                    <td style="color: #a32d2d; font-weight: 600;">0</td>
                    <td>
                        <div class="stock-bar-wrap">
                            <div class="stock-bar-fill stock-bar-low" style="width: 0%"></div>
                        </div>
                    </td>
                    <td class="td-muted">2026-04-30</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="td-strong">Coca-Cola 1L</td>
                    <td>Beverages</td>
                    <td style="color: #993c1d; font-weight: 600;">2</td>
                    <td>
                        <div class="stock-bar-wrap">
                            <div class="stock-bar-fill stock-bar-low" style="width: 4%"></div>
                        </div>
                    </td>
                    <td class="td-muted">2026-04-30</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="td-strong">Milk 1L</td>
                    <td>Dairy</td>
                    <td>5</td>
                    <td>
                        <div class="stock-bar-wrap">
                            <div class="stock-bar-fill stock-bar-low" style="width: 10%"></div>
                        </div>
                    </td>
                    <td class="td-muted">2026-04-29</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="td-strong">Butter 200g</td>
                    <td>Dairy</td>
                    <td>34</td>
                    <td>
                        <div class="stock-bar-wrap">
                            <div class="stock-bar-fill stock-bar-ok" style="width: 68%"></div>
                        </div>
                    </td>
                    <td class="td-muted">2026-04-29</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td class="td-strong">Orange juice 0.5L</td>
                    <td>Beverages</td>
                    <td>120</td>
                    <td>
                        <div class="stock-bar-wrap">
                            <div class="stock-bar-fill stock-bar-ok" style="width: 100%"></div>
                        </div>
                    </td>
                    <td class="td-muted">2026-04-28</td>
                    <td>1</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
