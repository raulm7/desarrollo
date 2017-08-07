<?php
session_start();

require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";

if (!getNombreTipo($_SESSION['permiso']) === "Agente") {
    header("Location:index.php");
}

if (isset($_GET['opcionBusquedaFecha'])){

    $saldo_orden = $_GET['opcionBusquedaSaldo'];
    $fecha_orden = $_GET['opcionBusquedaFecha'];
    $fecha = $_GET['fechaBusqueda'];

    $cliente = new nusoap_client("http://mediador/operaciones.php");
    $cliente->setCredentials("mediador","a82d75e24d886def9ac5d43");

    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }

    $clientes = getArregloClientesDeAgente($_SESSION['codigo_cliente']);

    $tabla = armarArregloServiciosUsuario($clientes,$fecha,$fecha_orden);

    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Reporte Mis Clientes Agente</title>

        <!-- Editatable  Css-->
        <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css"/>
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
                    <h4 class="page-title">Mis Clientes</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <form action="reporte-clientes-agente.php" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>"
                                               name="pagina">
                                        <label for="saldoRadio1">Saldo Radio</label><br>
                                        <input type="radio" name="opcionBusquedaSaldo" id="saldoRadio1" value="saldoDesc" checked required> Descendente<br>
                                        <input type="radio" name="opcionBusquedaSaldo" id="saldoRadio2" value="saldoAsce" required> Ascendente<br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-inline">
                                            <label for="Fecha">Fecha</label><br>
                                            <input type="radio" name="opcionBusquedaFecha" id="fechaRadio1" value="fechaAntes" required>Antes de: <br>
                                            <input type="radio" name="opcionBusquedaFecha" id="fechaRadio2" value="fechaDespues" required>Despues de:
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fechaBusqueda">Seleccione la fecha: </label>
                                        <input type="date" id="fechaBusqueda" name="fechaBusqueda" class="form-control" disabled required min="<? echo date('Y-m-d');?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info" id="btnGenerarReporte" name="btnGenerarReporte">Generar Reporte</button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <div class="">
                                <table class="table table-striped" id="tablaUsuarios">
                                    <? echo $tabla; ?>
                                </table>
                            </div>
                        </div>
                        <!-- end: panel body -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->
            <br>
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

    <!-- Editable js -->
    <script src="DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
    <script src="DataTables-1.10.15/media/js/dataTables.bootstrap.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
    <script src="DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>


<!--    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/dataTables.bootstrap.js"></script>-->
<!--    <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/buttons.html5.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/buttons.print.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/jszip.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/pdfmake.min.js"></script>-->
<!--    <script src="assets/plugins/datatables/vfs_fonts.js"></script>-->

    <!-- init -->
<!--    <script src="assets/pages/datatables.editable.init.js"></script>-->

    <!-- App js -->
<!--    <script src="assets/js/jquery.core.js"></script>-->
<!--    <script src="assets/js/jquery.app.js"></script>-->

    <script type="text/javascript">

        $('#tablaUsuarios').DataTable({
            dom:'Bfrtip',
            paging:false,
            info:false,
            buttons:[
                'csv','excel','pdf','print'
            ],
            language:{
                url:"assets/plugins/datatables/json/Spanish.json"
            }
        });

        $('#btnGenerarReporte').click(function () {
            if (($("input[name='opcionBusquedaSaldo']:checked").val() !== undefined) && ($("input[name='opcionBusquedaFecha']:checked").val() !== undefined)){
                var saldo = $("input[name='opcionBusquedaSaldo']:checked").val();
                var fecha = $("input[name='opcionBusquedaFecha']:checked").val();
                var fechaBusqueda = $("#fechaBusqueda").val();
//                console.log("Saldo: " +saldo + " Fecha: " + fecha);
//        $.post("assets/scriptsphp/cargar-reporte-cliente.php",{saldo_orden:saldo,fecha_orden:fecha,fecha:fechaBusqueda})
//            .done(function (data) {
//                $('#tablaUsuarios').empty();
//                $('#tablaUsuarios').html(data);
////                console.log("Datos: " + data);
//            });
//        setTimeout(function () {
//                $('#tablaUsuarios').DataTable({
//                    paging:false,
//                    info:false
//                });
//        }, 5000);
            }else{
                console.log("No seleccionado todo");
            }
        });

        $('.btnServicios').click(function () {
            var id = $(this).parents('tr:first').find('td:first').text();
            $.post( "assets/scriptsphp/cargar-servicios-cliente.php", { codigo_cliente: id})
                .done(function( data ) {
                    $('#selectCodigoServicio').empty();
                    $('#selectCodigoServicio').append(data);
                });
            $('#modalRecargarServicio').modal('show');
        });

        $('#fechaRadio1').click(function () {
            $('#fechaBusqueda').prop('disabled',false);
        });
        $('#fechaRadio2').click(function () {
            $('#fechaBusqueda').prop('disabled',false);
        });

        $('#saldoRadio2').click(function () {
            $('#fechaBusqueda').prop('disabled',true);
        });
        $('#saldoRadio1').click(function () {
            $('#fechaBusqueda').prop('disabled',true);
        });

    </script>
    </body>
    </html>

