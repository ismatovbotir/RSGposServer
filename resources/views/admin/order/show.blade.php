@extends('layouts.app')

@section('content')

    
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview ">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-content">
                                 <h2 class="nk-block-title fw-normal">Order №: {{$order->code}}</h2>
                                 @foreach($order as $item)
                                 <p>{{$item->item->name}}</p>
                                 @endforeach
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection