
<?php include("header.php"); ?>

<body>
        <section id="content_outer_wrapper">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
          	<div class="imagen"></div>

          </div>   
 
    <font face="verdana"> 
					<div id="content" class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="card card-transparent">
									<div class="card-body wrapper">
										<div class="row">
											<div class="col-md-12 col-lg-3"style="margin-left: 32.3%; width: 39%; margin-top: 1%;">
												<div class="card type--profile" >

													<header class="card-heading" >
														<img src="fotos/<?= $tra->foto;?>" alt="" class="img-circle" >
														<a title="Volver a trabajos"  href="index.php?c=trabajos&a=admintra" ><i
															 class="zmdi zmdi-hc-2x zmdi-mail-reply-all"></i></a>
													</header>
													<div class="card-body">
														<h3 class="name">
													<?= $tra->nombres;?>
														
													</h3>
														<span class="title"><?= $tra->apellidos;?></span>
														<button type="button" class="btn btn-primary btn-round"><?= $tra->tipo; ?></button>
													</div>
													<footer class="card-footer border-top">
													<div class="card-body">
														<h3 class="name">
															Perfil Profesional 
														</h3>
														<span class="title"><?= $tra->perfilPro;?></span>
														
													</div>
														<div class="row row p-t-10 p-b-10">
															<div class="col-xs-4"><span class="count"><h4> Documento</h4></span><span><?= $tra->documento; ?></span><span><i class="zmdi zmdi-hc-2x zmdi-assignment-account"></i></span>
															</div>
															<div class="col-xs-4"><span class="count"><h4> Telefono</h4></span><span><?= $tra->telefono; ?></span>
															<span><a title = "Llamar"class="zmdi zmdi-hc-2x zmdi-phone-in-talk" href="tel:+57<?= $tra->telefono; ?>" target="_blank"> </a></span>
															</div>
															<div class="col-xs-4">
																<span class="count"><h4>Hoja de vida</h4></span><span><a title = " ver hoja de vida"class="zmdi zmdi-hc-2x zmdi-file-text" href="documentos/<?= $tra->hojaVida;?>" target="_blank"> </a></span></div>
														</div>

													</footer>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</font>
			</section>

<?php include ("footer.php"); ?>
 							