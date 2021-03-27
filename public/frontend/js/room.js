var video_element=null;
var sel_identity=0;
// Get handle to the chat div
var $chatWindow = $('.sc-cmTdod.ktfjmN');
// Our interface to the Chat service
var chatClient;
// A handle to the "general" chat channel - the one and only channel we
// will have in this sample app
var generalChannel;
// The server will assign the client a random username - store that value
// here
var username=$('#me_username').val();
jQuery(document).ready(function() {
    video_element=document.getElementById('media_video');
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
            //alert(room.localParticipant.sid+' is lical user');
            $('#media_video img').remove();
            sel_identity=room.localParticipant.identity;
            username=sel_identity;
            participantConnected(room.localParticipant);
        }

        room.on('participantConnected', function(participant) {
            console.log("Joining: '" +  participant.identity +  "'");
            participantConnected(participant);
            //if(sel_identity!=participant.identity)$(video_element).find('#video_'+participant.identity).css('display','none');
        });

        room.on('participantDisconnected', function(participant) {
            console.log("Disconnected: '"  + participant.identity +  "'");
            participantDisconnected(participant);
        });
    });
    // additional functions will be added after this point

    // Initialize the Chat client
    Twilio.Chat.Client.create($('#accessToken').val()).then(client => {
        console.log('Created chat client');
        chatClient = client;
        chatClient.getSubscribedChannels().then(createOrJoinGeneralChannel);
  
        // when the access token is about to expire, refresh it
        chatClient.on('tokenAboutToExpire', function() {
          refreshToken(username);
        });
  
        // if the access token already expired, refresh it
        chatClient.on('tokenExpired', function() {
          refreshToken(username);
        });
    }).catch(error => {
        console.error(error);
        print('There was an error creating the chat client:<br/>' + error, username, new Date());
    });
    
    // Send a new message to the general channel
      var $input = $('#chat-input');
      $input.on('keyup', function(e) {
    
        if (e.keyCode == 13&&$input.val()!='') {
          if (generalChannel === undefined) {
            print('The Chat Service is not configured. Please check your .env file.', username, new Date());
            return;
          }
          generalChannel.sendMessage($input.val())
          $input.val('');
        }
      });
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
   //const div = document.createElement('div');
   //div.id = participant.sid;
   //div.setAttribute("style", "float: left; margin: 10px;");
   //div.innerHTML = "<div style='clear:both'>"+participant.identity+"</div>";

   participant.tracks.forEach(function(track) {
        trackAdded(video_element, track, participant.identity);
   });

   participant.on('trackAdded', function(track) {
        trackAdded(video_element, track, participant.identity);
   });
   participant.on('trackRemoved', trackRemoved);
   //document.getElementById('media-div').appendChild(div);   
   loadRoomState();
}

function participantDisconnected(participant) {
   console.log('Participant "%s" disconnected', participant.identity);
   participant.tracks.forEach(trackRemoved);
   document.getElementById(participant.sid).remove();
   loadRoomState();
   delCharge();
}

function trackAdded(div, track, identity) {
   var obj=track.attach();
   //obj=obj.replace('<audio ','<audio id="audio_'+identity+'" ');
   //obj=obj.replace('<video ','<video id="audio_'+identity+'" ');
   div.appendChild(obj);
   //div.each('audio',function(index){alert($(this).prop('id'));if($(this).prop('id')==undefined)$(this).prop('id','audio_'+identity);});
   //div.each('video',function(index){if($(this).prop('id')==undefined)$(this).prop('id','video_'+identity);});
   //$(obj).find('video').prop('id','video_'+identity);
   //$(obj).find('audio').prop('id','audio_'+identity);   
   
   var video = div.getElementsByTagName("video")[0];
   if (video) {
       video.setAttribute("id", "video_"+identity);
       if(sel_identity==identity)video.setAttribute("style", "display:block;");
       else video.setAttribute("style", "display:none;");
   }

   var audio = div.getElementsByTagName("audio")[0];
   if (audio) {
       audio.setAttribute("id", "audio_"+identity);
   }
}

