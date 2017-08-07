<?php
/**
 * Created by PhpStorm.
 * User: AdderlyS
 * Date: 26/05/2017
 * Time: 2:38 PM
 */
session_start();
require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
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

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

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
            <div class="col-lg-12">
                <h4 class="page-title">Equipos por bodegas</h4>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table" id="tablaMT">
                        <thead>
                        <tr>
                            <th>Bodega</th>
                            <th>Tipo de equipo</th>
                            <th>Serie</th>
                            <th>MAC</th>
                            <th>Observaciones</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <? getEquiposBodega($_GET['codigo_bodega']); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- end col -->

        <!-- Modal transferir equipo -->
        <div id="modalTransferir" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cambiar estado</h4>
                    </div>
                    <br>
                    <br>
                    <form action="assets/scriptsphp/transferir-equipo.php" method="post" role="form">
                        <div class="form-group">
                            <input type="hidden" id="codigo_equipo" name="codigo_equipo">
                            <input type="hidden" id="bodega_actual" name="bodega_actual">
                            <input type="hidden" id="pagina" name="pagina" value="<? echo $_SERVER['REQUEST_URI']; ?>">
                            <label for="Bodega Actual">Bodega actual</label>
                            <input class="form-control" id="nombre_bodega" name="nombre_bodega" disabled required>
                            <br>
                            <br>
                            <label for="Bodega Nueva">Bodega nueva</label>
                            <?php selectBodegas();?>
                            <br>
                            <br>
                            <label for="Estado">Comentario</label>
                            <input class="form-control" id="detalle" name="detalle" required>
                            <br>
                            <br>
                            <label for="Nota">Nota: Al transferir el equipo este estará asignado a la bodega seleccionada.</label>
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
    </div>
</div>
</div>

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

<!-- Form wizard -->
<script src="assets/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

<script type="text/javascript">
    $('.trasnBtn').click(function () {
        var id_equipo = $(this).parents('tr:first').find('td:first').text();
        var id_bodega = $(this).parents('tr:first').find('td').eq(1).html();
        var nombre_bodega = $(this).parents('tr:first').find('td').eq(2).html();
        console.log(id_equipo);
        $('#codigo_equipo').val(id_equipo);
        $('#bodega_actual').val(id_bodega);
        $('#nombre_bodega').val(nombre_bodega);
        $('#modalTransferir').modal("show");
    });
</script>

<script>
    $('#tablaMT').DataTable({
        "info": false,
        "order": [[1, "desc"]],
        responsive: true
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#basicwizard').bootstrapWizard({'tabClass': 'nav nav-tabs navtab-wizard nav-justified bg-muted'});

        $('#progressbarwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('#progressbarwizard').find('.bar').css({width:$percent+'%'});
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
                url: "assets/scriptsphp/borrar-equipos.php",
                data: {
                    "codigo_equipo": values[0],
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

        document.location.href = ("agregar-equipos.php?id="+values[0]);
    });
</script>
</body>
</html>
