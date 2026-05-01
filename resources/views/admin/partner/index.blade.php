@extends('admin.layout')

@section('title', 'Partners')

@section('content')
<div class="page-header">
    <h1 class="page-title">Partners</h1>
    <span class="td-muted" style="font-size:12px;">{{ $data->total() }} total</span>
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>STIR</th>
                <th>VAT</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $partner)
            <tr>
                <td class="td-muted">{{ $partner->id }}</td>
                <td class="td-strong">{{ $partner->name }}</td>
                <td class="td-muted">{{ $partner->stir ?? '—' }}</td>
                <td>
                    @if($partner->vat)
                        <span class="pill pill-done">VAT</span>
                    @else
                        <span class="td-muted">—</span>
                    @endif
                </td>
                <td>{{ $partner->items_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;padding:32px;color:#aaa;">No partners found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div style="margin-top:14px;">
    {{ $data->links() }}
</div>
@endsection
