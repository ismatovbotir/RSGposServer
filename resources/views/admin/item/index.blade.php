@extends('layouts.app')

@section('content')

    
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview ">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-content d-flex justify-between">
                                 <h2 class="nk-block-title fw-normal">Item</h2>
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
                                                <th scope="col">Partner</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Code</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Barcode</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $idx=>$item)
                                            <tr>
                                                <th scope="row">{{$idx+1}}</th>
                                                <td>{{$item->partner->name ?? ''}}</td>
                                                <td>{{$item->category->name ?? ''}}</td>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->barcodes[0]->id ?? '' }}</td>
                                                
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