<?php 

	session_start();
	include "conexao.php";

	if(empty($_SESSION["ID"])){
		header('location:index.php');
	}

	$consultaCat = $cn->query("select * from tbl_categoria");

?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Administrador</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="no-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" style="max-height:120px;">
					<div class="container" style="max-height:100px;">
						<!-- Nav -->
						<?php if(empty($_SESSION['ID'])) { ?>
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-layer-group"><span>Categorias</span></a>
										<ul>
											<?php while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecat['id_categoria'];?>"><?php echo $exibecat['nome_categoria'];?></a></li>
											<?php } ?>
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="right-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-info" href="left-sidebar.php"><span>Sobre Nós</span></a></li>
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
											<?php while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecat['id_categoria'];?>"><?php echo $exibecat['nome_categoria'];?></a></li>
											<?php } ?>
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="right-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-info" href="left-sidebar.php"><span>Sobre Nós</span></a></li>
									<li><a class="icon solid fa-gears" href="adm-panel.php"><span>Administrador</span></a></li>
									<li><a class="icon solid fa-cog" href="sair.php"><span>sair</span></a></li>
								</ul>
							</nav>
						<?php } ?>
					</div>
				</section>

                <!-- Main -->
				<section id="main">
					<div class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									<header>
										<h2>Olá ADM!</h2>
									</header>
									<div class="frmlogin" style="display: flex; justify-content: center; align-items: center; text-align: center;">
										<div class="row gtr-50">
											<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
                                                <a href="cadastrar-produto.php" class="button icon solid fa-cog" style="min-width:300px;">Cadastrar Produtos</a>											
											</div>
											<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
                                                <a href="alterar-excluir.php" class="button icon solid fa-cog" style="min-width:300px;">Alterar Produtos</a>											
											</div>
											<div class="col-12" style="display: flex; justify-content: center;">
                                                <a href="index.php" class="button icon solid fa-cog" style="min-width:300px;">Voltar</a>
											</div>
										</div>
									</div>
								</article>

						</div>
					</div>
				</section>

<?php

include 'footer.php';

?>