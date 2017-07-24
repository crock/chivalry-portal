$(document).ready(function(){
    $.ajax({
        url: "js/player_count.txt",
        success: function(result) {
            $("h1").html(result + " players are <span class='online'>online</span>");
        },
        error: function() {
            $("h1").html("Could not fetch online players");
        }
    });
    jQuery.get('config.txt', function(data) {
        var lines = data.split('\n');
        $('h3').html(lines[0]);
    });
});

