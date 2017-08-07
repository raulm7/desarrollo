<?php
session_start();

require "assets/scriptsphp/db.php";

if (!getNombreTipo($_SESSION['permiso']) === "Agente") {
    header("Location:index.php");
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

        <!-- Editatable  Css-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css"/>
        <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css"/>
        <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.min.css"/>
        <link rel="stylesheet" href="assets/plugins/datatables/buttons.dataTables.min.css">

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
                    <h4 class="page-title">Ingresos Bancarios [Reporte]</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="">
                                <table class="table table-striped" id="tablaUsuarios">
                                    <thead>
                                    <tr>
                                        <th># Transacción</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Credito</th>
                                        <th>Debito</th>
                                        <th>Servicio</th>
                                        <th>Descripcion</th>
                                        <th>Referencia</th>
                                        <th>Observaciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end: panel body -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-sm-12">

                </div> <!-- end col-->
            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

    </div>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<!--    <script src="assets/js/detect.js"></script>-->
<!--    <script src="assets/js/fastclick.js"></script>-->
<!--    <script src="assets/js/jquery.slimscroll.js"></script>-->
<!--    <script src="assets/js/jquery.blockUI.js"></script>-->
<!--    <script src="assets/js/waves.js"></script>-->
<!--    <script src="assets/js/wow.min.js"></script>-->
<!--    <script src="assets/js/jquery.nicescroll.js"></script>-->
<!--    <script src="assets/js/jquery.scrollTo.min.js"></script>-->


    <script src="DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.15/media/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
    <!-- Editable js -->
<!--    <script src="assets/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>-->
<!--    <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>-->
<!--    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>-->
<!--    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>-->
<!--    <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>-->
<!--    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>-->
<!--    <!-- init -->-->
<!--    <script src="assets/pages/datatables.editable.init.js"></script>-->

    <!-- App js -->
<!--    <script src="assets/js/jquery.core.js"></script>-->
<!--    <script src="assets/js/jquery.app.js"></script>-->

    <script type="text/javascript">
        $('#tablaUsuarios').DataTable({
           dom: 'Bfrtip',
           button: [
                'copy','csv','excel','print'
            ]
        });

    </script>
    </body>
    </html>









