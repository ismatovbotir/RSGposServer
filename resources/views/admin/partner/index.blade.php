@extends('layouts.app')

@section('content')

    
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview ">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-content d-flex justify-between">
                                 <h2 class="nk-block-title fw-normal">Company</h2>
                                 <div class="card-inner">
                                    {{$data->links()}}
                                </div>
                                
                            </div>
                        </div>
                        <div class="nk-block nk-block-lg">
                           
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">STIR</th>
                                                <th scope="col">VAT</th>
                                                <th scope="col">Items</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $idx=>$item)
                                            <tr>
                                                <th scope="row">{{$idx+1}}</th>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->stir}}</td>
                                                <td>{{$item->vat}}</td>
                                                <td>{{$item->items_count}}</td>
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
    </div>
   

@endsection