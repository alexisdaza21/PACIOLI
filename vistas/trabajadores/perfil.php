
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
											<div class="col-md-12 col-lg-3"style="margin-left: 32.3%; width: 37%; margin-top: 3%;">
												<div class="card type--profile" >
													<header class="card-heading" >
														<img src="fotos/<?=  $trabajador->foto ?>" alt="" class="img-circle" >
														<ul class="card-actions icons right-top">
															<li class="dropdown">
																<a href="javascript:void(0)" data-toggle="dropdown">
																	<i class="zmdi zmdi-more-vert"></i>
																</a>
																<ul class="dropdown-menu dropdown-menu-right btn-primary">
																	<li>
																		<a data-toggle="modal" data-target="#tab_modal">Edit Profile</a>

																	</li>
																</ul>
															</li>
														</ul>
													</header>
													<div class="card-body">
														<h3 class="name">
													<?= $trabajador->nombres ?>
														
													</h3>
														<span class="title"><?=  $trabajador->apellidos ?></span>
														<button type="button" class="btn btn-primary btn-round"><?= $trabajador->tipo ?></button>
													</div>
													<footer class="card-footer border-top">
														<div class="row row p-t-10 p-b-10">
															<div class="col-xs-4"><span class="count"><h4> Fecha vinculacion</h4></span><span><?=  $trabajador->fechaIngreso ?></span></div>
															<div class="col-xs-4"><span class="count"><h4>Cumpleaños</h4></span><span><br><?=  $trabajador->fechaNacimiento ?></span></div>
															<div class="col-xs-4"><span class="count"><h4>Numero de Documento</h4></span><span><?=  $trabajador->documento ?></span></div>
														</div>
													</footer>
												</div>
											</div>

<?php include ("footer.php"); ?>

<!-- modal edit perfil-->
<div class="modal fade" id="tab_modal" tabindex="-1" role="dialog" aria-labelledby="tab_modal" style="display: none;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModalLabel-2"><?=  $trabajador->nombres."&nbsp;".  $trabajador->apellidos ?></h4>
							<ul class="card-actions icons right-top">
								
								<a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
									<i class="zmdi zmdi-close"></i>
								</a>
							
						</ul>
					</div>
					<div class="modal-body p-0">
						<div class="tabpanel">
							<ul class="nav nav-tabs p-0">
								
								<li role="presentation" class="active"><a href="#tab-3" data-toggle="tab" aria-expanded="false">Cambiar foto<div class="ripple-container"></div></a></li>
								<li role="presentation" class=""><a href="#tab-2" data-toggle="tab" aria-expanded="false">Cambiar datos.<div class="ripple-container"></div></a></li>

	
							</ul>
						</div>
						<div class="tab-content  p-20">
								<div class="tab-pane fadeIn" id="tab-2">
									<h4></h4>
									<p><form method="Post" action="index.php?c=trabajadores&a=telefono">
                      					<div class="form-group is-empty">
					                        <label for="name" class="col-md-2 control-label"
					                        maxlegth="10">Telefono</label>
					                        <div class="col-md-10">
					                          <input  type="text" class="form-control" id="name" placeholder="<?=  $trabajador->telefono ?>" 
					                          required name="trabajadores[telefono]" maxlength="10" >
					                          <input type="hidden" name="trabajadores[id]"
					                          value="<?=  $trabajador->id_trabajadores ?>"">
					                        </div>
					                     </div>
									</p>
									</div>
									<div class="tab-pane fadeIn active" id="tab-3">
										<h4><i class="zmdi zmdi-exposure zmdi-hc-fw"></i>Cambio de foto.. </a></h4>
										<figure><img src="fotos/<?= $_SESSION["u"]->foto ?>" alt="" class="img-thumbnail pull-left m-r-10 "></figure>
										<button class="btn btn-info btn-fab btn-fab-sm"
											data-toggle="modal" data-target="#basic_modal"><i class="zmdi zmdi-edit" ></i><div class="ripple-container"></div></button>

									</div>
								</div><br><br><br><br><br><br><br><br>
								<div class="modal-footer">
									<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 46.9688px; top: 23.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
									<button type="submit" class="btn btn-primary">Ok</button>
								</div>
							</div>
							<!-- modal-content -->
						</div>
					</form>
						<!-- modal-dialog -->
					</div>


<!--editar foto-->
					<div class="modal fade" id="basic_modal" tabindex="-1" role="dialog" aria-labelledby="basic_modal" style="display: none; "  >
				<div class="modal-dialog" role="document" >
					<div class="modal-content" >
						<div class="modal-header">
							
							<h4 class="modal-title" id="myModalLabel-2">Selecciona una imagen</h4>
							<ul class="card-actions icons right-top">
								
								<a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
									<i class="zmdi zmdi-close"></i>
								</a>
							
						</ul>
					</div>
					<form action="index.php?c=trabajadores&a=foto&id=<?=  $trabajador->id_trabajadores ?>&tipo=perfil" enctype="multipart/form-data" method="POST">
					<div class="modal-body" >
						<p><input type="file" name="imagen" value="<?= $_SESSION["u"]->foto ?>"></p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: 29.9688px; top: 2.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div><div class="ripple ripple-on ripple-out" style="left: 34.9688px; top: 14.5625px; background-color: rgb(104, 134, 150); transform: scale(14.5);"></div></div></button>
							<button type="submit" class="btn btn-primary">Ok</button>
						</div>
					</form>
					</div>
					<!-- modal-content -->
				</div>
				<!-- modal-dialog -->
			</div>dropdown