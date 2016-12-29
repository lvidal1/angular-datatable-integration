<?php
    # ############### CARGA DE CONSTANTES Y LIBRERIAS ################ #
    define(DS, DIRECTORY_SEPARATOR);
    define(SRC_ROOT, "src");
    define(DIST_ROOT, "dist");
    define(BOWER_ROOT, "bower_components");

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
    <![endif]-->
    <!--[if IE 7]>         
    <html class="no-js lt-ie9 lt-ie8">
        <![endif]-->
        <!--[if IE 8]>         
        <html class="no-js lt-ie9">
            <![endif]-->
            <!--[if gt IE 8]><!-->
            <html class="no-js">
                <!--<![endif]-->
                <head>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title>Culqi - Test</title>
                    <!-- Place favicon.ico in the root directory -->
                    <link rel="shortcut icon" href="favicon.ico">
                    <!-- Meta Tags -->
                    <meta name="description" content="">
                    <meta name="keywords" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <!-- ######    BASIC STYLES  ######-->
                    <!-- Normalize.css -->
                    <!-- Bootstrap -->
                    <link href="<?php echo BOWER_ROOT;?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                    <!-- FontAwesome -->
                    <link href="<?php echo BOWER_ROOT;?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">

                    <!-- ######    SPECIFIC STYLES  ######-->
                    <!-- Styles to the site -->
                    <link href="<?php echo DIST_ROOT;?>/css/styles.css" rel="stylesheet">

                    </script>
                   
                    <!-- ######  FALLBACK SCRIPTS  ######-->
                    <!--[if lt IE 9]>
                    <![endif]-->
                    <!--[if lt IE 7]>
                    <p class="browsehappy">Estás usando un navegador <strong>antiguo</strong>. Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a> para mejorar tu experiencia.</p>
                    <![endif]-->
                </head>
                <body>
                    <header>
                        <nav class="navbar navbar-default navbar-fixed-top nav-black" id="navigation-bar">
                            <div class="container container-page">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" id="btnToggleNav">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div class="navbar-brand" href="#">
                                        Culqi - Test
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </header>
            <!--         <section id="header" class="container">
                        <div class="brand-logo">
                            <a href="home.php">
                                <img src="<?php //echo DIST_ROOT;?>/img/logo.png">
                            </a>
                        </div>

                    </section> -->
                    <section id="app">
                        <div ng-controller="WithAjaxCtrl as showCase">
                            <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" class="row-border hover"></table>
                        </div>
                    </section>
                    <footer>
                        <div class="container container-page footer-links">
                        </div>
                        <div class="container-fluid footer-copyright">
                            <div class="row">
                                <div class="col-md-12 text-center copy-text">
                                    &copy; 2016 Todos los derechos reservados
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!-- ######    BASIC SCRIPTS  ######-->
                    <!-- JQuery -->
                    <script src="<?php echo BOWER_ROOT;?>/jquery/dist/jquery.min.js"></script>
                    <!-- Bootstrap -->
                    <script src="<?php echo BOWER_ROOT;?>/bootstrap/dist/js/bootstrap.min.js"></script>
                    <!-- ######    SPECIFIC SCRIPTS  ######-->
                    <!-- JS of the page -->
                    <script type="text/javascript" src="<?php echo SRC_ROOT;?>/js/appModel.js"></script>
                    <script type="text/javascript" src="<?php echo SRC_ROOT;?>/js/appController.js"></script>

                </body>
            </html>