<?php
session_start();
require "assets/scriptsphp/db.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

if (!isset($_GET['id'])) {
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
                    <h4 class="page-title">Registrar Plan Nuevo</h4>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">

                        <h4 class="header-title m-t-0 m-b-30">Ingresar información acerca de los Planes</h4>
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                              action="assets/scriptsphp/agregarPlan.php">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tipo de Plan</label>
                                        <div class="col-md-2">
                                            <? getTipoPLANSelected(); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Nombre del Plan</label>
                                        <div class="col-md-3">
                                            <input type="hidden" name="pagina" value="<?echo $_SERVER['PHP_SELF'];?>">
                                            <input type="text" name="nombre" class="form-control"
                                                   placeholder="Nombre del plan">
                                        </div>
                                        <label class="col-md-1 control-label">Ancho de Banda</label>
                                        <div class="col-md-2">
                                            <input type="number" name="ancho_de_banda" class="form-control" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" for="example-email">Valor Inicial</label>
                                        <div class="col-md-3">
                                            <input type="number" step="0.01" value="0" name="valor_inicial"
                                                   class="form-control">
                                        </div>
                                        <label class="col-md-2 control-label" for="example-email">Minutos
                                            Incluidos</label>
                                        <div class="col-md-4">
                                            <input type="number" name="minutos_incluidos" class="form-control"
                                                   placeholder="Minutos incluidos en el plan">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Descripción del Plan</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" rows="3" name="descripcion"
                                                      placeholder="Rellenar descripción del plan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Registrar
                                        </button>
                                        <a href="editar-planes.php" type="reset"
                                           class="btn btn-default waves-effect waves-light m-l-5">
                                            Cancelar
                                        </a>
                                    </div>
                                </div><!-- end col -->
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

<? } else {
    $conn = conectar();
    $id = $_GET['id'];
    $query = "SELECT * FROM planes WHERE codigo_plan='" . $id . "'";
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
                <h4 class="page-title">Editar plan</h4>
            </div>
        </div>


        <div class="row">
        <div class="col-sm-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Ingresar información acerca de los Planes</h4>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                  action="assets/scriptsphp/update-plan.php">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" name="id" value=<? echo $row['codigo_plan'] ?>>
                            <label class="col-md-2 control-label">Tipo de Plan</label>
                            <div class="col-md-2">
                                <? getTipoPLANSelected($row['codigo_tipo']); ?>
                            </div>
                            <label class="col-md-1 control-label">Nombre del Plan</label>
                            <div class="col-md-3">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del plan"
                                       value=<? echo $row['nombre']; ?>>
                            </div>
                            <label class="col-md-1 control-label">Ancho de Banda</label>
                            <div class="col-md-2">
                                <input type="number" name="ancho_de_banda" class="form-control"
                                       value=<? echo $row['ancho_de_banda']; ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="example-email">Valor Inicial</label>
                            <div class="col-md-3">
                                <input type="number" step="0.01"
                                       value=<? echo $row['valor_inicial']; ?> name="valor_inicial"
                                       class="form-control">
                            </div>
                            <label class="col-md-2 control-label" for="example-email">Minutos Incluidos</label>
                            <div class="col-md-4">
                                <input type="number" name="minutos_incluidos" class="form-control"
                                       value=<? echo $row['minutos_incluidos']; ?> placeholder="Minutos incluidos en el
                                       plan">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Descripción del Plan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="3" name="descripcion"
                                          placeholder="Rellenar descripción del plan"><? echo $row['descripcion']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Actualizar
                            </button>
                            <a href="editar-planes.php" type="reset"
                               class="btn btn-default waves-effect waves-light m-l-5">
                                Cancelar
                            </a>
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



