<?php 

    include 'conexao.php';

    $id_produto = $_GET['id'];

    $pasta = 'assts/css/images/';

    $consultaProd = $cn->query("SELECT * FROM tbl_produto WHERE id_produto = '$id_produto'");
    $exibe = $consultaProd->fetch(PDO::FETCH_ASSOC);

    $excluir = $cn->query("DELETE FROM tbl_produto WHERE id_produto = '$id_produto'");

    $excluirImagem = $exibe['imagen_produto'];
    $excluirImagem2 = $exibe['imagen_dois'];
    $excluirImagem3 = $exibe['imagen_tres'];

    if($excluirImagem!="") {
        unlink($pasta.$excluirImagem);
    }

    if($excluirImagem2!="") {
        unlink($pasta.$excluirImagem2);
    }

    if($excluirImagem3!="") {
        unlink($pasta.$excluirImagem3);
    }

    header('location:alterar-excluir.php');