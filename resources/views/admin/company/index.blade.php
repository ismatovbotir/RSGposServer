@extends('admin.layout')

@section('title', 'Companies')

@section('content')
<div class="page-header">
    <h1 class="page-title">Companies</h1>
    <span class="td-muted" style="font-size:12px;">{{ $data->count() }} total</span>
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Kg prefix</th>
                <th>Pcs prefix</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $idx => $item)
            <tr>
                <td class="td-muted">{{ $idx + 1 }}</td>
                <td class="td-strong">{{ $item->name }}</td>
                <td class="td-mono">{{ $item->prefix_kg }}</td>
                <td class="td-mono">{{ $item->prefix_pcs }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;padding:32px;color:#aaa;">No companies found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
