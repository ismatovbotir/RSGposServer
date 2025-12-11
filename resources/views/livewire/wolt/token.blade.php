<div class="row gy-4">
    <div class="col-lg-3 col-sm-6">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-outlined form-control-outlined" id="outlined-default" value="{{$wolt_token->expires_in}}" disabled>
                <label class="form-label-outlined" for="outlined-default">Expires in</label>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-outlined form-control-outlined" id="outlined-default" value="{{$wolt_token->scope}}" disabled>
                <label class="form-label-outlined" for="outlined-default">Scope</label>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{$wolt_token->token_type}}" disabled>
                <label class="form-label-outlined" for="outlined-default">Token Type</label>
            </div>
        </div>
    </div>



    <div class="col-lg-3 col-sm-6">
        <div class="form-group">
            <div class="form-control-wrap">
              @if($isRefresh)
                <button class="btn btn-success" wire:click="refreshToken">Refresh Token</button>
               @else
                <button class="btn btn-info">Token</button>
               @endif 
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{$wolt_token->refresh_token}}" disabled>
                <label class="form-label-outlined" for="outlined-default">Refresh Token</label>

            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="form-group">
            <label class="form-label" for="default-textarea">Access Token</label>
            <div class="form-control-wrap">
                <textarea class="form-control no-resize" id="default-textarea" disabled>{{$wolt_token->access_token}}</textarea>
            </div>
        </div>
    </div>

</div>