@extends('layouts.app')

@section('content')


<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block-head nk-block-head-lg wide-sm">

                    </div><!-- .nk-block-head -->


                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">

                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="preview-block">
                                    <span class="preview-title-lg overline-title">Wolt</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-normal" value="{{$wolt->authorization_code}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-normal">Authorization code</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                    </div>
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-right-icon" value="{{$wolt->redirect_url}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-right-icon">Redirect URL</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div class="form-icon form-icon-right">
                                                        <em class="icon ni ni-user"></em>
                                                    </div>
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-right-icon" value="{{$wolt->partner_venue_id}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-right-icon">Partner Venue ID</label>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    <hr class="preview-hr">


                               

                                    <span class="preview-title-lg overline-title">Wolt Token</span>
                                    <div class="row gy-4">
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-xl form-control-outlined" id="outlined-xl" value="{{$wolt_token->expires_in}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-xl">Expires in</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-lg form-control-outlined" id="outlined-lg" value="{{$wolt_token->dcope}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-lg">Scope</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control form-control-outlined" id="outlined-default" value="{{$wolt_token->token_type}}" disabled>
                                                    <label class="form-label-outlined" for="outlined-default">Token Type</label>
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
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                        <div class="code-block">
                            <h6 class="overline-title title">Code Example</h6>
                            <button class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#formOutlined" data-clip-success="Copied" data-clip-text="Copy"><span class="clipboard-text">Copy</span></button>
                            <pre class="prettyprint lang-html" id="formOutlined"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-group"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-control-wrap"</span><span class="tag">&gt;</span><span class="pln">
        </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"text"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-control form-control-outlined"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"outlined"</span><span class="pln"> </span><span class="atn">placeholder</span><span class="pun">=</span><span class="atv">"Input placeholder"</span><span class="tag">&gt;</span><span class="pln">
        </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-label-outlined"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"outlined"</span><span class="tag">&gt;</span><span class="pln">Input text label</span><span class="tag">&lt;/label&gt;</span><span class="pln">
    </span><span class="tag">&lt;/div&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
                        </div><!-- .code-block -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Select with Select2</h4>
                                <div class="nk-block-des">
                                    <p>Using <code>.form-select</code> class in <code class="code-tag">&lt;select&gt;</code> element to replace browser default style with <a href="https://select2.org/" target="_blank">Select2</a>, as its give you a customizable select box with support for searching, tagging, and many other highly used options. For the documentation for Select2, that can be found <a href="https://select2.org/" target="_blank">here</a>.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row gy-4">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Select2 Default</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg select2-hidden-accessible" data-select2-id="3" tabindex="-1" aria-hidden="true">
                                                    <option value="default_option" data-select2-id="5">Default Option</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: 445px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-djat-container"><span class="select2-selection__rendered" id="select2-djat-container" role="textbox" aria-readonly="true" title="Default Option">Default Option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Select2 With Search</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select form-control form-control-lg select2-hidden-accessible" data-search="on" data-select2-id="6" tabindex="-1" aria-hidden="true">
                                                    <option value="default_option" data-select2-id="8">Default Option</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="7" style="width: 445px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-3asc-container"><span class="select2-selection__rendered" id="select2-3asc-container" role="textbox" aria-readonly="true" title="Default Option">Default Option</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Select2 Multiple</label>
                                            <div class="form-control-wrap">
                                                <select class="form-select select2-hidden-accessible" multiple="" data-placeholder="Select Multiple options" data-select2-id="9" tabindex="-1" aria-hidden="true">
                                                    <option value="default_option">Default Option</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                    <option value="option_select_name">Option select name</option>
                                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="10" style="width: 132.45px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                                            <ul class="select2-selection__rendered">
                                                                <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="Select Multiple options" style="width: 437px;"></li>
                                                            </ul>
                                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-soft">For large or small size of Select2, use <code>lg</code>, <code>sm</code> in <code>data-ui=""</code> attribute of <code class="code-tag">&lt;select&gt;</code> element. And you can use <code>on</code> in <code>data-search=""</code> attribute to display search option in select2.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                        <div class="code-block">
                            <h6 class="overline-title title">Code Example</h6>
                            <button class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#select2Elements" data-clip-success="Copied" data-clip-text="Copy"><span class="clipboard-text">Copy</span></button>
                            <pre class="prettyprint lang-html" id="select2Elements"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-group"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-label"</span><span class="tag">&gt;</span><span class="pln">Select2 Default</span><span class="tag">&lt;/label&gt;</span><span class="pln">
    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-control-wrap"</span><span class="tag">&gt;</span><span class="pln">
        </span><span class="tag">&lt;select</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"form-select"</span><span class="tag">&gt;</span><span class="pln">
            ...
        </span><span class="tag">&lt;/select&gt;</span><span class="pln">
    </span><span class="tag">&lt;/div&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
                        </div><!-- .code-block -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Checkbox Styles</h4>
                                <div class="nk-block-des">
                                    <p>To create custom control, wrapped with <code class="code-tag">&lt;div&gt;</code> each checkbox <code class="code-tag">&lt;input&gt;</code> &amp; <code class="code-tag">&lt;label&gt;</code> using <code>.custom-control</code>, <code>.custom-checkbox</code> classes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row gy-4">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Default</span>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Checked</span>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Disabled</span>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" disabled="" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Check Disabled</span>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked="" disabled="" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Size</span>
                                            <div class="g-3 align-center flex-wrap">
                                                <div class="g">
                                                    <div class="custom-control custom-control-sm custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                        <label class="custom-control-label" for="customCheck7">Option Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6">Option Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-control-lg custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5">Option Label</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-soft">For large or small size of <code>.custom-checkbox</code>, use <code>.custom-control-{lg|sm}</code> with <code>.custom-control</code> class.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                        <div class="code-block">
                            <h6 class="overline-title title">Code Example</h6>
                            <button class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#checkStyle" data-clip-success="Copied" data-clip-text="Copy"><span class="clipboard-text">Copy</span></button>
                            <pre class="prettyprint lang-html" id="checkStyle"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-checkbox"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customCheck1"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customCheck1"</span><span class="tag">&gt;</span><span class="pln">Option Label</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span><span class="pln">
</span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-control-lg custom-checkbox"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customCheck2"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customCheck2"</span><span class="tag">&gt;</span><span class="pln">Option Label</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
                        </div><!-- .code-block -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Radio Style</h4>
                                <div class="nk-block-des">
                                    <p>To create custom control, wrapped with <code class="code-tag">&lt;div&gt;</code> each radio <code class="code-tag">&lt;input&gt;</code> &amp; <code class="code-tag">&lt;label&gt;</code> using <code>.custom-control</code>, <code>.custom-radio</code> classes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row gy-4">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Default</span>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Checked</span>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio2" name="customRadio" checked="" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Disabled</span>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio3" name="customRadio" disabled="" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio3">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Check Disabled</span>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="customRadio4" name="customRadio1" checked="" disabled="" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">Option Label</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Size</span>
                                            <div class="g-4 align-center flex-wrap">
                                                <div class="g">
                                                    <div class="custom-control custom-control-sm custom-radio">
                                                        <input type="radio" class="custom-control-input" name="radioSize" id="customRadio7">
                                                        <label class="custom-control-label" for="customRadio7">Option Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" name="radioSize" id="customRadio6">
                                                        <label class="custom-control-label" for="customRadio6">Option Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-control-lg custom-radio">
                                                        <input type="radio" class="custom-control-input" name="radioSize" id="customRadio5">
                                                        <label class="custom-control-label" for="customRadio5">Option Label</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-soft">For large or small size of <code>.custom-radio</code>, use <code>.custom-control-{lg|sm}</code> with <code>.custom-control</code> class.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                        <div class="code-block">
                            <h6 class="overline-title title">Code Example</h6>
                            <button class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#radioStyle" data-clip-success="Copied" data-clip-text="Copy"><span class="clipboard-text">Copy</span></button>
                            <pre class="prettyprint lang-html" id="radioStyle"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-radio"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"radio"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customRadio1"</span><span class="pln"> </span><span class="atn">name</span><span class="pun">=</span><span class="atv">"customRadio"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customRadio1"</span><span class="tag">&gt;</span><span class="pln">Radio</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span><span class="pln">
</span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-control-lg custom-radio"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"radio"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customRadio2"</span><span class="pln"> </span><span class="atn">name</span><span class="pun">=</span><span class="atv">"customRadio"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customRadio2"</span><span class="tag">&gt;</span><span class="pln">Radio</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
                        </div><!-- .code-block -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">Switch Style</h4>
                                <div class="nk-block-des">
                                    <p>The switch markup of a <code>.custom-control</code> <code class="code-fnc">checkbox</code> but uses the <code>.custom-switch</code> class to render a toggle switch.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row gy-4">
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Default</span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Checked</span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked="" id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Disabled</span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" disabled="" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Check Disabled</span>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" checked="" disabled="" id="customSwitch4">
                                                <label class="custom-control-label" for="customSwitch4">Switch</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="preview-block">
                                            <span class="preview-title overline-title">Size</span>
                                            <div class="g-3 align-center flex-wrap">
                                                <div class="g">
                                                    <div class="custom-control custom-control-sm custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch7">
                                                        <label class="custom-control-label" for="customSwitch7">Switch Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch6">
                                                        <label class="custom-control-label" for="customSwitch6">Switch Label</label>
                                                    </div>
                                                </div>
                                                <div class="g">
                                                    <div class="custom-control custom-control-lg custom-switch">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch5">
                                                        <label class="custom-control-label" for="customSwitch5">Switch Label</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="text-soft">For large or small size of <code>.custom-switch</code>, use <code>.custom-control-{lg|sm}</code> with <code>.custom-control</code> class.</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-preview -->
                        <div class="code-block">
                            <h6 class="overline-title title">Code Example</h6>
                            <button class="btn btn-sm clipboard-init" title="Copy to clipboard" data-clipboard-target="#switchStyle" data-clip-success="Copied" data-clip-text="Copy"><span class="clipboard-text">Copy</span></button>
                            <pre class="prettyprint lang-html" id="switchStyle"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-switch"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customSwitch1"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customSwitch1"</span><span class="tag">&gt;</span><span class="pln">Switch</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span><span class="pln">
</span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control custom-control-lg custom-switch"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;input</span><span class="pln"> </span><span class="atn">type</span><span class="pun">=</span><span class="atv">"checkbox"</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-input"</span><span class="pln"> </span><span class="atn">id</span><span class="pun">=</span><span class="atv">"customSwitch2"</span><span class="tag">&gt;</span><span class="pln">
    </span><span class="tag">&lt;label</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"custom-control-label"</span><span class="pln"> </span><span class="atn">for</span><span class="pun">=</span><span class="atv">"customSwitch2"</span><span class="tag">&gt;</span><span class="pln">Switch</span><span class="tag">&lt;/label&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
                        </div><!-- .code-block -->
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>


@endsection