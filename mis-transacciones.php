<?php
/**
 * Created by PhpStorm.
 * User: AdderlyS
 * Date: 9/05/2017
 * Time: 10:04 AM
 */
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
            <div class="col-lg-12">
                <h4 class="page-title">Historial Transacciones</h4>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card-box">
                <a href="index.php" class="btn btn-danger"><i
                            class="fa fa-arrow-left"></i> Inicio
                </a>
                <br><br>
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
                        <? getHistorial_de_Transacciones($_SESSION['codigo_cliente']); ?>
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

<!-- Editable js -->
<script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
<script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>
<!-- init -->
<script src="assets/pages/datatables.editable.init.js"></script>

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
