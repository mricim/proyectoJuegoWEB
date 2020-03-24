<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8_general_ci"><!-- OR uft-8 -->

    <!---------------------------------------------
MrICIM Template Style
Name:        Nameshed
Author :     http://www.mricim.ddns.net
Date:        November 2016
License:  This free Blogger template is licensed under the Creative Commons Attribution 3.0 License, which permits both personal use. However, to satisfy the 'attribution' clause of the license, you are required to keep the footer links intact which provides due credit to its authors. For more specific details about the license, you may visit the URL below:
http://creativecommons.org/licenses/by/3.0
--------------------------------------------->
    <!-- Internet explorer -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Para los moviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--CARGAR JAVASCRIPT-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="http://unatienda.localhostnadacss/bootstrap.css" rel="stylesheet">
    <!--
        <link rel="stylesheet" href="\includes\bootstrap\4.3.1\css\bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    -->
    <!-- FIN Bootstrap CSS -->

    <!--FANCYBOX-->
    <link rel="stylesheet" href="http://unatienda.localhostnadaincludes/fancybox_resourses/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- MIS PROPIA CSS -->
    <link href="http://unatienda.localhostnadacss/mis_estilos.css" rel="stylesheet">
    <!-- cierre MIs PROPIA CSS -->


    <!--SHARETHIS
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "26e04eb8-b838-468b-a88b-95f0a6fda7d5", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
FIN SHARETHIS-->




    <!-- Editor de texto -->
    <script src="http://unatienda.localhostnadajs/tinymce/tinymce.min.js"></script>

    <!-- ESTRELLAS -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://unatienda.localhostnadaPRUEBAS/stars/css/star-rating.css" media="all" type="text/css" />
    <link rel="stylesheet" href="http://unatienda.localhostnadaPRUEBAS/stars/css/theme-krajee-fa.css" media="all" type="text/css" />
    <link rel="stylesheet" href="http://unatienda.localhostnadaPRUEBAS/stars/css/theme-krajee-svg.css" media="all" type="text/css" />
    <link rel="stylesheet" href="http://unatienda.localhostnadaPRUEBAS/stars/css/theme-krajee-uni.css" media="all" type="text/css" />
    <script src="http://unatienda.localhostnadaPRUEBAS/stars/js/star-rating.js" type="text/javascript"></script>
    <script src="http://unatienda.localhostnadaPRUEBAS/stars/js/star-rating_locale_es.js"></script> <!-- FIN DE CSS-->
    <title>Principal</title>
    <style>
        #bg {
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }

        body {
            padding-top: 5px;
            z-index: 3;
        }
    </style>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body style="background-color: #848484;">
    <img id="bg" src="http://unatienda.localhostnadaincludes_folio/b1.png" alt="background" />
    <div id="aureola" class='container'>
        <br><br>
    </div>
    <!--MENU-->
    <style>
        nav.navbar {
            background-color: #BDBDBD;
        }
    </style>
    <!--EL MENU-->
    <div id='menu' class='container'>
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="http://unatienda.localhostnadaindex.php">Menú</a>
                        </div>
                        <!--salida-->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <span class="sr-only">(current)</span>
                                <li><a href="http://unatienda.localhostnadacontacto.php">Contacto</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Usuarios registrados <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="http://unatienda.localhostnadalibro_de_visitas.php">Libro de visitas</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Blog</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-left" role="search" method="post" action="buscador/buscar.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                                <button type="submit" class="btn btn-default">Enviar</button>
                            </form>

                            <ul class="nav navbar-nav">
                                <!-- HORA-->
                                <span class="sr-only">(current)</span>
                                <li><a id="hora"></a></li>
                                <script>
                                    var myVar = setInterval(myTimer, 1000);

                                    function myTimer() {
                                        var d = new Date();
                                        document.getElementById("hora").innerHTML = d.toLocaleTimeString();
                                    }
                                </script>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <!--ADMINISTRACION-->
                                <!--USUARIOS-->

                                <li class='dropdown'>
                                    <a class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>Usuarios<span class='caret'></span></a>
                                    <ul class='dropdown-menu' role='menu'>
                                        <li><a href='http://unatienda.localhostnadacuentas/registrarse.php'>registrarse</a></li>
                                        <li class='divider'></li>
                                        <li><a href='http://unatienda.localhostnadacuentas/login.php'>logearse</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
    <!-- FIN DEL MENU-->
    <!-- FIN DE MENU-->
    <br>
    <div id="stqar" class='container' style="position: relative;">
        <div id='caja' style="background-color: #FFFFFF; border-radius: 10px 10px; opacity:0.9; position:absolute; z-index:-1; top:0; left:0; right: 0; bottom:0;"></div>
        <!--Inicio NOMBRE DE LA PAGUINA-->
        <br>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" align="center" style="background-color: #58ACFA; -webkit-border-radius: 10px 10px; -moz-border-radius: 10px 10px;">
                <h1><b>Principal</b></h1>
            </div>
        </div><br>
        <!--Fin NOMBRE DE LA PAGUINA-->
        <!-- FIN ENCIMA-->
        <!--ESCRIBIR AQUI-->
        <div class="row">
            <div class="container-fluid col-md-3">
                <!--MENU DE PRODUCTOS-->

                <form method="get" action="ingreso_registrarse.php">
                    <div style="background-color: #FFFFFF;" align="left">
                        <div class="dropdown">
                            <ul class="nav nav-tabs nav-stacked">

                                <li class="dropdown">
                                    <a style="color:black" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="badge">5</span> &nbsp; <font face="verdana">MAQUILLAJE</font>&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=1"><span class="badge">0</span> &nbsp; TRATAMIENTOS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=1"><span class="badge">0</span> &nbsp; Anti-Edad</a></li>
                                                <li><a href="buscador/buscar.php?selector2=2"><span class="badge">0</span> &nbsp; Corrector de arrugas</a></li>
                                                <li><a href="buscador/buscar.php?selector2=3"><span class="badge">0</span> &nbsp; Detoxificadores</a></li>
                                                <li><a href="buscador/buscar.php?selector2=4"><span class="badge">0</span> &nbsp; Desmaquillantes</a></li>
                                                <li><a href="buscador/buscar.php?selector2=5"><span class="badge">0</span> &nbsp; Protector solar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=2"><span class="badge">2</span> &nbsp; ROSTRO &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=13"><span class="badge">0</span> &nbsp; Blush</a></li>
                                                <li><a href="buscador/buscar.php?selector2=12"><span class="badge">0</span> &nbsp; Polvos de sol</a></li>
                                                <li><a href="buscador/buscar.php?selector2=11"><span class="badge">1</span> &nbsp; Colorete</a></li>
                                                <li><a href="buscador/buscar.php?selector2=10"><span class="badge">0</span> &nbsp; Polvos e iluminadores</a></li>
                                                <li><a href="buscador/buscar.php?selector2=9"><span class="badge">0</span> &nbsp; Maquillajes buena cara</a></li>
                                                <li><a href="buscador/buscar.php?selector2=8"><span class="badge">0</span> &nbsp; Maquillajes</a></li>
                                                <li><a href="buscador/buscar.php?selector2=7"><span class="badge">0</span> &nbsp; Correctores</a></li>
                                                <li><a href="buscador/buscar.php?selector2=6"><span class="badge">1</span> &nbsp; Bases</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=3"><span class="badge">1</span> &nbsp; OJOS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=18"><span class="badge">1</span> &nbsp; Cejas</a></li>
                                                <li><a href="buscador/buscar.php?selector2=17"><span class="badge">0</span> &nbsp; Eyeline</a></li>
                                                <li><a href="buscador/buscar.php?selector2=16"><span class="badge">0</span> &nbsp; Lapices</a></li>
                                                <li><a href="buscador/buscar.php?selector2=15"><span class="badge">0</span> &nbsp; Sombras</a></li>
                                                <li><a href="buscador/buscar.php?selector2=14"><span class="badge">0</span> &nbsp; Mascaras</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=4"><span class="badge">0</span> &nbsp; LABIOS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=22"><span class="badge">0</span> &nbsp; Tratamientos</a></li>
                                                <li><a href="buscador/buscar.php?selector2=21"><span class="badge">0</span> &nbsp; Contorno de labios</a></li>
                                                <li><a href="buscador/buscar.php?selector2=20"><span class="badge">0</span> &nbsp; Gloss</a></li>
                                                <li><a href="buscador/buscar.php?selector2=19"><span class="badge">0</span> &nbsp; Barra de labios</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=5"><span class="badge">1</span> &nbsp; UÑAS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=23"><span class="badge">1</span> &nbsp; Laca de uñas</a></li>
                                                <li><a href="buscador/buscar.php?selector2=24"><span class="badge">0</span> &nbsp; Manicura</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=6"><span class="badge">0</span> &nbsp; ACCESORIOS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=25"><span class="badge">0</span> &nbsp; Pinceles</a></li>
                                                <li><a href="buscador/buscar.php?selector2=26"><span class="badge">0</span> &nbsp; Espejos</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown-submenu">
                                            <a tabindex="-1" href="buscador/buscar.php?selector1=7"><span class="badge">1</span> &nbsp; OTROS &nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                            <ul class="dropdown-menu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                                <li><a href="buscador/buscar.php?selector2=Otros"><span class="badge">1</span> &nbsp; Ver contenido</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a style="color:black" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="badge">4</span> &nbsp; <font face="verdana">MARCAS</font>&nbsp;<span class="glyphicon glyphicon-menu-right"></span></a>
                                    <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu" style="top: 0; left: 100%; margin-top: -6px; margin-left: -1px; -webkit-border-radius: 0 6px 6px 6px; -moz-border-radius: 0 6px 6px; border-radius: 0 6px 6px 6px;">
                                        <li><a href='buscador/buscar.php?selector3=3'><span class='badge'>1</span> &nbsp; CHANEL</a></li>
                                        <li><a href='buscador/buscar.php?selector3=1'><span class='badge'>2</span> &nbsp; DIOR</a></li>
                                        <li><a href='buscador/buscar.php?selector3=15'><span class='badge'>1</span> &nbsp; LANCÔME</a></li>
                                        <li><a href='buscador/buscar.php?selector3=5'><span class='badge'>1</span> &nbsp; Yves Saint Laurent</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form> <!-- FIN DE MENU PRODUCTOS-->
                <br>
                <img src="images/menu/city-q-c-550-400-6.jpg" alt="Chania" style="width:370; height:345;">
            </div>
            <div class="col-md-8 col-md-offset-1">
                <!--IMAGENES-->

                <style>
                    .carousel-inner>.item>img,
                    .carousel-inner>.item>a>img {
                        width: 70%;
                        margin: auto;
                    }

                    .carousel {
                        background: #2f4357;
                        margin-top: 20px;
                    }
                </style>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                </div>
            </div>
        </div>
    </div>

    <!--ESCRIBIR AQUI-->
    <!--ABAJO-->

    </div>
    <!-- JAVASCRIPT -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="\includes\bootstrap\4.3.1\js\bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- FIN Optional JavaScript -->
    <!-- FIN DE JAVASCRIPT-->
</body onLoad="setInterval('ads()',10);">

</html>