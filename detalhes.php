<?php

	session_start();
	include "conexao.php";

	$detalhes = $_GET['id'];
	$codigoCat = $_GET['idcat'];

    $consultaCat = $cn->query("SELECT * FROM tbl_categoria");
	$consultaCate = $cn->query("SELECT * FROM tbl_categoria WHERE id_categoria = '$codigoCat'");
	$exibeCate = $consultaCate->fetch(PDO::FETCH_ASSOC);
	$consultaProduto = $cn->query("SELECT id_produto, nome_produto, imagen_produto, imagen_dois, imagen_tres, descricao, vl_produto FROM tbl_produto WHERE id_produto ='$detalhes'");
	$exibeDetalhes = $consultaProduto->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Detalhes</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="no-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" style="border-bottom:none; max-height:120px;">
					<div class="container" style="border-bottom:none; max-height:100px;">

						<?php if(empty($_SESSION['ID'])) { ?>
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-sitemap"><span>Categorias</span></a>
										<ul>
											<?php while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecat['id_categoria'];?>"><?php echo $exibecat['nome_categoria'];?></a></li>
											<?php } ?>
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="left-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-retweet" href="right-sidebar.php"><span>Sobre nós</span></a></li>
									<li><a class="icon solid fa-cog" href="no-sidebar.php"><span>Entrar</span></a></li>
								</ul>
							</nav>
						<?php } else{ ?>
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-sitemap"><span>Categorias</span></a>
										<ul>
											<?php while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecat['id_categoria'];?>"><?php echo $exibecat['nome_categoria'];?></a></li>
											<?php } ?>
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="left-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-retweet" href="right-sidebar.php"><span>Sobre nós</span></a></li>
									<li><a class="icon solid fa-cog" href="adm-panel.php"><span>Administrador</span></a></li>
									<li><a class="icon solid fa-cog" href="sair.php"><span>sair</span></a></li>
								</ul>
							</nav>
						<?php } ?>

					</div>
				</section>


                <section id="main">
					<div class="container">
						<div class="row">

							<!-- Content -->
								<div id="content" class="col-6 col-12-medium">
									<header class="carousel"style="max-width:400px;">
                                        <span class="image featured"><img src="assets/css/images/<?php echo $exibeDetalhes['imagen_produto'];?>" alt="" /></span>
										<span class="image featured"><img src="assets/css/images/<?php echo $exibeDetalhes['imagen_dois'];?>" alt="" /></span>
										<span class="image featured"><img src="assets/css/images/<?php echo $exibeDetalhes['imagen_tres'];?>" alt="" /></span>
									</header>

                                </div>

                                <div class="col-6 col-12-medium">
									<!-- Post -->
										<article class="box post">
                                            <h2><?php echo $exibeDetalhes['nome_produto'];?></h2>
											<h3>categoria: <?php echo $exibeCate['nome_categoria'];?></h3>
                                            <p><?php echo $exibeDetalhes['descricao'];?></p>
										    <h4>R$ <?php echo number_format($exibeDetalhes['vl_produto'],2,',','.');?></h4>
											
											<div class="botoes">
												<div class="bot">
													<div class="w100">
													<a href="https://api.whatsapp.com/send?phone=5569984743856&text=<?php echo $exibeDetalhes['nome_produto'], ' R$'. $exibeDetalhes['vl_produto'];?>" target="_blank" class="buttonw botoesdetalhes" style="width:350px;"><i class="fab fa-whatsapp"></i> Entre em contato</a>
													</div>
													<div class="w100">
													<a href="index.php" class="button buttonDetalhes " style="width:350px;"><i class="fab fa-return"></i> Voltar</a>
													</div>
												</div>
											</div>
										</article>

								</div>

                </section>
									



<?php 

include 'footer.php';

?>
