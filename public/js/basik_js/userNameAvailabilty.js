$(".usernamefield").parsley();
window.ParsleyValidator.addValidator("usernamevalidator", {
    validateString: function(value) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
        var availabilty = $.ajax({
            url: "/check-user-name-availability",
            type: "POST",
            async: false,
            data: { _token: CSRF_TOKEN, message: $(".usernamefield").val() },
            success: function(data) {}
        });
        if (availabilty.responseText == 0) {
            return false;
        } else {
            return true;
        }
    },
    messages: {
        en: "This username is taken"
    }
});
