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
                            <table class="table">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col">Item</th>
                                        <th scope="col">order_qty</th>
                                        <th scope="col">delivery_qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($order->items as $row)
                                    <tr>
                                        
                                        <td>{{$row->item->name}}</td>
                                        <td>{{$row->order_qty}}</td>
                                        <td>{{$row->delivery_qty}}</td>
                                    </tr> 
                               
                                @endforeach
                                   
                                    
                                </tbody>
                            </table>



                           
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection