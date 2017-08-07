<?php
session_start();
require_once "assets/scriptsphp/db.php";


if (isset($_GET['id'])){
    $conn = conectar();
    $id = $_GET['id'];
    $query = "SELECT * FROM promociones WHERE codigo_promocion='" . $id . "'";
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
                <h4 class="page-title">Editar promoción</h4>
            </div>
        </div>


        <div class="row">
        <div class="col-sm-12">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">Edite la información acerca de la promoción</h4>
            <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post"
                  action="assets/scriptsphp/update-promocion.php">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="hidden" value="<? echo $id;?>" name="codigo_promocion">
                            <label class="col-md-2 control-label" for="fecha_inicio">Fecha Inicio</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<? echo substr($row['fecha_inicio'], 0, 10);?>">
                            </div>
                            <label class="col-md-2 control-label" for="fecha_final">Fecha Final</label>
                            <div class="col-md-3">
                                <input type="date" class="form-control" name="fecha_final" id="fecha_final" value="<? echo substr($row['fecha_fin'], 0, 10);?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="valor_promocion">Valor Promocional (%)</label>
                            <div class="col-md-3">
                                <input type="number" name="valor_promocion" id="valor_promocion" class="form-control serie" value="<? echo $row['valor_promocion'];?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="descripcion">Descripción de la promoción</label>
                            <div class="col-md-8">
                            <textarea name="descripcion" rows="3" class="form-control" id="descripcion"><? echo $row['descripcion']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Registrar
                            </button>
                            <button onclick="window.history.go(-1); return false;" type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                Cancelar
                            </button>
                        </div>

                    </div><!-- end col -->


                </div><!-- end col -->

        </div><!-- end row -->
        </form>
        <?php
    }else{
        header("Location:agregar-bodegas.php");
    }?>
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

<?}else{?>
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
                    <h4 class="page-title">Promociones</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="m-b-30">
                                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal">Agregar <i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <table class="table table-striped" id="tablaBodegas">
                                    <thead>
                                    <tr>
                                        <th style="display:none;">Id</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Final</th>
                                        <th>Valor Promoción</th>
                                        <th>Descripción</th>
                                        <th>Opciones</th>
                                    </tr>
                                    </thead>
                                    <?php tablaPromociones();?>
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
        </div>
        <!-- end container -->

    </div>

    <!-- Modal agregar tipo equipo -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar nueva promoción</h4>
                </div>
                <br>
                <form action="assets/scriptsphp/insertar-promociones.php" method="post" role="form">
                    <div class="form-group">
                        <input type="hidden" id="pagina" name="pagina" value="<? echo $_SERVER['PHP_SELF'];?>">
                        <label class="control-label" for="fecha_inicio">Fecha Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="<? echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="fecha_final">Fecha Final</label>
                        <input type="date" name="fecha_final" id="fecha_final" class="form-control" value="<?echo date('Y-m-d',strtotime("+5 days"));?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="valor_promocion">Valor Promoción (%)</label>
                        <input type="number" step="1" max="100" min="0" name="valor_promocion" id="valor_promocion" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary waves-effect waves-light" type="submit">
                        Registrar
                    </button>
                </form>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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

    <script>
        $('#tablaBodegas').DataTable();
    </script>

    <script type="text/javascript">
        $('#myModal').on('hidden.bs.modal',function (e) {
            document.getElementById("nombre").value = "";
        });
        $('#myModal').on('shown.bs.modal',function (e) {
            document.getElementById("nombre").focus();
        });

        jQuery('.delBtn').on('click', function () {
            var r = confirm("¿Desea borar este registro?");
            if (r === true) {
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
                    url: "assets/scriptsphp/borrar-promociones.php",
                    data: {
                        "codigo_promocion": values[0]
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

            document.location.href = ("editar-promociones.php?id="+values[0]);
        });
    </script>
    </body>
    </html>
<?}?>


