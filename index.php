<?php 
	require("Modelos/Trabajadores.php");
	require("Modelos/Clientes.php");
	session_start(); 

	$action = "index";
	$controller = "home";

	if (isset($_GET["a"])) 
		$action = $_GET["a"];
	
	if (isset($_GET["c"])) 
		$controller = $_GET["c"];
	
		//if (!isset($_SESSION["u"]) && $_GET["a"]!="home" && $_GET["a"]!="login" ) 
		//		header("location:index.php?c=home&a=home");
		switch ($controller) {
			case 'carpetas':
				require "Controladores/carpetasController.php";
					carpetasController::main($action);
			break;	
			case 'archivos':
				require "Controladores/archivosController.php";
					archivosController::main($action);
			break;	
			case 'trabajadores':
				require "Controladores/trabajadoresController.php";
					trabajadoresController::main($action);
			break;	
			case 'clientes':
				require "Controladores/clientesController.php";
					clientesController::main($action);
			break;			
			case 'trabajos':
				require "Controladores/trabajosController.php";
					trabajosController::main($action);
			break;
			case 'tareas':
				require "Controladores/tareasController.php";
					tareasController::main($action);
			break;
			case 'visitas':
				require "Controladores/visitasController.php";
					visitasController::main($action);
			break;
			case 'citas':
				require "controladores/citasController.php";
					citasController::main($action);
			break;
			default://controlador de inicio
			require "Controladores/homeController.php";
			//accion estatica ::
			homeController::main($action);
		}
 ?>
