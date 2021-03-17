jQuery(document).ready(function() {
    refresh_rooms();
});
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