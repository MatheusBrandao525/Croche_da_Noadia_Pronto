<?php 

	session_start();
	include "conexao.php";

    if(empty($_SESSION["ID"])){
		header('location:index.php');
	}

$consultaCat = $cn->query("select * from tbl_categoria");
$listaCat = $consultaCat->fetch(PDO::FETCH_ASSOC);

$consultaProd = $cn->query("select * from tbl_produto");


?>
<!DOCTYPE HTML>

<html lang="pt-br" translate="no">
	<head>
		<title>Alterações</title>
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
                            <div class="col-12" style="display: flex; justify-content: center; margin-top:10px;">
								<a href="adm-panel.php" class=" button icon solid fa-cog" style="min-width: 350px;">Voltar</a>
							</div>

                            <div class="buscar">
                                <form action="buscar-alterar.php" method="get">
                                    <input type="search" name="txtalterar" placeholder="BUSCAR PRODUTOS...">
                                    <button class="buttonww" >Buscar</button>
                                </form>
                            </div>

							<!-- Post -->
                            <div class="ouvaiouracha">
                                <article class="box post paracentralizar">
                                <?php while($exibeProd = $consultaProd->fetch(PDO::FETCH_ASSOC)) { ?>
                                <div class="row rowaltera" style="margin-top: 15px;">
            
                                    <div class="col-6 alterarprod">
                                        <div class="col-sm-3 vai"><img src="assets/css/images/<?php echo $exibeProd['imagen_produto']; ?>" style="max-width: 120px;" class="imagemm"></div>
                                        <div class="col-sm-3"><h4 style="padding-top:20px; min-width:250px; text-align: left;"><?php echo $exibeProd['nome_produto']; ?></h4></div>
                                    </div>
                                    <div class="col-6 receba" style="display:flex; justify-content: space-evenly;">
                                        <div class="col-sm-3 afasta" style="padding-top:20px">    
                                        <a href="alterar-produto.php?id=<?php echo $exibeProd['id_produto'];?>&id2=<?php echo $exibeProd['id_categoria'];?>" class="">
                                        <button class="btn btn-lg btn-block btn-default">
                                        <span class="glyphicon glyphicon-pencil"> Alterar</span>
                                        </button>
                                        </a>
                                        </div>
                                        
                                        <div class="col-sm-3 col-xs-offset-right-1" style="padding-top:20px">
                                        <a href="excluir.php?id=<?php echo $exibeProd['id_produto']; ?>">	
                                        <button class="btn btn-lg btn-block btn-danger">
                                        <span class="glyphicon glyphicon-remove"> Excluir</span>		
                                        </button>
                                        </a>
                                        </div> 
                                    </div>
                                            
                                </div>
                                <?php } ?>

                                </article>
                            </div>
						</div>
					</div>
				</section>
    
<?php 


include 'footer.php';

?>