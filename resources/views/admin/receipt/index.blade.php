@extends('admin.layout')

@section('title', 'Receipts')

@section('content')
<div class="page-header">
    <h1 class="page-title">Receipts</h1>
</div>

@livewire('admin.receipt-table')
@endsection
