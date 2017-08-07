<?php
    require_once "lib/nusoap.php";
    $cliente = new nusoap_client("http://mediador/operaciones.php");
    $cliente->setCredentials("mediador","a82d75e24d886def9ac5d43");
    $error = $cliente->getError();
    if ($error) {
        echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
    }

    //RECARGA
    //$result = $cliente->call("recarga", array("servicio" => "D4:CA:6D:06:47:BB", "valor" => "60", "usuario" => "usuario", "ip" => $_SERVER['REMOTE_ADDR']));
//    $result = $cliente->call("recarga_internet", array("servicio" => "D4:CA:6D:06:47:BB", "plan" => "8", "usuario" => "rmelgar", "ip" => $_SERVER['REMOTE_ADDR'], "observaciones" => "Deposito BI No.12345"));

    //RESET
    //$result = $cliente->call("resetea", array("servicio" => "D4:CA:6D:06:47:BB"));

    //ELIMINA
    //$result = $cliente->call("elimina", array("servicio" => "D4:CA:6D:B3:EB:EF","usuario" => $_SESSION['usuario'],"ip" => $_SERVER['REMOTE_ADDR']));

    //CREA
    //$result = $cliente->call("crea", array("servicio" => "D4:CA:6D:06:47:BB","contrasena" => "intertelco","plan" => "8", "usuario" => "usuario", "ip" => $_SERVER['REMOTE_ADDR']));

////    CONSULTA
    $result = $cliente->call("consulta", array("servicio" => "D4:CA:6D:B3:E8:3D","usuario" => "agente1", "ip" => $_SERVER['REMOTE_ADDR']));

    //MODIFICA
    //$result = $cliente->call("modifica", array("servicio" => "d4:ca:6d:f7:76:41","contrasena" => "intertelco","plan" => "1", "usuario" => "usuario", "ip" => $_SERVER['REMOTE_ADDR']));

    //TRANSFIERE
    //$result = $cliente->call("transfiere", array("origen" => "85","destino" => "82","valor" => "10", "usuario" => "usuario", "ip" => $_SERVER['REMOTE_ADDR'], "observaciones" => "Deposito Banrural No.2345"));

   if ($cliente->fault) {
        echo "<h2>Fault</h2><pre>";
        print_r($result);
        echo "</pre>";
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "<h2>Error</h2><pre>" . $error . "</pre>";
        }
        else {
            echo $result;
        }
    }
?>
