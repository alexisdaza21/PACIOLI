<?php 
	 require_once("Modelos/Trabajos.php");
	  require_once("Modelos/carpetas.php");
	   require_once("Modelos/Clientes.php");


	 class carpetasController{

	 	public static function main ($action){
	 		$_this = new carpetasController();
	 		switch ($action) {
	 			case 'admin':
	 				$_this->admin();
	 				break;
	 			case 'create':
	 				$_this->create();
	 				break;
	 			case 'update': 
				$_this->update();
				break;
	 			default:
	 				throw new Exception("Accion no definido");
	 				break;
	 		}
	 	}
	 private function update(){
		$carpetas = new Carpetas();
		$carpetas->findByPk($_GET["up"]);


		if(isset($_POST["Carpetas"])){
			$carpetas->nombre = $_POST["Carpetas"]["nombre"];
			$carpetas->fechaCre =  date("Y-m-d");
			$id = $_GET["id"];
			$nit =$_GET["nit"];
			
			$carpetas->update();
			header("Location: index.php?c=carpetas&a=admin&id=".$id."&nit=".$nit);
		}else{
			require "vistas/carpetas/admin.php";
		}
	}	
	private function create(){

		if(isset($_POST["Carpetas"])){
			
			//guardar en la BBDD
			$id = $_POST["Carpetas"]["id"];
			$nom =  $_POST["Carpetas"]["nombre"];
			$fech =  date("Y-m-d");;
			$tra =$_SESSION["id"];
			$trab = $id ;
			$nit =$_POST["Carpetas"]["nit"];

			
  

			$carpetas = new Carpetas();
	
			//$equipos->findBydocument($documento);
			$guardo = $carpetas->save($nom,$fech,$tra,$trab);
			if ($guardo){
					//$_SESSION["documento"]=$doc;

				$trabajos = new Trabajos();
				$trabajos->findByPk($trab);
				$tip = $trabajos->id_trabajos;

				$clientes = new Clientes();
				$clientes->findByDocument($nit);
				$nit = $clientes->nit;

				   

				 mkdir(__DIR__."/../documentos/".$nit."/".$tip."/".$guardo, 0777, true);

					header("Location: index.php?c=carpetas&a=admin&id=".$id."&nit=".$nit);
				}else{
					header("Location: index.php?c=carpetas&a=admin&error=true&id=".$id);

				}
			}else
				require "vistas/carpetas/admin.php";
		}

	 	private function admin(){

	
	 	 		$id =$_GET["id"];
		 		$nit =$_GET["nit"];
		 		$trabajos = new Trabajos();
		 		$trabajos->findByPk($id);


		 		$car =  new Carpetas();
		 		$carpetas = $car->admin($id);
	 

			require"vistas/carpetas/admin.php ";

	 	}




	 }


	 ?>