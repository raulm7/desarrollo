<?php
session_start();
require "assets/scriptsphp/db.php";


if(!isset($_GET['id'])){?>


    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Optel - Internet Residencial</title>

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
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <h4 class="page-title">Registre un nuevo equipo</h4>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <h4 class="header-title m-t-0 m-b-30">Ingrese el nombre del nuevo tipo de equipo</h4>

                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="../Horizontal/assets/scriptsphp/agregarTipo.php">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label" for="nombre">Nombre del equipo</label>
                                            <div class="col-md-4">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Tipo de Equipo">
                                            </div>
                                            <label class="col-md-1 control-label">Marca del equipo</label>
                                            <div class="col-md-4">
                                                <input type="text" name="nombre" class="form-control" placeholder="Nombre del Tipo de Equipo">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Fotografía del equipo</label>
                                            <div class="col-md-10">
                                                <input type="file" name="foto" class="dropify" data-height="100" data-max-file-size="10M">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for=""></label>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group text-center m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Registrar
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancelar
                                            </button>
                                        </div>

                                </div><!-- end col -->


                                    </form>
                                </div><!-- end col -->

                            </div><!-- end row -->
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
    $query = "SELECT * from tipos WHERE codigo_tipo='".$id."'";



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

    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo"><img src="assets/images/Logo%20Plano.png" width="25%" height="25%"></a>
                </div>
                <!-- End Logo container-->


                <div class="menu-extras">

                    <ul class="nav navbar-nav navbar-right pull-right">
                        <li>
                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-notifications-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>

                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect waves-light profile " data-toggle="dropdown" aria-expanded="true">
                                <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                <div class="user-status away"><i class="zmdi zmdi-dot-circle"></i></div>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                <li><a href="assets/scriptsphp/logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

            </div>
        </div>

        <div class="navbar-custom">
            <div class="container">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li class="active">
                            <a href="index.php" class="active"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-edit"></i><span>Editar</span> </a>
                            <ul class="submenu">
                                <li><a href="editar-usuarios.php">Usuarios</a></li>
                                <li><a href="editar-tipos.php">Tipos</a></li>
                            </ul>

                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-plus"></i><span>Agregar</span> </a>
                            <ul class="submenu">
                                <li ><a href="agregar-usuarios.php">Usuarios</a></li>
                                <li ><a href="agregar-tipos.php">Tipos</a></li>
                                <li ><a href="agregar-planes.php">Planes</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-invert-colors"></i> <span> User Interface </span> </a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-cards.html">Cards</a></li>
                                        <li><a href="ui-draggable-cards.html">Draggable Cards</a></li>
                                        <li><a href="ui-typography.html">Typography </a></li>
                                        <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                        <li><a href="ui-material-icons.html">Material Design Icons</a></li>
                                        <li><a href="ui-font-awesome-icons.html">Font Awesome</a></li>
                                        <li><a href="ui-themify-icons.html">Themify Icons</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-notification.html">Notification</a></li>
                                        <li><a href="ui-range-slider.html">Range Slider</a></li>
                                        <li><a href="ui-components.html">Components</a>
                                        <li><a href="ui-sweetalert.html">Sweet Alert</a>
                                        <li><a href="ui-treeview.html">Tree view</a>
                                        <li><a href="ui-widgets.html">Widgets</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-collection-text"></i><span> Forms </span> </a>
                            <ul class="submenu">
                                <li><a href="form-elements.html">General Elements</a></li>
                                <li><a href="form-advanced.html">Advanced Form</a></li>
                                <li><a href="form-validation.html">Form Validation</a></li>
                                <li><a href="form-wizard.html">Form Wizard</a></li>
                                <li><a href="form-fileupload.html">Form Uploads</a></li>
                                <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                <li><a href="form-xeditable.html">X-editable</a></li>
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="zmdi zmdi-view-list"></i> <span> Tables </span> </a>
                            <ul class="submenu">
                                <li><a href="tables-basic.html">Basic Tables</a></li>
                                <li><a href="tables-datatable.html">Data Table</a></li>
                                <li><a href="tables-responsive.html">Responsive Table</a></li>
                                <li><a href="tables-editable.html">Editable Table</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- End navigation menu  -->
                </div>
            </div>
        </div>
    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group pull-right m-t-15">
                        <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                    <h4 class="page-title">Registrar Nuevo Tipo</h4>
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

                        <h4 class="header-title m-t-0 m-b-30">Ingresar información acerca de Tipos</h4>

                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="../Horizontal/assets/scriptsphp/agregarTipo.php">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Clase</label>
                                        <div class="col-md-4">
                                            <input type="text" name="nombres" class="form-control" placeholder="Clase del Tipo">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="example-email">Nombre</label>
                                        <div class="col-md-4">
                                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Tipo">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-group text-center m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Registrar
                                        </button>
                                        <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                            Cancelar
                                        </button>
                                    </div>

                            </div><!-- end col -->


                            </form>
                        </div><!-- end col -->

                    </div><!-- end row -->
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
<?}?>

