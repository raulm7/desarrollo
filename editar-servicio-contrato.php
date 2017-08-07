<?php
require "assets/scriptsphp/db.php";

session_start();
if (!isset($_GET['id'])) {
    header("location:")

    ?>

<? } else {
    $conn = conectar();
    $id = $_GET['id'];
    $query = "SELECT * FROM servicios WHERE codigo_servicio='" . $id . "'";
    if ($result = $conn->query($query)) {
        $row = $result->fetch_assoc();

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
                <h4 class="page-title">Editar servicio de contrato</h4>
            </div>
        </div>


        <div class="row">
        <div class="col-sm-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Edtiar información asociada al servicio</h4>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                  action="assets/scriptsphp/update-plan-servicio.php">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="codigo_servicio" value="<? echo $row['codigo_servicio']; ?>">
                            <input type="hidden" name="pagina" value="<?echo $_SERVER['HTTP_REFERER'];?>">
                            <label class="col-md-2 control-label">Asociado a Contrato</label>
                            <div class="col-md-2">
                                <input type="text" name="codigo_contrato" class="form-control" readonly
                                       value="<? echo $row['numero_contrato']; ?>" >
                            </div>
                            <label class="col-md-2 control-label">Plan del Servicio</label>
                            <div class="col-md-3">
<!--                                --><?// echo getTipoPLANSelected($row['codigo_plan']); ?>
                                <? getPlanSelectedServicios($row['codigo_plan']);?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Equipo Asignado</label>
                            <div class="col-md-2">
                                <input type="text" name="usuario" class="form-control"
                                       value="<? echo $row['usuario']; ?>" readonly>
                            </div>
<!--                            <label class="col-md-1 control-label" for="example-email">Contraseña</label>-->
<!--                            <div class="col-md-3">-->
<!--                                <input type="password" name="codigo_contrato" class="form-control"-->
<!--                                       value="--><?// echo $row['password']; ?><!--" >-->
<!--                            </div>-->
                        </div>
<!--                        <div class="form-group">-->
<!--                            <label class="col-md-2 control-label">Descripción del Plan</label>-->
<!--                            <div class="col-md-9">-->
<!--                                <textarea class="form-control" rows="3" name="descripcion"-->
<!--                                          placeholder="Rellenar descripción del plan">--><?// echo $row['descripcion']; ?><!--</textarea>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Actualizar
                            </button>
                            <button onclick="window.history.go(-1); return false;" type="button"
                               class="btn btn-default waves-effect waves-light m-l-5">
                                Cancelar
                            </button>
                        </div>
                    </div><!-- end col -->
                </div><!-- end col -->
        </div><!-- end row -->
        </form>
        <?php
    } else {
        header("location:agregar-planes.php");
    }
    ?>


    </div>
    </div><!-- end col -->
    </div>
    <!-- end row -->

</div>
    <!-- end container -->


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
    </script>

</body>
    </html>

<? } ?>



