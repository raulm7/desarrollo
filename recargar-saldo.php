<?php
session_start();

//TODO Mostrar los servicios con sus nombres, no solamente los numeros de la tabla servicios.
//TODO Realizar el modal de la recarga
//TODO Evitar que la pagina se refresque al presionar enter en el input de busqueda.


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
                    <h4 class="page-title">Recargar a Servicio</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <form class="navbar-left app-search pull-left hidden-xs form-inline">
                                        <input type="text" placeholder="" class="form-control" name="busqueda" autofocus
                                               id="busquedaTextbox">
                                        <button type="submit" id="botonBuscar"
                                                class="btn btn-default btn-primary waves-light waves-effect">Buscar
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="" id="informacion-usuario">
                                <table class="table table-striped" id="tablaServiciosRecarga">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Numero de Contrato</th>
                                        <th>Codigo del Plan</th>
                                        <th>Tipo del Plan</th>
                                        <th>Usuario</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <? getServiciosConUsuario($_SESSION['codigo_cliente']);?>
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

    $sql = 'SELECT * FROM servicios WHERE CONCAT(codigo_servicio,"",numero_contrato,"",codigo_plan,"",codigo_tipo,"",usuario) LIKE "'.$busqueda.'"'; //Query para buscar en cualquier tabla algo que se parezca a la busqueda

    if ($result = $conn->query($sql)) { //Si pudo ser realizado el query, duelve true y asigna a la variable result
        $row = $result->fetch_array(MYSQLI_NUM); //Asigna el result a una variable como arreglo numerico.
        $respuesta = armarTablaServiciosRecarga($row); //Arma la tabla html a partir de un arreglo obtenido de la base de datos.
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

        <title>Optel - </title>

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
                    <h4 class="page-title">Recarga a servicio</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <form class="navbar-left app-search pull-left hidden-xs form-inline">
                                        <input type="text" placeholder="" class="form-control" name="busqueda" autofocus
                                               id="busquedaTextbox">
                                        <button type="button" id="botonBuscar"
                                                class="btn btn-default btn-primary waves-light waves-effect">Buscar
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="" id="informacion-usuario">
                                <table class="table table-striped" id="tablaServiciosRecarga">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Numero de Contrato</th>
                                        <th>Codigo del Plan</th>
                                        <th>Tipo del Plan</th>
                                        <th>Usuario</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <? echo $respuesta;?>
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
            <div id="modalRecargarServicio" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Recargar saldo a servicio existente</h4>
                        </div>
                        <br>
                        <br>
                        <form action="assets/scriptsphp/operacion-recargar-servicio.php" method="post" role="form">
                            <input type="hidden" id="codigo_servicio" class="form-control" name="codigo_servicio">
                            <input type="hidden" id="pagina" name="pagina" value="<? echo $_SERVER['REQUEST_URI']; ?>">
                            <label for="cantidad_recarga">Cantidad a Recargar</label>
                            <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max="<? echo getSaldoActual($_SESSION['codigo_cliente']); ?>" step="1" value="100" autofocus>
                            <br>
                            <br>
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
        $(document).ready(function () {
            $('#btnRecarga').click(function (event) {
                var id = $(this).parents('tr:first').find('td:first').text();
                console.log(id);
                $('#codigo_servicio').val(id);
                $('#modalRecargarServicio').modal("show");
            });

        });
    </script>
    </body>
    </html>

<?} ?>




