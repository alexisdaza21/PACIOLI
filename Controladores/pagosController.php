<?php 
//clase
require_once("Modelos/Pagos.php");

class pagosController{
	public static function main ($action){
		$_this = new pagosController();
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
			case "pass":
				$_this->pass();
			break;
			
			default:
				throw new Exception("Accion no definido");
				break;
		}
	} 

	private function admin (){
		$pag = new Pagos();
		$pagos = $pag->admin();


		require"Vistas/pagos/admin.php";
	}
	
	private function create(){

			

		if(isset($_POST["Pagos"])){

			
			//guardar en la BBDD
			$fec = $_POST["Pagos"]["fecha"];
			$val = $_POST["Pagos"]["valor"];
			$tra = $_POST["Pagos"]["id_trabajos"];
			$id = $_POST["Pagos"]["id_trabajos"];
			$pagos = new Pagos();
			
			
			$guardo = $pagos->save($fec,$val,$tra);
			if ($guardo){
				$id = $_POST["Pagos"]["id_trabajos"];
					header("Location:index.php?c=trabajos&a=pagos&id=".$id);
				}else{
					
					header("Location: index.php?c=pagos&a=admin&error=true&id=".$id);
				}
			}else
				require "Vistas/pagos/admin.php";
		}
		private function update(){
		$pagos = new Pagos();
		$pagos->findByPk($_GET["up"]);
		$id = $_GET["id"];
		if(isset($_POST["Pagos"])){
			$id = $_POST["Pagos"]["id_trabajos"];
			$pagos->fecha = $_POST["Pagos"]["fecha"];
			$pagos->valor = $_POST["Pagos"]["valor"];
			$pagos->id_trabajos = $_POST["Pagos"]["id_trabajos"];
			
			$pagos->update();
		header("Location:index.php?c=trabajos&a=pagos&id=".$id);
		}else{
			require "Vistas/pagos/update.php";
		}
	}	
		
	 private function delete(){
        $pagos = new Pagos();
        $id = $_GET["id"];
        if(isset($_GET["de"])){
            $pagos->delete($_GET["de"]);

            header("Location:index.php?c=trabajos&a=pagos&id=".$id);
        }

		}
}

 ?>