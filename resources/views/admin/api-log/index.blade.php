@extends('admin.layout')

@section('title', 'API Logs')

@section('content')
<div class="page-header">
        <h1 class="page-title">API Logs</h1>
        <button class="btn btn-danger">Cleanup old logs</button>
    </div>

    <div class="filter-row">
        <select>
            <option>All methods</option>
            <option>GET</option>
            <option>POST</option>
            <option>PUT</option>
            <option>DELETE</option>
        </select>
        <select>
            <option>All statuses</option>
            <option>200</option>
            <option>422</option>
            <option>401</option>
            <option>500</option>
        </select>
        <input type="text" placeholder="Filter by path or IP...">
    </div>

    <div class="full-card">
        <table>
            <thead>
                <tr>
                    <th>Method</th>
                    <th>Path</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Duration</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><span class="pill pill-post">POST</span></td>
                    <td class="td-mono">/api/mobApp/order</td>
                    <td style="color: #3b6d11; font-weight: 600;">200</td>
                    <td class="td-muted">192.168.1.5</td>
                    <td>42ms</td>
                    <td class="td-muted">11:05:22</td>
                </tr>
                <tr>
                    <td><span class="pill pill-get">GET</span></td>
                    <td class="td-mono">/api/item</td>
                    <td style="color: #3b6d11; font-weight: 600;">200</td>
                    <td class="td-muted">127.0.0.1</td>
                    <td>18ms</td>
                    <td class="td-muted">11:04:55</td>
                </tr>
                <tr>
                    <td><span class="pill pill-post">POST</span></td>
                    <td class="td-mono">/api/wolt/webhook/orders</td>
                    <td style="color: #3b6d11; font-weight: 600;">200</td>
                    <td class="td-muted">213.230.99.65</td>
                    <td>89ms</td>
                    <td class="td-muted">11:03:10</td>
                </tr>
                <tr>
                    <td><span class="pill pill-put">PUT</span></td>
                    <td class="td-mono">/api/mobApp/order/3fa8...</td>
                    <td style="color: #a32d2d; font-weight: 600;">422</td>
                    <td class="td-muted">192.168.1.5</td>
                    <td>12ms</td>
                    <td class="td-muted">11:01:44</td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection
