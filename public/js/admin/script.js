$(document).ready(function() {
    $("#current_pwd").keyup(function() {
        var current_pwd = $("#current_pwd").val();
        $.ajax({
            type: "POST",
            url: "/admin/check-current-pwd",
            data: { current_pwd: current_pwd },
            success: function(resp) {
                if (resp == "false") {
                    $(".chk_current_pwd").html(
                        "<font color=red>Current password is incorrect</font>"
                    );
                } else if (resp == "true") {
                    $(".chk_current_pwd").html(
                        "<font color=green>Current password matched</font>"
                    );
                }
            },
            error: function(resp) {
                alert("Error");
            }
        });
    });
});
