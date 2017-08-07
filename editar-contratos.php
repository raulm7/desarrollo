<?php
session_start();

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";

if (!isset($_GET['id'])) {

} else {
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM contratos WHERE numero_contrato='" . $id . "'";

    if ($result = $conn->query($sql)) {
        $row = $result->fetch_assoc();
        $imagen = "/fotos/contratos/" . $row['foto'];

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

            <!-- form Uploads -->
            <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css"/>

            <!-- Lightbox estilo -->
            <link href="assets/css/lightbox.css" rel="stylesheet" type="text/css"/>

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
                <h4 class="page-title">Servicios Asociados a Contrato <? echo $_GET['id']; ?></h4>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
                                    <form class="form-inline" action="assets/scriptsphp/redireccion-usuario.php"
                                          method="POST">
                                        <input id="codigo_contrato" type="hidden" name="codigo_contrato"
                                               value=<? echo $_GET['id']; ?>>
                                        <button type="submit" class="btn btn-danger" id="botonRegresarUsuario"><i
                                                    class="fa fa-arrow-left"></i> Regresar a Usuario
                                        </button>
                                        <a href="#modalAgregarServicios"
                                           class="btn btn-primary waves-effect waves-light"
                                           data-dismiss="modal" data-toggle="modal" id="modalagregarservicio">Agregar
                                            Servicios <i class="fa fa-plus"></i>
                                        </a>
                                    </form>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <label for="fotoContrato">Contrato</label>
                                <!--                                <input type="file" name="fotoContrato" class="dropify" data-height="80"-->
                                <!--                                       data-max-file-size="5M" data-default-file=-->
                                <?// echo $imagen; ?><!--  align="right"/>-->
                                <a href="<? echo $imagen; ?>" data-title="Imagen Contrato" data-lightbox="Imagen 1"><img
                                        src="<? echo $imagen; ?>" alt="contrato" width="25%" height="25%"
                                        style="max-width: 200px;max-height: 150px;"> </a>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#modalCambioImagen">Cambiar Imagen
                                </button>
                            </div>
                        </div>

                        <div class="">
                            <table class="table table-striped" id="tablaPlanes">
                                <thead>
                                <tr>
                                    <th style="display:none;">Id</th>
                                    <th>Plan</th>
                                    <th>Tipo de Plan</th>
                                    <th>Opciones</th>
                                </tr>
                                </thead>
                                <?php getServiciosAfiliadosAContrato($_GET['id']); ?>
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
        <?
    } else {

    }
    ?>

    </div>
    <!-- end container -->

</div>
    <!-- Modal Agregar Servicios a Contrato -->
    <div id="modalAgregarServicios" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Servicios al Contrato</h4>
                </div>
                <div class="modal-body">
                    <label class="header-title">Seleccione el servicio para agregar</label>
                    <form action="assets/scriptsphp/insertar-servicio.php" class="form-horizontal" method="POST">
                        <br>
                        <div class="form-group">
                            <input type="hidden" value="<? echo $_GET['id'] ?>" name="codigo_contrato">
                            <label for="codigo_equipo">Seleccionar equipo</label>
                            <br>
                            <? getEquiposDeAgenteSinServicio($_SESSION['codigo_cliente']); ?>
                        </div>
                        <div class="form-group">
                            <label for="codigo_equipo">Seleccionar Plan</label>
                            <select class="form-control" name="codigo_plan" id="codigo_plan" required>

                            </select>
                        </div>
                        <input type="hidden" name="pagina" value="<? echo basename($_SERVER['REQUEST_URI']); ?>">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Agregar Servicio</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal" data-toggle="modal">Cancelar</a>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal cambio de imagen -->
    <div id="modalCambioImagen" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Contrato</h4>
                </div>
                <div class="modal-body">
                    <form action="assets/scriptsphp/update-imagen-contrato.php" class="form-group"
                          enctype="multipart/form-data" method="POST">
                        <label for="">Cambiar Imagen del Contrato</label>
                        <input type="hidden" name="pagina" value="<? echo $_SERVER['PHP_SELF'];?>">
                        <input type="hidden" value="<? echo $_GET['id'] ?>" name="numero_contrato">
                        <br>
                        <div class="col-md-10">
                            <input type="file" name="subeImagen" class="dropify" data-height="100"
                                   data-default-file="<?php echo $imagen; ?>" data-max-file-size="5M"/>
                            <br>
                            <button type="submit" class="btn btn-default btn-primary">Actualizar Imagen</button>
                        </div>

                    </form>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
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

    <!-- file uploads js -->
    <script src="assets/plugins/fileuploads/js/dropify.min.js"></script>

    <!-- Lightbox para las imagenes mostrar la imagen en grande -->
    <script src="assets/js/lightbox.js"></script>

    <script>
//        $('#tablaPlanes').DataTable();
    </script>

    <script type="text/javascript">
        function cambioSelectEquipo() {
            var valor = $('#codigo_equipo').val();
            console.log("Cambio select: " + valor);
            $('#codigo_plan').empty();
            console.log("Codigo Plan Vacio");
            $.post("assets/scriptsphp/cargar-planes-por-equipo.php", {codigo_equipo: valor})
                .done(function (data) {
                    $('#codigo_plan').html(data);
                });
        }

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
                    url: "assets/scriptsphp/borrar-planes.php",
                    data: {
                        "codigo_plan": values[0],
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

            document.location.href = ("editar-servicio-contrato.php?id=" + values[0]);
        });
        $(document).ready(function () {
            var idContrato = $('#codigo_contrato').val();
            $('#botonRegresarUsuario').click(function () {
                console.log(idContrato);
                $.ajax({
                    dataType: "json",
                    url: "assets/scriptsphp/redireccion-usuario.php",
                    data: {
                        "codigo_contrato": idContrato
                    },
                    cache: false,
                    type: "POST",
                    success: function (respose) {
                        console.log("Success");
                    },
                    error: function (xhr) {
                        console.log("error");
                    }
                });
            });
        });

    </script>
</body>
</html>
<?}
