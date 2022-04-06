<?php

	session_start();
	include "conexao.php";
	
	$consultaCat = $cn->query("select * from tbl_categoria");

	$consultaDepoimento = $cn->query("SELECT id, nome_usuario, dsp_email, dsp_depoimento, date_format(ds_data, '%d/%m/%Y') AS ds_data FROM tbl_depoimento order by id desc limit 3");

?>
<!DOCTYPE HTML>
<html lang="pt-br" translate="no">
	<head>
		<title>Sobre nós</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel = " stylesheet " href = " https://use.fontawesome.com/079d72ad8e.css " >
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="homepage is-preload">
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
						<div class="row">

							<!-- Content -->
								<div id="content" class="col-8 col-12-medium">								

									<!-- Post -->
									<article class="box highlight">
										<header>
											<h2><a href="#">Sobre nós</a></h2>
										</header>
										<header>
											<h3><a href="#">Noádia Vitória</a></h3>
										</header>
										<a href="#" class="image left"><img src="images/pic06.jpg" alt="" /></a>
											<p>Olá, meu nome é Noádia e sou a dona deste site, espero que você esteja bem, vou te contar um pouco mais sobre mim, gosto muito de fazer crochê, comecei a assistir aulas no YouTube para aprender e hoje posso dizer que sou quase profissional, digo isso porque o aprendizado nunca termina e sempre devemos buscar mais conhecimento, enfim, bem-vindo ao meu site! Este é o lugar onde divulgo meu trabalho, pois, depois de me casar me mudei para um lugar onde não conheço muitas pessoas então meu irmão que é estudante desenvolvimento criou este site para me ajudar a divulgar meus trabalhos.
                                            </p>
									</article>

									<section>
											<ul class="divided">
												<li>

													<!-- Highlight -->
													<article class="box post">
    													<h3>Sobre os produtos</h3>
    													<p>Todas as peças são produzidas com linhas de qualidade e temos extremo comprometimento com os prazos combinados, alguns modelos podem não estar disponíveis a pronta entrega, pois, são produzidos conforme a demanda, também podem ser produzidos com as exigências do cliente, com a linha e as cores de preferência do cliente.
                                                        </p>
													</article>
												</li>
											</ul>
										</section>

										<section>
											<ul class="divided">
												<li>

													<!-- Highlight -->
													<article class="box post">
													<h3>Sobre os envios</h3>
													<p>Envio de pedidos/remessas entre os dias 20 e 31 de todo mês, frete a combinar na hora de fechar o pedido.
                                                    </p>

													</article>
												</li>
											</ul>
										</section>

										
										<!-- Highlights -->
										<section>
											<ul class="divided">
												<li>

													<!-- Highlight -->
													<article class="box post">
													<h3>Sobre o site</h3>
													<p>Este site foi desenvolvido com o intuito de ajudar minha irmã a vender os trabalhos que ela faz em crochê, aliás, ela é muito boa nisso, você pode ficar a vontade para explorar o site e descobrir os trabalhos que minha irmã faz, se caso se interessar por algum é só entrar em contato com ela diretamente pelo botão do WhatsApp que está disponível abaixo de cada produto, e combinar a entrega ou se quiser encomendar algum trabalho em crochê também é possível, pois, ela aceita pedidos, se caso não estiver se sentindo confortável em relação à segurança e a confiabilidade deste site basta olhar os depoimentos das pessoas que já comprarão ou que, já fizeram alguma encomenda.</p>

													</article>
												</li>
											</ul>
										</section>

								</div>

							<!-- Sidebar -->
								<div id="sidebar" class="col-4 col-12-medium">

									<!-- Excerpts -->
										<section class="depoimento">
											<ul class="divided">
											<h2>Depoimentos</h2>
											<?php while($exibeDepoimento = $consultaDepoimento->fetch(PDO::FETCH_ASSOC)) { ?>
												<li>


													<!-- Excerpt -->
														<article class="box excerpt">
															<header>
																<span class="date"><?php echo $exibeDepoimento["ds_data"];?></span>
																<h3><a href="todosDepoimentos.php"><?php echo $exibeDepoimento['nome_usuario'];?></a></h3>
															</header>
															<p><?php echo $exibeDepoimento['dsp_depoimento'];?></p>
														</article>

												</li>
											<?php } ?>

											</ul>
											<a href="todosDepoimentos.php" class="button" style="margin-top:5rem;">Ver mais depoimentos</a>
										</section>
									

								</div>

						</div>
					</div>
			</section>

<?php 

include 'footer.php';

?>