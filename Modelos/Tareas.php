<?php 

require_once("Conexion.php");
require_once("Trabajadores.php");

class Tareas extends Conexion{ 

	public $id_tareas;
	public $nombreTarea;
	public $fechaInicio;
	public $fechaFin;
	public $estado;
	public $id_trabajadores;

	public function __construct(){
	
		parent::__construct();
	}
	public function save($nomtar, $fechin, $fefin, $est, $trab){

	$this->nombreTarea= $nomtar;
	$this->fechaInicio = $fechin;
	$this->fechaFin = $fefin;
	$this->estado = $est;
	$this->id_trabajadores = $trab;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO tareas VALUES (:id_tareas,:nombreTarea,:fechaInicio,:fechaFin, :estado, :id_trabajadores)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
		
	public function update(){ 

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE tareas SET nombreTarea = :nombreTarea ,fechaInicio = :fechaInicio,fechaFin = :fechaFin, estado = :estado, id_trabajadores = :id_trabajadores WHERE id_tareas= :id");
		 
	
		 $stm->bindParam(":nombreTarea",$this->nombreTarea);
		 $stm->bindParam(":fechaInicio",$this->fechaInicio);
		 $stm->bindParam(":fechaFin",$this->fechaFin);
		 $stm->bindParam(":estado",$this->estado);
		 $stm->bindParam(":id_trabajadores",$this->id_trabajadores);
		
		 $stm->bindParam(":id",$this->id_tareas);

		 $stm->execute();
	}
		
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM tareas WHERE id_tareas = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM tareas WHERE id_tareas = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

}



		public function admin(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM tareas");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Tareas');
		$tareas = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;

				$tareas[]=$obj;
			}
			
			return $tareas;

}


		public function adminTra($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM tareas WHERE id_trabajadores = :id");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Tareas');
			$stm->bindParam(":id",$id);
		$tareas = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;

				$tareas[]=$obj;
			}
			
			return $tareas;

}
}


 ?>
