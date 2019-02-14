var redirect_path = window.location.protocol + "//" + window.location.hostname;
$(".join_team").click(function () {    
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: 'join-team',
        data: {'team_id': $(this).data('id')},
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (e) {
          console.log(e);
          console.log(redirect_path + "/team-details?team_id="+$(this).data('id'));
          // setTimeout(function(){window.location = redirect_path + "/team-details?team_id="+$(this).data('id');}, 1000);            
        }
    });
});
