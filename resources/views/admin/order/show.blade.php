@extends('admin.layout')

@section('title', 'Order #{{ $order->code }}')

@section('content')
<div class="page-header">
    <h1 class="page-title">Order №: {{ $order->code }}</h1>
    @if($order->lastStatus)
        <span class="pill pill-{{ $order->lastStatus->status }}">{{ $order->lastStatus->status }}</span>
    @endif
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Order qty</th>
                <th>Order price</th>
                <th>Delivery qty</th>
                <th>Delivery price</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($order->items as $row)
            <tr>
                <td class="td-strong">{{ $row->item->name }}</td>
                <td>{{ $row->order_qty }}</td>
                <td>{{ number_format($row->order_price) }}</td>
                <td>{{ $row->delivery_qty }}</td>
                <td>{{ number_format($row->delivery_price) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:32px;color:#aaa;">No items.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
