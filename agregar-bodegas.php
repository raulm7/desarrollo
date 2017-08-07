<?php
session_start();

require "assets/scriptsphp/db.php";

if (($_SESSION['login'] == 0) || (empty($_SESSION['usuario'])) || (empty($_SESSION['contra']))) {
    $_SESSION['login'] = 0;
    header("location:login.php");
}

if(!isset($_GET['id'])){ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <title>Adminto - Responsive Admin Dashboard Template</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- form Uploads -->
    <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

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
                <h4 class="page-title">REGISTRAR NUEVO EQUIPO</h4>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    <div class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>

                    <h4 class="header-title m-t-0 m-b-30">Ingrese información acerca del equipo</h4>
                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="assets/scriptsphp/insertar-bodega.php">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Nombre</label>
                                    <div class="col-md-3">
                                        <input type="hidden" name="pagina" value="<?echo $_SERVER['PHP_SELF'];?>">
                                        <input class="form-control" type="text" name="nombre" placeholder="NOMBRE DE LA BODEGA">
                                    </div>
                                    <label class="col-md-1 control-label" for="example-email">Tipo de Bodega</label>
                                    <div class="col-md-3">
                                        <? getSelectTipo("BDG"); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="direccion">Dirección</label>
                                    <div class="col-md-7">
                                        <textarea class="form-control" rows="2" name="direccion" id="direccion"></textarea>
                                    </div>
                                </div>
                                <div class="form-group text-right m-b-0">
                                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                                        Registrar
                                    </button>
                                    <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                        Cancelar
                                    </button>
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



<!-- Right Sidebar -->
<div class="side-bar right-bar">
    <a href="javascript:void(0);" class="right-bar-toggle">
        <i class="zmdi zmdi-close-circle-o"></i>
    </a>
    <h4 class="">Notifications</h4>
    <div class="notification-list nicescroll">
        <ul class="list-group list-no-border user-list">
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="assets/images/users/avatar-2.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">Michael Zenaty</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-info">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Signup</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">5 hours ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item">
                <a href="#" class="user-list-item">
                    <div class="icon bg-pink">
                        <i class="zmdi zmdi-comment"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">New Message received</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="avatar">
                        <img src="assets/images/users/avatar-3.jpg" alt="">
                    </div>
                    <div class="user-desc">
                        <span class="name">James Anderson</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">2 days ago</span>
                    </div>
                </a>
            </li>
            <li class="list-group-item active">
                <a href="#" class="user-list-item">
                    <div class="icon bg-warning">
                        <i class="zmdi zmdi-settings"></i>
                    </div>
                    <div class="user-desc">
                        <span class="name">Settings</span>
                        <span class="desc">There are new settings available</span>
                        <span class="time">1 day ago</span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- /Right-bar -->

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

<?php }else{

    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM bodegas WHERE codigo_bodega='".$id."'";

    if($result = $conn->query($sql)){
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

            <title>Adminto - Responsive Admin Dashboard Template</title>

            <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
            <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

            <!-- form Uploads -->
            <link href="assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

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
                        <h4 class="page-title">REGISTRAR NUEVO EQUIPO</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                    <i class="zmdi zmdi-more-vert"></i>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>

                            <h4 class="header-title m-t-0 m-b-30">Ingrese información acerca del equipo</h4>
                            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="assets/scriptsphp/update-bodega.php">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value=<? echo $id; ?>/>
                                            <label class="col-md-2 control-label">Nombre</label>
                                            <div class="col-md-3">
                                                <input class="form-control" type="text" name="nombre" placeholder="NOMBRE DE LA BODEGA" value=<? echo $row['nombre']; ?>>
                                            </div>
                                            <label class="col-md-1 control-label" for="example-email">Tipo de Bodega</label>
                                            <div class="col-md-3">
                                                <? getTipoBDGSelected($row['codigo_tipo']); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="direccion">Dirección</label>
                                            <div class="col-md-7">
                                                <textarea class="form-control" rows="2" name="direccion" id="direccion"><? echo $row['direccion']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Registrar
                                            </button>
                                            <a href="/editar-bodegas-wizard.php" type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancelar
                                            </a>
                                        </div>

                                    </div><!-- end col -->


                                </div><!-- end col -->

                        </div><!-- end row -->
                        </form>
<? }else{
   header("location:agregar-bodegas.php");
}?>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- end container -->



        <!-- Right Sidebar -->
        <div class="side-bar right-bar">
            <a href="javascript:void(0);" class="right-bar-toggle">
                <i class="zmdi zmdi-close-circle-o"></i>
            </a>
            <h4 class="">Notifications</h4>
            <div class="notification-list nicescroll">
                <ul class="list-group list-no-border user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="assets/images/users/avatar-2.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">Michael Zenaty</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-info">
                                <i class="zmdi zmdi-account"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Signup</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">5 hours ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-pink">
                                <i class="zmdi zmdi-comment"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">New Message received</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="avatar">
                                <img src="assets/images/users/avatar-3.jpg" alt="">
                            </div>
                            <div class="user-desc">
                                <span class="name">James Anderson</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">2 days ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="#" class="user-list-item">
                            <div class="icon bg-warning">
                                <i class="zmdi zmdi-settings"></i>
                            </div>
                            <div class="user-desc">
                                <span class="name">Settings</span>
                                <span class="desc">There are new settings available</span>
                                <span class="time">1 day ago</span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /Right-bar -->

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
<? } ?>

