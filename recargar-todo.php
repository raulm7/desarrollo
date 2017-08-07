<?php
session_start();

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
                    <h4 class="page-title">Recargar Usuario / Servicio</h4>
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
                                            <input type="text" placeholder="" class="form-control" name="busqueda" autofocus
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
                                <table class="table table-striped" id="tablaServiciosRecarga">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>NIT</th>
                                        <th>DPI</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
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

            <!-- Modal recargar saldo -->
            <div id="modalRecargar" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Recargar saldo a servicio existente</h4>
                        </div>
                        <br>
                        <br>
                        <form action="assets/scriptsphp/insertar-tipo-bodega.php" method="post" role="form">
                            <label class="control-label" for="nombre">Recargar</label>
                            <br>
                            <input type="number" id="codigo_servicio" name="codigo_servicio" value="0">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de tipo de bodega" autofocus>
                            <br>
                            <br>
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Registrar
                            </button>
                        </form>
                        <br>
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

    </body>
    </html>

<? } else{
    $busqueda = "%".$_GET["busqueda"]."%"; //Se le agregan sus wildcards a la variable de busqueda.
    $conn = conectar();

    $sql = 'SELECT * FROM clientes WHERE codigo_tipo ='.getCodigoTipo("Agente").' && CONCAT(nombres,"",apellidos,"",nit,"",numero_id,"",email,"",usuario) LIKE "'.$busqueda.'"'; //Query para buscar en cualquier tabla algo que se parezca a la busqueda
    if ($result = $conn->query($sql)) {
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $respuesta = armarTablaUniversalRecargar($row);
            echo $respuesta;
        }elseif ($result->num_rows > 1){
            while($row = $result->fetch_assoc()){
                $respuesta[] = armarTablaUniversalRecargar($row);
            }
            echo $respuesta;
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $result->free();
    $conn->close();
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
                    <h4 class="page-title">Recargar Usuario / Servicio</h4>
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
                                            <input type="text" placeholder="" class="form-control" name="busqueda" autofocus
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
                                <table class="table table-striped" id="tablaServiciosRecarga">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>NIT</th>
                                        <th>Email</th>
                                        <th>Usuario</th>
                                        <th>Opciones</th>
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
            <div id="modalRecargarSaldo" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Recargar Saldo</h4>
                        </div>
                        <br>
                        <form action="assets/scriptsphp/operacion-recargar-usuario.php" method="post" role="form" id="formRecargar">
                            <div class="form-group">
                                <input type="hidden" id="pagina" name="pagina" value="/<?echo basename($_SERVER['REQUEST_URI']);?>">
                                <input type="hidden" id="usuario_destino" class="form-control" name="usuario_destino">
                                <label for="inputModalSaldoCantidadRecarga">Cantidad a recargar:</label>
                                <input required type="number" name="cantidad_recarga" id="inputModalSaldoCantidadRecarga" class="form-control" max=<? echo getSaldoActual($_SESSION['codigo_cliente']); ?> step="1" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="inputModalSaldoCantidadRecargaConfirmar">Confirmar la cantidad a recargar:</label>
                                <input required type="number" name="cantidad_recarga_confirmar" id="inputModalSaldoCantidadRecargaConfirmar" class="form-control" max=<? echo getSaldoActual($_SESSION['codigo_cliente']); ?> step="1">
                            </div>
                            <div class="form-group">
                                <label for="observacion">Observación (Numero Boleta, Efectivo, etc)</label>
                                <input type="text" name="observacion" id="observacion" class="form-control">
                                <h4 id="divMensajeError" style="color: #ff3111;"></h4>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary waves-effect waves-light" type="button" onclick="validarFormRecarga();">
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

            <!-- Modal Servicios de Usuario-->
            <div id="modalRecargarServicio" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Servicios Asociados a Usuario</h4>
                        </div>
                        <br>
                        <form action="assets/scriptsphp/operacion-recargar-servicio2.php" method="post">
                            <div class="form-group">
                                <label for="selectCodigoServicio">Servicios Asociados al Cliente</label>
                                <select name="codigo_servicio" id="selectCodigoServicio" class="form-control">

                                </select>
                            </div>
<!--                            <div class="form-group">-->
<!--                                <label for="cantidad_recargar">Cantidad a Recargar</label>-->
<!--                                <input type="number" name="cantidad_recarga" id="inputModalServiciosAsociadosCantidadRecarga" class="form-control">-->
<!--                            </div>-->
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

        function validarFormRecarga() {
            var cantidad = $('#inputModalSaldoCantidadRecarga').val();
            var confirma = $('#inputModalSaldoCantidadRecargaConfirmar').val();

            if (cantidad === confirma){
                $('#formRecargar').submit();
            }else{
                var error = $("#divMensajeError");
                error.html("Por favor verifique que las cantidades sean iguales.");
                console.log("Valores diferentes");
            }
        }

        $('.btnRecarga').click(function () {
            $('#modalRecargar').modal('show');
           var id = $(this).parents('tr:first').find('td:first').text();
            $('#usuario_destino').val(id);
        });

        $('.btnSaldo').click(function () {
            var id = $(this).parents('tr:first').find('td:first').text();
            $('#usuario_destino').val(id);
            $('#modalRecargarSaldo').modal('show');

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

    </script>
    </body>
    </html>

<?} ?>




