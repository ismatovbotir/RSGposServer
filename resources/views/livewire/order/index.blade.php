<div class="nk-block nk-block-lg">
                           
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Order No</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created_at</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $idx=>$order)
                                            <tr>
                                                <th scope="row">{{$idx+1}}</th>
                                                <td><a href="{{route(admin.order.show,['order'=>$order->id])}}" target="_blank">{{$order->code}}</a></td>
                                                <td>{{$order->lastStatus->status}}</td>
                                                <td>{{$order->created_at}}</td>
                                              
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                    <div>
                                        {{$data->links()}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                       