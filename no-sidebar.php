<?php

	session_start();

	include 'conexao.php';

	$consultaCat = $cn->query("SELECT * FROM tbl_categoria");



?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Login</title>
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
							<nav id="nav">
								<ul>
									<li><a class="icon solid fa-home" href="index.php"><span>Home</span></a></li>
									<li>
										<a href="#" class="icon solid fa-layer-group"><span>Categorias</span></a>
										<ul>
										<?php while($exibeCat = $consultaCat->fetch(PDO::FETCH_ASSOC)) { ?>
											<li><a href="categoria.php?cat=<?php echo $exibeCat['id_categoria'];?>"><?php echo $exibeCat['nome_categoria'];?></a></li>
										<?php } ?>
										</ul>
									</li>
									<li><a class="icon solid fa-box" href="left-sidebar.php"><span>Serviços</span></a></li>
									<li><a class="icon solid fa-info" href="right-sidebar.php"><span>Sobre nós</span></a></li>
									<li><a class="icon solid fa-cog" href="no-sidebar.php"><span>Entrar</span></a></li>
								</ul>
							</nav>

					</div>
				</section>

			<!-- Main -->
				<section id="main">
					<div class="container">
						<div id="content">

							<!-- Post -->
								<article class="box post">
									<header>
										<h2>Faça login</h2>
									</header>
									<form name="frmusuario" method="post" action="validaUser.php" class="frmlogin" style="display: flex; justify-content: center; align-items: center; text-align: center;">
										<div class="row gtr-50">
											<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
												<input name="txtnome" placeholder="Nome" type="text" style="max-width: 350px;" required/>
											</div>
											<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
												<input name="txtemail" placeholder="Email" type="email" style="max-width: 350px;" required/>
											</div>
											<div class="col-12" style="display: flex; justify-content: center;">
												<input type="password" name="txtsenha" placeholder="Digite sua senha" style="max-width: 350px;" required></input>
											</div>
											<div class="col-12">
												<input type="submit" class="form-button-submit button icon solid fa-cog" value="Entrar"></input>
											</div>
										</div>
									</form>
								</article>

						</div>
					</div>
				</section>
<?php 


include 'footer.php';

?>