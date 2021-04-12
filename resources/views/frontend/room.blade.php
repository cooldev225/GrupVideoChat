@extends('frontend.layouts.app')
<link href="/frontend/css/home.css" rel="stylesheet">
<link href="/frontend/css/room.css" rel="stylesheet">
@section('content')
<div class="params" style="display:none;">
    <input type="hidden" id="room_id" value="{{$room_id}}"/>
    <input type="hidden" id="roomName" value="{{$roomName}}"/>
    <input type="hidden" id="accessToken" value="{{$accessToken}}"/>
    <input type="hidden" value="{{$sel_user}}" id="sel_user"/>
    <input type="hidden" value="{{$me_username}}" id="me_username"/>
</div>
<div id="root">
    <div class="sc-kfGgVZ cNvvco">
        <div class="sc-gzOgki lolezo">
            <div class="sc-iyvyFf bvgoZP" style="padding-right: 320px;">
                <div class="sc-kPVwWT hwtmDq">
                    <div class="top">
                        <div>
                            <div class="ant-row-flex ant-row-flex-space-around ant-row-flex-middle">
                                <div class="ant-col">
                                    <div class="sc-jnlKLf xHdrs">
                                        <div class="ant-row-flex ant-row-flex-center">
                                            <div class="ant-col">
                                                <div class="ant-row-flex gutter4" style="margin-left: -2px; margin-right: -2px; flex-wrap: nowrap; padding: 5px 3px; border-radius: 10px; background: rgb(0, 0, 0);">
                                                    <div class="ant-col" style="padding-left: 2px; padding-right: 2px;">
                                                        <button type="button" id="btn_mic_turnonoff" class="ant-btn ant-btn-primary ant-btn-lg turn-off" onclick="micTurnOnOff();">
                                                            <i class="anticon" style="font-size: 20px;">
                                                                <svg viewBox="0 0 1024 1024" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M752.850763 578.028574a261.0432 261.0432 0 0 0 8.727033-66.028574h99.913005c0 52.0039-11.107132 101.320591-30.634187 145.95386l-78.005851-79.925286zM361.951368 153.705412c0-84.455153 67.43616-153.554824 149.843915-153.554824 82.433348 0 149.869508 69.099671 149.869508 153.554824v330.910644l-299.713423-307.109647V153.705412z m514.178326 803.961871l-155.346296-159.159575a342.555219 342.555219 0 0 1-159.031613 67.692085V921.479529l99.913006 102.369883H361.951368l99.913005-102.369883v-55.279736C292.67255 841.221542 162.125357 692.1454 162.125357 512H262.038362c0 141.116883 112.043836 255.924706 249.756921 255.924706a243.691505 243.691505 0 0 0 137.559529-42.611464l-73.168873-74.985938a145.109308 145.109308 0 0 1-64.390656 15.22752c-82.407755 0-149.843915-69.099671-149.843915-153.554824v-81.179317L76.851245 138.708224l70.635219-72.375507 799.278449 818.959059-70.635219 72.375507z"></path>
                                                                </svg>
                                                            </i>
                                                            <div class="blind">Turn ON your microphone</div>
                                                        </button>
                                                    </div>
                                                    <div class="ant-col" style="padding-left: 2px; padding-right: 2px;">
                                                        <button type="button" id="btn_camera_turnonoff" class="ant-btn ant-btn-primary ant-btn-lg turn-off" onclick="cameraTurnOnOff();"><i class="anticon" style="font-size: 20px;"><svg viewBox="0 0 1024 1024" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M1267.6 916.2l-110-85c30.8-2.8 58.4-27.4 58.4-62.2v-514c0-51-58.2-80.8-100.8-51.6L896 354.6v274.4l-64-49.4v-356c0-52.8-42.8-95.6-95.6-95.6H247.8L91 6.8C77-4 57-1.6 46 12.4L6.8 62.8c-10.8 14-8.4 34 5.6 44.8L85.4 164 832 741.2l357 276c14 10.8 34 8.4 45-5.6l39.2-50.6c11-13.8 8.4-34-5.6-44.8zM64 800.4c0 52.8 42.8 95.6 95.6 95.6h576.8c22.4 0 42.8-8 59.2-21L64 309.4v491z"></path></svg></i><div class="blind">Turn ON your camera</div></button>
                                                    </div>
                                                    <div class="ant-col" style="padding-left: 2px; padding-right: 2px;">
                                                        <button type="button" id="btn_hangup" class="ant-btn no-border ant-btn-lg" onclick="hangup();"><i class="anticon" style="color: rgb(245, 34, 45); font-size: 20px;"><svg viewBox="0 0 1024 1024" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M1006.933333 518.826667c-146.773333-139.946667-320.853333-215.04-494.933333-215.04S163.84 378.88 17.066667 518.826667c-10.24 10.24-17.066667 23.893333-17.066667 40.96s6.826667 30.72 17.066667 40.96l102.4 102.4c20.48 20.48 61.44 20.48 81.92 0 30.72-30.72 68.266667-54.613333 105.813333-75.093334 20.48-10.24 34.133333-30.72 34.133333-54.613333v-105.813333c64.853333-20.48 119.466667-27.306667 170.666667-27.306667 54.613333 0 109.226667 10.24 170.666667 27.306667v105.813333c0 23.893333 13.653333 44.373333 34.133333 54.613333 40.96 20.48 75.093333 44.373333 105.813333 75.093334 10.24 10.24 27.306667 17.066667 40.96 17.066666 17.066667 0 30.72-6.826667 40.96-17.066666l102.4-102.4c10.24-10.24 17.066667-27.306667 17.066667-40.96 0-17.066667-6.826667-30.72-17.066667-40.96z"></path></svg></i><div class="blind">Hangup this call</div>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="middle">
                        <div>
                            <div id="media_video" class="ant-row-flex ant-row-flex-center ant-row-flex-middle" style="height: 100%;">
                                <img src="{{$sel_avatar}}" alt="" style="height: 100%; width: auto; border-radius: 10000px; max-height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div>
                            <div class="sc-iELTvK kUYgJO" id="room_users">
                                
                            </div>
                        </div>
                    </div>   
                </div>
            </div>    
        </div>
    </div>
