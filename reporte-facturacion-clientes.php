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


    <body>}

    <?php include "assets/include/navbar.php"; ?>

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="page-title">Transacciones Generales [Reporte]</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <label for="periodo">Seleccione el mes y el año</label>
                            <form action="reporte-facturacion-clientes.php" class="form-inline">
                                <select name="periodo" id="periodo" class="form-control">
                                    <option value="1" <? echo ($_GET['periodo'] == 1 ? "selected":"");?>>Enero</option>
                                    <option value="2" <? echo ($_GET['periodo'] == 2 ? "selected":"");?>>Febrero</option>
                                    <option value="3" <? echo ($_GET['periodo'] == 3 ? "selected":"");?>>Marzo</option>
                                    <option value="4" <? echo ($_GET['periodo'] == 4 ? "selected":"");?>>Abril</option>
                                    <option value="5" <? echo ($_GET['periodo'] == 5 ? "selected":"");?>>Mayo</option>
                                    <option value="6" <? echo ($_GET['periodo'] == 6 ? "selected":"");?>>Junio</option>
                                    <option value="7" <? echo ($_GET['periodo'] == 7 ? "selected":"");?>>Julio</option>
                                    <option value="8" <? echo ($_GET['periodo'] == 8 ? "selected":"");?>>Agosto</option>
                                    <option value="9" <? echo ($_GET['periodo'] == 9 ? "selected":"");?>>Septiembre</option>
                                    <option value="10" <? echo ($_GET['periodo'] == 10 ? "selected":"");?>>Octubre</option>
                                    <option value="11" <? echo ($_GET['periodo'] == 11 ? "selected":"");?>>Noviembre</option>
                                    <option value="12" <? echo ($_GET['periodo'] == 12 ? "selected":"");?>>Diciembre</option>
                                </select>
                                <select name="year" id="year" class="form-control">
                                    <option value="2017" <? echo ($_GET['year'] == 2017 ? "selected":"");?>>2017</option>
                                </select>
                                <button class="btn btn-info">Cargar</button>
                            </form>
                            <br>
                            <div class="">
                                <table class="table table-striped" id="tablaUsuarios">
                                <thead>
                                <tr>
                                    <th># Transacción</th>
                                    <th>Fecha</th>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Codigo Cliente</th>
                                    <th>Nombre</th>
                                    <th>NIT</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
<!--                                    --><?// getClientesDeAgenteSaldoDesc($_SESSION['codigo_cliente']);?>
                                    <? getReporteFacturacionClientes($_GET['´periodo'],$_GET['year']); ?>
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
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>

    <!-- init -->
    <!--    <script src="assets/pages/datatables.editable.init.js"></script>-->

    <!-- App js -->
    <!--    <script src="assets/js/jquery.core.js"></script>-->
    <!--    <script src="assets/js/jquery.app.js"></script>-->

    <script type="text/javascript">

        $('#tablaUsuarios').DataTable({
            dom:'Bfrtip',
            info:false,
            buttons:[
                'csv','excel','pdf','print'
            ],
            language:{
                url:"assets/plugins/datatables/json/Spanish.json"
            }
        });

        $('#btnGenerarReporte').click(function () {
            if ($("input[name='opcionBusqueda']:checked").val() !== undefined){
                if ($('#saldoRadio1').is(':checked')) {
                    var parametro = $('#saldoRadio1').val();
                    window.location = '/reporte-clientes-agente.php?reporte=' + parametro;
                }else if($('#saldoRadio2').is(':checked')){
                    var parametro = $('#saldoRadio2').val();
                    window.location = '/reporte-clientes-agente.php?reporte=' + parametro;
                }else if($('#fechaRadio1').is(':checked')){
                    var parametro = $('#fechaRadio1').val();
                    var fecha = $('#fechaBusqueda').val();
                    window.location = '/reporte-clientes-agente.php?reporte=' + parametro + '&fecha=' + fecha;
                }else if ($('#fechaRadio2').is(':checked')){
                    var parametro = $('#fechaRadio2').val();
                    var fecha = $('#fechaBusqueda').val();
                    window.location = '/reporte-clientes-agente.php?reporte=' + parametro + '&fecha=' + fecha;
                }
                console.log($("input[name='opcionBusqueda']:checked").val());
            }else{
                console.log("Nada");
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









