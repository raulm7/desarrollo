<?php
session_start();

require "assets/scriptsphp/db.php";

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $codigo_cliente = $_POST['codigo_cliente'];

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
                    <h4 class="page-title">Estado de Cuenta <? echo getNombreApellidoCliente($codigo_cliente); ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="panel-body">
                            <div class="row">
                                <a href="index.php" class="btn btn-danger"><i
                                            class="fa fa-arrow-left"></i> Inicio
                                </a>
                            </div>
                            <br>
                            <div class="">
                                <table class="table table-striped" id="tablaUsuarios">
                                    <thead>
                                    <tr>
                                        <th># Transaccion</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Descipcion</th>
                                        <th>Servicio</th>
                                        <th>Credito</th>
                                        <th>Debito</th>
                                        <th>Referencia</th>
                                        <th>Observaciones</th>
                                    </tr>
                                    </thead>
                                    <?php getTransacciones($codigo_cliente);?>
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

    <script type="text/javascript">
        $('#tablaUsuarios').DataTable();

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

                var data={
                    codigo_cliente:values[0]
                };

                $.post("assets/scriptsphp/borrar-usuario.php",data);

                setTimeout(function(){
                    window.location.reload(true);
                }, 200);

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

            document.location.href = ("agregar-usuarios.php?id="+values[0]);
        });
    </script>
    </body>
    </html>
<?}else{?>

<?}?>









