<?php 
require_once("Modelos/Trabajadores.php");
require_once("Modelos/Clientes.php");
	class homecontroller{
		public static function main($action){
	        $_this = new homeController();
			switch ($action) {
				case "home":
					$_this->home();
					break;
				case "login":
				    $_this->login();
				    break;	
   				case "cliente":
				    $_this->cliente();
			    break;	
				case "logout":
					$_this->logout();
					break;
				case "index":
					$_this->index();
					break;	
				default:
				    throw new Exception("Accion no definida");	
				
			}
		}
		private function index(){
			
			require "Vistas/home/index.php";
		}	
		private function home(){
			
			require "Vistas/home/home.php";
		}
		private function login(){			
		
			if (isset($_POST["login"])) {
				$documento = $_POST["login"]["documento"];
				$pass = $_POST["login"]["pass"];

				$trabajadores = new Trabajadores();
				$trabajadores->findByDocument($documento);
				if (password_verify( $pass,$trabajadores->pass)) {
					$_SESSION["u"]= $trabajadores;
					$_SESSION["id"]= $trabajadores->id_trabajadores;
					$_SESSION["tipo"] = $trabajadores->tipo;
					$_SESSION["sesion"] = "trabajador";
					//$_SESSION["Perfil"]="Administrador";
					if ($_SESSION["tipo"]!="Administrador" ) {
						header("location:index.php?c=home&a=home");
					}else
					header("location:index.php?c=home&a=home");
				}else{
					header("location:index.php?$c=home&a=login&error=true");
				}
			}
			require "Vistas/home/login.php";
		}
			private function cliente(){

			if (isset($_POST["Cliente"])) {
				$nit = $_POST["Cliente"]["nit"];
				$pass = $_POST["Cliente"]["pass"];

				$cliente = new Clientes();
				$cliente->findByDocument($nit);
				if (password_verify( $pass,$cliente->pass)) {
					$_SESSION["u"]= $cliente;
					$_SESSION["id"]= $cliente->id_clientes;
					$_SESSION["sesion"] = "cliente";
					//$_SESSION["Perfil"]="Administrador";
					if ($_SESSION["id"]!="Administrador" ) {
						header("location:index.php?c=home&a=home");
					}else
					header("location:index.php?c=home&a=home");
				}else{
					header("location:index.php?$c=home&a=cliente&error=true");
				}
			}
			require "Vistas/home/cliente.php";
		}
		private function logout(){
			session_destroy();
			header("location:index.php?$c=home&a=index");
		}
	}
 ?> 