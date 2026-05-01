@extends('admin.layout')

@section('title', 'Fiscals')

@section('content')
<div class="page-header">
        <h1 class="page-title">Fiscals</h1>
        <div class="btn-group">
            <button class="btn btn-secondary">Open shift</button>
            <button class="btn btn-primary">Close shift</button>
        </div>
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>Order UUID</th>
                    <th>Type</th>
                    <th>Total</th>
                    <th>Fiscal URL</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="td-mono">3fa85f64...</td>
                    <td><span class="pill pill-new">items</span></td>
                    <td>87,200</td>
                    <td class="td-link">receipt.uz/f/abc123</td>
                    <td class="td-muted">10:42</td>
                </tr>
                <tr>
                    <td class="td-mono">7c2a1b9e...</td>
                    <td><span class="pill pill-new">items</span></td>
                    <td>34,000</td>
                    <td class="td-link">receipt.uz/f/xyz789</td>
                    <td class="td-muted">10:15</td>
                </tr>
                <tr>
                    <td class="td-mono">a1d3f820...</td>
                    <td><span class="pill pill-new">items</span></td>
                    <td>156,500</td>
                    <td class="td-link">receipt.uz/f/def456</td>
                    <td class="td-muted">09:58</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
