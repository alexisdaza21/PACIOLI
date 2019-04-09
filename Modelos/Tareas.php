<?php 

require_once("Conexion.php");
require_once("Trabajadores.php");
require_once("Clientes.php");
require_once("Trabajos.php");
class Tareas extends Conexion{ 

	public $id_tareas;
	public $nombreTarea;
	public $fechaInicio;
	public $fechaFin;
	public $estado;
	public $id_trabajadores;
	public $id_clientes;
	public $id_trabajos;
	public function __construct(){
	
		parent::__construct();
	}
	public function save($nomtar, $fechin, $fefin, $est, $trab, $clien , $tra){

	$this->nombreTarea= $nomtar;
	$this->fechaInicio = $fechin;
	$this->fechaFin = $fefin;
	$this->estado = $est;
	$this->id_trabajadores = $trab;
	$this->id_clientes = $clien;
	$this->id_trabajos = $tra;

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO tareas VALUES (:id_tareas,:nombreTarea,:fechaInicio,:fechaFin, :estado, :id_trabajadores, :id_clientes, :id_trabajos)");
		try {

				return $stm->execute((array) $this);
		} 

			catch (Exception $e) {
			
		}

		
	}
		
	public function update(){ 

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE tareas SET nombreTarea = :nombreTarea ,fechaInicio = :fechaInicio,fechaFin = :fechaFin, estado = :estado, id_trabajadores = :id_trabajadores, id_clientes = :id_clientes, id_trabajos = :id_trabajos WHERE id_tareas= :id");
		 
	
		 $stm->bindParam(":nombreTarea",$this->nombreTarea);
		 $stm->bindParam(":fechaInicio",$this->fechaInicio);
		 $stm->bindParam(":fechaFin",$this->fechaFin);
		 $stm->bindParam(":estado",$this->estado);
		 $stm->bindParam(":id_trabajadores",$this->id_trabajadores);
		 $stm->bindParam(":id_clientes",$this->id_clientes);
		 $stm->bindParam(":id_trabajos",$this->id_trabajos);
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

				$clien = new Clientes();
				$clien->findByPk($obj->id_clientes);
				$obj->Clien = $clien;

				$traba = new Trabajos();
				$traba->findByPk($obj->id_trabajos);
				$obj->Trabajo = $traba;

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

public function adminClien($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM tareas WHERE id_clientes = :id");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Tareas');
			$stm->bindParam(":id",$id);
		$tareas = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				$clien = new Clientes();
				$clien->findByPk($obj->id_clientes);
				$obj->Clien = $clien;

				$tareas[]=$obj;
			}
			
			return $tareas;

	}

public function adminTrab($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM tareas WHERE id_trabajos = :id");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Tareas');
			$stm->bindParam(":id",$id);
		$tareas = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				$traba = new Trabajos();
				$traba->findByPk($obj->id_trabajos);
				$obj->Trabajo = $traba;

				$tareas[]=$obj;
			}
			
			return $tareas;

	}
}


 ?>
