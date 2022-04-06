<?php 

	session_start();
	include "conexao.php";

    if(empty($_SESSION["ID"])){
		header('location:index.php');
	}

	$id_produto = $_GET['id'];
	$id_categoria = $_GET['id2'];
	$consultaCate = $cn->query("select * from tbl_categoria");

$consultaCat = $cn->query("select id_categoria, nome_categoria from tbl_categoria where id_categoria ='$id_categoria'");
$exibeCat = $consultaCat->fetch(PDO::FETCH_ASSOC);
$consultaCat2 = $cn->query("select * from tbl_categoria");

$consultaProd = $cn->query("select * from tbl_produto where id_produto = '$id_produto' and id_categoria = '$id_categoria'");

?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Alterar</title>
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
											<?php while($exibecate = $consultaCate->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecate['id_categoria'];?>"><?php echo $exibecate['nome_categoria'];?></a></li>
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
											<?php while($exibecate = $consultaCate->fetch(PDO::FETCH_ASSOC)) { ?>
												<li><a href="categoria.php?cat=<?php echo $exibecate['id_categoria'];?>"><?php echo $exibecate['nome_categoria'];?></a></li>
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
									<?php $exibe = $consultaProd->fetch(PDO::FETCH_ASSOC)?>
									<header>
										<h2>Alterar Produto</h2>
									</header>
									<form name="frmusuario" method="post" enctype="multipart/form-data" action="altera_produto.php?id_produto=<?php echo $id_produto;?>" class="frmlogin" style="display: flex; justify-content: center; align-items: center; text-align: center;">
										<div class="row gtr-50">
											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Alterar o nome do produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtnomeproduto" value="<?php echo $exibe['nome_produto'];?>" type="text" style="max-width: 350px;" required />
												</div>

											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Selecione a categoria do produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<select name="selectcat" style="max-width: 350px;" id="">
														<option value="<?php echo $exibeCat['id_categoria'];?>"><?php echo $exibeCat['nome_categoria'];?></option>
													<?php while($mostraCat = $consultaCat2 -> fetch(PDO::FETCH_ASSOC)) { ?>
														<option value="<?php echo $mostraCat['id_categoria'];?>"><?php echo $mostraCat['nome_categoria'];?></option>
													<?php } ?>
														
													</select>
												</div>

											<div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Insira uma descrição para o produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<textarea name="txtdescricao" style="max-width: 350px; type="" required /><?php echo $exibe['descricao'];?></textarea>
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Selecione três imagens para seu produto!</h6>
                                            </div>
												<div class="col-12" style="display: block; justify-content: center;">
													<div style="display: block;">
														<img src="assets/css/images/<?php echo $exibe['imagen_produto'];?>" style="max-width:250px;" alt="">
													</div>
														<input type="file" accept="image/*" name="txtimagem" style="max-width: 350px;"></input>
												</div>

												<div class="col-12" style="display: block; justify-content: center;">
													<div style="display: block;">
														<img src="assets/css/images/<?php echo $exibe['imagen_dois'];?>" style="max-width:250px;" alt="">
													</div>
														<input type="file" accept="image/*" name="txtimagemdois" style="max-width: 350px;"></input>
												</div>

												<div class="col-12" style="display: block; justify-content: center;">
													<div style="display: block;">
														<img src="assets/css/images/<?php echo $exibe['imagen_tres'];?>" style="max-width:250px;" alt="">
													</div>
														<input type="file" accept="image/*" value="<?php echo $exibe['imagen_tres'];?>" name="txtimagemtres" style="max-width: 350px;"></input>
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Quantidade em estoque</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtqnt" style="min-width: 50px; max-width: 100px; padding-left:10px;" value="<?php echo $exibe['qnt_estoque'];?>" type="number" min="1" style="max-width: 350px;" required />
												</div>

                                            <div class="col-12" style="display: flex; justify-content: center;">
                                                <h6>Valor do Produto</h6>
                                            </div>
												<div class="col-12 col-12-small" style="display: flex; justify-content: center;">
													<input name="txtvalor" id="preco" style="min-width: 50px; max-width: 100px; padding-left:10px;" value="<?php echo number_format($exibe['vl_produto'],2,',','.');?>" type="text" min="1" style="max-width: 350px;" required />
												</div>

											<div class="col-12">
												<input type="submit" class="form-button-submit button icon solid fa-cog" style="min-width: 350px;" value="Salvar"></input>
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