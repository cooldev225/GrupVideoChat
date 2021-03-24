jQuery(document).ready(function() {
    refresh_rooms();
    $('.header-profile-dropdown').css('display','none');
    $('.ant-modal').css('display','none');
    $('.header-profile').on('click',function(){
        $('.header-profile-dropdown').toggle();
    });
    $('body').on('click',function(){
       //$('.ant-modal').css('display','none');
    });
    $('.g-signin2').bind('DOMNodeInserted DOMNodeRemoved',function(event){
        if (event.type == 'DOMNodeInserted') {
            $('.abcRioButton.abcRioButtonLightBlue').prop('style','');
            $('.abcRioButton.abcRioButtonLightBlue').prop('class','ant-btn no-border ant-btn-primary');
        } else {
            //alert('Content removed! Current content:' + '\n\n' + this.innerHTML);
        }    
    });
});
function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); 
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail());
    var form_data = new FormData();
    form_data.append('first_name',profile.getName());
    form_data.append('username',profile.getId());
    form_data.append('email',profile.getEmail());
    form_data.append('avatar',profile.getImageUrl());
    $.ajax({
        url: '/signInUpByGoogle',
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
            location.reload();
        },
        error: function (response) {

        }
    });
}
function showCreateModal(){
    var w=($(window).width());
    $('.ghost-div').css('width',eval(w)*2);
    $('.ghost-div').css('height',$(window).height());
    $('.ghost-div').css('left',-$(window).width());
    $('.ghost-div').css('top',-140);
    $('#room_name').val('');
    $('.ant-modal').fadeIn();
    testsign();
}
function refresh_rooms(){
    var form_data = new FormData();
    $.ajax({
        url: '/getRoomsView',
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
            $('#rooms').html(response);
            //setTimeout(refresh_rooms(),5000);
            setTimeout(function() {
                refresh_rooms();
              }, 5000);
        },
        error: function (response) {

        }
    });
}
function submitGroup(){
    if($('#room_name').val()==''){
        $('#room_name').focus();
        return;
    }
    var form_data = new FormData();
    form_data.append('room_size',$('#room_size').val());
    form_data.append('room_name',$('#room_name').val());
    $.ajax({
        url: '/addRoom',
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
            alert(response);
        },
        error: function (response) {

        }
    });
    $('.ant-modal').fadeOut();
}


function testsign(){
    var form_data = new FormData();
    form_data.append('first_name','testuser');
    form_data.append('username','123567890');
    form_data.append('email','test@test.test');
    form_data.append('avatar','2.jpg');
    $.ajax({
        url: '/signInUpByGoogle',
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
            location.reload();
        },
        error: function (response) {

        }
    });
}