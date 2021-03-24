jQuery(document).ready(function() {
    $('#close_message_btn').on('click',function(){
        closeMessageNav();
    });
    loadRoomState();
    addCharge();
    
    Twilio.Video.createLocalTracks({
        audio: true,
        video: { width: 300 }
    }).then(function(localTracks) {
        return Twilio.Video.connect($('#accessToken').val(), {
            name: $('#roomName').val(),
            tracks: localTracks,
            video: { width: 300 }
        });
    }).then(function(room) {
        console.log('Successfully joined a Room: ', room.name);
        room.participants.forEach(participantConnected);
        var previewContainer = document.getElementById(room.localParticipant.sid);
        if (!previewContainer || !previewContainer.querySelector('video')) {
            alert(room.localParticipant.sid+' is lical user');
            participantConnected(room.localParticipant);
        }

        room.on('participantConnected', function(participant) {
            console.log("Joining: '" +  participant.identity +  "'");
            alert(participant.identity+' added');
            participantConnected(participant);
        });

        room.on('participantDisconnected', function(participant) {
            console.log("Disconnected: '"  + participant.identity +  "'");
            alert(participant.identity+' exited');
            participantDisconnected(participant);
        });
    });
    // additional functions will be added after this point
});
function closeMessageNav(){
    $('.sc-hwwEjo.dtxMPz .ant-tabs').prop('class','ant-tabs ant-tabs-right slide-menu-tabs collapsed ant-tabs-vertical ant-tabs-line');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-bar.ant-tabs-top-bar').prop('class','ant-tabs-bar ant-tabs-right-bar');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-extra-content').remove();
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-content.ant-tabs-content-animated.ant-tabs-top-content').prop('style','display:none;');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-content.ant-tabs-content-animated.ant-tabs-top-content').prop('class','ant-tabs-content ant-tabs-content-animated ant-tabs-right-content');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-ink-bar').prop('style','display:none;');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-tab-active').prop('aria-selected','false');
    $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-tab-active').prop('class',' ant-tabs-tab');
    $('.ant-drawer-content-wrapper').css('width',45);
    $('.sc-iyvyFf.bvgoZP').prop('style','padding-right: 45px;');

    $('.ant-tabs.ant-tabs-right button.message-btn').on('click',function(){
        $('.sc-hwwEjo.dtxMPz .ant-tabs').prop('class','ant-tabs ant-tabs-top slide-menu-tabs  ant-tabs-line');
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-bar.ant-tabs-right-bar').prop('class','ant-tabs-bar ant-tabs-top-bar');
        if($('#close_message_btn').html()==undefined){
            $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-bar').prepend('<div class="ant-tabs-extra-content" style="float: right;">\
                <button type="button" class="btn-blind" id="close_message_btn">\
                    <i aria-label="icon: right" tabindex="-1" class="anticon anticon-right" style="font-size: 20px; padding: 15px 12px;"><svg viewBox="64 64 896 896" focusable="false" class="" data-icon="right" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M765.7 486.8L314.9 134.7A7.97 7.97 0 0 0 302 141v77.3c0 4.9 2.3 9.6 6.1 12.6l360 281.1-360 281.1c-3.9 3-6.1 7.7-6.1 12.6V883c0 6.7 7.7 10.4 12.9 6.3l450.8-352.1a31.96 31.96 0 0 0 0-50.4z"></path></svg></i>\
                    <div class="blind">Collapse Menu</div>\
                </button>\
            </div>');
            $('#close_message_btn').on('click',function(){
                closeMessageNav();
            });
        }
        
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-content.ant-tabs-content-animated.ant-tabs-right-content').prop('style','margin-left: 0%;');
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-content.ant-tabs-content-animated.ant-tabs-right-content').prop('class','ant-tabs-content ant-tabs-content-animated ant-tabs-top-content');
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-ink-bar').prop('style','display: block; transform: translate3d(0px, 0px, 0px); width: 54px;');
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-tab:nth-child(1)').prop('aria-selected','true');
        $('.sc-hwwEjo.dtxMPz .ant-tabs .ant-tabs-nav-container .ant-tabs-tab:nth-child(1)').prop('class','ant-tabs-tab-active ant-tabs-tab');
        $('.ant-drawer-content-wrapper').css('width',320);
        $('.sc-iyvyFf.bvgoZP').prop('style','padding-right: 320px;');
    });
}
function participantConnected(participant) {
   console.log('Participant "%s" connected', participant.identity);
    alert(participant.identity+' participantConnected');
   //const div = document.createElement('div');
   //div.id = participant.sid;
   //div.setAttribute("style", "float: left; margin: 10px;");
   //div.innerHTML = "<div style='clear:both'>"+participant.identity+"</div>";

   participant.tracks.forEach(function(track) {
        trackAdded($('#media_video'), track);//trackAdded(div, track);
   });

   participant.on('trackAdded', function(track) {
        trackAdded($('#media_video'), track);//trackAdded(div, track);
   });
   participant.on('trackRemoved', trackRemoved);
   //document.getElementById('media-div').appendChild(div);   
}

function participantDisconnected(participant) {
   console.log('Participant "%s" disconnected', participant.identity);
   participant.tracks.forEach(trackRemoved);
   document.getElementById(participant.sid).remove();

   delCharge();
}

function trackAdded(div, track) {
   div.appendChild(track.attach());
   var video = div.getElementsByTagName("video")[0];
   if (video) {
       video.setAttribute("style", "max-width:300px;");
   }
}

function trackRemoved(track) {alert('removed track');
   track.detach().forEach( function(element) { element.remove();delCharge(); });
}

function addCharge(){
    var form_data = new FormData();
    form_data.append('room_id',$('#room_id').val());
    $.ajax({
        url: '/addCharge',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "text",
        success: function (response) {
            
        },
        error: function (response) {

        }
    });
}
function delCharge(){
    var form_data = new FormData();
    form_data.append('room_id',$('#room_id').val());
    $.ajax({
        url: '/delCharge',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "text",
        success: function (response) {
            
        },
        error: function (response) {

        }
    });
}

function loadRoomState(){
    var form_data = new FormData();
    form_data.append('room_id',$('#room_id').val());
    form_data.append('sel_user',$('#sel_user').val());
    $.ajax({
        url: '/loadRoomState',
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        },
        data: form_data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        dataType: "text",
        success: function (response) {
            $('#room_users').html(response);
        },
        error: function (response) {

        }
    });
}