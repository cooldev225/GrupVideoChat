<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>
<script src="//media.twiliocdn.com/sdk/js/video/v1/twilio-video.min.js"></script>
<div class="content">
    <div class="title m-b-md">
        Video Chat Rooms
    </div>
    <div class="params" style="display:none;">
        <input type="hidden" id="accessToken" value="{{$accessToken}}"/>
        <input type="hidden" id="room_id" value="{{$room_id}}"/>
        <input type="hidden" id="roomName" value="{{$roomName}}"/>
        <input type="hidden" id="sid" value="{{$sid}}"/>
        <input type="hidden" id="token" value="{{$token}}"/>
        <input type="hidden" id="key" value="{{$key}}"/>
        <input type="hidden" id="secret" value="{{$secret}}"/>
    </div>
    <div id="media-div">
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
jQuery(document).ready(function() {
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
            participantConnected(room.localParticipant);
        }

        room.on('participantConnected', function(participant) {
            console.log("Joining: '" +  participant.identity +  "'");
            participantConnected(participant);
        });

        room.on('participantDisconnected', function(participant) {
            console.log("Disconnected: '"  + participant.identity +  "'");
            participantDisconnected(participant);
        });
    });
    // additional functions will be added after this point
});
function participantConnected(participant) {
   console.log('Participant "%s" connected', participant.identity);

   const div = document.createElement('div');
   div.id = participant.sid;
   div.setAttribute("style", "float: left; margin: 10px;");
   div.innerHTML = "<div style='clear:both'>"+participant.identity+"</div>";

   participant.tracks.forEach(function(track) {
       trackAdded(div, track)
   });

   participant.on('trackAdded', function(track) {
       trackAdded(div, track)
   });
   participant.on('trackRemoved', trackRemoved);
   document.getElementById('media-div').appendChild(div);

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

function participantDisconnected(participant) {
   console.log('Participant "%s" disconnected', participant.identity);

   participant.tracks.forEach(trackRemoved);
   document.getElementById(participant.sid).remove();

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

function trackAdded(div, track) {
   div.appendChild(track.attach());
   var video = div.getElementsByTagName("video")[0];
   if (video) {
       video.setAttribute("style", "max-width:300px;");
   }
}

function trackRemoved(track) {
   track.detach().forEach( function(element) { element.remove() });
}
</script>