<?php 
//clase 
require_once("Modelos/Clientes.php");
require_once("Modelos/Trabajos.php");
class clientesController{
	public static function main ($action){
		$_this = new clientesController();
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
			case "trabajos":
				$_this->trabajos();
			break;
			case "perfil":
				$_this->perfil();
			break;	
			case "carpetas":
				$_this->carpetas();
			break;
			default:
				throw new Exception("Accion no definido");
				break;
		}
	} 

			private function carpetas (){
		$clie = new Clientes();
		$clientes = $clie->admin();

			require"vistas/clientes/carpetas.php";
		}

		private function perfil (){

			$cliente = new Clientes();

				$id =  $_SESSION["u"]->id_clientes;
			$cliente->findByPk($id);


			require"vistas/clientes/perfil.php";
		}

private function trabajos (){
	
		$id =$_GET["id"];
		$tra = new Clientes();
		$trabajos =	$tra->fkeyTra($id);

		$clientes = new Clientes();
		$clientes->findByPk($id);

		$trab = new Trabajos();
		$trabajo = $trab->admin($id);
		$trab = new Trabajadores();
		$trabajadores = $trab->view();

		require"Vistas/trabajos/admin.php";

	}
	private function admin (){
		$clie = new Clientes();
		$clientes = $clie->admin();

		require"Vistas/clientes/admin.php";
	}
	
	private function pass(){
		$clientes = new Clientes();
		$clientes->findByPk($_GET["id"]);

		if(isset($_POST["Clientes"])){
			
			$pass =$_POST["Clientes"]["pass"];
			$BCRYPT = password_hash($pass, PASSWORD_DEFAULT);
			$clientes->pass = $BCRYPT;

			$clientes->pass();
			header("Location: index.php?c=clientes&a=admin&pass=true");
		}else{
			require "Vistas/clientes/admin.php";
		}
	}
	private function create(){
		if(isset($_POST["Clientes"])){

			
			//guardar en la BBDD
			$nit = $_POST["Clientes"]["nit"];
			$dir = $_POST["Clientes"]["direccion"];
			$raSo = $_POST["Clientes"]["razonSocial"];
			$ema = $_POST["Clientes"]["email"];
			$tel = $_POST["Clientes"]["telefono"];
			$pass = $_POST["Clientes"]["pass"];
			
			$clientes = new Clientes();
			$BCRYPT = password_hash($pass, PASSWORD_DEFAULT);
			
			$guardo = $clientes->save($nit,$dir,$raSo,$ema,$tel,$BCRYPT);
			if ($guardo){
					header("Location:index.php?c=clientes&a=admin");
				}else{
					
					header("Location: index.php?c=clientes&a=admin&error=true");
				}
			}else
				require "Vistas/clientes/admin.php";
		}
		private function update(){
		$clientes = new Clientes();
		$clientes->findByPk($_GET["id"]);

		if(isset($_POST["Clientes"])){
			$clientes->nit = $_POST["Clientes"]["nit"];
			$clientes->direccion = $_POST["Clientes"]["direccion"];
			$clientes->razonSocial = $_POST["Clientes"]["razonSocial"];
			$clientes->email = $_POST["Clientes"]["email"];
			$clientes->telefono = $_POST["Clientes"]["telefono"];
		
			
			$clientes->update();
			header("Location: index.php?c=clientes&a=admin");
		}else{
			require "Vistas/clientes/update.php";
		}
	}	
		
	 private function delete(){
        $clientes = new Clientes();
        if(isset($_GET["id"])){
            $clientes->delete($_GET["id"]);

            header("Location: index.php?c=clientes&a=admin");
        }

		}
}

 ?>