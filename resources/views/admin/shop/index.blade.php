@extends('admin.layout')

@section('title', 'Shops')

@section('content')
<div class="page-header">
    <h1 class="page-title">Shops</h1>
    <span class="td-muted" style="font-size:12px;">{{ $data->count() }} total</span>
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Company</th>
                <th>Price type</th>
                <th>Price checkers</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $idx => $shop)
            <tr>
                <td class="td-muted">{{ $idx + 1 }}</td>
                <td class="td-strong">{{ $shop->name }}</td>
                <td>{{ $shop->company->name ?? '—' }}</td>
                <td>{{ $shop->price->name ?? '—' }}</td>
                <td>{{ $shop->checkers_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:32px;color:#aaa;">No shops found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
