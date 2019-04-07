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
			$trabajo = $_POST["Archivos"]["trabajo"];
			$nit =$_POST["Archivos"]["nit"];
			$carpeta =$_POST["Archivos"]["carpeta"];


		  	$archivo = basename($_FILES["archivo"]['name']);
				if (($archivo == !NULL) )  
					{
						      // Ruta donde se guardarán las imágenes que subamos
		     		 $directorio = $_SERVER['DOCUMENT_ROOT']
		     	 .'/pacioli/documentos/'.$nit.'/'.$trabajo.'/'.$carpeta.'/';
		      // Muevo la Imagen desde el directorio temporal a nuestra ruta indicada anteriormente
		    	  move_uploaded_file($_FILES['archivo']['tmp_name'],$directorio.$archivo);
		  			}
		  		
		  	$nom =  $archivo;
			$fech =  date("Y-m-d\TH:i:s");
			$car = $carpeta;

			$archivos = new Archivos();
	
			//$equipos->findBydocument($documento);
			$guardo = $archivos->save($fech,$nom,$car);
			if ($guardo){
					//$_SESSION["documento"]=$doc;

			

				$trabajos = new Trabajos();
				$trabajos->findByPk($trabajo);
				$id = $trabajos->id_trabajos;

				$clientes = new Clientes();
				$clientes->findByDocument($nit);
				$nit = $clientes->nit;

				$carpetas = new Carpetas();
				$carpetas->findByPk($carpeta);
				$carpeta = $carpetas->id_carpetas;
				 
				 //mkdir(__DIR__."/../documentos/".$nit."/".$tip."/".$nom, 0777, true);

					header("Location: index.php?c=archivos&a=admin&id=".$id."&nit=".$nit."&carpeta=".$carpeta);
				}else{
					header("Location: index.php?c=archivos&a=admin&id=".$id."&nit=".$nit."&carpeta=".$carpeta);

				}
			}else
			
			require"vistas/archivos/admin.php ";
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