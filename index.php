<?php
    # ############### CARGA DE CONSTANTES Y LIBRERIAS ################ #
    error_reporting(0);
    @ini_set('display_errors', 0);
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
<html class="no-js" id="app" ng-app="testApp">
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
    <!-- Bootstrap -->
    <link href="<?php echo BOWER_ROOT;?>/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap - modal-->
    <link href="<?php echo BOWER_ROOT;?>/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" />
    <link href="<?php echo BOWER_ROOT;?>/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" />
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

<body ng-controller="ServerSideProcessingCtrl as chargeApp">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top nav-black" id="navigation-bar">
            <div class="container container-page">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        Culqi - Test
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="container">

        <!-- VIEW - PAGE-TITLE -->
        <div class="page-title">
            <h4 class="title">
                <span class="logo-page">
                                    <img src="<?php echo DIST_ROOT;?>/img/logo-page.png">
                                </span>
                <span class="text">
                                    Ventas
                                </span>
            </h4>
            <div class="call-to-action">
                <div class="dropdown btn-call-to-action">
                    <button class="btn  dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-files-o"></i> Exportar
                                  <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                        <li><a href="#"><i class="fa fa-file-excel-o"></i> Excel</a></li>
                    </ul>
                </div>
                <div class="btn-call-to-action">
                    <button class="btn btn-call-to-action"><i class="fa fa-filter"></i> Filtrar</button>
                </div>
            </div>
        </div>
        <!-- VIEW - CHARGE LIST -->
        <table datatable="" dt-options="chargeApp.dtOptions" dt-columns="chargeApp.dtColumns" class="table table-striped table-hover"></table>
        <!-- VIEW - MODAL CHARGE DETAIL -->
        <div id="charge-detail" class="modal fade" tabindex="-1" data-width="600" style="display: none;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="title">
                    <span class="logo-page">
                                    <img src="<?php echo DIST_ROOT;?>/img/logo-page.png">
                                </span>
                    <span class="text">
                                    Monto
                                </span>
                    <span class="text">
                                   {{chargeApp.formatModal.amount(chargeApp.current.amount)}}
                                </span>
                    <span class="object">
                                    venta
                                </span>
                    <span class="call-to-action">
                                    <button class="btn btn-sm btn-culqi"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i></button>
                                </span>
                </h4>

            </div>
            <div class="modal-body">
                <div class="general-info">
                    <div class="main-info">
                        <div class="card-info">
                            <div class="wrap">
                                <div class="image-card">
                                    <span class="wrap-align">
                                                    <img src="<?php echo DIST_ROOT;?>/img/cards/{{chargeApp.formatModal.tokenBrand(chargeApp.current.token.brand_name)}}">
                                                </span>
                                </div>
                                <div class="text-card">
                                    <span class="number-card">
                                                    {{chargeApp.current.token.card_number}}
                                                </span>
                                    <span class="holder-card">
                                                    {{chargeApp.current.token.cardholder.first_name}} {{chargeApp.current.token.cardholder.last_name}}
                                                </span>
                                    <span class="email-holder-card">
                                                    {{chargeApp.current.token.cardholder.email}}
                                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="state-info">
                            <div class="wrap">
                                <div class="state-label">
                                    <span class="hightlight {{chargeApp.formatModal.state(chargeApp.current.state)}}">
                                                </span> Estado:
                                    <b>{{chargeApp.current.state}}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-divider">
                    </div>
                    <div class="state-message">
                        {{chargeApp.current.merchant_message}}
                    </div>
                    <div class="modal-divider">
                    </div>
                </div>
                <div class="detail-info">
                    <p>DATOS DE LA TRANSACCIÓN</p>
                    <div class="row">
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Número de Pedido:</span>
                            <span class="value">{{chargeApp.current.reference_code}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Descripción:</span>
                            <span class="value">{{chargeApp.current.product_description}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Token:</span>
                            <span class="value"></span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Fecha y Hora:</span>
                            <span class="value">{{chargeApp.formatModal.date(chargeApp.current.date)}}</span>
                        </div>
                    </div>

                </div>
                <div class="modal-divider">
                </div>
                <div class="detail-info">
                    <p>DATOS DEL CLIENTE</p>
                    <div class="row">
                        <div class="description col-md-12 col-xs-12">
                            <span class="field">Nombre(s) y Apellido(s):</span>
                            <span class="value">  
                                        {{chargeApp.current.client.first_name}} {{chargeApp.current.client.last_name}}</span>
                        </div>
                        <div class="description col-md-12 col-xs-12">
                            <span class="field">Dirección:</span>
                            <span class="value">  
                                        {{chargeApp.current.client.address}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Ciudad:</span>
                            <span class="value">  
                                        {{chargeApp.current.client.address_city}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Pais:</span>
                            <span class="value">  
                                        {{chargeApp.current.client.country_code}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Teléfono:</span>
                            <span class="value">  
                                        {{chargeApp.current.client.phone}}</span>
                        </div>
                        <div class="description col-md-6 col-xs-12">
                            <span class="field">Email:</span>
                            <span class="value">  {{chargeApp.current.client.email}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-culqi">Listo</button>
            </div>
        </div>

    </section>

    <!-- ######    BASIC SCRIPTS  ######-->
    <!-- JQuery -->
    <script src="<?php echo BOWER_ROOT;?>/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo BOWER_ROOT;?>/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- ######    SPECIFIC SCRIPTS  ######-->
    <!-- Bootstrap - modal -->
    <script src="<?php echo BOWER_ROOT;?>/bootstrap-modal/js/bootstrap-modalmanager.js"></script>
    <script src="<?php echo BOWER_ROOT;?>/bootstrap-modal/js/bootstrap-modal.js"></script>
    <!-- JQuery-datatables-->
    <script src="<?php echo BOWER_ROOT;?>/datatables.net/js/jquery.dataTables.js"></script>
    <!-- JQuery-datatables-spanish-->
    <script src="<?php echo BOWER_ROOT;?>/datatables.net/js/jquery.dataTables.spanish.js"></script>
    <!-- Angular-->
    <script src="<?php echo BOWER_ROOT;?>/angular/angular.min.js"></script>
    <!-- Angular-datatables-->
    <script src="<?php echo BOWER_ROOT;?>/angular-datatables/dist/angular-datatables.min.js"></script>
    <!-- Progress-bar-->
    <script src="<?php echo BOWER_ROOT;?>/progressbar/dist/progressbar.js"></script>

    <!-- JS of the page -->
    <script type="text/javascript" src="<?php echo DIST_ROOT;?>/js/app.min.js"></script>

</body>

</html>