<?php include("header.php"); ?>
	<title></title>
</head>
<body>

	<?php if ($_SESSION["sesion"] == "cliente") {?>
			<section id="content_outer_wrapper">
				<div id="content_wrapper" class="card-overlay">
          <div style="background: #fff;" id="header_wrapper" class="header-xl  profile-header">
          	<div class="imagen"></div>

          </div>   
				
					<div id="content" class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="card card-transparent">
									<div class="card-body wrapper">
										<div class="row">
											<div class="col-md-12 col-lg-3"style="margin-left: 15%; width: 70%; margin-top: 9%;">
												<div class="card type--profile" >
													<header class="card-heading" >

														<img src="fotos/<?=  $cliente->logo ?>" alt="" class="img-circle" >

													</header>
													<div class="card-body">
														<h3 class="name">
													<?= $cliente->razonSocial ?>
														
													</h3>
														<span class="title"><?=  $cliente->nit ?></span>
														<button type="button" class="btn btn-primary btn-round">Cliente</button>
													</div>
													<footer class="card-footer border-top">
														<div class="row row p-t-10 p-b-10">
															<div class="col-xs-4"><span class="count"><h4> Direccion</h4></span><span><?= $cliente->direccion  ?></span></div>
															<div class="col-xs-4"><span class="count"><h4>Email</h4></span><span><?=  $cliente->email  ?></span></div>
															<div class="col-xs-4"><span class="count"><h4>Telefono</h4></span><span><?=  $cliente->telefono  ?></span></div>
														</div>
													</footer>
												</div>
											</div>

<?php } ?>

<?php if ($_SESSION["sesion"] == "trabajador") {?>
			<section id="content_outer_wrapper" class="">
				<div id="content_wrapper" class="rightnav_v2">
					<div id="header_wrapper" class="header-sm">
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-12">
									<header id="header">
										<center>
											<h1>-Bienvenido-</h1>
										</center>
										
									</header>
								</div>
							</div>
						</div>
						<ul class="card-actions icons lg alt-actions right-top">
							<li>
								<a href="javascript:void(0)" class="drawer-trigger" data-drawer="toggle-right"  title="acoplar">
									<i class="zmdi zmdi-crop"></i>
								</a>
							</li>
						</ul>
					</div>

    <font face="verdana"> 
					<div id="content" class="container-fluid">
						<div class="row">
							<div class="col-xs-12">
								<div class="card card-transparent">
									<div class="card-body wrapper">
										<div class="row">
											<div class="col-md-12 col-lg-3"style="margin-left: 22%; width: 55%; margin-top: 2%;">
												<div class="card type--profile" >
													<header class="card-heading" >
														<img src="fotos/<?=  $trabajador->foto ?>" alt="" class="img-circle" >
														<ul class="card-actions icons right-top">
													
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
					<div id="content" class="container-fluid">
						<div class="content-body">
						
						
							<!-- ENDS $content -->
							<aside id="rightnav">
								<div class="rightnav-content-wrapper scrollbar">
									<div class="card date transparent">
										<div class="card-body">
											<div class="curr-date">
												<h4 class=""></h4>
												<h5 class="curr-mmmm-dd"></h5>
											</div>
										</div>
									</div>
									<div class="card type--weather transparent">
										<div class="card-body">
											<header class="curr-weather">
												<h5>TUNJA, CO</h5>
												<i class="wi wi-day-cloudy"></i>
												<div class="curr-temp-wrapper">
													<span class="curr-temp">72</span>
													<sup class="curr-sup">°</sup>
													<span class="curr-f">F</span>
												</div>
												<h6>verifica tus tareas  <a href="index.php?c=tareas&a=admin">-aqui-</a></h6>
											</header>
											<ul class="forcast">
												<li>
													<div class="curr-temp-wrapper">
														<span class="forcast-day forcast-one"></span>
														<i class="wi wi-day-rain-mix"></i>
														<span class="curr-temp">65</span>
														<sup class="curr-sup">°</sup>
														<span class="curr-f">F</span>
													</div>
												</li>
												<li>
													<div class="curr-temp-wrapper">
														<span class="forcast-day forcast-two"></span>
														<i class="wi wi-day-cloudy-gusts"></i>
														<span class="curr-temp">70</span>
														<sup class="curr-sup">°</sup>
														<span class="curr-f">F</span>
													</div>
												</li>
												<li>
													<div class="curr-temp-wrapper">
														<span class="forcast-day forcast-three"></span>
														<i class="wi wi-day-lightning"></i>
														<span class="curr-temp">73</span>
														<sup class="curr-sup">°</sup>
														<span class="curr-f">F</span>
													</div>
												</li>
											</ul>
										</div>
									</div>
									<div class="card card-task transparent m-t-30">
										<header class="card-heading">
											<h5>Mis tareas</h5>
											<ul class="card-actions icons  right-top">
												<li>
													<a href="javascript:void(0)" class="animate_plus_x" data-toggle="input"><i class="zmdi zmdi-plus"></i> </a>
												</li>
												<li>
													<a href="javascript:void(0)" data-toggle="collapse"><i class="zmdi zmdi-chevron-down"></i> </a>
												</li>
											</ul>
										</header>
										<div class="card-body">
											<form>
												<div class="form-group"><?php foreach ($calendario as $cal ) { ?>
													<label type="text" value="" placeholder="Add task" class="form-control"  /><?= $cal->nombreTarea; ?>
													<?php }?>
												</div>
											</form>
											<ul class="checklist">
									
												
												<li>
													<label>
														<i class="input-helper"></i>
													</label>
												</span>
											</li>
									
							</span>
						</li>
					</ul>
				</div>
			<?php }?>
			</div>
		</div>
	</aside>

<?php include("footer.php");
