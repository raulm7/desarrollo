<?php

$url_portal="portal.optelgt.com";
if ($_SERVER['HTTP_HOST']!=$url_portal) {
    header("location:http://$url_portal");
    die();
}

session_start();
require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Optel - Internet Residencial</title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>


</head>
<body>

<?php include "assets/include/navbar.php"; ?>


<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Inicio</h4>
            </div>
        </div>


        <? if ( getNombreTipo($_SESSION['permiso']) === "Cliente") { ?>

            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? getMisEquiposCliente($_SESSION['codigo_cliente']); ?></div>
                                    <div> Servicios</div>
                                </div>
                            </div>
                        </div>
                        <a href="/mis-servicios-cliente.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver servicios</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-desktop fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? getMisEquiposCliente($_SESSION['codigo_cliente']); ?></div>
                                    <div> Mis equipos</div>
                                </div>
                            </div>
                        </div>
                        <a href="/mis-servicios-cliente.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver equipos</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-search fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><? getMisTransacciones($_SESSION['codigo_cliente']); ?></div>
                                    <div> Mis transacciones</div>
                                </div>
                            </div>
                        </div>
                        <a href="/mis-transacciones.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver historial</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Servicios Asociados</h4>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="display: none;">ID</th>
                                    <th>Plan</th>
                                    <th>Tipo de Plan</th>
                                    <th>Costo</th>
                                    <th>Vencimiento</th>
                                    <!--<th>Operaciones</th>-->
                                </tr>
                                </thead>
                                <tbody>
                                <? getServiciosConUsuarioDashboard($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
        <!-- end row -->

                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Transacciones Recientes</h4>

                        <div class="table-responsive">
                            <table class="table" id="tablaMT">
                                <thead>
                                <tr>
                                    <th># Transacción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Servicio</th>
                                    <th>Credito</th>
                                    <th>Debito</th>
                                    <th>Referencia</th>
                                    <th>Cliente</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getHistorial_de_Transacciones($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        <? } elseif (getNombreTipo($_SESSION['permiso']) === "Agente") { ?>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><? getMisClientes($_SESSION['codigo_cliente']); ?></div>
                                <div> Mis clientes</div>
                            </div>
                        </div>
                    </div>
                    <a href="/editar-mis-clientes-agente.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ver clientes</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><? getSaldoActual($_SESSION['codigo_cliente']); ?></div>
                                <div> Saldo disponible</div>
                            </div>
                        </div>
                    </div>
                    <a href="/recargar-agente.php">
                        <div class="panel-footer">
                            <span class="pull-left">Realizar recargas</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-search fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><? getMisTransacciones($_SESSION['codigo_cliente']); ?></div>
                                <div> Transacciones</div>
                            </div>
                        </div>
                    </div>
                    <a href="/mis-transacciones.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ver historial</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-desktop fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><? getMisEquipos($_SESSION['codigo_cliente']); ?></div>
                                <div> Mis equipos</div>
                            </div>
                        </div>
                    </div>
                    <a href="/editar-mis-equipos-agente.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ver equipos</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 align="center" class="header-title m-t-0 m-b-30">Servicios Por Clientes <pre><input type="button" style="background-color: #DAFFD7" /> Activo    <input type="button" style="background-color: #FFFFD7" /> Próximo a vencer    <input type="button" style="background-color: #FFD7D7" /> Vencido</pre></h4>
                        <div class="table-responsive">
                            <table class="table" id="tablaMisClientes">
                                <thead>
                                <tr>
                                    <th style="display: none;">Id</th>
                                    <th>Plan</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
<!--                                    <th>Saldo</th>-->
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getClientesDeAgente($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 align="center" class="header-title m-t-0 m-b-30">Transacciones Recientes</h4>

                        <div class="table-responsive">
                            <table class="table" id="tablaMT">
                                <thead>
                                <tr>
                                    <th># Transacción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Descripcion</th>
                                    <th>Credito</th>
                                    <th>Debito</th>
                                    <th>Servicio</th>
                                    <th>Referencia</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getHistorial_de_Transacciones($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->

        <? } elseif (getNombreTipo($_SESSION['permiso']) === "Contabilidad") { ?>

<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="panel panel-color panel-primary">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="row">-->
<!--                            <div class="col-xs-3">-->
<!--                                <i class="fa fa-users fa-5x"></i>-->
<!--                            </div>-->
<!--                            <div class="col-xs-9 text-right">-->
<!--                                <div class="huge">--><?// getMisClientes($_SESSION['codigo_cliente']); ?><!--</div>-->
<!--                                <div> Mis clientes</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <a href="/editar-mis-clientes-agente.php">-->
<!--                        <div class="panel-footer">-->
<!--                            <span class="pull-left">Ver clientes</span>-->
<!--                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="panel panel-color panel-primary">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="row">-->
<!--                            <div class="col-xs-3">-->
<!--                                <i class="fa fa-dollar fa-5x"></i>-->
<!--                            </div>-->
<!--                            <div class="col-xs-9 text-right">-->
<!--                                <div class="huge">--><?// getSaldoActual($_SESSION['codigo_cliente']); ?><!--</div>-->
<!--                                <div> Saldo disponible</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <a href="/recargar-agente.php">-->
<!--                        <div class="panel-footer">-->
<!--                            <span class="pull-left">Realizar recargas</span>-->
<!--                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="panel panel-color panel-primary">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="row">-->
<!--                            <div class="col-xs-3">-->
<!--                                <i class="fa fa-search fa-5x"></i>-->
<!--                            </div>-->
<!--                            <div class="col-xs-9 text-right">-->
<!--                                <div class="huge">--><?// getMisTransacciones($_SESSION['codigo_cliente']); ?><!--</div>-->
<!--                                <div> Transacciones</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <a href="/mis-transacciones.php">-->
<!--                        <div class="panel-footer">-->
<!--                            <span class="pull-left">Ver historial</span>-->
<!--                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-3 col-md-6">-->
<!--                <div class="panel panel-color panel-primary">-->
<!--                    <div class="panel-heading">-->
<!--                        <div class="row">-->
<!--                            <div class="col-xs-3">-->
<!--                                <i class="fa fa-desktop fa-5x"></i>-->
<!--                            </div>-->
<!--                            <div class="col-xs-9 text-right">-->
<!--                                <div class="huge">--><?// getMisEquipos($_SESSION['codigo_cliente']); ?><!--</div>-->
<!--                                <div> Mis equipos</div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <a href="/editar-mis-equipos-agente.php">-->
<!--                        <div class="panel-footer">-->
<!--                            <span class="pull-left">Ver equipos</span>-->
<!--                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>-->
<!--                            <div class="clearfix"></div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 align="center" class="header-title m-t-0 m-b-30">Reportes Estado de Servicios <br><br> <pre><a href="conta-clientes-activos.php" class="btn" style="background-color: #DAFFD7" >Activo</a>     <a href="conta-clientes-proximos.php" class="btn" style="background-color: #FFFFD7" >Próximo a vencer</a>   <a href="conta-clientes-vencidos.php" class="btn" style="background-color: #FFD7D7"> Vencido</a></pre></h4>

                        <div class="table-responsive">
                            <table class="table" id="tablaMisClientes">
                                <thead>
                                <tr>
                                    <th style="display: none;">Id</th>
                                    <th>Plan</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <!--                                   <th>Saldo</th>-->
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getClientesContabilidad(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Transacciones Recientes</h4>

                        <div class="table-responsive">
                            <table class="table" id="tablaMT">
                                <thead>
                                <tr>
                                    <th># Transacción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Descripcion</th>
                                    <th>Credito</th>
                                    <th>Debito</th>
                                    <th>Servicio</th>
                                    <th>Referencia</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getTransaccionesDia($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->

        <? }else{?>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><? getMisClientes($_SESSION['codigo_cliente']); ?></div>
                                            <div> Mis clientes</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/editar-mis-clientes-agente.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver clientes</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-dollar fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><? getSaldoActual($_SESSION['codigo_cliente']); ?></div>
                                            <div> Saldo disponible</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/recargar-agente.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Realizar recargas</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-search fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><? getMisTransacciones($_SESSION['codigo_cliente']); ?></div>
                                            <div> Transacciones</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/mis-transacciones.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver historial</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-color panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-desktop fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><? getMisEquipos($_SESSION['codigo_cliente']); ?></div>
                                            <div> Mis equipos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="/editar-mis-equipos-agente.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Ver equipos</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 align="center" class="header-title m-t-0 m-b-30">Servicios Por Clientes <pre><input type="button" style="background-color: #DAFFD7" /> Activo    <input type="button" style="background-color: #FFFFD7" /> Próximo a vencer    <input type="button" style="background-color: #FFD7D7" /> Vencido</pre></h4>
                        <div class="table-responsive">
                            <table class="table" id="tablaMisClientes">
                                <thead>
                                <tr>
                                    <th style="display: none;">Id</th>
                                    <th>Plan</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <!--                                    <th>Saldo</th>-->
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getClientesDeAgente($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-lg-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Transacciones Recientes</h4>

                        <div class="table-responsive">
                            <table class="table" id="tablaMT">
                                <thead>
                                <tr>
                                    <th># Transacción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Descripcion</th>
                                    <th>Credito</th>
                                    <th>Debito</th>
                                    <th>Servicio</th>
                                    <th>Referencia</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? getHistorial_de_Transacciones($_SESSION['codigo_cliente']); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->
        <?} ?>

    </div>
    <!-- end container -->

</div>


<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.redirect.js"></script>

<!-- Editable js -->
<script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
<script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>

<!-- init -->
<script src="assets/pages/datatables.editable.init.js"></script>

<!-- KNOB JS -->
<!--[if IE]>
<script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
<![endif]-->
<script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael-min.js"></script>
<!---->
<!--<!-- Dashboard init -->
<script src="assets/pages/jquery.dashboard.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script>
    $('#tablaMT').DataTable({
        "info": false,
        "order": [[1, "desc"]],
        responsive: true
    });
</script>
<? if ($_SESSION['permiso'] == getCodigoTipo("Cliente")) { ?>

    <!-- Modal recargar saldo a usuario -->
    <div id="modalCondicional" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recargar Saldo a Usuario</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-usuario.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <div class="form-group" style="padding-left: 180px">
                        <input type="hidden" id="usuario_destino" class="form-control" name="usuario_destino">
                        <label for="cantidad_recarga">¿Que desea recargar?</label>
                    </div>
                    <div class="form-group" style="padding-left: 140px">
                        <button type="button" class="btn btn-primary" id="botonValorPlan">Valor del Plan</button>
                        <button type="button" class="btn btn-primary" id="botonCantidad">Otra cantidad</button>
                    </div>
                    <!--                    <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max=-->
                    <? // echo getSaldoActual($_SESSION['codigo_cliente']); ?><!-- step="1" autofocus>-->
                    <br>
                    <br>
                    <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal recargar saldo a usuario -->
    <div id="modalRecargarCantidad" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recargar Saldo a Usuario</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-usuario.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <input type="hidden" id="usuario_destino" class="form-control" name="usuario_destino">
                    <label for="cantidad_recarga">Cantidad a Recargar</label>
                    <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control"
                           max=<? getSaldoActual($_SESSION['codigo_cliente']); ?> step="1" autofocus>
                    <br>
                    <br>
                    <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                        Realizar Recarga
                    </button>
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal recargar a servicio -->
    <div id="modalRecargarServicio" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Realizar pago a servicio</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-servicio.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <div class="form-group">
                        <input type="hidden" id="codigo_contrato" class="form-control" name="codigo_contrato">
                        <h1>Se estará debitando de su saldo el costo del plan.</h1>
                        <!--                <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max=-->
                        <? // echo getSaldoActual($_SESSION['codigo_cliente']); ?><!-- step="1" autofocus>-->
                        <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success waves-effect waves-light" type="submit">
                            Realizar Recarga
                        </button>
                    </div>
                    <br>
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

<? } elseif ($_SESSION['permiso'] == getCodigoTipo("Agente")) { ?>

    <!-- Modal Servicios de Usuario-->
    <div id="modalRecargarServicio" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Servicios Asociados a Usuario</h4>
                </div>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-cambio.php" method="post" id="formRecargarServicio">
                    <div class="form-group">
                        <input type="hidden" name="pagina" value="<? echo $_SERVER['HTTP_REFERER']; ?>">
                        <label for="selectCodigoServicio">Servicios Asociados al Cliente</label>
                        <select name="codigo_servicio" id="selectCodigoServicio" class="form-control"
                                onchange="cambioSelectServicios();" onfocus="this.selectedIndex-1;" required>
                            <option value="0"> Relleno</option>
                        </select>
                    </div>
                    <div class="form-group" id="divCambioPlan">
                        <label for="selectCambioPlan">Plan actual (Seleccionar otro para cambiar)</label>
                        <select name="codigo_plan" id="selectCodigoPlan" class="form-control" required>
                            <option value="0">Seleccione un servicio</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="observacion">Observación</label>
                        <input type="text" name="observacion" id="observacion" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Realizar Recarga
                        </button>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

<? } else { ?>

    <!-- Modal recargar saldo a usuario -->
    <div id="modalCondicional" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recargar Saldo a Usuario</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-usuario.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <div class="form-group" style="padding-left: 180px">
                        <input type="hidden" id="usuario_destino" class="form-control" name="usuario_destino">
                        <label for="cantidad_recarga">¿Que desea recargar?</label>
                    </div>
                    <div class="form-group" style="padding-left: 140px">
                        <button type="button" class="btn btn-primary" id="botonValorPlan">Valor del Plan</button>
                        <button type="button" class="btn btn-primary" id="botonCantidad">Otra cantidad</button>
                    </div>
                    <!--                    <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max=-->
                    <? // echo getSaldoActual($_SESSION['codigo_cliente']); ?><!-- step="1" autofocus>-->
                    <br>
                    <br>
                    <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Modal recargar saldo a usuario -->
    <div id="modalRecargarCantidad" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Recargar Saldo a Usuario</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-usuario.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <input type="hidden" id="usuario_destino" class="form-control" name="usuario_destino">
                    <label for="cantidad_recarga">Cantidad a Recargar</label>
                    <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control"
                           max=<? getSaldoActual($_SESSION['codigo_cliente']); ?> step="1" autofocus>
                    <br>
                    <br>
                    <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                        Realizar Recarga
                    </button>
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal recargar a servicio -->
    <div id="modalRecargarServicio" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Realizar pago a servicio</h4>
                </div>
                <br>
                <br>
                <form action="assets/scriptsphp/operacion-recargar-servicio.php?pagina=<? echo basename($_SERVER['PHP_SELF']); ?>"
                      method="post" role="form">
                    <div class="form-group">
                        <input type="hidden" id="codigo_contrato" class="form-control" name="codigo_contrato">
                        <h1>Se estará debitando de su saldo el costo del plan.</h1>
                        <!--                <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max=-->
                        <? // echo getSaldoActual($_SESSION['codigo_cliente']); ?><!-- step="1" autofocus>-->
                        <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF']; ?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success waves-effect waves-light" type="submit">
                            Realizar Recarga
                        </button>
                    </div>
                    <br>
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

<? } ?>

<? if ($_SESSION['permiso'] == getCodigoTipo("Cliente")) { ?>
    <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $('#tablaMT').DataTable();
    </script>
    <script type="text/javascript">
        $('.RecargarBtn').click(function () {
            window.id = $(this).parents('tr:first').find('td:first').text();
            $('#codigo_contrato').val(window.id);
            $('#modalRecargarServicio').modal("show");
        });

        $('.btnRecargar').click(function () {
            window.id = $(this).parents('tr:first').find('td:first').text();
            $('#codigo_contrato').val(window.id);
            $('#modalCondicional').modal("show");
        });

        $('#botonCantidad').click(function () {
            $('#modalCondicional').modal("hide");
            $('#modalRecargarServicio').modal("hide");
            $('#modalCondicional').on('hidden.bs.modal', function (e) {
                $('#modalRecargarCantidad').modal('show');
            });
        });

        $('#botonValorPlan').click(function () {
            $('#modalCondicional').modal("hide");
            $('#modalRecargarCantidad').modal('hide');
            $('#modalCondicional').on('hidden.bs.modal', function (e) {
                $('#modalRecargarServicio').modal('show');
            });

        });
    </script>
<? }elseif ($_SESSION['permiso'] == getCodigoTipo("Agente")){ ?>
    <script type="text/javascript">
        $('.btnEstadoCuenta').click(function () {
            var id  = $(this).parents('tr:first').find('td:nth-child(2)').text();
            $.redirect('estado-cuenta-usuario.php', {'codigo_cliente':id});
        });
        $('.btnServicios').click(function () {
            var cliente = $(this).parents('tr:first').find('td:nth-child(2)').text();
			var servicio = $(this).parents('tr:first').find('td:nth-child(1)').text();
            $.post("assets/scriptsphp/cargar-servicios-cliente.php", {codigo_cliente: cliente, servicio: servicio})
                .done(function (data) {
                    $('#selectCodigoServicio').empty();
                    $('#selectCodigoServicio').append(data);
					cambioSelectServicios();
                });
            $('#modalRecargarServicio').modal('show');
			document.getElementById("observacion").value="";
        });		
        function cambioSelectServicios() {
            console.log("Adentro de la funcion");
            var select = $('#selectCodigoServicio');
            var valor = select.val();
            $.post("assets/scriptsphp/get-select-planes.php", {codigo_servicio: valor})
                .done(function (data) {
                    $('#selectCodigoPlan').empty();
                    $('#selectCodigoPlan').append(data);
                });
        }
    </script>
<? }else{ ?>
    <script type="text/javascript">
        $('.RecargarBtn').click(function () {
            window.id = $(this).parents('tr:first').find('td:first').text();
            $('#codigo_contrato').val(window.id);
            $('#modalRecargarServicio').modal("show");
        });

        $('.btnRecargar').click(function () {
            window.id = $(this).parents('tr:first').find('td:first').text();
            $('#codigo_contrato').val(window.id);
            $('#modalCondicional').modal("show");
        });

        $('#botonCantidad').click(function () {
            $('#modalCondicional').modal("hide");
            $('#modalRecargarServicio').modal("hide");
            $('#modalCondicional').on('hidden.bs.modal', function (e) {
                $('#modalRecargarCantidad').modal('show');
            });
        });

        $('#botonValorPlan').click(function () {
            $('#modalCondicional').modal("hide");
            $('#modalRecargarCantidad').modal('hide');
            $('#modalCondicional').on('hidden.bs.modal', function (e) {
                $('#modalRecargarServicio').modal('show');
            });

        });
    </script>
<? } ?>


</body>
</html>