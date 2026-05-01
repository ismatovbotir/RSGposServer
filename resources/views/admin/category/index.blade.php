@extends('admin.layout')

@section('title', 'Categories')

@section('content')
<div class="page-header">
    <h1 class="page-title">Categories</h1>
    <span class="td-muted" style="font-size:12px;">{{ $data->count() }} total</span>
</div>

<div class="full-card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Items</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $category)
            <tr>
                <td class="td-muted">{{ $category->id }}</td>
                <td class="td-strong" style="{{ $category->category_id ? 'padding-left:24px;' : '' }}">
                    {{ $category->name }}
                </td>
                <td class="td-muted">{{ $category->parent->name ?? '—' }}</td>
                <td>{{ $category->items_count }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;padding:32px;color:#aaa;">No categories found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
