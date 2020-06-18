<?php
include('postlogincall.php');
?>
<!DOCTYPE HMTL>
<html lang="es">

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
    <!--
    <div onload="includeHTML();" w3-include-html="\add\header.html">
        <script>
            includeHTML();
        </script>
    </div>
    -->


    <div head="..\add\01head.html">
        <script>
            includeHTML("head");
        </script>
    </div>


    <!-- Funciones JS-->
    <script src="\includes\js\parameter.js"></script>
    <!-- Funciones JS FIN-->

    <script src="https://www.google.com/recaptcha/api.js?render=6LctbbsUAAAAAHVc5Cp-j8FZKOZG1wAH0eUV690D"></script>

</head>

<body>
<b style="background-color:#848484;">
    <div menu="..\add\02menu.html">
        <script>
            includeHTML("menu");
        </script>
    </div>


    <main class="container" role="main" style="padding-bottom: 70px;">
        <div class="my-3 p-4 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-5 md-5">Register compled</h6>
            <div class="containter">
                <div class="row justify-content-md-center">
                    <div class="row">
                        <h3>Bienvenid@ al sistema  <i><?php echo $login_session; ?></i></h3>

                        			<div class="clear"> </div>
                        				<h4><a href="logout.php"> Cerrar sesión</a></h4>
                        			</div>

                    </div>
                </div>
            </div>

            <!--<div footer="..\add\90footer.html">
                <script>
                    includeHTML("footer");
                </script>
            </div>-->
        </div>
        <link rel="import" href="\en\add\91js.html" onload="handleLoad(event)"
              onerror="handleError(event, this.href)">

    </main>
</b>
</body>
</html>