<?}else{?>
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
                    <h4 class="page-title">Mis Clientes</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <form action="reporte-clientes-agente.php" method="GET">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="hidden" value="<? echo $_SERVER['PHP_SELF']; ?>"
                                               name="pagina">
                                        <label for="saldoRadio1">Saldo Radio</label><br>
                                        <input type="radio" name="opcionBusquedaSaldo" id="saldoRadio1" value="saldoDesc" checked required> Descendente<br>
                                        <input type="radio" name="opcionBusquedaSaldo" id="saldoRadio2" value="saldoAsce" required> Ascendente<br>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio-inline">
                                            <label for="Fecha">Fecha</label><br>
                                            <input type="radio" name="opcionBusquedaFecha" id="fechaRadio1" value="fechaAntes" required>Antes de: <br>
                                            <input type="radio" name="opcionBusquedaFecha" id="fechaRadio2" value="fechaDespues" required>Despues de:
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="fechaBusqueda">Seleccione la fecha: </label>
                                        <input type="date" id="fechaBusqueda" name="fechaBusqueda" class="form-control" disabled required min="<? echo date('Y-m-d');?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-info" id="btnGenerarReporte" name="btnGenerarReporte">Generar Reporte</button>
                                    </div>
                                </div>
                            </form>
                            <div class="">
                                <table class="table table-striped" id="tablaUsuarios">

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

    <script type="text/javascript">

        //    $('#btnGenerarReporte').click(function () {
        //        if ($("input[name='opcionBusqueda']:checked").val() !== undefined){
        //            if ($('#saldoRadio1').is(':checked')) {
        //                var parametro = $('#saldoRadio1').val();
        //                window.location = '/reporte-clientes-agente.php?reporte=' + parametro;
        //            }else if($('#saldoRadio2').is(':checked')){
        //                var parametro = $('#saldoRadio2').val();
        //                window.location = '/reporte-clientes-agente.php?reporte=' + parametro;
        //            }else if($('#fechaRadio1').is(':checked')){
        //                var parametro = $('#fechaRadio1').val();
        //                var fecha = $('#fechaBusqueda').val();
        //                window.location = '/reporte-clientes-agente.php?reporte=' + parametro + '&fecha=' + fecha;
        //            }else if ($('#fechaRadio2').is(':checked')){
        //                var parametro = $('#fechaRadio2').val();
        //                var fecha = $('#fechaBusqueda').val();
        //                window.location = '/reporte-clientes-agente.php?reporte=' + parametro + '&fecha=' + fecha;
        //            }
        //            console.log($("input[name='opcionBusqueda']:checked").val());
        //        }else{
        //            console.log("Nada");
        //        }
        //    });

        $('#btnGenerarReporte').click(function () {
            if (($("input[name='opcionBusquedaSaldo']:checked").val() !== undefined) && ($("input[name='opcionBusquedaFecha']:checked").val() !== undefined)){
                var saldo = $("input[name='opcionBusquedaSaldo']:checked").val();
                var fecha = $("input[name='opcionBusquedaFecha']:checked").val();
                var fechaBusqueda = $("#fechaBusqueda").val();
                console.log("Saldo: " +saldo + " Fecha: " + fecha);
    //        $.post("assets/scriptsphp/cargar-reporte-cliente.php",{saldo_orden:saldo,fecha_orden:fecha,fecha:fechaBusqueda})
    //            .done(function (data) {
    //                $('#tablaUsuarios').empty();
    //                $('#tablaUsuarios').html(data);
    ////                console.log("Datos: " + data);
    //            });
    //        setTimeout(function () {
    //                $('#tablaUsuarios').DataTable({
    //                    paging:false,
    //                    info:false
    //                });
    //        }, 5000);

            }else{
                console.log("No seleccionado todo");
            }
        });

        $('.btnServicios').click(function () {
            var id = $(this).parents('tr:first').find('td:first').text();
            $.post( "assets/scriptsphp/cargar-servicios-cliente.php", { codigo_cliente: id})
                .done(function( data ) {
                $('#selectCodigoServicio').empty();
                $('#selectCodigoServicio').append(data);
            });
            $('#modalRecargarServicio').modal('show');
        });

        $('#fechaRadio1').click(function () {
            $('#fechaBusqueda').prop('disabled',false);
        });
        $('#fechaRadio2').click(function () {
            $('#fechaBusqueda').prop('disabled',false);
        });

        $('#saldoRadio2').click(function () {
            $('#fechaBusqueda').prop('disabled',true);
        });
        $('#saldoRadio1').click(function () {
            $('#fechaBusqueda').prop('disabled',true);
        });

    </script>
    </body>
    </html>
<?}?>



