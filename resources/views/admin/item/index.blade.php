@extends('admin.layout')

@section('title', 'Items')

@section('content')
<div class="page-header">
    <h1 class="page-title">Items</h1>
</div>

@livewire('admin.item-table')
@endsection
