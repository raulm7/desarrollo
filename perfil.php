<?php
/**
 * Created by PhpStorm.
 * User: AdderlyS
 * Date: 5/05/2017
 * Time: 3:05 PM
 */
session_start();
require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

list($nombrecompleto, $foto, $nit, $email, $sexo, $edad, $estado_civil, $direccion) = getInformacionPerfil($_SESSION['codigo_cliente']);

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
                <h4 class="page-title">Perfil de usuario</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="bg-picture card-box">
                    <div class="profile-info-name">
                        <img src="fotos/clientes/<? echo $foto ?>"
                             class="img-thumbnail" alt="profile-image">

                        <div class="profile-info-detail">
                            <h3 class="m-t-0 m-b-0"><? echo getNombreApellidoCliente($_SESSION['codigo_cliente']); ?>&nbsp;</h3>
                            <p class="text-muted m-b-20"><i><? echo getNombreTipo($_SESSION['permiso']); ?> <? echo $_SESSION['codigo_cliente']; ?></i></p>
                        </div>
                        <div class="col-lg-4">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nombre Completo</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $nombrecompleto ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Código de cliente</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $_SESSION['codigo_cliente']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">NIT</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $nit ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Correo</label>
                                    <div class="col-md-10">
                                        <input type="email" class="form-control" value="<? echo $email ?>" disabled>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end col -->
                        <div class="col-lg-4">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Sexo</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $sexo ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Edad</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $edad ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Estado Civil</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="<? echo $estado_civil ?>" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-2 control-label">Dirección</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="2" disabled><? echo $direccion ?></textarea>
                                    </div>
                                </div>
                            </form>
                        </div><!-- end col -->
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <!-- end row -->

        <? if ($_SESSION['permiso'] == 50 || $_SESSION['permiso'] == 51){?>
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
<!--                                <th>Operaciones</th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <? getServiciosConUsuarioDashboard($_SESSION['codigo_cliente']); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->
            <?}?>
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
                                <th>Descripcion</th>
                                <th>Referencia</th>
                                <th>Observaciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? getTransacciones($_SESSION['codigo_cliente']); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
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

<!-- XEditable Plugin -->
<script src="assets/plugins/moment/moment.js"></script>
<script type="text/javascript" src="assets/plugins/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript" src="assets/pages/jquery.xeditable.js"></script>

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
</body>
</html>