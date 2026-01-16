@extends('layouts.app')

@section('content')

    
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview ">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-head-content">
                                 <h2 class="nk-block-title fw-normal">Orders</h2>
                                
                            </div>
                        </div>
                        <livewire:order.index />
                    </div>
                </div>
            </div>
        </div>
    </div>
   

@endsection