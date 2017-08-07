<?php
/**
 * Created by PhpStorm.
 * User: AdderlyS
 * Date: 18/07/2017
 * Time: 9:28 AM
 */
session_start();

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}
require_once "assets/scriptsphp/db.php";

if (!isset($_GET['busqueda'])) {
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
                <div class="col-sm-6">
                    <h4 class="page-title">Buscar equipo</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <!--                                <div class="col-sm-1">-->
                                <!--                                    <div class="m-b-30">-->
                                <!--                                        <a href="agregar-usuarios.php" class="btn btn-primary waves-effect waves-light">Agregar-->
                                <!--                                            <i class="fa fa-plus"></i></a>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                <div class="col-sm-3">
                                    <form class="navbar-left app-search pull-left hidden-xs form-inline">
                                        <div class="form-group">
                                            <input type="text" placeholder="Serie - MAC Address" class="form-control" name="busqueda" autofocus
                                                   id="busquedaTextbox" required>
                                            <button type="submit" id="botonBuscar"
                                                    class="btn btn-default btn-primary waves-light waves-effect">Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="" id="informacion-usuario">
                                <table class="table table-striped" id="tablaEquipos">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Nombres</th>
                                        <th>Dirección</th>
                                        <th>Cliente</th>
                                        <th>Tipo</th>
                                        <th>Serie</th>
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
        $('#tablaEquipos').DataTable({
            "info": false,
            "order": [[1, "desc"]],
            responsive: true,
            language:{
                url:"assets/plugins/datatables/json/Spanish.json"
            }
        });
    </script>
    </body>
    </html>

<? } else{
    if (empty($_GET['busqueda'])){
        echo array("nombre"=>"No se encuentran resultados");
    }else{
        $busqueda = $_GET["busqueda"]; //Se obtiene la variable de busqueda desde el GET

        $conn = conectar();
        $sql = 'SELECT codigo_equipo, codigo_bodega, codigo_tipo, serie, mac, observaciones FROM equipos WHERE (serie = "'.$busqueda.'") OR (mac = "'.$busqueda.'")'; //Query para buscar en cualquier tabla algo que se parezca a la busqueda
        if ($result = $conn->query($sql)) {
            if ($result->num_rows == 1) {
                while ($row = $result->fetch_assoc()) {
                    $respuesta .= "<tr>";
                    $respuesta .= "<td style='display: none;' class='tdid'>" . $row['codigo_bodega'] . "</td>";
                    $respuesta .= "<td style='display: none;' class='tdid'>" . $row['codigo_equipo'] . "</td>";

                    $connBodega = conectar();
                    $sqlBodega = 'SELECT codigo_bodega, codigo_tipo, nombre, direccion, codigo_cliente FROM bodegas WHERE (codigo_bodega = "' . $row['codigo_bodega'] . '")';
                    $resultBodega = $connBodega->query($sqlBodega);
                    $rowBodega = $resultBodega->fetch_assoc();

                    $respuesta .= "<td>" . $rowBodega['nombre'] . "</td>";
                    $respuesta .= "<td>" . $rowBodega['direccion'] . "</td>";

                    $connServicio = conectar();
                    $sqlServicio = 'SELECT codigo_servicio, numero_contrato, alias FROM servicios WHERE (usuario = "' . $row['mac'] . '")';
                    $resultServicio = $connServicio->query($sqlServicio);
                    $rowServicio = $resultServicio->fetch_assoc();

                    $respuesta .= "<td style='display: none;' class='tdid'>" . $rowServicio['codigo_servicio'] . "</td>";
                    $respuesta .= "<td>" . $rowServicio['alias'] . "</td>";

                    $connContrato = conectar();
                    $sqlContrato = 'SELECT codigo_cliente, fecha, descripcion FROM contratos WHERE (numero_contrato = "' . $rowServicio['numero_contrato'] . '")';
                    $resultContrato = $connContrato->query($sqlContrato);
                    $rowContrato = $resultContrato->fetch_assoc();

                    $respuesta .= "<td style='display: none;' class='tdid'>" . $rowServicio['numero_contrato'] . "</td>";
                    $respuesta .= "<td>" . $rowContrato['descripcion'] . "</td>";
                    $respuesta .= "<td>" . date("d/M/y", strtotime($rowContrato['fecha'])) . "</td>";

                    $connCliente = conectar();
                    $sqlCliente = 'SELECT nombres, apellidos FROM clientes WHERE (codigo_cliente = "' . $rowContrato['codigo_cliente'] . '")';
                    $resultCliente = $connCliente->query($sqlCliente);
                    $rowCliente = $resultCliente->fetch_assoc();

                    $respuesta .= "<td style='display: none;' class='tdid'>" . $rowContrato['codigo_cliente'] . "</td>";
                    $respuesta .= "<td>" . $rowCliente['nombres'] . " " . $rowCliente['apellidos'] . "</td>";

                    if ($resultCliente->num_rows < 1){
                        $respuesta = null;
                        echo $respuesta;
                    }
                    else
                    {
                        $connTipo = conectar();
                        $sqlTipo = 'SELECT codigo_tipo, clase, nombre FROM tipos WHERE (codigo_tipo = "' . $row['codigo_tipo'] . '")';
                        $resultTipo = $connTipo->query($sqlTipo);
                        $rowTipo = $resultTipo->fetch_assoc();

                        $respuesta .= "<td style='display: none;' class='tdid'>" . $rowTipo['codigo_equipo'] . "</td>";
                        $respuesta .= "<td>" . $rowTipo['nombre'] . "</td>";

                        $respuesta .= "<td>" . $row['serie'] . "</td>";
                        $respuesta .= "<td>" . $row['mac'] . "</td>";
                        $respuesta .= "<td><a href='#' class='btnBaja' name='btnBaja'><span class='label label-danger'>Dar de baja</span></td>";
                        $respuesta .= "</tr>";
                    }
                }
                echo $respuesta;
            }
            elseif ($result->num_rows > 1){
                while($row = $result->fetch_assoc()){
                    $respuesta[] = armarTablaUniversalRecargar($row);
                }
                console_log($respuesta);
                echo $respuesta;
            }
        }else {
            echo "Error: " . $conn->error;
        }

        $result->free();
        $conn->close();
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

    <body>
    <?php include "assets/include/navbar.php"; ?>
    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title">Buscar equipo</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <input type="text" placeholder="Serie - MAC Address" class="form-control" name="busqueda" autofocus
                                                   id="busquedaTextbox">
                                            <button type="submit" id="botonBuscar"
                                                    class="btn btn-default btn-primary waves-light waves-effect">Buscar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <br>
                            <div class="" id="informacion-usuario">
                                <table class="table table-striped" id="tablaEquipos">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Bodega</th>
                                        <th>Dirección</th>
                                        <th>Servicio</th>
                                        <th>Contrato</th>
                                        <th>Fecha</th>
                                        <th>Cliente</th>
                                        <th>Equipo</th>
                                        <th>Serie</th>
                                        <th>MAC</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <? if(is_array($respuesta)){
                                        foreach ($respuesta as $row){
                                            echo $row;
                                        }
                                    }else{
                                        echo $respuesta;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end: panel body -->
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

            <!-- Modal recargar saldo a usuario-->
            <div id="modalBaja" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Se dará de baja al servicio</h4>
                        </div>
                        <br>
                        <form action="assets/scriptsphp/dar-de-baja.php" method="post" role="form">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="hidden" id="pagina" name="pagina" value="/<?echo basename($_SERVER['REQUEST_URI']);?>">
                                    <input type="hidden" id="bodega_agente" class="form-control" name="bodega_agente">
                                    <input type="hidden" id="codigo_equipo" class="form-control" name="codigo_equipo">
                                    <input type="hidden" id="cliente" class="form-control" name="cliente">
                                    <input type="hidden" id="mac" class="form-control" name="mac">
                                    <label for="codigo_confirmacion">Código de confirmación: 035120</label>
                                    <input type="text" name="codigo_confirmacion" id="codigo_confirmacion" class="form-control" autofocus="autofocus">
                                </div>
                                <div class="form-group">
                                    <label for="observacion">Observacion:</label>
                                    <input type="text" class="form-control" id="observacion" name="observacion" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Confirmar la baja del servicio
                                </button>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>

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
    $('#tablaEquipos').DataTable({
        "info": false,
        "order": [[1, "desc"]],
        responsive: true,
        language:{
            url:"assets/plugins/datatables/json/Spanish.json"
        }
    });
</script>

    <script type="text/javascript">

        $('.btnBaja').click(function () {
            var bodega_agente  = $(this).parents('tr:first').find('td:nth-child(1)').text();
            var codigo_equipo  = $(this).parents('tr:first').find('td:nth-child(2)').text();
            var cliente  = $(this).parents('tr:first').find('td:nth-child(11)').text();
            var mac  = $(this).parents('tr:first').find('td:nth-child(15)').text();
            $('#bodega_agente').val(bodega_agente);
            $('#codigo_equipo').val(codigo_equipo);
            $('#cliente').val(cliente);
            $('#mac').val(mac);
            $('#modalBaja').modal('show');

        });

    </script>
    </head>
    </body>
    </html>
<?} ?>