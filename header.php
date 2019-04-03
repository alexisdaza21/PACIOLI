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
										src="fotos/<?= $_SESSION["u"]->foto ?>"
										 <?php } ?>
										<?php if ($_SESSION["sesion"] =="cliente") {	?>
										src="assets/images/cliente.png"
										 <?php } ?>
										 alt="" class="img-circle max-w-35">
										<i class="badge mini success status"></i>
									</span>
									
									<span class="name">
									<?php if ($_SESSION["sesion"] =="trabajador") {	?>
											<?= $_SESSION["u"]->nombres ?>
										<?php }?>
									<?php if ($_SESSION["sesion"] =="cliente") {	?>
											<?= $_SESSION["u"]->nit ?>
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
									<a href="javascript:void(0)"><i class="zmdi zmdi-settings"></i> Account Settings</a>
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
						<li class="dropdown hidden-xs hidden-sm">
							<a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
								<span class="badge mini status danger"></span>
								<i class="zmdi zmdi-notifications"></i>
							</a>
							
						</li>
						<li class="last">
							<a href="javascript:void(0)" data-toggle-state="sidebar-overlay-open" data-key="rightSideBar">
								<i class="mdi mdi-playlist-plus"></i>
							</a>
						</li>
					</ul>
				</div>
				<form role="search" action="" class="navbar-form" id="navbar_form">
					<div class="form-group" id="navbar_search">
						<input type="text" placeholder="Search and press enter..." class="form-control"  autocomplete="off" onkeyup="doSearch()" id="searchTerm">
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
						<li
						   <?php if ($_GET["c"] == "tareas") { ?>
							 	 class="active"
							<?php }?>>
						<a href="index.php?c=tareas&a=admin"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>Tareas</a></li>
						<li 		
	  					   <?php if ($_GET["a"] == "trabajadores") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=trabajadores&a=admin"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>Trabajadores</a></li>
						<li 		
	  					   <?php if ($_GET["a"] == "clientes") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=clientes&a=admin"><i class="zmdi zmdi-accounts-alt zmdi-hc-fw"></i>Clientes</Wa></li>	
						<?php }?>
						<li 		
	  					   <?php if ($_GET["a"] == "trabajos") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=trabajos&a=admintra">&nbsp;&nbsp;<i class="zmdi zmdi-folder"></i>Trabajos</a></li>	
						<li 		
	  					   <?php if ($_GET["a"] == "carpetas") { ?>
							 	 class="active"
							<?php }?>><a href="index.php?c=clientes&a=carpetas"><i></i>Clientes</a></li>

					
						
					
					
						
						</ul>
					</div>
				</nav>
			</aside>
	