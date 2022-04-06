<?php 

    session_start();

    include 'conexao.php';
    include 'resize-class.php';

    $nomeProd = $_POST['txtnomeproduto'];
    $categoriaProd = $_POST['selectcat'];
    $descricao = $_POST['txtdescricao'];
    $quantidadeProd = $_POST['txtqnt'];
    $precoProd = $_POST['txtvalor'];

    $imagemUm = $_FILES['txtimagem'];
    $imagemDois = $_FILES['txtimagemdois'];
    $imagemTres = $_FILES['txtimagemtres'];

    $destinoImg = "assets/css/images/";

    preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemUm['name'],$extencao1);
    preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemDois['name'],$extencao2);
    preg_match("/.(jpg|jpeg|png|gif){1}$/i",$imagemTres['name'],$extencao3);


    $imagemNome = md5(uniqid(time())).$extencao1['0'];
    $imagemNome2 = md5(uniqid(time())).".".$extencao2['1'];
    $imagemNome3 = md5(uniqid(time())).".".$extencao3['1'];



    $removePonto = ".";
    $precoProd = str_replace($removePonto, '', $precoProd);
    $removeVirgula = ",";
    $precoProd = str_replace($removeVirgula, '.', $precoProd);

    try{
     
        $inserirProd= $cn->query("INSERT INTO tbl_produto(nome_produto, descricao, id_categoria, imagen_produto, imagen_dois, imagen_tres, qnt_estoque, vl_produto) VALUES 
        ('$nomeProd','$descricao','$categoriaProd','$imagemNome','$imagemNome2','$imagemNome3','$quantidadeProd','$precoProd')");
    
        

        move_uploaded_file($imagemUm['tmp_name'], $destinoImg.$imagemNome);
        $resizeObj = new resize($destinoImg.$imagemNome);
        $resizeObj -> resizeImage(750, 1000, 'crop');
        $resizeObj -> saveImage($destinoImg.$imagemNome, 100);

        move_uploaded_file($imagemDois['tmp_name'], $destinoImg.$imagemNome2); 
        $resizeObj = new resize($destinoImg.$imagemNome2);
        $resizeObj -> resizeImage(750, 1000, 'crop');
        $resizeObj -> saveImage($destinoImg.$imagemNome2, 100);

        move_uploaded_file($imagemTres['tmp_name'], $destinoImg.$imagemNome3);            
        $resizeObj = new resize($destinoImg.$imagemNome3);
        $resizeObj -> resizeImage(750, 1000, 'crop');
        $resizeObj -> saveImage($destinoImg.$imagemNome3, 100);

        header("location:adm-panel.php");


    }catch (PDOExenption $e){
        header('location:erro.php');
    }





?>