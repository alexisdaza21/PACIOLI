           <?php 
//clase
require_once("modelos/Tareas.php");
require_once("modelos/Trabajadores.php");

class carpetasController{
	public static function main ($action){
		$_this = new carpetasController();
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

		require"vistas/carpetas/crear.php";

		
	}
	
	private function create(){
		if(isset($_POST["Tareas"])){

			
			//guardar en la BBDD
			$nomtar = $_POST["Tareas"]["nombreTarea"];
			$fechin = $_POST["Tareas"]["fechaInicio"];
			$fefin = $_POST["Tareas"]["fechaFin"];
			$est = "activa";
			$trab = $_POST["Tareas"]["id_trabajadores"];
			
			$tareas = new Tareas();
			
			
			$guardo = $tareas->save($nomtar,$fechin,$fefin,$est,$trab);
			if ($guardo){
					header("Location:index.php?c=tareas&a=admin");
				}else{
					
					header("Location: index.php?c=tareas&a=admin&error=true");
				}
			}else

		

				require "Vistas/tareas/admin.php";
		}
		private function update(){
		$tareas = new Tareas();
		$tareas->findByPk($_GET["id"]);




		if(isset($_POST["Tareas"])){
			$tareas->nombreTarea = $_POST["Tareas"]["nombreTarea"];
			$tareas->fechaInicio = $_POST["Tareas"]["fechaInicio"];
			$tareas->fechaFin = $_POST["Tareas"]["fechaFin"];
			$tareas->estado = $_POST["Tareas"]["estado"];
			$tareas->id_trabajadores = $_POST["Tareas"]["id_trabajadores"];
			
			$tareas->update();
			header("Location: index.php?c=tareas&a=admin");
		}else{

			$trab = new Trabajadores();
			$trabajadores = $trab->view();
			require "Vistas/tareas/update.php";
		}
	}	
		
	 private function delete(){
        $tareas = new Tareas();
        if(isset($_GET["id"])){
            $tareas->delete($_GET["id"]);

            header("Location: index.php?c=tareas&a=admin");
        }

		}
}

 ?>