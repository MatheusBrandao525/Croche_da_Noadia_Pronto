<?php

session_start();
include "conexao.php";

$Vnome = $_POST["txtnome"];
$Vemail = $_POST["txtemail"];
$Vsenha = $_POST["txtsenha"];

$consulta = $cn->query("select id_usuario, nome_usuario, ds_email, ds_status, ds_senha from tbl_usuario where ds_email = '$Vemail' and ds_senha = '$Vsenha' and nome_usuario = '$Vnome'");

if($consulta->rowCount() == 1) {
    $exibeUsuario = $consulta->fetch(PDO::FETCH_ASSOC);
    $_SESSION["ID"] = $exibeUsuario["id_usuario"];
    header('location:index.php');

}else {
    header('location:erro.php');
}


?>