<?php
session_start();

require_once "assets/scriptsphp/db.php";
require_once "lib/nusoap.php";
//require_once "ws/clientes.php";

//$cliente = new nusoap_client(getServiciosTimsys($_SESSION['usuario'],$_SERVER['REMOTE_ADDR']));
$cliente = new nusoap_client("http://portal.optelgt.com/ws/clientes.php");


$servicios = $cliente->call("getServiciosTimsys",array("usuario"=>$_SESSION['usuario'],"id"=>$_SERVER['REMOTE_ADDR']));
console_log($servicios);

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
                        <h3 class="page-title" style="text-align: center;">Llene la información que se le solicita a continuación:</h3>
                    </div>
                </div>


                <div class="row" style="width: 1200px; margin: 0 auto;">
                    <div class="col-md-12">
                        <div class="card-box">
                                <div class="panel-body">
                                    <form action="assets/scriptsphp/crear-ticket-soporte.php" role="form" class="form" method="POST">
                                        <div class="row">
                                            <input type="hidden" name="usuario" value="<? echo $_SESSION['usuario'];?>">
                                            <input type="hidden" name="ip" id="ip" value="<? echo $_SERVER['REMOTE_ADDR'];?>">
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-2">
                                                    <label for="codigo_servicio"><h4>Servicio que presenta la falla:</h4></label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <select name="codigo_servicio" class="form-control" id="select_codigo_servicio" onchange="cambioSelectServicios();">
                                                        <option value="0">Seleccione su servicio</option>
                                                        <?
                                                        foreach ($servicios as $servicio){
                                                            echo "<option value='".$servicio['codigoflujo']."'> ".utf8_encode($servicio['opcion'])."</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-2">
                                                    <label for=""><h4>Falla que presenta:</h4></label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <select name="tipo_de_falla" class="form-control" id="tipo_de_falla">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-lg-offset-3 col-lg-2">
                                                    <label for="descripcion"><h4>Descripción de la falla: </h4></label>
                                                </div>
                                                <div class="col-lg-3">
                                                    <textarea name="descripcion" class="form-control" id="descripcion"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" >
                                            <div class="form-group">
                                                <div class="col-lg-offset-5 col-lg-2">
                                                    <br>
                                                    <button class="btn btn-lg btn-info" > Reportar Falla</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

        <script>
			$('#tablaEquipos').DataTable();
		</script>

        <script type="text/javascript">
            function cambioSelectServicios() {
                var opcion = $('#select_codigo_servicio').val();
                $.post("assets/scriptsphp/get-fallas-servicio.php",{servicio:opcion})
                    .done(function (data) {
                        $('#tipo_de_falla').empty();
                        $('#tipo_de_falla').html(data);
                    });
            }
        </script>
    </body>
</html>