</div>
<div tabindex="-1" class="ant-drawer ant-drawer-right ant-drawer-open no-mask" style="z-index: 900;">
    <div class="ant-drawer-content-wrapper" style="width: 320px;">
        <div class="ant-drawer-content">
            <div class="ant-drawer-wrapper-body">
                <div class="ant-drawer-body">
                    <div class="sc-hwwEjo dtxMPz">
                        <div class="ant-tabs ant-tabs-top slide-menu-tabs  ant-tabs-line">
                            <div role="tablist" class="ant-tabs-bar ant-tabs-top-bar" tabindex="0">
                                <div class="ant-tabs-extra-content" style="float: right;">
                                    <button type="button" class="btn-blind" id="close_message_btn">
                                        <i aria-label="icon: right" tabindex="-1" class="anticon anticon-right" style="font-size: 20px; padding: 15px 12px;"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="right" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path></svg></i>
                                        <div class="blind">Collapse Menu</div>
                                    </button>
                                </div>
                                <div class="ant-tabs-nav-container">
                                    <span unselectable="unselectable" class="ant-tabs-tab-prev ant-tabs-tab-btn-disabled"><span class="ant-tabs-tab-prev-icon"><i aria-label="icon: left" class="anticon anticon-left ant-tabs-tab-prev-icon-target"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="left" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M724 218.3V141c0-6.7-7.7-10.4-12.9-6.3L260.3 486.8a31.86 31.86 0 0 0 0 50.3l450.8 352.1c5.3 4.1 12.9.4 12.9-6.3v-77.3c0-4.9-2.3-9.6-6.1-12.6l-360-281 360-281.1c3.8-3 6.1-7.7 6.1-12.6z"></path></svg></i></span></span>
                                    <span unselectable="unselectable" class="ant-tabs-tab-next ant-tabs-tab-btn-disabled"><span class="ant-tabs-tab-next-icon"><i aria-label="icon: right" class="anticon anticon-right ant-tabs-tab-next-icon-target"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="right" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path></svg></i></span></span>
                                    <div class="ant-tabs-nav-wrap">
                                        <div class="ant-tabs-nav-scroll">
                                            <div class="ant-tabs-nav ant-tabs-nav-animated">
                                                <div style="display:flex;">
                                                    <div role="tab" aria-disabled="false" aria-selected="true" class="ant-tabs-tab-active ant-tabs-tab">
                                                        <i style="display: inline-block;">
                                                            <button type="button" class="message-btn btn-blind"><span class="ant-badge"><i class="anticon" style="margin: 0px; font-size: 26px;"><svg viewBox="-100 -100 1224 1224" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M844.565138 794.918843v229.008892L532.162032 794.918843H72.265349a72.265349 72.265349 0 0 1-72.265349-72.26535V144.530699a72.265349 72.265349 0 0 1 72.265349-72.26535h867.184192a72.265349 72.265349 0 0 1 72.26535 72.26535v578.122794a72.265349 72.265349 0 0 1-72.26535 72.26535h-94.884403zM252.928723 289.061397a36.132675 36.132675 0 0 0 0 72.26535h289.061397a36.132675 36.132675 0 0 0 0-72.26535h-289.061397z m0 216.796048a36.132675 36.132675 0 0 0 0 72.26535h505.857445a36.132675 36.132675 0 1 0 0-72.26535h-505.857445z"></path></svg></i><div class="blind">Chat Box</div></span></button>
                                                        </i>
                                                    </div>
                                                </div>
                                                <div class="ant-tabs-ink-bar ant-tabs-ink-bar-animated" style="display: block; transform: translate3d(0px, 0px, 0px); width: 54px;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div tabindex="0" role="presentation" style="width: 0px; height: 0px; overflow: hidden; position: absolute;"></div>
                            <div class="ant-tabs-content ant-tabs-content-animated ant-tabs-top-content" style="margin-left: 0%;">
                                <div role="tabpanel" aria-hidden="false" class="ant-tabs-tabpane ant-tabs-tabpane-active">
                                    <div tabindex="0" role="presentation" style="width: 0px; height: 0px; overflow: hidden; position: absolute;"></div>
                                    <div class="sc-kTUwUJ QfEOY">
                                        <div class="sc-cmTdod ktfjmN">
                                            <div class="extra sc-jwKygS kzrDCd"></div>
                                        </div> 
                                        <div class="extra sc-jwKygS kzrDCd"></div>
                                        <div class="sc-jtRfpW gPsqJI">
                                            <div class="ant-row-flex ant-row-flex-start ant-row-flex-middle" style="margin-left: -2px; margin-right: -2px; height: 30px;">
                                                <div class="ant-col" style="padding-left: 2px; padding-right: 2px;">
                                                    <button type="button" class="ant-btn no-border ant-btn-link" style="padding: 3px 4px 0px; height: auto;">
                                                        <i class="anticon" style="font-size: 20px;"><svg viewBox="0 0 1024 1024" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M510.944 960c-247.04 0-448-200.96-448-448s200.992-448 448-448 448 200.96 448 448-200.96 448-448 448z m0-832c-211.744 0-384 172.256-384 384s172.256 384 384 384 384-172.256 384-384-172.256-384-384-384zM512 773.344c-89.184 0-171.904-40.32-226.912-110.624-10.88-13.92-8.448-34.016 5.472-44.896 13.888-10.912 34.016-8.48 44.928 5.472 42.784 54.688 107.136 86.048 176.512 86.048 70.112 0 134.88-31.904 177.664-87.552 10.784-14.016 30.848-16.672 44.864-5.888 14.016 10.784 16.672 30.88 5.888 44.864C685.408 732.32 602.144 773.344 512 773.344zM368 515.2c-26.528 0-48-21.472-48-48v-64c0-26.528 21.472-48 48-48s48 21.472 48 48v64c0 26.496-21.504 48-48 48z m288 0c-26.496 0-48-21.472-48-48v-64c0-26.528 21.504-48 48-48s48 21.472 48 48v64c0 26.496-21.504 48-48 48z"></path></svg></i>
                                                        <div class="blind">Emojis</div>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="tess"></div>
                                            <div class="text-wrapper">
                                                <div class="text-upload">Drop your images here to upload</div>
                                                <div class="ant-mentions text-input" style="display:flex;">
                                                    <grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: -1px; left: -1px; pointer-events: none;" class="cGcvT"></grammarly-extension>
                                                    <textarea id="chat-input" rows="3" maxlength="1000" placeholder="Enter chat message or link here.<br>Type @ to mention people." spellcheck="false"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div tabindex="0" role="presentation" style="width: 0px; height: 0px; overflow: hidden; position: absolute;"></div>
                                </div>
                            </div>
                            <div tabindex="0" role="presentation" style="width: 0px; height: 0px; overflow: hidden; position: absolute;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script src="https://media.twiliocdn.com/sdk/js/chat/releases/4.0.0/twilio-chat.min.js"></script>
<script src="/frontend/js/room.js"></script>
@endsection
