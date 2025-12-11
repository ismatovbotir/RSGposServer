@extends('layouts.app')

@section('content')


<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">

                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                <span class="preview-title-lg overline-title">Wolt User</span>
                                    <div class="row gy-4">
                                        
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" value="{{$wolt_user->client_id}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-outlined-normal">Client ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                   
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" value="{{$wolt_user->client_secret}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-outlined-normal">Client Secret</label>
                                                </div>
                                            </div>
                                        </div>

                                       




                                    </div>
                                    <hr class="preview-hr">
                                    <span class="preview-title-lg overline-title">Wolt</span>
                                    <div class="row gy-4">
                                        
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" value="{{$wolt->redirect_url}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-outlined-normal">Redirect URL</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                   
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" value="{{$wolt->partner_venue_id}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-outlined-normal">Partner Venue ID</label>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <label class="form-label" for="default-textarea">Authorization Code</label>
                                                    <div class="form-control-wrap">
                                                        <textarea class="form-control no-resize" id="default-textarea" disabled>
                                                            {{$wolt->authorization_code}}
                                                        </textarea>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <hr class="preview-hr">
                                    <span class="preview-title-lg overline-title">Wolt Token</span>
                                    <livewire:wolt.token />
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                       
                    </div><!-- .nk-block -->
                   
                   
                    
                    
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>


@endsection