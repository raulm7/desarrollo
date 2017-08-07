<?php

if (!isset($_GET['token'])) {
    header("HTTP/1.1 404 Not Found");
}elseif (!empty($_GET['token'])){

session_start();
require_once "assets/scriptsphp/db.php";

    $token = $_GET['token'];

    $conn = conectar();
    $sql = "SELECT * FROM reset_password WHERE token='".$token."'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1){
        $row= $result->fetch_assoc();

        if (time() <= strtotime($row['valido'])){

        }else{
            header("HTTP/1.1 403 Expired Token");
            die();
        }
    }else{
        header("HTTP/1.1 404 Not Found");
        die();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Optel - Internet Residencial</title>

        <!-- App CSS -->
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

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>Admin<span>to</span></span></a>
                <h5 class="text-muted m-t-0 font-600"></h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Cambiar Contraseña</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal m-t-20" id="formCambioPass" action="assets/scriptsphp/actualizar-password-reset.php" method="POST">

						<div class="form-group ">
							<div class="col-xs-12">
                                <input type="hidden" name="token" value="<?echo $token;?>">
                                <input type="hidden" name="codigo_cliente" value="<? echo $row['codigo_cliente'];?>">
								<input class="form-control" type="password" name="pass_nuevo" id="pass_nuevo" required placeholder="Contraseña nueva">
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" name="pass_nuevo_confirmar" id="pass_nuevo_confirmar" required placeholder="Confirmar contraseña">
							</div>
						</div>

						<div class="form-group text-center m-t-40">
							<div class="col-xs-12">
								<button id="boton_submit_pass" onclick="validarPassIguales();" class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="button">
									Cambiar Contraseña
								</button>
							</div>
						</div>

					</form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">Already have account?<a href="page-login.php" class="text-primary m-l-5"><b>Sign In</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->

        <script type="text/javascript">
            function validarPassIguales() {
                var nuevo = $('#pass_nuevo').val();
                var verificar = $('#pass_nuevo_confirmar').val();
                if (nuevo===verificar){
                    console.log("Iguales");
                    $('#formCambioPass').submit();
                }else{
                    console.log("Diferentes");
                }
            }
        </script>
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

	</body>
</html>

<?}else{
    header("HTTP/1.1 404");
}?>