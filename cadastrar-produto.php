<?php 

	session_start();
	include "conexao.php";

    if(empty($_SESSION["ID"])){
		header('location:index.php');
	}

$consultaCat = $cn->query("select * from tbl_categoria");
$consultaCate = $cn->query("SELECT * FROM tbl_categoria");

?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Cadastrar Produtos</title>
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
										<h2>Cadastrar Produto</h2>
									</header>
									<form name="frmusuario" method="post" enctype="multipart/form-data" action="inserir_produto.php" class="frmlogin" style="display: flex; justify-content: center; align-items: center; text-align: center;">
										<div class="row gtr-50">
											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Digite o nome do produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtnomeproduto" placeholder="Nome" type="text" style="max-width: 350px;" required />
												</div>

											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Selecione a categoria do produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<select name="selectcat" style="max-width: 350px;" id="">
														<option value="">Selecione</option>
													<?php while($listaCat = $consultaCate -> fetch(PDO::FETCH_ASSOC)) { ?>
														<option value="<?php echo $listaCat['id_categoria'];?>"><?php echo $listaCat['nome_categoria'];?></option>
													<?php } ?>
														
													</select>
												</div>

											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Insira uma descrição para o produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<textarea name="txtdescricao" placeholder="Descrição..." style="max-width: 350px; type="" required /></textarea>
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Selecione três imagens para seu produto!</h6>
                                            </div>
												<div class="col-12" style="display: flex; justify-content: center;">
													<input type="file" accept="image/*" name="txtimagem" style="max-width: 350px;" required></input>
												</div>

												<div class="col-12" style="display: flex; justify-content: center;">
													<input type="file" accept="image/*" name="txtimagemdois" style="max-width: 350px;" required></input>
												</div>

												<div class="col-12" style="display: flex; justify-content: center;">
													<input type="file" accept="image/*" name="txtimagemtres" style="max-width: 350px;" required></input>
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Quantidade em estoque</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtqnt" style="min-width: 50px; max-width: 100px; padding-left:10px;" placeholder="Estoque" type="number" min="1" style="max-width: 350px;" required />
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Valor do Produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtvalor" id="preco" style="min-width: 50px; max-width: 100px; padding-left:10px;" placeholder="00,00" type="text" min="1" style="max-width: 350px;" required />
												</div>

											<div class="col-12">
												<input type="submit" class="form-button-submit button icon solid fa-cog" style="min-width: 350px;" value="Cadastrar"></input>
											</div>

										</div>
									</form>
										<div class="col-12" style="display: flex; justify-content: center; margin-top:10px;">
											<a href="adm-panel.php" class=" button icon solid fa-cog" style="min-width: 350px;">Voltar</a>
										</div>
								</article>

						</div>
					</div>
				</section>
    
<?php 


include 'footer.php';

?>