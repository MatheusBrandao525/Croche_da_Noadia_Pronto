<?php

	session_start();
	include "conexao.php";
	
	$consultaCat = $cn->query("select * from tbl_categoria");
	$consultaProduto = $cn->query("SELECT id_produto, nome_produto, imagen_produto, id_categoria, descricao, vl_produto FROM tbl_produto");


?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Crochê da Noádia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
		<link rel="stylesheet" href="assets/slick-1.8.1/slick-1.8.1/slick/slick.scss">
		<link rel="stylesheet" href="assets/slick-1.8.1/slick-1.8.1/slick/slick-theme.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css">
		
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="headerr" class="borabora2">
					<div class="container fundo">

						<!-- Logo -->
							<div class="blurr">
								<h1 id="logo" style="margin-top:-55px;" class="titulo"><a href="index.php" translate="no">Crochê da noádia</a></h1>
							</div>
							<div class="blur">
								<p class="paragrafo">decore sua casa com o que à de melhor em crochê.</p>
							</div>
							<div class="buscar">
								<form class="margeninput" action="busca.php" method="get">
									<input class="maxmargen" type="search" name="txtbuscar" placeholder="BUSCAR PRODUTOS..." required>
									<button Type="submit" class="buttonww maxmargen" >Buscar</button>
								</form>
							</div>
						<!-- Nav -->
						<?php if(empty($_SESSION['ID'])) { ?>
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-layer-group"><span>Categorias</span></a>
										<ul>
											<?php while($listaCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $listaCat['id_categoria'];?>"><?php echo $listaCat['nome_categoria'];?></a></li>
											<?php } ?>	
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="right-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-info" href="left-sidebar.php"><span>Sobre nós</span></a></li>
									<li><a class="icon solid fa-cog" href="no-sidebar.php"><span>Entrar</span></a></li>
								</ul>
							</nav>
						<?php } else{ ?>
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-layer-group"><span>Categorias</span></a>
										<ul>
											<?php while($listaCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $listaCat['id_categoria'];?>"><?php echo $listaCat['nome_categoria'];?></a></li>
											<?php } ?>	
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="right-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-info" href="left-sidebar.php"><span>Sobre nós</span></a></li>
									<li><a class="icon solid fa-gears" href="adm-panel.php"><span>Administrador</span></a></li>
									<li><a class="icon solid fa-cog" href="sair.php"><span>sair</span></a></li>
								</ul>
							</nav>
						<?php } ?>

					</div>
				</section>

			<div class="swiper mySwiper areaslider">
				<section id="carrosel" class="swiper-wrapper carousell ">

						<div id="banner" class="swiper-slide banner">

							<div class="container w50">
								<p class="textobanner">deixe seu banheiro de cara nova!</p>
							</div>
							<div class="imagem w50">
							</div>
						</div>

						<div id="banner2" class="swiper-slide banner2" style="max-width:100%">

							<div class="container w50">
								<p class="textobanner">decore sua sala, seu quarto com lindas peças em crochê</p>
							</div>
							<div class="imagem2 w50">
							</div>
						</div>

						<div id="banner3" class="swiper-slide banner3" style="max-width:100%">

							<div class="container w50">
								<p class="textobanner">lindas combinações de cores para enfeitar sua casa</p>
							</div>
							<div class="imagem3 w50">
							</div>
						</div>
						
						<div id="banner4" class="swiper-slide banner4" style="max-width:100%">

							<div class="container w50">
								<p class="textobanner">fabricamos por encomenda!</p>
							</div>
							<div class="imagem4 w50">
							</div>
						</div>
                  <div class="swiper-pagination"></div>
				</section>
			</div>

			<!-- Features -->
				<section id="features" class="espacotop">
					<div class="container">
						<header>
							<h2>Peças em<strong> destaque</strong>!</h2>
						</header>
						<div class="row aln-center">

						<?php while($exibeProd = $consultaProduto->fetch(PDO::FETCH_ASSOC)) { ?>
							<div class="col-3 col-6-medium col-12-smalll" style="height:950px;">

								<!-- Feature -->
									<section class="produtos">
										<a href="detalhes.php?id=<?php echo $exibeProd['id_produto'];?>&idcat=<?php echo $exibeProd['id_categoria'];?>" class="image featured"><img src="assets/css/images/<?php echo $exibeProd['imagen_produto'];?>" alt="" /></a>
										<header style="height:4rem;">
											<h3><?php echo $exibeProd['nome_produto'];?></h3>
										</header>
										<div style="padding-top:2rem;">
										<p class="descricaoprod" style="text-align:left;"><?php echo mb_strimwidth($exibeProd['descricao'],0,97,'...');?></p>
										<h4 class="precoprod">R$ <?php echo number_format($exibeProd['vl_produto'],2,',','.');?></h4>
										<div class="w100">
										<a href="detalhes.php?id=<?php echo $exibeProd['id_produto'];?>&idcat=<?php echo $exibeProd['id_categoria'];?>" class="buttonDetalhes"><i class="fab fa-dettails"></i> Detalhes</a>
										<a href="https://api.whatsapp.com/send?phone=5569984743856&text=<?php echo $exibeProd['nome_produto'], ' R$'. $exibeProd['vl_produto'];?>" target="_blank" class="buttonw" style="font-size:0.85rem;"><i class="fab fa-whatsapp"></i> Entre em contato</a>
										</div>
										</div>
									</section>
							</div>
						<?php } ?>


							</div>
						</div>
					</div>
				</section>



<?php 


include 'footer.php';

?>

