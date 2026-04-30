@extends('admin.layout')

@section('title', 'Items')

@section('content')

<div class="page-header">
    <h1 class="page-title">Items</h1>
    <span class="td-muted" style="font-size:12px;">{{ $data->total() }} total</span>
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Partner</th>
                <th>Sell price</th>
                <th>Barcodes</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
            <tr>
                <td class="td-muted">{{ $item->id }}</td>
                <td class="td-strong">{{ $item->name }}</td>
                <td>{{ $item->category->name ?? '—' }}</td>
                <td>{{ $item->partner->name ?? '—' }}</td>
                <td>{{ $item->sellPrice ? number_format($item->sellPrice->value, 0, '.', ' ') : '—' }}</td>
                <td>{{ $item->barcodes_count }}</td>
                <td>{{ $item->currentStock->qty ?? '—' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="td-muted" style="text-align:center;padding:24px;">No items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:16px;">
    {{ $data->links() }}
</div>

@endsection
