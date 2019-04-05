<?php 
	 require_once("Modelos/Trabajos.php");
	  require_once("Modelos/carpetas.php");
	   require_once("Modelos/Clientes.php");
	    require_once("Modelos/archivos.php");


	 class archivosController{

	 	public static function main ($action){
	 		$_this = new archivosController();
	 		switch ($action) {
	 			case 'admin':
	 				$_this->admin();
	 				break;
	 			case 'create':
	 				$_this->create();
	 				break;
	 			
	 			default:
	 				throw new Exception("Accion no definido");
	 				break;
	 		}
	 	}
	private function create(){

		if(isset($_POST["Archivos"])){
			
			//guardar en la BBDD
			$id = $_POST["Carpetas"]["id"];
			$nom =  $_POST["Archivos"]["nombre"];
			$fech =  date("Y-m-d");;
			$tra =$_SESSION["id"];
			$trab = $id ;
			$nit =$_POST["Carpetas"]["nit"];

			


			$carpetas = new Carpetas();
	
			//$equipos->findBydocument($documento);
			$guardo = $carpetas->save($nom,$fech,$tra,$trab);
			if ($guardo){
					//$_SESSION["documento"]=$doc;

			

			//	$trabajos = new Trabajos();
			//	$trabajos->findByPk($trab);
			//	$tip = $trabajos->tipo;

			//	$clientes = new Clientes();
			//	$clientes->findByDocument($nit);
			//	$nit = $clientes->nit;

				   

				 mkdir(__DIR__."/../documentos/".$nit."/".$tip."/".$nom, 0777, true);

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
	 		$carpeta =$_GET["carpeta"];
	 		$trabajos = new Trabajos();
	 		$trabajos->findByPk($id);


	 		$arc =  new Archivos();
	 		$archivos = $arc->admin($carpeta);


			require"vistas/archivos/admin.php ";

	 	}




	 }


	 ?>