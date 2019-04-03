<?php 
	require_once("Modelos/citas.php");
	
	class citasController{
		public static function main($action){
	        $_this = new citasController();
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
			default:
				throw new Exception("Accion no definido");
				break;
			}
		}
			

	private function admin (){
		
		$cit = new Citas();
		$citas = $cit->admin();

		$cale = new Citas();
		$calendario = $cale->admin();

		$fecha =  date("Y-m-d\TH:i:s");

		require"vistas/citas/admin.php";
	}

	private function create(){

		if(isset($_POST["Citas"])){
			
			//guardar en la BBDD
			$fecH =  $_POST["Citas"]["fechaHora"];
			$car = $_POST["Citas"]["caracteristicas"];
			$est = "activa";

			$citas = new Citas();
	
			//$equipos->findBydocument($documento);
			$guardo = $citas->save($fecH,$car,$est);
			if ($guardo){
					//$_SESSION["documento"]=$doc;
					header("Location: index.php?c=citas&a=admin");
				}else{
					header("Location: index.php?c=citas&a=admin&error=true");

				}
			}else
				require "vistas/citas/admin.php";
		}
		private function update(){
			$fecha =  date("Y-m-d\TH:i:s");

		$citas = new Citas();

		$citas->findByPk($_GET["id"]);
		if(isset($_POST["Citas"])){
			$citas->fechaHora = $_POST["Citas"]["fechaHora"];
			$citas->caracteristicas = $_POST["Citas"]["caracteristicas"];
			$citas->estado = $_POST["Citas"]["estado"];

 
			$citas->update();
			header("Location: index.php?c=citas&a=admin");
		}else{
			require "vistas/citas/update.php";
		}
	}
		private function delete(){
			$citas = new Citas();
       
        if(isset($_GET["id"])){
            $citas->delete($_GET["id"]);
            header("Location: index.php?c=citas&a=admin");
        }else{
            header("Location: index.php?c=citas&a=admin");
        }
	}
		
}
 ?> 