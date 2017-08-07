<?php
/**
 * Created by PhpStorm.
 * User: Miguel Leon
 * Date: 19/01/2017
 * Time: 11:20 AM
 */

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

?>

<?php
$con = conectar();
    $id = $_GET['id'];

    console_log(permisoLeerUsuario($_SESSION['codigo_cliente'],$id));


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
        <div class="row">
        <!-- PROGRESSBAR WIZARD -->
        <div class="col-lg-12">
        <div class="card-box p-b-0">
        <div id="progressbarwizard2" class="pull-in">
        <ul>
            <li><a href="#user-tab-1" data-toggle="tab">Editar usuario</a></li>
            <li><a href="#contrat-tab-2" data-toggle="tab">Contratos</a></li>
            <li><a href="#service-tab-3" data-toggle="tab">Equipos</a></li>
        </ul>

        <div class="tab-content b-0 m-b-0">

        <div id="bar" class="progress progress-striped progress-bar-primary-alt active">
            <div class="bar progress-bar progress-bar-primary"></div>
        </div>

        <div class="tab-pane p-t-10 fade" id="user-tab-1">
            <div class="row">
                <div class="form-group clearfix">
                    <input type="hidden" name="codigo_tipo" id="codigo_tipo" value=<? echo $row['codigo_tipo']; ?>>
                    <label class="col-md-1 control-label " for="Nombres">Nombres *</label>
                    <div class="col-md-5">
                        <input type="text" name="nombres" class="form-control" value="<? echo $row['nombres']; ?>" placeholder="Nombres">
                    </div>
                    <label class="col-md-1 control-label " for="Apellidos">Apellidos *</label>
                    <div class="col-md-5">
                        <input type="text" name="apellidos" class="form-control" value="<? echo $row['apellidos']; ?>" placeholder="Apellidos">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Email">Email *</label>
                    <div class="col-md-5">
                        <input type="email" id="email" name="email" class="form-control" value="<? echo $row['email']; ?>" placeholder="Email">
                    </div>
                    <label class="col-md-1 control-label " for="NIT">NIT *</label>
                    <div class="col-md-5">
                        <input type="text" name="nit" class="form-control" value="<? echo $row['nit']; ?>" placeholder="NIT">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Sexo">Sexo *</label>
                    <div class="col-md-5">
                        <select class="form-control" name="sexo">
                            <option <? if ($row['sexo'] == 'M') echo "selected"; ?>>M</option>
                            <option <? if ($row['sexo'] == 'F') echo "selected"; ?>>F</option>
                        </select>
                    </div>
                    <label class="col-md-1 control-label " for="Estado Civil">Estado Civil *</label>
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
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Fecha de Nacimiento">Fecha de Nacimiento *</label>
                    <div class="col-md-5">
                        <input type="date" class="form-control" value="<? echo substr($row['edad'], 0, 10); ?>" name="fecha_nacimiento" id="fecha_nacimiento">
                    </div>
                    <label class="col-md-1 control-label " for="DPI">DPI *</label>
                    <div class="col-md-5">
                        <input type="text" name="numero_id" class="form-control" value="<? echo $row['numero_id']; ?>" placeholder="Identificación" maxlength="13">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Departamento">Departamento *</label>
                    <div class="col-md-5">
                        <? getDepartamentosSelected($row['codigo_departamento']); ?>
                    </div>
                    <label class="col-md-1 control-label " for="Municipio">Municipio *</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" placeholder="Municipio" value="<? echo $row['codigo_municipio']; ?>" name="municipio">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Dirección">Dirección *</label>
                    <div class="col-md-5">
                        <textarea class="form-control" rows="3" name="direccion"><? echo $row['direccion']; ?></textarea>
                    </div>
                    <label class="col-md-1 control-label " for="Comentarios">Comentarios *</label>
                    <div class="col-md-5">
                        <textarea class="form-control" rows="2" name="texto"><? echo $row['texto']; ?></textarea>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Colonia">Colonia *</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="colonia" value="<? echo $row['colonia']; ?>">
                    </div>
                    <label class="col-md-1 control-label " for="Zona">Zona *</label>
                    <div class="col-md-5">
                        <input type="number" name="zona" class="form-control" max="25" value="<? echo $row['zona']; ?>" maxlength="2">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Calle">Calle *</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="calle" value="<? echo $row['calle']; ?>">
                    </div>
                    <label class="col-md-1 control-label " for="Avenida">Avenida *</label>
                    <div class="col-md-5">
                        <input type="text" name="avenida" class="form-control" value="<? echo $row['avenida']; ?>">
                    </div>
                </div>
                <div class="form-group clearfix">
                    <label class="col-md-1 control-label " for="Número Casa">Número Casa *</label>
                    <div class="col-md-5">
                        <input type="text" class="form-control" name="numero_casa" value="<? echo $row['numero_casa']; ?>">
                    </div>
                    <label class="col-md-1 control-label " for="Fotografía">Fotografía *</label>
                    <div class="col-md-5">
                        <input type="file" name="subeImagen" class="dropify" data-height="100" data-default-file=<?php echo $imagen; ?> data-max-file-size="15M"/>
                    </div>
                    <input class="form-control" type="hidden" name="id" id="id" value="<? echo $_GET['id']; ?>">
                </div>
            </div>
        </div>
        <? if (!isset($_GET['id'])) { ?>

        <? } else { ?>
            <div class="tab-pane p-t-10 fade" id="contrat-tab-2">
                <div class="row">
                    <div class="form-group clearfix">
                        <input type="hidden" id="codigo_cliente" name="codigo_cliente" value=<? echo $_GET['id']; ?>>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalAgregarContrato">Nuevo Contrato <i class="fa fa-plus"></i></button>
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
                </div>
            </div>

        <? } ?>

        <? if (!($_SESSION['permiso'] == 50) && (isset($_GET['id']))) { ?> <!-- Verificacion para mostrar o no la tabla de asignación de equipos -->
            <div class="tab-pane p-t-10 fade" id="service-tab-3">
                <div class="row">
                    <div class="form-group clearfix">
                        <input type="hidden" id="codigo_cliente" name="codigo_cliente" value=<? echo $_GET['id']; ?>>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#modalAsignarEquipos">Asignar Equipos <i class="fa fa-plus"></i></button>
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
                </div>
            </div>
        <? } ?>
        <?
    } else {
        header("Location:agregar-usuarios.php");
    }
    ?>
    <ul class="pager m-b-0 wizard">
        <li class="previous first" style="display:none;"><a href="#">First</a></li>
        <li class="previous"><a href="#" class="btn btn-primary waves-effect waves-light">Previous</a></li>
        <li class="next last" style="display:none;"><a href="#">Last</a></li>
        <li class="next"><a href="#" class="btn btn-primary waves-effect waves-light">Next</a></li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    <!-- end col -->
    </div>
    </div>
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

    <!-- file uploads js -->
    <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>

    <!-- Form wizard -->
    <script src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
    <script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#basicwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted'});

            $('#progressbarwizard2').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#progressbarwizard2').find('.bar').css({width:$percent+'%'});
            },
                'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted'});

            $('#btnwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted','nextSelector': '.button-next', 'previousSelector': '.button-previous', 'firstSelector': '.button-first', 'lastSelector': '.button-last'});

            var $validator = $("#commentForm").validate({
                rules: {
                    emailfield: {
                        required: true,
                        email: true,
                        minlength: 3
                    },
                    namefield: {
                        required: true,
                        minlength: 3
                    },
                    urlfield: {
                        required: true,
                        minlength: 3,
                        url: true
                    }
                }
            });

            $('#rootwizard').bootstrapWizard({
                'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted',
                'onNext': function (tab, navigation, index) {
                    var $valid = $("#commentForm").valid();
                    if (!$valid) {
                        $validator.focusInvalid();
                        return false;
                    }
                }
            });
        });
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



<?
