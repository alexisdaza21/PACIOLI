<?php 

//clase
require_once("Modelos/Trabajadores.php");

	class trabajadoresController{
		public static function main ($action){
			$_this = new trabajadoresController();
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
				case 'view':
					$_this->view();
					break;
				case "admin":
					$_this->admin();
					break;
				case "pass":
				$_this->pass();
				break;
				
				case "foto":
				 $_this->foto();
				break;

				case "documento":
				 $_this->documento();
				break;	
				case "perfil":
				 $_this->perfil();
				break;
				case "telefono":
				 $_this->telefono();
				break;
				
				default:
					throw new Exception("Accion no definido");
					break;
			}
		}

				private function telefono(){
			
			if(isset($_POST["trabajadores"])){

$id =  $_POST["trabajadores"]["id"];
			$trabajador = new trabajadores();	
			
			
			$trabajador	->findByPk($id);	
			$trabajador->telefono = $_POST["trabajadores"]["telefono"];
					
			$trabajador->telefono();
			header("Location: index.php?c=trabajadores&a=perfil");
			}else{
			require "vistas/trabajadores/perfil.php";
			}
		}

		private function perfil (){

			$trabajador = new trabajadores();

				$id =  $_SESSION["u"]->id_trabajadores;
			$trabajador->findByPk($id);


			require"vistas/trabajadores/perfil.php";
		}

		private function create(){
			if(isset($_POST["trabajadores"])){
				//guardar en la BBDD

				$nombre_img = basename($_FILES["imagen"]['name']);
							if (($nombre_img == !NULL) )   
				{
						      // Ruta donde se guardarán las imágenes que subamos
		     	 $directorio = $_SERVER['DOCUMENT_ROOT'].'/git/pacioli/fotos/';
		     	 // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada 	anteriormente
		     	 move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
				  }

		 	 	if (isset($_POST ["trabajadores"])) {
		  	# code...

		  		$nombre_doc = basename($_FILES["documento"]['name']);
							if (($nombre_doc == !NULL) ) 
				{
						      // Ruta donde se guardarán las imágenes que subamos
		     	 $directorio = $_SERVER['DOCUMENT_ROOT'].'/git/pacioli/documentos/';
		      // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		    	  move_uploaded_file($_FILES['documento']['tmp_name'],$directorio.$nombre_doc);
		  			}
		  		}

				$nom = $_POST["trabajadores"]["nombres"];
				$ape = $_POST["trabajadores"]["apellidos"];
				$doc = $_POST["trabajadores"]["documento"];
				$fecnac = $_POST["trabajadores"]["fechaNacimiento"];
				$tel = $_POST["trabajadores"]["telefono"];
				$foto = $nombre_img;	
				$perprof = $_POST["trabajadores"]["perfilPro"];
				$fechaingreso = $_POST["trabajadores"]["fechaIngreso"];
				$hojavida = $nombre_doc;
				$pass = $_POST["trabajadores"]["pass"];
				$tipo = $_POST["trabajadores"]["tipo"];

						
				$trabajadores = new trabajadores();
				$encrip = password_hash($pass, PASSWORD_DEFAULT);
				$guardo = $trabajadores->save($nom,$ape,$doc,$fecnac,$tel,$foto,$perprof,$fechaingreso,$hojavida, $encrip, $tipo); 
				if($guardo){
					header("Location: index.php?c=trabajadores&a=admin");
				}else{
					header("Location: index.php?c=trabajadores&a=admin&error=true");
				}
			}else

			require "vistas/trabajadores/admin.php";
		}
		private function admin (){
			//consultamos listado de la BBDD
			$trabajador = new trabajadores	();
			$trabajadores = $trabajador->view();

			require"vistas/trabajadores/admin.php";
		}

		private function foto(){

			$trabajador = new trabajadores();
			$trabajador->findByPk($_GET["id"]);


			if(isset($_FILES["imagen"])){
				//guardar en la BBDD
				
				$nombre_img = basename($_FILES["imagen"]['name']);
							if (($nombre_img == !NULL) ) 
				{
						      // Ruta donde se guardarán las imágenes que subamos
		     	 $directorio = $_SERVER['DOCUMENT_ROOT'].'/git/pacioli/fotos/';
		     	 // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada 	anteriormente
		     	 move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);
				  }
	 	 	
			$trabajador->foto = $nombre_img;

			$trabajador->foto();
			if(isset($_FILES["imagen"])){

			header("Location: index.php?c=trabajadores&a=perfil");
				}else{
					header("Location: index.php?c=trabajadores&a=admin");
				}

			}else{
				require "vistas/trabajadores/foto.php";

			}
		
		}
		
		private function documento(){

			$trabajador = new trabajadores();
			$trabajador->findByPk($_GET["id"]);


			if(isset($_FILES["documento"])){
				//guardar en la BBDD
				
				$nombre_doc = basename($_FILES["documento"]['name']);
							if (($nombre_doc == !NULL) ) 
				{
						      // Ruta donde se guardarán las imágenes que subamos
		     	 $directorio = $_SERVER['DOCUMENT_ROOT'].'/pacioli/documentos/';
		     	 // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada 	anteriormente
		     	 move_uploaded_file($_FILES['documento']['tmp_name'],$directorio.$nombre_doc);
				  }
	 	 	
			$trabajador->hojaVida = $nombre_doc;

			$trabajador->hojaVida();

			header("Location: index.php?c=trabajadores&a=admin");
				# code...
			}else{
				require "vistas/trabajadores/documento.php";

			}
				
		}
		
		private function pass(){
			$trabajador = new trabajadores();
			$trabajador->findByPk($_GET["id"]);

			if (isset($_POST["trabajadores"])) {

				$pass = $_POST["trabajadores"]["pass"];
				$BCRYPT = password_hash($pass, PASSWORD_DEFAULT);
				$trabajador->pass = $BCRYPT;

				$trabajador->pass();
				header("Location: index.php?c=trabajadores&a=admin&pass=true");
				# code...
			}else{
				require "vistas/trabajadores/admin.php";
			}
		}
		private function update(){
			$trabajador = new trabajadores();
			$trabajador	->findByPk($_GET["id"]);

			if(isset($_POST["trabajadores"])){
			


			$trabajador->nombres = $_POST["trabajadores"]["nombres"];
			$trabajador->apellidos = $_POST["trabajadores"]["apellidos"];
			$trabajador->documento	= $_POST["trabajadores"]["documento"];
			$trabajador->fechaNacimiento = $_POST["trabajadores"]["fechaNacimiento"];
			$trabajador->telefono = $_POST["trabajadores"]["telefono"];
			$trabajador->perfilPro = $_POST["trabajadores"]["perfilPro"];
			$trabajador->fechaIngreso = $_POST["trabajadores"]["fechaIngreso"];
			$trabajador->tipo = $_POST["trabajadores"]["tipo"];	

							
			$trabajador->update();
			header("Location: index.php?c=trabajadores&a=admin");
			}else{
			require "vistas/trabajadores/update.php";
			}
		}


		private function delete(){
			$trabajador	= new Trabajadores();
			if(isset($_GET["id"])){
			$trabajador->delete($_GET["id"]); 
				
			header("Location: index.php?c=trabajadores&a=admin");
			}

		}

	}
?>



