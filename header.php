 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>P&aacute;gina Principal</title>
	<link rel="stylesheet" href="assets/css/vendor.bundle.css">
	<link rel="stylesheet" href="assets/css/app.bundle.css">
	<link rel="stylesheet" href="assets/css/theme-a.css">
  	<style type="text/css">
  		.imagen{
    		background-image: url(assets/images/banner_inicio.jpg);
     		background-size: cover;
       		padding-bottom: 30%;
  				}
	</style>
</head>
<body>
	<div id="app_wrapper">
		<header id="app_topnavbar-wrapper">
			<nav role="navigation" class="navbar topnavbar">
				<div class="nav-wrapper">
					<ul class="nav navbar-nav pull-left left-menu">
						<li class="app_menu-open">
							<a href="javascript:void(0)" data-toggle-state="app_sidebar-left-open" data-key="leftSideBar">
								<i class="zmdi zmdi-menu"></i>
							</a>
						</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li class="dropdown avatar-menu">
							<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="meta">
									<span class="avatar">

										<img 
										<?php if ($_SESSION["sesion"] =="trabajador") {	?>
										src="fotos/<?= $_SESSION["foto"] ?>"
										 <?php } ?>
										<?php if ($_SESSION["sesion"] =="cliente") {	?>
										src="fotos/<?= $_SESSION["u"]->logo ?>"
										 <?php } ?>
										 alt="" class="img-circle max-w-35">
										<i class="badge mini success status"></i>
									</span>
									
									<span class="name">
									<?php if ($_SESSION["sesion"] =="trabajador") {	?>
											<?= $_SESSION["u"]->nombres ?>
										<?php }?>
									<?php if ($_SESSION["sesion"] =="cliente") {	?>
											<?= $_SESSION["u"]->razonSocial ?>
										<?php }?>
									</span>
								
									<span class="caret"></span>
								</span>
							</a>
							<ul class="dropdown-menu btn-primary dropdown-menu-right">
								<li>
									<?php if ($_SESSION["sesion"] =="trabajador") {	?>
										<a href="index.php?c=trabajadores&a=perfil"><i class="zmdi zmdi-account"></i> Perfil</a>
										<?php }?>
									<?php if ($_SESSION["sesion"] =="cliente") {	?>
										<a href="index.php?c=clientes&a=perfil"><i class="zmdi zmdi-account"></i> Perfil</a>
										<?php }?>
									
								</li>
								<li>
								<?php 
								if ($_SESSION["sesion"] =="trabajador") {	
								 	if ($_SESSION["u"]->documento == 7181470) {
								?>
								<li>
									<a href="index.php?c=citas&a=admin"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>Mi Agenda</a>
								</li> 
								<?php
									 }
									}
								?> 
								</li>
								<li>
									<a href="index.php?c=home&a=logout"><i class="zmdi zmdi-sign-in"></i> 	<?php if (isset($_SESSION["u"])) { ?>
		cerrar sesi&oacute;n</a>
		
	<?php }?></a>
								</li>
							</ul>
						</li>
						
						<li>
							<a href="javascript:void(0)" data-navsearch-open>
								<i class="zmdi zmdi-search"></i>
							</a>
						</li>
				
				
					</ul>
				</div>
				<form role="search" action="" class="navbar-form" id="navbar_form">
					<div class="form-group" id="navbar_search">
						<input type="text" placeholder="Escriba para buscar..." class="form-control"  autocomplete="off" onkeyup="doSearch()" id="searchTerm">
						<i data-navsearch-close class="zmdi zmdi-close close-search"></i>
					</div>
					<button type="submit" class="hidden btn btn-default">Submit</button>
				</form>
			</nav>
		</header>
		<aside id="app_sidebar-left">
			<div id="logo_wrapper">
				<ul>
					<li class="logo-icon">
						<a href="index.html">
							<img src="assets/images/logo_inferior_para_footer.png" alt="Logo" style="margin: 15%; margin-left: 35%;">
						</a>
					</li>
					<li class="menu-icon">
						<a href="javascript:void(0)" role="button" data-toggle-state="app_sidebar-menu-collapsed" data-key="leftSideBar">
							<i class="mdi mdi-backburger"></i>
						</a>
					</li>
				</ul>
			</div>
			<nav id="app_main-menu-wrapper" class="scrollbar">
				<div class="sidebar-inner sidebar-push">
					<ul class="nav nav-pills nav-stacked">
						<li class="sidebar-header">Menu</li>
						

		
						<li 		
	  					   <?php if ($_GET["a"] == "home") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=home&a=home"><i class="zmdi zmdi-view-dashboard"></i>Mi Inicio</a></li>
							<?php if ($_SESSION["sesion"] =="trabajador") { ?>
						<?php if ($_SESSION["u"]->documento == 7181470) { ?>
						<li 		
	  					   <?php if ($_GET["c"] == "nicc1") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=nicc1&a=admin"><i class="zmdi zmdi-eye"></i>Seguimiento NICC-1</a></li>
						<?php }?>	
						<li
						   <?php if ($_GET["c"] == "tareas") { ?>
							 	 class="active"
							<?php }?>>
						<a href="index.php?c=tareas&a=admin"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>Tareas</a></li>
						<li 		
	  					   <?php if ($_GET["c"] == "trabajadores") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=trabajadores&a=admin"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>Trabajadores</a></li>
						<li 		
	  					   <?php if ($_GET["c"] == "clientes") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=clientes&a=admin"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>Clientes</Wa></li>	
						<?php }?>
						<li 		
	  					   <?php if ($_GET["c"] == "trabajos") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=trabajos&a=admintra">&nbsp;&nbsp;<i class="zmdi zmdi-folder"></i>

							<?php if ($_SESSION["sesion"] =="trabajador") { ?>	
							Trabajos
						<?php }?>
						<?php if ($_SESSION["sesion"] =="cliente") { ?>
							Mis Trabajos
						<?php }?>
							</a></li>
						<?php if ($_SESSION["sesion"] =="cliente" &&$_GET["c"] == "carpetas" && $_GET["a"] == "admin") { ?>
							<li
						
								 	 class="active"
								>
							<a><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>Mis Carpetas</a></li>	
						<?php } ?>		

					
					
					
					
						
						</ul>
					</div>
				</nav>
			</aside>
	