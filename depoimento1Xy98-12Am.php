<?php 

    session_start();
    include 'conexao.php';

    $nomeUser = $_POST['txtnomedep'];
    $emailUser = $_POST['txtemaildep'];
    $depoimento = $_POST['txtdepoimento'];

    if(empty($nomeUser)|| empty($emailUser) || empty($depoimento)){
        header('location:erro1.php');
    }

    try{
        $inserirDepoimento= $cn->query("INSERT INTO tbl_depoimento(nome_usuario, dsp_email, dsp_depoimento) VALUES 
        ('$nomeUser','$emailUser','$depoimento')");
        header('location:index.php');
    
    }catch (PDOExenption $e){
        header('location:erro.php');
    }




?>