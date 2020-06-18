<?php
include('session.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <script>
        function includeHTML(name) {
            var z, i, elmnt, file, xhttp;
            /* Loop through a collection of all HTML elements: */
            z = document.getElementsByTagName("*");
            for (i = 0; i < z.length; i++) {
                elmnt = z[i];
                /*search for elements with a certain atrribute:*/
                //file = elmnt.getAttribute("w3-include-html");
                file = elmnt.getAttribute(name);
                if (file) {
                    /* Make an HTTP request using the attribute value as the file name: */
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            if (this.status == 200) {
                                elmnt.innerHTML = this.responseText;
                            }
                            if (this.status == 404) {
                                elmnt.innerHTML = "Page not found.";
                            }
                            /* Remove the attribute, and call this function once more: */
                            //elmnt.removeAttribute("w3-include-html");
                            elmnt.removeAttribute(name);
                            includeHTML();
                        }
                    }
                    //xhttp.open("GET", file, true);
                    xhttp.open("GET", file, true);
                    xhttp.send();
                    /* Exit the function: */
                    return;
                }
            }
        }
    </script>

    <div head="..\add\01head.html">
        <script>
            includeHTML("head");
        </script>
    </div>


    <script src="\includes\js\parameter.js"></script>

    <script src="https://www.google.com/recaptcha/api.js?render=6LctbbsUAAAAAHVc5Cp-j8FZKOZG1wAH0eUV690D"></script>

</head>
<body>
<!--header start here-->
<h1>Página de Inicio</h1>
<div class="header agile">
	<div class="wrap">
		<div class="login-main wthree">
			<div class="login">
			<h3>Bienvenid@ al sistema  <i><?php echo $login_session; ?></i></h3>

			<div class="clear"> </div>
				<h4><a href="logout.php"> Cerrar sesión</a></h4>
			</div>


		</div>
	</div>
</div>

</body>
</html>
