<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

var mailExists = false;
$.ajax({
    url: "..\functions\php\user_exists.php",
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
