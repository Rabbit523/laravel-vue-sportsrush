var redirect_path = window.location.protocol + "//" + window.location.hostname;
$(".join_team").click(function () {
  var team_id = $(this).data('id');
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'join-team',
        data: {'team_id': $(this).data('id')},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
          setTimeout(function(){window.location = redirect_path + "/event/account/team-details?team_id="+team_id;}, 1000);            
        }
    });
});
