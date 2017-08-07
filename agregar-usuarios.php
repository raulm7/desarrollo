<?php
session_start();
require_once "assets/scriptsphp/db.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

if ($_SESSION['permiso'] == 50) {
    http_response_code(404);
}

if (!isset($_GET['ref']) OR empty($_GET['ref'])) {
    $ref = 0;
} else {
    $ref = $_GET['ref'];
}

if ((!isset($_GET['id']))) {


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

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" type="text/css">

        <!-- form Uploads -->
        <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css"/>

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
                    <h4 class="page-title">Registro de usuario nuevo</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Ingresar información del usuario</h4>
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                              action="assets/scriptsphp/insertar-usuario-nuevo.php">
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <input type="hidden" name="pagina" value="<? echo $_POST['pagina']; ?>">
                                        <input type="hidden" name="codigo_agente" value="<? echo $_POST['codigo_agente']; ?>">
                                        <input type="hidden" name="codigo_tipo"
                                               value="<? echo $_POST['codigo_tipo']; ?>">
                                        <label class="col-md-2 control-label">Nombres</label>
                                        <div class="col-md-4">
                                            <input type="text" name="nombres" class="form-control"
                                                   placeholder="Nombres" required>
                                        </div>
                                        <label class="col-md-1 control-label">Apellidos</label>
                                        <div class="col-md-5">
                                            <input type="text" name="apellidos" class="form-control"
                                                   placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Email</label>
                                        <div class="col-md-4">
                                            <input type="email" id="email" name="email" class="form-control"
                                                   placeholder="Email" required>
                                        </div>
                                        <label class="col-md-1 control-label" for="example-email">NIT</label>
                                        <div class="col-md-5">
                                            <input type="text" name="nit" class="form-control" placeholder="NIT"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Sexo</label>
                                        <div class="col-md-4">
                                            <select class="form-control" name="sexo" required>
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </select>
                                        </div>
                                        <label class="col-md-1 control-label">Estado Civil</label>
                                        <div class="col-md-5">
                                            <select class="form-control" name="estado_civil" required>
                                                <option>Soltero</option>
                                                <option>Casado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Fecha de Nacimiento</label>
                                        <div class="col-md-4">
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                   id="fecha_nacimiento" required>
                                        </div>
                                        <label class="col-md-1 control-label">DPI</label>
                                        <div class="col-md-5">
                                            <input type="text" name="numero_id" class="form-control"
                                                   placeholder="Identificación" maxlength="13" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Departamento</label>
                                        <div class="col-md-4">
                                            <?php getDepartamentos(); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Municipio</label>
                                        <div class="col-md-5">
                                            <select class="form-control" id="municipio" name="municipio" required>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Dirección</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="3" name="direccion"
                                                      required></textarea>
                                        </div>
                                    </div>

                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Colonia</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="colonia"
                                                   placeholder="Colonia" required>
                                        </div>
                                        <label class="col-md-1 control-label">Zona</label>
                                        <div class="col-md-5">
                                            <input type="number" name="zona" placeholder="Zona" class="form-control"
                                                   max="25"
                                                   maxlength="2" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Calle</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="calle" required>
                                        </div>
                                        <label class="col-md-1 control-label">Avenida</label>
                                        <div class="col-md-5">
                                            <input type="text" name="avenida" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Numero Casa</label>
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="numero_casa" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Comentarios</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="2" name="texto" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Fotografia</label>
                                        <div class="col-md-10">
                                            <input type="file" name="subeImagen" class="dropify" data-height="100"
                                                   data-width=
                                                   data-max-file-size="5M">
                                        </div>
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Registrar
                                        </button>
                                        <button type="button" onclick="window.history.go(-1); return false;" type="reset"
                                           class="btn btn-default waves-effect waves-light m-l-5">
                                            Cancelar
                                        </button>
                                    </div>

                                </div><!-- end col -->

                            </div><!-- end row -->
                        </form>
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
    <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- file uploads js -->
    <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastre un archivo o haga click.',
                'replace': 'Arrastre un archivo o haga click para reemplazar.',
                'remove': 'Remover',
                'error': 'Algo salio mal.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es muy grande (5mb).'
            }
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("fecha_nacimiento").setAttribute("max", today);

        function cambioSelectDepartamentos() {
            var valor = $('#departamento').val();
            $('#municipio').empty();
            $.post("assets/scriptsphp/cargar-municipios-por-departamento.php", {codigo_departamento: valor})
                .done(function (data) {
                    $('#municipio').html(data);
                });
        }

        if (!Modernizr.inputtypes.date){
            $('input[type=date]').datepicker({
                dateFormat: 'dd-mm-yy'
            })
        }

    </script>

    </body>
    </html>

