(function ($) {
    "use strict";

    var message = $(".cmessage");

    // Success function
    function done_func(response) {
        message.fadeIn().removeClass("alert-danger").addClass("alert-success");
        message.text(response);
        setTimeout(function () {
            message.fadeOut();
        }, 2000);
        // form.find('input:not([type="submit"]), textarea').val("");
    }
})(jQuery);
