/*(function() {
    var startingTime = new Date().getTime();
    // Load the script
    var script = document.createElement("SCRIPT");
    script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
    script.type = 'text/javascript';
    document.getElementsByTagName("head")[0].appendChild(script);

    // Poll for jQuery to come into existance
    var checkReady = function(callback) {
        if (window.jQuery) {
            callback(jQuery);
        }
        else {
            window.setTimeout(function() { checkReady(callback); }, 20);
        }
    };
})();*/

var mailExists = false;
$.ajax({
    url: "/functions/php/user_exists.php",
    success: function(data) {
        if (data == 0) {
            mailExists = true;
        } else {
            mailExists = false;
        }
        if (mailExists) {
            var inputLoginMail = document.getElementById("email");
            inputLoginMail.setAttribute("style","border: 1px solid #c90808;")
        } else {
            var inputLoginMail = document.getElementById("email");
            inputLoginMail.setAttribute("style","border: 1px solid #73c20c;")
        }
    }
});
