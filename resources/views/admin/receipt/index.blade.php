@extends('layouts.app')

@section('content')


<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
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
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger mt-n1 mr-n1" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="html/apps-kanban.html"><em class="icon ni ni-eye"></em><span>View Project</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Project</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="project-details">
                                            @foreach($receipt->payments as $payment)
                                            <p>{{$payment->type}}: {{$payment->value}}</p>
                                            @endforeach
                                        </div>
                                        <div class="project-progress">
                                            <div class="project-progress-details">
                                                <div class="project-progress-task"><span>{{$receipt->items->count()}} items</span></div>
                                                <div class="project-progress-percent">{{$receipt->total}}</div>
                                            </div>
                                           
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