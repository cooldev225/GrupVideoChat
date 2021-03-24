@extends('frontend.layouts.app')
<link href="/frontend/css/home.css" rel="stylesheet">
<link href="/frontend/css/room.css" rel="stylesheet">
@section('content')
<div class="params" style="display:none;">
    <input type="hidden" id="accessToken" value="{{$accessToken}}"/>
    <input type="hidden" id="room_id" value="{{$room_id}}"/>
    <input type="hidden" id="roomName" value="{{$roomName}}"/>
</div>
<div id="root">
    <div class="sc-kfGgVZ cNvvco">
        <div class="sc-gzOgki lolezo">
            <div class="sc-iyvyFf bvgoZP" style="padding-right: 320px;">
                <div class="sc-kPVwWT hwtmDq">
                    <div class="middle">
                        <div>
                            <div id="media_video" class="ant-row-flex ant-row-flex-center ant-row-flex-middle" style="height: 100%;">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14GiOwFb7SfJvVNeeIxtmnPk-H61-LfPpQeUwHSTJ" alt="" style="height: 100%; width: auto; border-radius: 10000px; max-height: 250px;">
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
                                            <div class="message  no-padding ">
                                                <div class="system">
                                                    <div class="ant-row-flex ant-row-flex-space-between" style="margin-left: -4px; margin-right: -4px;">
                                                
                                                    </div>
                                                </div>
                                            </div>
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
                                                    <textarea rows="3" maxlength="1000" placeholder="Enter chat message or link here.<br>Type @ to mention people." spellcheck="false"></textarea>
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
<input type="hidden" value="{{$sel_user}}" id="sel_user"/>
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script src="/frontend/js/room.js"></script>
@endsection
