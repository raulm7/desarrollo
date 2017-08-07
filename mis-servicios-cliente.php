<?php
/**
 * Modify by PhpStorm.
 * User: AdderlyS
 * Date: 11/05/2017
 * Time: 04:11 PM
 */
session_start();

//TODO Mostrar los servicios con sus nombres, no solamente los numeros de la tabla servicios.
//TODO Realizar el modal de la recarga

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

        <title>Adminto - Responsive Admin Dashboard Template</title>

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
                    <h4 class="page-title">Mis Servicios</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <a href="index.php" class="btn btn-danger"><i
                                    class="fa fa-arrow-left"></i> Inicio
                        </a>
                        <div class="panel-body">
                            <div class="" id="informacion-usuario">
                                <div class="form-group">
                                <table class="table table-striped" id="tablaServiciosRecarga">
                                    <thead>
                                    <tr>
                                        <th style="display: none;">ID</th>
                                        <th>Alias</th>
                                        <th>Plan Asociado al Servicio</th>
                                        <th>Tipo de Plan</th>
                                        <th>Equipo</th>
                                        <th>Automático</th>
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

    <!-- Modal editar -->
    <div id="modalTodo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Editar Servicio</h3>
                </div>
                <form action="assets/scriptsphp/modificar-todo.php" method="post" role="form">
                    <div class="form-group">
                        <input type="hidden" id="codigo_servicio" class="form-control" name="codigo_servicio">
                        <input type="hidden" id="pagina" name="pagina" value="<? echo $_SERVER['REQUEST_URI']; ?>">
                        <label for="Alias"><h4>Alias</h4></label>
                        <input type="text" name="alias" id="alias" class="form-control" maxlength="17" autofocus>
                        <br>
                        <label for="Nota">Nota: Añada un nombre de alias a su servicio para poder encontrarlo más facilmente.</label>
                        <br>
                        <label for="Ejemplo">Ejemplo: Internet casa</label>
                    </div>
                    <div class="form-group">
                        <label for="Estado"><h4>Estado</h4></label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="1">Automatico</option>
                            <option value="0">Manual</option>
                        </select>
                        <br>
                        <label for="Nota">Nota: Al colocar su servicio en automático se estará realizando el cobro del mismo automaticamente.</label>
                    </div>
                    <div class="form-group">
                        <label for="plan_actual"><h4>Plan Actual</h4></label>
                        <select class="form-control" name="codigo_plan" id="codigo_plan">

                        </select>
                        <br>
                        <label>Nota: Si cambia el plan actual, será ajustado el tiempo restante.</label>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                            Guardar cambios
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <script type="text/javascript">

        $('.btnEditar').click(function () {
            var id = $(this).parents('tr:first').find('td:first').text();
            console.log(id);
            $.post("assets/scriptsphp/get-informacion-servicio.php",{codigo_servicio:id})
                .done(function (data) {
                    window.info = JSON.parse(data);
                    $('#alias').val(info.alias);
                    $('#codigo_plan').empty();
                    $('#codigo_plan').html(info.planes);
                    if($('#estado').val() === info.estado){
                        console.log("Los valores son iguales");
                    }else{
                        var elemento = document.getElementById('estado');
                        elemento.value = info.estado;
                    }
                });
            $('#codigo_servicio').val(id);

            $('#modalTodo').modal("show");
        });

        $('.btnRecargar').click(function () {
            var id = $(this).parents('tr:first').find('td:first').text();
            console.log(id);
            $('#codigo_servicio2').val(id);
            $('#modalRecargarServicio').modal("show");
        });
    </script>

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
                            <input type="number" name="cantidad_recarga" id="cantidad_recarga" class="form-control" max="100" step="1" value="100" autofocus>
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
//        $('.btnRecargar').click(function (event) {
//            var id = $(this).parents('tr:first').find('td:first').text();
//            console.log(id);
//            $('#codigo_servicio').val(id);
//            $('#modalRecargarServicio').modal("show");
//        });
    </script>
    </body>
    </html>

<?} ?>




