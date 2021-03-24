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
    <div id="media-div">
    </div>
    <div class="sc-kfGgVZ cNvvco">
        <div class="sc-gzOgki lolezo">
            <div class="sc-iyvyFf bvgoZP" style="padding-right: 320px;">
                <div class="sc-kPVwWT hwtmDq">
                    <div class="middle">
                        <div>
                            <div class="ant-row-flex ant-row-flex-center ant-row-flex-middle" style="height: 100%;">
                                <img src="https://lh3.googleusercontent.com/a-/AOh14GiOwFb7SfJvVNeeIxtmnPk-H61-LfPpQeUwHSTJ" alt="" style="height: 100%; width: auto; border-radius: 10000px; max-height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <div>
                            <div class="sc-iELTvK kUYgJO">
                                <div class="ant-row-flex ant-row-flex-center ant-row-flex-middle gutter8 inline-flex" style="margin: 0px; flex-wrap: nowrap; height: 100%;">
                                    <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                        <div class="sc-ktHwxA btyRFv" max="96" min="60" width="339.33">
                                            <div class="ant-row-flex gutter4" style="margin-left: -2px; margin-right: -2px; height: 22px;"></div>
                                        </div>
                                        <div class="sc-cIShpX kQqkBu" max="96" min="60" width="339.33">
                                            <button typeof="link" type="button" class="ant-btn overlay" style="border: none; border-radius: 0px; background: transparent;">
                                                <div class="blind">Select Sam Rock</div>
                                            </button>
                                            <div class="avatar">
                                                <span class="ant-avatar ant-avatar-square ant-avatar-image">
                                                    <img src="https://lh3.googleusercontent.com/a-/AOh14GgAgFTm_EOws0t94bv0du8yuA_6dx83MBLXV6uS">
                                                </span>
                                            </div>
                                            <div class="name">
                                                <div>Sam Rock</div>
                                            </div>
                                            <button type="button" class="ant-btn mic no-border ant-btn-primary ant-btn-circle">
                                                <i aria-label="icon: setting" class="anticon anticon-setting"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="setting" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M924.8 625.7l-65.5-56c3.1-19 4.7-38.4 4.7-57.8s-1.6-38.8-4.7-57.8l65.5-56a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a443.74 443.74 0 0 0-79.7-137.9l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.3 28.9c-30-24.6-63.5-44-99.7-57.6l-15.7-85a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52.1-9.4-106.9-9.4-159 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.4a351.86 351.86 0 0 0-99 57.4l-81.9-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a446.02 446.02 0 0 0-79.7 137.9l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.3 56.6c-3.1 18.8-4.6 38-4.6 57.1 0 19.2 1.5 38.4 4.6 57.1L99 625.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.4 44.9 96.9 79.7 137.9l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.9-29.1c29.8 24.5 63.1 43.9 99 57.4l15.8 85.4a32.05 32.05 0 0 0 25.8 25.7l2.7.5a449.4 449.4 0 0 0 159 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-85a350 350 0 0 0 99.7-57.6l81.3 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.6-87.5 79.7-137.9l.9-2.6c4.5-12.3.8-26.3-9.3-35zM788.3 465.9c2.5 15.1 3.8 30.6 3.8 46.1s-1.3 31-3.8 46.1l-6.6 40.1 74.7 63.9a370.03 370.03 0 0 1-42.6 73.6L721 702.8l-31.4 25.8c-23.9 19.6-50.5 35-79.3 45.8l-38.1 14.3-17.9 97a377.5 377.5 0 0 1-85 0l-17.9-97.2-37.8-14.5c-28.5-10.8-55-26.2-78.7-45.7l-31.4-25.9-93.4 33.2c-17-22.9-31.2-47.6-42.6-73.6l75.5-64.5-6.5-40c-2.4-14.9-3.7-30.3-3.7-45.5 0-15.3 1.2-30.6 3.7-45.5l6.5-40-75.5-64.5c11.3-26.1 25.6-50.7 42.6-73.6l93.4 33.2 31.4-25.9c23.7-19.5 50.2-34.9 78.7-45.7l37.9-14.3 17.9-97.2c28.1-3.2 56.8-3.2 85 0l17.9 97 38.1 14.3c28.7 10.8 55.4 26.2 79.3 45.8l31.4 25.8 92.8-32.9c17 22.9 31.2 47.6 42.6 73.6L781.8 426l6.5 39.9zM512 326c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm79.2 255.2A111.6 111.6 0 0 1 512 614c-29.9 0-58-11.7-79.2-32.8A111.6 111.6 0 0 1 400 502c0-29.9 11.7-58 32.8-79.2C454 401.6 482.1 390 512 390c29.9 0 58 11.6 79.2 32.8A111.6 111.6 0 0 1 624 502c0 29.9-11.7 58-32.8 79.2z"></path></svg></i>
                                                <div class="blind">Sam Rock Settings</div>
                                            </button>
                                            <div class="meter">
                                                <div class="ant-row" style="margin-left: -0.5px; margin-right: -0.5px;"></div>
                                            </div>
                                            <div class="audio-status">
                                                <div class="audio-status-text hide connected">connected<br>open</div>
                                            </div>
                                            <div class="info"></div>
                                        </div>
                                    </div>
                                    <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                        <div class="sc-ktHwxA btyRFv" max="96" min="60" width="339.33">
                                            <div class="ant-row-flex gutter4" style="margin-left: -2px; margin-right: -2px; height: 22px;"></div>
                                        </div>
                                        <div class="sc-cIShpX kQqkBu" max="96" min="60" width="339.33">
                                            <button typeof="link" type="button" class="ant-btn overlay" style="border: none; border-radius: 0px; background: transparent;">
                                                <div class="blind">Select Rizki Ramadhan</div>
                                            </button>
                                            <div class="avatar">
                                                <span class="ant-avatar ant-avatar-square ant-avatar-image">
                                                    <img src="https://lh5.googleusercontent.com/-AWgJ0sVu4Uk/AAAAAAAAAAI/AAAAAAAAAAA/AMZuuclkOeUOkZc_E09251MogTBpRSavmw/s96-c/photo.jpg">
                                                </span>
                                            </div>
                                            <div class="name">
                                                <div>Rizki Ramadhan</div>
                                            </div>
                                            <button type="button" class="ant-btn mic no-border ant-btn-primary ant-btn-circle"><i aria-label="icon: setting" class="anticon anticon-setting"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="setting" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M924.8 625.7l-65.5-56c3.1-19 4.7-38.4 4.7-57.8s-1.6-38.8-4.7-57.8l65.5-56a32.03 32.03 0 0 0 9.3-35.2l-.9-2.6a443.74 443.74 0 0 0-79.7-137.9l-1.8-2.1a32.12 32.12 0 0 0-35.1-9.5l-81.3 28.9c-30-24.6-63.5-44-99.7-57.6l-15.7-85a32.05 32.05 0 0 0-25.8-25.7l-2.7-.5c-52.1-9.4-106.9-9.4-159 0l-2.7.5a32.05 32.05 0 0 0-25.8 25.7l-15.8 85.4a351.86 351.86 0 0 0-99 57.4l-81.9-29.1a32 32 0 0 0-35.1 9.5l-1.8 2.1a446.02 446.02 0 0 0-79.7 137.9l-.9 2.6c-4.5 12.5-.8 26.5 9.3 35.2l66.3 56.6c-3.1 18.8-4.6 38-4.6 57.1 0 19.2 1.5 38.4 4.6 57.1L99 625.5a32.03 32.03 0 0 0-9.3 35.2l.9 2.6c18.1 50.4 44.9 96.9 79.7 137.9l1.8 2.1a32.12 32.12 0 0 0 35.1 9.5l81.9-29.1c29.8 24.5 63.1 43.9 99 57.4l15.8 85.4a32.05 32.05 0 0 0 25.8 25.7l2.7.5a449.4 449.4 0 0 0 159 0l2.7-.5a32.05 32.05 0 0 0 25.8-25.7l15.7-85a350 350 0 0 0 99.7-57.6l81.3 28.9a32 32 0 0 0 35.1-9.5l1.8-2.1c34.8-41.1 61.6-87.5 79.7-137.9l.9-2.6c4.5-12.3.8-26.3-9.3-35zM788.3 465.9c2.5 15.1 3.8 30.6 3.8 46.1s-1.3 31-3.8 46.1l-6.6 40.1 74.7 63.9a370.03 370.03 0 0 1-42.6 73.6L721 702.8l-31.4 25.8c-23.9 19.6-50.5 35-79.3 45.8l-38.1 14.3-17.9 97a377.5 377.5 0 0 1-85 0l-17.9-97.2-37.8-14.5c-28.5-10.8-55-26.2-78.7-45.7l-31.4-25.9-93.4 33.2c-17-22.9-31.2-47.6-42.6-73.6l75.5-64.5-6.5-40c-2.4-14.9-3.7-30.3-3.7-45.5 0-15.3 1.2-30.6 3.7-45.5l6.5-40-75.5-64.5c11.3-26.1 25.6-50.7 42.6-73.6l93.4 33.2 31.4-25.9c23.7-19.5 50.2-34.9 78.7-45.7l37.9-14.3 17.9-97.2c28.1-3.2 56.8-3.2 85 0l17.9 97 38.1 14.3c28.7 10.8 55.4 26.2 79.3 45.8l31.4 25.8 92.8-32.9c17 22.9 31.2 47.6 42.6 73.6L781.8 426l6.5 39.9zM512 326c-97.2 0-176 78.8-176 176s78.8 176 176 176 176-78.8 176-176-78.8-176-176-176zm79.2 255.2A111.6 111.6 0 0 1 512 614c-29.9 0-58-11.7-79.2-32.8A111.6 111.6 0 0 1 400 502c0-29.9 11.7-58 32.8-79.2C454 401.6 482.1 390 512 390c29.9 0 58 11.6 79.2 32.8A111.6 111.6 0 0 1 624 502c0 29.9-11.7 58-32.8 79.2z"></path></svg></i>
                                                <div class="blind">Rizki Ramadhan Settings</div>
                                            </button>
                                            <div class="meter">
                                                <div class="ant-row" style="margin-left: -0.5px; margin-right: -0.5px;"></div>
                                            </div>
                                            <div class="audio-status">
                                                <div class="audio-status-text hide connected">connected<br>open</div>
                                            </div>
                                            <div class="info"></div>
                                        </div>
                                    </div>
                                    <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                        <div class="active sc-ktHwxA btyRFv" max="96" min="60" width="339.33">
                                            <div class="ant-row-flex gutter4" style="margin-left: -2px; margin-right: -2px; height: 22px;"></div>
                                        </div>
                                        <div class="active sc-cIShpX kQqkBu" max="96" min="60" width="339.33">
                                            <button typeof="link" type="button" class="ant-btn overlay" style="border: none; border-radius: 0px; background: transparent;">
                                                <div class="blind">Select Mauricio Paegelow</div>
                                            </button>
                                            <div class="avatar">
                                                <span class="ant-avatar ant-avatar-square ant-avatar-image">
                                                    <img src="https://lh3.googleusercontent.com/a-/AOh14GiOwFb7SfJvVNeeIxtmnPk-H61-LfPpQeUwHSTJ">
                                                </span>
                                            </div>
                                            <div class="name">
                                                <div>Mauricio Paegelow</div>
                                            </div>
                                            <button disabled="" type="button" class="ant-btn mic no-border ant-btn-primary ant-btn-circle"><i class="anticon"><svg viewBox="0 0 1024 1024" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M752.850763 578.028574a261.0432 261.0432 0 0 0 8.727033-66.028574h99.913005c0 52.0039-11.107132 101.320591-30.634187 145.95386l-78.005851-79.925286zM361.951368 153.705412c0-84.455153 67.43616-153.554824 149.843915-153.554824 82.433348 0 149.869508 69.099671 149.869508 153.554824v330.910644l-299.713423-307.109647V153.705412z m514.178326 803.961871l-155.346296-159.159575a342.555219 342.555219 0 0 1-159.031613 67.692085V921.479529l99.913006 102.369883H361.951368l99.913005-102.369883v-55.279736C292.67255 841.221542 162.125357 692.1454 162.125357 512H262.038362c0 141.116883 112.043836 255.924706 249.756921 255.924706a243.691505 243.691505 0 0 0 137.559529-42.611464l-73.168873-74.985938a145.109308 145.109308 0 0 1-64.390656 15.22752c-82.407755 0-149.843915-69.099671-149.843915-153.554824v-81.179317L76.851245 138.708224l70.635219-72.375507 799.278449 818.959059-70.635219 72.375507z"></path></svg></i>
                                            </button>
                                            <div class="audio-status">
                                                <div class="audio-status-text hide connected">connected<br>web-socket</div>
                                            </div>
                                            <div class="info"></div>
                                        </div>
                                    </div>
                                </div>
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
                                    <button type="button" class="btn-blind">
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
                                                        <i style="display: inline-block;"><button type="button" class="btn-blind"><span class="ant-badge"><i class="anticon" style="margin: 0px; font-size: 26px;"><svg viewBox="-100 -100 1224 1224" data-icon="line" width="1em" height="1em" fill="currentColor" aria-hidden="true" focusable="false"><path d="M844.565138 794.918843v229.008892L532.162032 794.918843H72.265349a72.265349 72.265349 0 0 1-72.265349-72.26535V144.530699a72.265349 72.265349 0 0 1 72.265349-72.26535h867.184192a72.265349 72.265349 0 0 1 72.26535 72.26535v578.122794a72.265349 72.265349 0 0 1-72.26535 72.26535h-94.884403zM252.928723 289.061397a36.132675 36.132675 0 0 0 0 72.26535h289.061397a36.132675 36.132675 0 0 0 0-72.26535h-289.061397z m0 216.796048a36.132675 36.132675 0 0 0 0 72.26535h505.857445a36.132675 36.132675 0 1 0 0-72.26535h-505.857445z"></path></svg></i><div class="blind">Chat Box</div></span></button></i>
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
                                                        <div class="ant-col" style="padding-left: 4px; padding-right: 4px; flex: 1 1 0%;">
                                                            <span class="ant-typography ant-typography-warning">
                                                                <div class="ant-row-flex ant-row-flex-space-between gutter8" style="margin-left: -4px; margin-right: -4px;">
                                                                    <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                                                        <button type="button" class="ant-btn ant-btn-primary ant-btn-sm ant-btn-block">
                                                                            <i aria-label="icon: read" class="anticon anticon-read"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="read" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M928 161H699.2c-49.1 0-97.1 14.1-138.4 40.7L512 233l-48.8-31.3A255.2 255.2 0 0 0 324.8 161H96c-17.7 0-32 14.3-32 32v568c0 17.7 14.3 32 32 32h228.8c49.1 0 97.1 14.1 138.4 40.7l44.4 28.6c1.3.8 2.8 1.3 4.3 1.3s3-.4 4.3-1.3l44.4-28.6C602 807.1 650.1 793 699.2 793H928c17.7 0 32-14.3 32-32V193c0-17.7-14.3-32-32-32zM324.8 721H136V233h188.8c35.4 0 69.8 10.1 99.5 29.2l48.8 31.3 6.9 4.5v462c-47.6-25.6-100.8-39-155.2-39zm563.2 0H699.2c-54.4 0-107.6 13.4-155.2 39V298l6.9-4.5 48.8-31.3c29.7-19.1 64.1-29.2 99.5-29.2H888v488zM396.9 361H211.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5zm223.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c0-4.1-3.2-7.5-7.1-7.5H627.1c-3.9 0-7.1 3.4-7.1 7.5zM396.9 501H211.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5zm416 0H627.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5z"></path></svg></i>
                                                                            <span>Questions and Answers</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                                                        <button type="button" class="ant-btn ant-btn-primary ant-btn-sm ant-btn-block">
                                                                            <i aria-label="icon: read" class="anticon anticon-read"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="read" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M928 161H699.2c-49.1 0-97.1 14.1-138.4 40.7L512 233l-48.8-31.3A255.2 255.2 0 0 0 324.8 161H96c-17.7 0-32 14.3-32 32v568c0 17.7 14.3 32 32 32h228.8c49.1 0 97.1 14.1 138.4 40.7l44.4 28.6c1.3.8 2.8 1.3 4.3 1.3s3-.4 4.3-1.3l44.4-28.6C602 807.1 650.1 793 699.2 793H928c17.7 0 32-14.3 32-32V193c0-17.7-14.3-32-32-32zM324.8 721H136V233h188.8c35.4 0 69.8 10.1 99.5 29.2l48.8 31.3 6.9 4.5v462c-47.6-25.6-100.8-39-155.2-39zm563.2 0H699.2c-54.4 0-107.6 13.4-155.2 39V298l6.9-4.5 48.8-31.3c29.7-19.1 64.1-29.2 99.5-29.2H888v488zM396.9 361H211.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5zm223.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c0-4.1-3.2-7.5-7.1-7.5H627.1c-3.9 0-7.1 3.4-7.1 7.5zM396.9 501H211.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5zm416 0H627.1c-3.9 0-7.1 3.4-7.1 7.5v45c0 4.1 3.2 7.5 7.1 7.5h185.7c3.9 0 7.1-3.4 7.1-7.5v-45c.1-4.1-3.1-7.5-7-7.5z"></path></svg></i>
                                                                            <span>Rules and Penalties</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>

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
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<script src="/frontend/js/room.js"></script>
@endsection