function trackRemoved(track) {//alert('removed track');
   track.detach().forEach( function(element) { element.remove(); });
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
            $('.avatar-btn').on('click',function(){
                var identity=$(this).prop('id').replace('avatar_','');
                if($(this).parent().hasClass('active'))return;
                $('.c-ktHwxA.btyRFv').removeClass('active');
                $('.sc-cIShpX.kQqkBu').removeClass('active');
                $(this).parent().parent().find('.c-ktHwxA.btyRFv').addClass('active');
                $(this).parent().parent().find('.sc-cIShpX.kQqkBu').addClass('active');
                $('#media_video').each('video',function(index){
                    if($(this).prop('id')!='video_'+identity)$(this).css('display','none');
                    else $(this).css('display','block');
                });
            });
        },
        error: function (response) {

        }
    });
}

function refreshToken(identity) {
    console.log('Token about to expire');
    var form_data = new FormData();
    form_data.append('room_id',$('#room_id').val());
    $.ajax({
        url: '/updateToken',
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
            $('#accessToken').val(response);
        },
        error: function (response) {

        }
    });
  }
// Helper function to print info messages to the chat window
function print(msg, identity, time) {
    var avatar=$('#avatar_'+identity).parent().find('div.avatar span img').prop('src');
    var name=$('#avatar_'+identity).parent().find('div.name div').html();
    time=formatDate(time);
    var html='<div class="message shift-mode  "><div class="user"><div class="avatar"><span class="ant-avatar ant-avatar-square ant-avatar-image"><img src="'+avatar+'"></span></div><div class="name primary">'+name+'</div><div class="time">'+time+'</div></div><div class="text"><div class="html"><p>'+msg+'</p></div><div class="shift shift-visible"><div class="ant-row-flex ant-row-flex-end actions" style="margin-left: -4px; margin-right: -4px;"><div class="ant-col" style="padding-left: 4px; padding-right: 4px; flex: 1 1 0%;"><div class="ant-row-flex" style="margin-left: -4px; margin-right: -4px;"></div></div><div class="ant-col" style="padding-left: 4px; padding-right: 4px;"><button type="button" class="ant-btn ant-btn-link"><span>Quote</span></button></div></div></div></div></div>';
    $chatWindow.append(html);
}
function formatDate(date) {
    var d = new Date(date);
    var hh = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    var dd = "AM";
    var h = hh;
    if (h >= 12) {
      h = hh - 12;
      dd = "PM";
    }
    if (h == 0) {
      h = 12;
    }
    m = m < 10 ? "0" + m : m;
  
    s = s < 10 ? "0" + s : s;
  
    return h+':'+m+' '+dd;
  }
  // Helper function to print chat message to the chat window
  function printMessage(fromUser, message) {
    var $user = $('<span class="username">').text(fromUser + ':');
    if (fromUser === username) {
      $user.addClass('me');
    }
    var $message = $('<span class="message">').text(message);
    var $container = $('<div class="message-container">');
    $container.append($user).append($message);
    $chatWindow.append($container);
    $chatWindow.scrollTop($chatWindow[0].scrollHeight);
  }
  function createOrJoinGeneralChannel() {
    chatClient.getChannelByUniqueName($('#roomName').val())
    .then(function(channel) {
      generalChannel = channel;
      console.log('Found '+$('#roomName').val()+' channel:');
      console.log(generalChannel);
      setupChannel();
    }).catch(function() {
      // If it doesn't exist, let's create it
      console.log('Creating '+$('#roomName').val()+' channel');
      chatClient.createChannel({
        uniqueName: $('#roomName').val(),
        friendlyName: $('#roomName').val()+' Chat Channel'
      }).then(function(channel) {
        console.log('Created '+$('#roomName').val()+' channel:');
        console.log(channel);
        generalChannel = channel;
        setupChannel();
      }).catch(function(channel) {
        console.log('Channel could not be created:');
        console.log(channel);
      });
    });
  }
  // Set up channel after it has been found
  function setupChannel() {
    // Join the general channel
    generalChannel.join().then(function(channel) {
      print('Joined channel as <span class="me">' + username + '</span>.', username, new Date());
    }).catch(function() {
        print('already joined ' + username , username, new Date());
    });

    // Listen for new messages sent to the channel
    generalChannel.on('messageAdded', function(message) {
        //printMessage(message.author, message.body);
        print(message.body,message.author,message.dateCreated);
      });
    // Listen for new messages sent to the channel
    generalChannel.on('memberLeft', function(data) {
        console(data);
        //print(message.body,message.author,message.dateCreated);
      });
  }