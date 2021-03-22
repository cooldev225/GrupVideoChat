@extends('frontend.layouts.app')
<link href="frontend/css/home.css" rel="stylesheet">
@section('content')
<div id="root">
    <header class="sc-EHOje dLbkUD ant-layout-header">
        <div class="sc-htoDjs jSKSzv">
            <div class="ant-row-flex ant-row-flex-space-between ant-row-flex-middle">
                <div class="ant-col">
                    <div class="ant-row-flex ant-row-flex-middle" style="cursor: pointer;">
                        <div class="ant-col">
                            <span class="ant-avatar sc-dnqmqq bDsesi ant-avatar-circle ant-avatar-image">
                                <img src="images/logo.png" alt="logo">
                            </span>
                        </div>
                        <div class="ant-col">
                            <div class="sc-iwsKbI cHKMTT">TalkTogetherClub</div>
                        </div>
                    </div>
                </div>
                <div class="ant-col">
                    <div class="header-profile ant-btn ant-btn-primary ant-btn-background-ghost ant-dropdown-trigger sc-htpNat cRPutD">
                        <div class="ant-row-flex ant-row-flex-space-between ant-row-flex-middle">
                            <div class="ant-col">
                                <span class="ant-avatar ant-avatar-circle ant-avatar-image" style="width: 30px; height: 30px; line-height: 30px; font-size: 18px;">
                                    <img src="images/avatar/{{$avatar}}" alt="avatar">
                                </span>
                            </div>
                            <div class="ant-col">
                                <span class="sc-bxivhb iNdljk">
                                    <span>{{$full_name}}</span>
                                    <i aria-label="icon: caret-down" class="anticon anticon-caret-down" style="margin-left: 5px;">
                                        <svg viewBox="0 0 1024 1024" focusable="false" class="" data-icon="caret-down" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M840.4 300H183.6c-19.7 0-30.7 20.8-18.5 35l328.4 380.8c9.4 10.9 27.5 10.9 37 0L858.9 335c12.2-14.2 1.2-35-18.5-35z"></path></svg>
                                    </i>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                    
                        <div class="header-profile-dropdown ant-dropdown ant-dropdown-placement-bottomRight">
                            <ul class="ant-dropdown-menu ant-dropdown-menu-light ant-dropdown-menu-root ant-dropdown-menu-vertical" role="menu" tabindex="0">
                                <li class="ant-dropdown-menu-item ant-dropdown-menu-item-disabled" role="menuitem" aria-disabled="true" style="text-align: center;">
                                    <span class="ant-avatar ant-avatar-circle ant-avatar-image" style="width: 64px; height: 64px; line-height: 64px; font-size: 18px;">
                                        <img src="images/avatar/{{$avatar}}">
                                    </span>
                                    <div>{{$full_name}}</div>
                                    <div>{{$email}}</div>
                                </li>
                                <li class="ant-dropdown-menu-item" role="menuitem">
                                    <a href="https://aboutme.google.com/" target="_blank" rel="noopener noreferrer">
                                        <i aria-label="icon: user" class="anticon anticon-user">
                                            <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="user" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M858.5 763.6a374 374 0 0 0-80.6-119.5 375.63 375.63 0 0 0-119.5-80.6c-.4-.2-.8-.3-1.2-.5C719.5 518 760 444.7 760 362c0-137-111-248-248-248S264 225 264 362c0 82.7 40.5 156 102.8 201.1-.4.2-.8.3-1.2.5-44.8 18.9-85 46-119.5 80.6a375.63 375.63 0 0 0-80.6 119.5A371.7 371.7 0 0 0 136 901.8a8 8 0 0 0 8 8.2h60c4.4 0 7.9-3.5 8-7.8 2-77.2 33-149.5 87.8-204.3 56.7-56.7 132-87.9 212.2-87.9s155.5 31.2 212.2 87.9C779 752.7 810 825 812 902.2c.1 4.4 3.6 7.8 8 7.8h60a8 8 0 0 0 8-8.2c-1-47.8-10.9-94.3-29.5-138.2zM512 534c-45.9 0-89.1-17.9-121.6-50.4S340 407.9 340 362c0-45.9 17.9-89.1 50.4-121.6S466.1 190 512 190s89.1 17.9 121.6 50.4S684 316.1 684 362c0 45.9-17.9 89.1-50.4 121.6S557.9 534 512 534z"></path></svg>
                                        </i> Your Profile
                                    </a>
                                </li>
                                <li class="ant-dropdown-menu-item" role="menuitem" onclick="location.href='logout';">
                                    <i aria-label="icon: logout" class="anticon anticon-logout">
                                        <svg viewBox="64 64 896 896" focusable="false" class="" data-icon="logout" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M868 732h-70.3c-4.8 0-9.3 2.1-12.3 5.8-7 8.5-14.5 16.7-22.4 24.5a353.84 353.84 0 0 1-112.7 75.9A352.8 352.8 0 0 1 512.4 866c-47.9 0-94.3-9.4-137.9-27.8a353.84 353.84 0 0 1-112.7-75.9 353.28 353.28 0 0 1-76-112.5C167.3 606.2 158 559.9 158 512s9.4-94.2 27.8-137.8c17.8-42.1 43.4-80 76-112.5s70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 7.9 7.9 15.3 16.1 22.4 24.5 3 3.7 7.6 5.8 12.3 5.8H868c6.3 0 10.2-7 6.7-12.3C798 160.5 663.8 81.6 511.3 82 271.7 82.6 79.6 277.1 82 516.4 84.4 751.9 276.2 942 512.4 942c152.1 0 285.7-78.8 362.3-197.7 3.4-5.3-.4-12.3-6.7-12.3zm88.9-226.3L815 393.7c-5.3-4.2-13-.4-13 6.3v76H488c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h314v76c0 6.7 7.8 10.5 13 6.3l141.9-112a8 8 0 0 0 0-12.6z"></path></svg>
                                    </i> Logout
                                </li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="ant-row-flex ant-row-flex-center">
                <div class="sc-gZMcBi jhRrEw">Language Practice Community</div>
            </div>
        </div>
    </header>
    <main class="sc-bZQynM jQAXPO ant-layout-content">
        <div class="sc-htoDjs jSKSzv">
            <div class="sc-TOsTZ ddXBUH">
                <div class="ant-row-flex ant-row-flex-space-between padding-10">
                    <div class="ant-col">
                        <div class="ant-row-flex gutter8" style="margin-left: -4px; margin-right: -4px;">
                            <div class="ant-col" style="padding-left: 4px; padding-right: 4px;">
                                <button type="button" onclick="showCreateModal();" class="ant-btn no-border ant-btn-primary" ant-click-animating-without-extra-node="false"><i aria-label="icon: plus" class="anticon anticon-plus"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="plus" width="1em" height="1em" fill="currentColor" aria-hidden="true"><defs><style></style></defs><path d="M482 152h60q8 0 8 8v704q0 8-8 8h-60q-8 0-8-8V160q0-8 8-8z"></path><path d="M176 474h672q8 0 8 8v60q0 8-8 8H176q-8 0-8-8v-60q0-8 8-8z"></path></svg></i><span>Create a new group</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ant-list ant-list-grid">
                <div class="ant-spin-nested-loading">
                    <div class="ant-spin-container">
                        <div id="rooms" class="ant-row" style="margin-left: -12px; margin-right: -12px;">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<div role="document" class="ant-modal" style="width: 520px; transform-origin: -185px -99.75px;position:absolute;left:calc(50% - 260px);top:140px;">
    <div class="ghost-div"></div>
    <div class="ant-modal-content">
        <div class="ant-modal-body">
            <div class="ant-spin-nested-loading">
                <div class="ant-spin-container">
                    <form autocomplete="off" class="ant-form ant-form-horizontal ant-form-hide-required-mark">
                        <div style="font-size: 0.9em;">
                            <span class="ant-typography ant-typography-danger">NOTE:</span>
                            You will get banned if you abuse the Topic 
                        </div>
                        <br>
                        <div class="ant-row" style="margin-left: -8px; margin-right: -8px;">
                            <div class="ant-col ant-col-md-16" style="padding-left: 8px; padding-right: 8px;">
                                <div class="ant-row ant-form-item">
                                    <div class="ant-col ant-form-item-label">
                                        <label for="GroupForm_topic" class="ant-form-item-no-colon" title="Topic">Topic</label>
                                    </div>
                                    <div class="ant-col ant-form-item-control-wrapper">
                                        <div class="ant-form-item-control">
                                            <span class="ant-form-item-children">
                                                <span class="ant-input-affix-wrapper">
                                                    <input placeholder="Any topic" type="text" id="room_name" class="ant-input" value="">
                                                    <span class="ant-input-suffix"></span>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-col ant-col-md-8" style="padding-left: 8px; padding-right: 8px;">
                                <div>
                                    <div class="ant-row ant-form-item">
                                        <div class="ant-col ant-form-item-label">
                                            <label for="GroupForm_maxPeople" class="ant-form-item-required ant-form-item-no-colon" title="Maximum People">Maximum People</label>
                                        </div>
                                        <div class="ant-col ant-form-item-control-wrapper">
                                            <div class="ant-form-item-control">
                                                <span class="ant-form-item-children">
                                                    <span class="ant-input-affix-wrapper">
                                                        <select id="room_size" class="ant-input">
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                        <span class="ant-input-suffix"></span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ant-modal-footer">
            <div>
                <button type="button" onclick="$('.ant-modal').fadeOut();" class="ant-btn" ant-click-animating-without-extra-node="false">
                    <span>Cancel</span>
                </button>
                <button type="button" onclick="submitGroup();" class="ant-btn ant-btn-primary">
                    <span>Create</span>
                </button>
            </div>
        </div>
        </div>
        
    </div>
</div>

<script src="frontend/js/home.js"></script>
@endsection
