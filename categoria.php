<?php

	session_start();
	include "conexao.php";

    $codigoCat = $_GET['cat'];
	
	$consultaCat = $cn->query("select * from tbl_categoria");
	$consultaProduto = $cn->query("SELECT id_produto, nome_produto, imagen_produto, id_categoria, descricao, vl_produto FROM tbl_produto WHERE id_categoria = '$codigoCat'");


?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Crochê da Noadia</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="borabora">
					<div class="container" style="max-height:150px;">

						<!-- Logo -->
							<div class="buscar">
								<form action="busca.php" method="get">
									<input type="search" name="txtbuscar" placeholder="BUSCAR PRODUTOS...">
									<button class="buttonww" >Buscar</button>
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

			<!-- Features -->
				<section id="features">
					<div class="container">
						<div class="row aln-center">

						<?php while($exibeProd = $consultaProduto->fetch(PDO::FETCH_ASSOC)) { ?>
							<div class="col-4 col-6-medium col-12-small">

								<!-- Feature -->
									<section>
										<a href="detalhes.php?id=<?php echo $exibeProd['id_produto'];?>" class="image featured"><img src="assets/css/images/<?php echo $exibeProd['imagen_produto'];?>" alt="" /></a>
										<header>
											<h3><?php echo $exibeProd['nome_produto'];?></h3>
										</header>
										<p style="text-align:left;"><?php echo mb_strimwidth($exibeProd['descricao'],0,97,'...');?></p>
										<h4>R$ <?php echo number_format($exibeProd['vl_produto'],2,',','.');?></h4>
										<a href="https://api.whatsapp.com/send?phone=5569984743856&text=<?php echo $exibeProd['nome_produto'], ' R$'. $exibeProd['vl_produto'];?>" target="_blank" class="buttonw"><i class="fab fa-whatsapp"></i> Entre em contato</a>
									</section>
							</div>
						<?php } ?>


						</div>
					</div>
				</section>


<?php 


include 'footer.php';

?>