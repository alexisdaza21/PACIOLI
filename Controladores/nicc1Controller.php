<?php 
	 require_once("Modelos/Trabajos.php");
	  require_once("Modelos/carpetas.php");
	   require_once("Modelos/Clientes.php");
	    require_once("Modelos/nicc1.php");


	 class nicc1Controller{

	 	public static function main ($action){
	 		$_this = new nicc1Controller();
	 		switch ($action) {
	 			case 'admin':
	 				$_this->admin();
	 				break;
	 			case 'create':
	 				$_this->create();
	 				break;
	 			case 'delete':
	 				$_this->delete();
	 				break;
	 			default:
	 				throw new Exception("Accion no definido");
	 				break;
	 		}
	 	}
	 			
	 	private function delete(){

			$nicc	= new Nicc1();
			if(isset($_GET["id"])){
			$nicc->delete($_GET["id"]); 
				
			header("Location: index.php?c=nicc1&a=admin");
			}

		}
		
	private function create(){

		if(isset($_POST["Nicc"])){
			
			//guardar en la BBDD
		  	$archivo = basename($_FILES["archivo"]['name']);
				if (($archivo == !NULL) )  
					{
						      // Ruta donde se guardarán las imágenes que subamos
		     		 $directorio = $_SERVER['DOCUMENT_ROOT']
		     	 .'/pacioli/documentos/';
		      // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		    	  move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio.$archivo);
		  			}
		  	
		  	$arc = $archivo;
		  	$nom =  $_POST["Nicc"]["nombre"];
			$des =  $_POST["Nicc"]["descripcion"];
			

			$nicc = new Nicc1();
	
			//$equipos->findBydocument($documento);
			$guardo = $nicc->save($arc,$nom,$des);
			if ($guardo){
				 
				 //mkdir(__DIR__."/../documentos/".$nit."/".$tip."/".$nom, 0777, true);

					header("Location: index.php?c=nicc1&a=admin");
				}else{
					header("Location: index.php?c=nicc1&a=admin&error=true");

				}
			}else
			
			require"vistas/archivos/admin.php ";
		}

	 	private function admin(){

	 		$ni =  new Nicc1();
	 		$nicc = $ni->admin();


			require"vistas/nicc1/admin.php ";

	 	}




	 }


	 ?>