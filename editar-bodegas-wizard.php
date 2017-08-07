<?php
/**
 * Created by PhpStorm.
 * User: AdderlyS
 * Date: 15/05/2017
 * Time: 8:39 AM
 */
session_start();

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

require "assets/scriptsphp/db.php";
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
    <link rel="stylesheet" href="assets/plugins/magnific-popup/dist/magnific-popup.css" />
    <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css" />

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>


</head>


<body>

<?php include "assets/include/navbar.php";?>

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
                    <div id="progressbarwizard" class="pull-in">
                        <ul>
                            <li><a href="#fisicas-tab-1" data-toggle="tab">Bodegas Físicas</a></li>
                            <li><a href="#virutales-tab-2" data-toggle="tab">Bodegas Virtuales</a></li>
                        </ul>

                        <div class="tab-content b-0 m-b-0">

<!--                            <div id="bar" class="progress progress-striped progress-bar-primary-alt active">-->
<!--                                <div class="bar progress-bar progress-bar-primary"></div>-->
<!--                            </div>-->
                            <div class="tab-pane p-t-10 fade" id="fisicas-tab-1">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="m-b-30">
                                                    <a href="agregar-bodegas.php" class="btn btn-primary waves-effect waves-light">Agregar Bodega Fisica <i class="fa fa-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <table class="table table-striped" id="tablaNúmero">
                                                <thead>
                                                <tr>
                                                    <th style="display:none;">Id</th>
                                                    <th>Tipo de Bodega</th>
                                                    <th>Nombre</th>
                                                    <th>Dirección</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <?php tablaBodegasFisicas();?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-t-10 fade" id="virutales-tab-2">
                                <div class="row">
                                    <div class="form-group clearfix">
                                        <div class="">
                                            <table class="table table-striped" id="tablaCPE">
                                                <thead>
                                                <tr>
                                                    <th style="display:none;">Id</th>
                                                    <th>Tipo de Bodega</th>
                                                    <th>Nombre</th>
                                                    <th>Dirección</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <?php tablaBodegasVirtuales();?>
                                            </table>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

<script>
    $('#tablaBodegas').DataTable();
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

    jQuery('.detBtn').on('click', function () {
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

        document.location.href = ("equipos-por-bodega.php?codigo_bodega="+values[0]);
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
                url: "assets/scriptsphp/borrar-bodegas.php",
                data: {
                    "codigo_bodega": values[0],
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

        document.location.href = ("agregar-bodegas.php?id="+values[0]);
    });
</script>
</body>
</html>
