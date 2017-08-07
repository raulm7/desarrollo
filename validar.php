<?php
/**
 * Created by PhpStorm.
 * User: Miguel Leon
 * Date: 02/06/2017
 * Time: 12:40 PM
 */
session_start();
require_once "assets/scriptsphp/db.php";

if (isset($_GET['token'])){
    $token = $_GET['token'];

    $conn = conectar();
    $sql = "SELECT * FROM reset_password WHERE token='".$token."'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1){
        $row= $result->fetch_assoc();
        echo "Se encontró un resultado -> " . "Token: " . $row['token']." Expira: " . $row['valido'] . PHP_EOL;

        if (time() <= strtotime($row['valido'])){
            header("Location:recuperar-password.php");
            echo PHP_EOL;
            echo "Aun no ha expirado";
        }else{
            echo "Ya expiró";
        }
    }else{

    }

}