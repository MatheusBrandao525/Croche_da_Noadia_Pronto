<?php

	session_start();
	include "conexao.php";
	
	$consultaCat = $cn->query("select * from tbl_categoria");

	$consultaDepoimento = $cn->query("SELECT id, nome_usuario, dsp_email, dsp_depoimento, date_format(ds_data, '%d/%m/%Y') AS ds_data FROM tbl_depoimento order by id desc");

?>
<!DOCTYPE HTML>
<html lang="pt-br" translate="no">
	<head>
		<title>Depoimentos</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
			<section id="header" style="border-bottom:none; max-height:120px;">
					<div class="container" style="border-bottom:none; max-height:100px;">

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
						<div class="row">
							<!-- Sidebar -->
								<div id="sidebar" class="col-12 col-12-medium">

									<!-- Excerpts -->
										<section class="depoimento">
											<ul class="divided">
											<h2 style="text-align:center;">Depoimentos</h2>
											<?php while($exibeDepoimento = $consultaDepoimento->fetch(PDO::FETCH_ASSOC)) { ?>
												<li id="<?php echo $exibeDepoimento['id'];?>">


													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date"><?php echo $exibeDepoimento["ds_data"];?></span>
																<h3><?php echo $exibeDepoimento['nome_usuario'];?></h3>
															</header>
															<p><?php echo $exibeDepoimento['dsp_depoimento'];?></p>
														</article>

												</li>
											<?php } ?>

											</ul>

										</section>
								</div>

						</div>
					</div>
			</section>

<?php 

include 'footer.php';

?>