<?php } else {
    $con = conectar();
    $id = $_GET['id'];
    if (!permisoLeerUsuario($_SESSION['codigo_cliente'],$id)){
        header("Location:index.php");
    }


    $tipo = getCodigoTipo($_GET['tipo']);
    $query = "SELECT * FROM clientes WHERE codigo_cliente='" . $id . "'";

    if ($result = $con->query($query)) {
        $row = $result->fetch_assoc();
        $imagen = "/fotos/clientes/" . $row['foto'];
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
            <meta name="author" content="Coderthemes">

            <link rel="shortcut icon" href="assets/images/favicon.ico">

            <title>Edicion de Usuario</title>

            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/core.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/components.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css"/>
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>

            <!-- form Uploads -->
            <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css"/>

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
                <h4 class="page-title">Registro de usuario nuevo</h4>
            </div>
        </div>

        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
              action="assets/scriptsphp/update-usuario.php">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Formulario Edición de Usuarios</h4>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="codigo_tipo" id="codigo_tipo"
                                           value=<? echo $row['codigo_tipo']; ?>>
                                    <label class="col-md-2 control-label">Nombres</label>
                                    <div class="col-md-4">
                                        <input type="text" name="nombres" class="form-control"
                                               value="<? echo $row['nombres']; ?>"
                                               placeholder="Nombres">
                                    </div>
                                    <label class="col-md-1 control-label">Apellidos</label>
                                    <div class="col-md-5">
                                        <input type="text" name="apellidos" class="form-control"
                                               value="<? echo $row['apellidos']; ?>"
                                               placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="example-email">Email</label>
                                    <div class="col-md-4">
                                        <input type="email" id="email" name="email" class="form-control"
                                               value="<? echo $row['email']; ?>"
                                               placeholder="Email">
                                    </div>
                                    <label class="col-md-1 control-label" for="example-email">NIT</label>
                                    <div class="col-md-5">
                                        <input type="text" name="nit" class="form-control"
                                               value="<? echo $row['nit']; ?>"
                                               placeholder="NIT">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Sexo</label>
                                    <div class="col-md-4">
                                        <select class="form-control" name="sexo">
                                            <option <? if ($row['sexo'] == 'M') echo "selected"; ?>>M</option>
                                            <option <? if ($row['sexo'] == 'F') echo "selected"; ?>>F</option>
                                        </select>
                                    </div>
                                    <label class="col-md-1 control-label">Estado Civil</label>
                                    <div class="col-md-5">
                                        <select class="form-control" name="estado_civil">
                                            <option <? if ($row['estado_civil'] == 'Soltero') echo "selected"; ?>>
                                                Soltero
                                            </option>
                                            <option <? if ($row['estado_civil'] == 'Casado') echo "selected"; ?>>
                                                Casado
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Fecha de Nacimiento</label>
                                    <div class="col-md-4">
                                        <input type="date" class="form-control"
                                               value="<? echo substr($row['edad'], 0, 10); ?>" name="fecha_nacimiento"
                                               id="fecha_nacimiento">
                                    </div>
                                    <label class="col-md-1 control-label">DPI</label>
                                    <div class="col-md-5">
                                        <input type="text" name="numero_id" class="form-control"
                                               value="<? echo $row['numero_id']; ?>"
                                               placeholder="Identificación" maxlength="13">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Departamento</label>
                                    <div class="col-md-4">
                                        <? getDepartamentosSelected($row['codigo_departamento']); ?>
                                    </div>
                                    <label class="col-md-1 control-label">Municipio</label>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" placeholder="Municipio"
                                               value="<? echo $row['codigo_municipio']; ?>"
                                               name="municipio">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Dirección</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="3"
                                                  name="direccion"><? echo $row['direccion']; ?></textarea>
                                    </div>
                                </div>


                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Colonia</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="colonia"
                                               value="<? echo $row['colonia']; ?>">
                                    </div>
                                    <label class="col-md-1 control-label">Zona</label>
                                    <div class="col-md-5">
                                        <input type="number" name="zona" class="form-control" max="25"
                                               value="<? echo $row['zona']; ?>"
                                               maxlength="2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Calle</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="calle"
                                               value="<? echo $row['calle']; ?>">
                                    </div>
                                    <label class="col-md-1 control-label">Avenida</label>
                                    <div class="col-md-5">
                                        <input type="text" name="avenida" class="form-control"
                                               value="<? echo $row['avenida']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Numero Casa</label>
                                    <div class="col-md-4">
                                        <input type="text" class="form-control" name="numero_casa"
                                               value="<? echo $row['numero_casa']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Comentarios</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" rows="2"
                                                  name="texto"><? echo $row['texto']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Fotografia</label>
                                    <div class="col-md-10">
                                        <input type="file" name="subeImagen" class="dropify" data-height="100"
                                               data-default-file=<?php echo $imagen; ?> data-max-file-size="15M"/>
                                    </div>
                                    <input class="form-control" type="hidden" name="id" id="id"
                                           value="<? echo $_GET['id']; ?>"
                                </div>


                            </div><!-- end col -->
                            <div class="form-group text-right">

                                <button class="btn btn-primary waves-effect waves-light" type="submit">
                                    Actualizar
                                </button>
                                <button onclick="window.history.go(-1); return false;" type="reset"
                                        class="btn btn-default waves-effect waves-light m-l-5">
                                    Cancelar
                                </button>
                            </div>
                        </div><!-- end row -->

                    </div>
                </div><!-- end col -->
            </div>
        </form>
        <!-- end row -->


        <? if (!isset($_GET['id'])) { ?>

        <? } else { ?>
            <div class="row">
                <div class="col-sm-6">
                    <h4 class="page-title" id="contratos">Contratos</h4>
                </div>
                <div class="col-sm-6">
                    <h4 class="page-title" id="contratos">Equipos</h4>
                </div>
            </div>


            <div class="row">
            <div class="col-sm-6">
                <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-30">Servicios asignado al usuario</h4>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="m-b-30">
                                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                                      action="assets/scriptsphp/insertar-contrato.php">
                                    <input type="hidden" id="codigo_cliente" name="codigo_cliente"
                                           value=<? echo $_GET['id']; ?>>
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal" data-target="#modalAgregarContrato">Nuevo Contrato <i
                                                class="fa fa-plus"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <table class="table table-striped" id="tablaContratos">
                            <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>Plan</th>
                                <th>Tipo de Plan</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <!--                            --><?php //tablaContratos($_GET['id']); ?>
                            <?php getServiciosMedianteContrato($_GET['id']); ?>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->
        <? } ?>


        <? if (!($_SESSION['permiso'] == 50) && (isset($_GET['id']))) { ?> <!-- Verificacion para mostrar o no la tabla de asignación de equipos -->

            <div class="col-sm-6">

                <div class="card-box">

                    <h4 class="header-title m-t-0 m-b-30">Equipos Asignados</h4>
                    <? if ((getNombreTipo($_SESSION['permiso']) === "Agente") || (getNombreTipo($_SESSION['permiso']) === "ADMIN")) { ?>

                    <? } else { ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="m-b-30">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data"
                                          method="post"
                                          action="assets/scriptsphp/insertar-contrato.php">
                                        <input type="hidden" id="codigo_cliente" name="codigo_cliente"
                                               value=<? echo $_GET['id']; ?>>
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#modalAsignarEquipos">Asignar Equipos
                                            <i class="fa fa-plus"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <? } ?>


                    <div class="">
                        <table class="table table-striped" id="tablaContratos">
                            <thead>
                            <tr>
                                <th style="display: none;">ID</th>
                                <th>Tipo</th>
                                <th>Serie</th>
                                <th>ID</th>
                            </tr>
                            </thead>
                            <? tablaEquiposBodegaClientSimple($_GET['id']); ?>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->
        <? } ?>
        </div>
        <?
    } else {
        header("Location:agregar-usuarios.php");
    }
    ?>

    </div>
    <!-- end container -->

</div>

    <!-- Modal Agregar Contrato -->
    <div id="modalAgregarContrato" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Nuevo Contrato</h4>
                </div>
                <div class="modal-body">
                    <label class="header-title">Datos del Contrato</label>
                    <br>
                    <br>
                    <form action="assets/scriptsphp/insertar-contrato.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value=<? echo $_GET['id'] ?> name="codigo_cliente">
                        <label for="descripcion">Descripción del contrato</label>
                        <input type="text" name="descripcion" class="form-control"
                               placeholder="Descripcion del Contrato">
                        <br>
                        <label for="fotoContrato">Fotografía del Contrato</label>
                        <br>
                        <input type="file" name="fotoContrato" class="dropify" data-height="100"
                               data-max-file-size="5M" data-default-file="assets/images/contrato/1.jpg"/>
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar Servicio al
                            contrato
                        </button>
                        <a href="assets/scriptsphp/descargarContrato.php"
                           class="btn btn-danger waves-effect waves-light">Descargar Contrato</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" data-toggle="modal">Cancelar</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Asignar Equipos -->
    <div id="modalAsignarEquipos" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Asignar Equipos A Usuario</h4>
                </div>
                <div class="modal-body">
                    <label class="header-title">Equipos disponibles para asignar</label>
                    <br>
                    <br>
                    <form action="assets/scriptsphp/asignar-equipos.php" method="POST">
                        <input type="hidden" value=<? echo $_GET['id'] ?> name="codigo_cliente">
                        <label for="descripcion">Seleccione uno o más equipos</label>
                        <br>
                        <? getSelectEquiposLibres(); ?>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar Equipos Al
                            Usuario
                        </button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" data-toggle="modal">Cancelar</a>
                </div>
            </div>

        </div>
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
    <script src="plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- file uploads js -->
    <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        var id_ultimo_creado = 0;
        $(document).ready(function () {
            $('#botonagregarcontrato').click(function () {
                var id = $('#id').val();
                $.ajax({
                    dataType: "json",
                    url: "assets/scriptsphp/insertar-contrato.php",
                    data: {
                        "codigo_cliente": id
                    },
                    cache: false,
                    type: "POST",
                    success: function (ultimoid) {
                        id_ultimo_creado = ultimoid;
                        console.log(id_ultimo_creado);
                    },
                    error: function (xhr) {
                        window.location.reload();
                    }
                });
            });
            $('#botonagregarservicio').click(function () {
                var PlanSeleccionado = $('#planes').val();
                $.ajax({
                    dataType: "json",
                    url: "assets/scriptsphp/insertar-servicio.php",
                    data: {
                        "codigo_contrato": id_ultimo_creado,
                        "codigo_plan": PlanSeleccionado
                    },
                    cache: false,
                    type: "POST",
                    success: function (response) {
                        if (response == true) {
                            var modalContratoNuevo = $('#modalContratoNuevo');
                            var modalAgregarServicios = $('#modalAgregarServicios');
                            modalContratoNuevo.modal('show');
                            modalContratoNuevo.on('hidden.bs.modal', function (e) {
                                $(this).removeData();
                            });
                            modalAgregarServicios.on('hidden.bs.modal', function (e) {
                                $(this).removeData();
                            });
                            modalAgregarServicios.modal('hide');
                        }
                    },
                    error: function (xhr) {
                        window.location.reload();
                    }
                });
            });
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Arrastre un archivo o haga click.',
                'replace': 'Arrastre un archivo o haga click para reemplazar.',
                'remove': 'Remover',
                'error': 'Algo salio mal.'
            },
            error: {
                'fileSize': 'El tamaño del archivo es muy grande (5mb).',
                'imageFormat': 'El formato del archivo no es permitido'
            }
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById("fecha_nacimiento").setAttribute("max", today);

        jQuery('.delBtn').on('click', function () {
            var r = confirm("¿Desea borar este registro?");
            if (r == true) {
                var $row = jQuery(this).closest('tr');
                var $columns = $row.find('td');

                $columns.addClass('row-highlight');
                var values = [];
                var c = 1;
                jQuery.each($columns, function (i, item) {
                    if (c < 2) {
                        values.push(item.innerHTML);
                        c = c + 1;
                    }
                });
                console.log(values);

                $.ajax({
                    url: "assets/scriptsphp/borrar-contrato.php",
                    data: {
                        "codigo_contrato": values[0],
                    },
                    cache: false,
                    type: "POST",
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (xhr) {
                        window.location.reload();
                    }
                });
            }
        });

        jQuery('.editBtn').on('click', function () {
            var $row = jQuery(this).closest('tr');
            var $columns = $row.find('td');

            $columns.addClass('row-highlight');
            var values = [];
            var c = 1;
            jQuery.each($columns, function (i, item) {
                if (c < 2) {
                    values.push(item.innerHTML);
                    c = c + 1;
                }
            });
            console.log(values);

            document.location.href = ("editar-contratos.php?id=" + values[0]);
        });

    </script>
</body>
    </html>



<?php } ?>

