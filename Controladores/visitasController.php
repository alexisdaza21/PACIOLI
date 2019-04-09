<?php 
	require_once("Modelos/visitas.php");
	require_once("Modelos/Trabajos.php");
	require_once("Modelos/Clientes.php");
	
	class visitasController{
		public static function main($action){
	        $_this = new visitasController();
		switch ($action) {
			case 'create':
				$_this->create();
				break;
			case 'delete':
				$_this->delete();
				break; 
			case 'update':
				$_this->update();
				break;
			case "admin":
				$_this->admin();
			break;
			case "trabajos":
				$_this->trabajos();
			break;		
			case "createTra":
				$_this->createTra();
			break;
			case "reporte":
				$_this->reporte();
			break;		
			default:
				throw new Exception("Accion no definido");
				break;
			}
		}
		private function reporte(){
		$id = $_GET["id"]; 


			require"Vistas/visitas/pdf/index.php";
		}
		

		private function trabajos (){
		
 		$id = $_GET["id"]; 
 		$nit = $_GET["nit"]; 

		$vis = new Visitas();
		$visitas = $vis->trabajos($id);

		$trabajos = new Trabajos();
		$trabajos->findByPk($id);
		
		$client = new Clientes();
		$client->findByDocument($nit);

		$fecha =  date("Y-m-d");
		require"vistas/visitas/trabajosAdmin.php";
	}
			

	private function admin (){
		$id = $_GET["id"]; 
 		$nit = $_GET["nit"]; 

		$vis = new Visitas();
		$visitas = $vis->trabajos($id);

		$trabajos = new Trabajos();
		$trabajos->findByPk($id);
		
		$client = new Clientes();
		$client->findByDocument($nit);

		$fecha =  date("Y-m-d");
		require"vistas/visitas/trabajos.php";
	}
		private function createTra(){

		if(isset($_POST["Visitas"])){
			
			//guardar en la BBDD
			$fecH =  $_POST["Visitas"]["fecha"];
			if ( $_POST["Visitas"]["costo"] =="") {
				$cos =0;
			} else{
				$cos = $_POST["Visitas"]["costo"];
			}
			
			$tip =  $_POST["Visitas"]["tipo"];
			$id = $_POST["Visitas"]["id_trabajos"];
			$idT =$_POST["Visitas"]["id_trabajos"];


			$visitas = new Visitas();
	
			//$equipos->findBydocument($documento);
			$guardo = $visitas->save($fecH,$cos,$tip,$id);
			if ($guardo){
					
				$trabajos = new Trabajos();
				$trabajos->findByPk($_POST["Visitas"]["id_trabajos"]);
				$tipo = $trabajos->tipo;
				
				$clientes = new Clientes();
				$clientes->findByDocument($nit);
				$nit = $clientes->nit;

				// mkdir(__DIR__."/../documentos/".$nit."/".$tipo."/".$guardo, 0777, true);
					header("Location: index.php?c=visitas&a=admin&id=".$id."&nit=".$nit);

				}else{
					header("Location: index.php?c=visitas&a=admin&error=true&id=".$id);

				}
			}else
				require "vistas/visitas/trabajos.php";
		}

	private function create(){

		if(isset($_POST["Visitas"])){
			
			//guardar en la BBDD
			$fecH =  $_POST["Visitas"]["fechaHora"];
			$cos = $_POST["Visitas"]["costo"];
			$tip =  $_POST["Visitas"]["tipo"];
			$idT = $_POST["Visitas"]["id_trabajos"];


			$visitas = new Visitas();
	
			//$equipos->findBydocument($documento);
			$guardo = $visitas->save($fecH,$cos,$tip,$idT);
			if ($guardo){
					//$_SESSION["documento"]=$doc;
					header("Location: index.php?c=visitas&a=trabajos");
				}else{
					header("Location: index.php?c=visitas&a=trabajos&error=true");

				}
			}else
				require "vistas/visitas/trabajosAdmin.php";
		}
		private function update(){

		$visitas = new Visitas();

		$visitas->findByPk($_GET["id"]);
		if(isset($_POST["Visitas"])){
			$visitas->fecha= $_POST["Visitas"]["fecha"];
			$visitas->tipo = $_POST["Visitas"]["tipo"];
			$visitas->id_trabajos = $_POST["Visitas"]["id_trabajos"];
			$visitas->costo = $_POST["Visitas"]["costo"];
			
			$visitas->update();
			header("Location: index.php?c=visitas&a=admin");
		}else{
			require "vistas/visitas/update.php";
		}
	}
		private function delete(){
			
			$visitas = new Visitas();

        if(isset($_GET["de"])){

        	if(isset($_GET["id"])){
        		$id = $_GET["id"];
          		 $visitas->delete($_GET["de"]);
          		 header("Location: index.php?c=visitas&a=trabajos&id=".$id."&nit=".$nit);
          	}else{
          	 $visitas->delete($_GET["de"]);
          	 header("Location: index.php?c=visitas&a=admin");
          	}
            
        }else{
            header("Location: index.php?c=visitas&a=admin&error=true");
        }
	}
		
}
 ?> 