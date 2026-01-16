<div class="nk-block nk-block-lg">
                           
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Items</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $idx=>$order)
                                            <tr>
                                                <th scope="row">{{$idx+1}}</th>
                                                <td>{{$order->code}}</td>
                                                <td>{{$order->created_at}}</td>
                                              
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                       