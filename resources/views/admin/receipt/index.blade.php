@extends('layouts.app')

@section('content')


<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered card-full">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Cashiers</h6>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="card-inner p-0">
                                <table class="nk-tb-list nk-tb-ulist">
                                    <thead>
                                        <tr class="nk-tb-item nk-tb-head">
                                            <th class="nk-tb-col"><span class="sub-text">Cashier</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Receipts</span></th>
                                            <th class="nk-tb-col"><span class="sub-text">Total</span></th>
                                            
                                        </tr><!-- .nk-tb-item -->
                                    </thead>
                                    <tbody>
                                        @php
                                            $total=0;
                                            $qty=0;
                                           
                                        @endphp
                                        @foreach($cashiers as $cashier)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span>{{$cashier->name}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{number_format($cashier->receipt_count, 0, '.', ' ')}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{number_format($cashier->total_sum, 0, '.', ' ')}}</span>
                                            </td>
                                            @php
                                                $total=$total+$cashier->total_sum;
                                                $qty=$qty+$cashier->receipt_count
                                            @endphp
                                        </tr><!-- .nk-tb-item -->
                                       @endforeach
                                       <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                <span>Total</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{number_format($qty, 0, '.', ' ')}}</span>
                                            </td>
                                            <td class="nk-tb-col">
                                                <span>{{number_format($total, 0, '.', ' ')}}</span>
                                            </td>
                                           
                                        </tr><!-- .nk-tb-item -->
                                    </tbody>
                                </table><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                        </div>
                    </div><!-- .card -->
                </div>

                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Receipts</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{$receipts->count()}} receipts.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">

                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        @foreach($receipts as $receipt)
                        <div class="col-sm-6 col-lg-4 col-xxl-3">

                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="{{route('admin.receipt.show',['receipt'=>$receipt->id])}}" class="project-title">

                                                <div class="project-info">
                                                    <h6 class="title">Shop {{$receipt->shop_id}}, Kassa-{{$receipt->pos_id}}</h6>
                                                    <span class="sub-text">{{$receipt->cashier}}</span>
                                                </div>
                                            </a>

                                        </div>
                                        <div>
                                            {{$receipt->created_at->setTimezone(config('app.timezone'))->format('d.m.Y H:i:s') }}
                                        </div>
                                        <div class="project-details" style="min-height:80px; max-height:80px; overflow:auto;">
                                            @foreach($receipt->payments as $payment)
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span class="text-muted">
                                                    {{$payment->type}}
                                                </span>
                                                <span class="fw-bold">
                                                    {{ number_format($payment->value, 0, '.', ' ') }}
                                                </span>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="project-progress">
                                            <div class="project-progress-details">
                                                <div class="project-progress-task"><span>{{$receipt->items->count()}} items</span></div>
                                                <div class="project-progress-percent">{{number_format($receipt->total, 0, '.', ' ')}}</div>
                                            </div>

                                        </div>
                                        <div class="text-center mt-2">
                                            {!! QrCode::size(120)->generate($receipt->fiscal) !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection