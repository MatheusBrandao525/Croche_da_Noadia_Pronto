<?php 

    include 'conexao.php';
    include 'resize-class.php';

    $id_produto = $_GET['id_produto'];



    $consultaImg = $cn->query("SELECT imagen_produto, imagen_dois, imagen_tres FROM tbl_produto where id_produto = '$id_produto'");
    $exibeAl = $consultaImg->fetch(PDO::FETCH_ASSOC);

    $nomeProd = $_POST['txtnomeproduto'];
    $categoriaProd = $_POST['selectcat'];
    $descricao = $_POST['txtdescricao'];
    $quantidadeProd = $_POST['txtqnt'];
    $precoProd = $_POST['txtvalor'];

    $imagemUm = $_FILES['txtimagem'];
    $imagemDois = $_FILES['txtimagemdois'];
    $imagemTres = $_FILES['txtimagemtres'];

    $destinoImg = "assets/css/images/";

    if (!empty($imagemUm['name'])) {
        preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemUm['name'],$extencao1);
        $imagemNome = md5(uniqid(time())).$extencao1['0'];

        $upload_img = 1;
    }else{
        $imagemNome = $exibeAl['imagen_produto'];
        $upload_img = 0;
    }

    if (!empty($imagemDois['name'])) {
        preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemDois['name'],$extencao2);
        $imagemNome2 = md5(uniqid(time())).".".$extencao2['1'];

        $upload_img2 = 1;
    }else{
        $imagemNome2 = $exibeAl['imagen_dois'];
        $upload_img2 = 0;
    }

    if (!empty($imagemTres['name'])) {
        preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemTres['name'],$extencao3);
        $imagemNome3 = md5(uniqid(time())).".".$extencao3['1'];

        $upload_img3 = 1;
    }else{
        $imagemNome3 = $exibeAl['imagen_tres'];
        $upload_img3 = 0;
    }

    $removePonto = ".";
    $precoProd = str_replace($removePonto, '', $precoProd);
    $removeVirgula = ",";
    $precoProd = str_replace($removeVirgula, '.', $precoProd);

    try{
     
        $alterarProduto= $cn->query("UPDATE tbl_produto set 
        nome_produto = '$nomeProd', 
        descricao = '$descricao', 
        id_categoria = '$categoriaProd', 
        imagen_produto = '$imagemNome', 
        imagen_dois = '$imagemNome2', 
        imagen_tres = '$imagemNome3', 
        qnt_estoque = '$quantidadeProd', 
        vl_produto = '$precoProd' 
        where id_produto = '$id_produto'");

        if($upload_img==1) {
            move_uploaded_file($imagemUm['tmp_name'], $destinoImg.$imagemNome);
        }

        if($upload_img2==1) {
            move_uploaded_file($imagemDois['tmp_name'], $destinoImg.$imagemNome2); 
        }

        if($upload_img3==1) {
            move_uploaded_file($imagemTres['tmp_name'], $destinoImg.$imagemNome3);
        }

        header('location:adm-panel.php');


    }catch (PDOExenption $e){
        header('location:erro.php');
    }





?>