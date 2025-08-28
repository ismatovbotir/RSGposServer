@extends('layouts.app')

@section('content')

    
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview ">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-content">
                                 <h2 class="nk-block-title fw-normal">Company</h2>
                                
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
                                                <th scope="col">Pcs prefix</th>
                                                <th scope="col">Kg prefix</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $idx=>$item)
                                            <tr>
                                                <th scope="row">{{$idx+1}}</th>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->prefix_kg}}</td>
                                                <td>{{$item->prefix_pcs}}</td>
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