@extends('frontend.layouts.app')
<link href="frontend/css/home.css" rel="stylesheet">
@section('content')
<div class="content">
   <div class="title m-b-md">
       Video Chat Rooms
   </div>

  

   @if($_rooms)
   @foreach ($_rooms as $room)
       <a href="{{ url('/room/join/'.$room) }}">{{ $room }}</a>
   @endforeach
   @endif
</div>


<div class="sc-htoDjs jSKSzv">
    <div class="ant-list ant-list-grid">
        <div class="ant-spin-nested-loading">
            <div class="ant-spin-container">
                <div id="rooms" class="ant-row" style="margin-left: -12px; margin-right: -12px;display: flex;">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="frontend/js/home.js"></script>
@endsection
