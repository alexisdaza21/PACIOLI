<?php 
require_once("Conexion.php");

class Visitas extends Conexion{ 

	public $id_visitas;
	public $fechaHora;
	public $costo;
	public $tipo;
	public $id_trabajos;
			


	public function __construct(){
	
		parent::__construct();
	}

	public function save($fecH,$cos,$tip,$idT){

		$this->fechaHora = $fecH;
		$this->costo = $cos; 
		$this->tipo = $tip; 
		$this->id_trabajos = $idT; 

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO visitas VALUES (:id_visitas,:fechaHora,:costo,:tipo, :id_trabajos)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}


		public function trabajos($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM visitas WHERE id_trabajos = :id ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Visitas');
		$stm->bindParam(":id",$id);
		$visitas = array();	
		$stm->execute();
			
			while ($obj = $stm->fetch()) {
				$visitas[]=$obj;


			}
			
			return $visitas;
}
		public function admin(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM visitas ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Visitas');
		$visitas = array();	
		$stm->execute();
			
			while ($obj = $stm->fetch()) {
				$visitas[]=$obj;


			}
			
			return $visitas;
}

	public function update(){
		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE visitas SET fechaHora = :fechaHora, costo = :costo, tipo = :tipo, id_trabajos = :id_trabajos  WHERE id_visitas = :id");
		 
		 $stm->bindParam(":fechaHora",$this->fechaHora);
		  $stm->bindParam(":costo",$this->costo);
		   $stm->bindParam(":tipo",$this->tipo);
		    $stm->bindParam(":tipo",$this->tipo);
		     $stm->bindParam(":id_trabajos",$this->id_trabajos);

		 $stm->bindParam(":id",$this->id_visitas);
		 $stm->execute();
	}
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM visitas WHERE id_visitas = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);
		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM visitas WHERE id_visitas = :id");
		$stm->bindParam(":id",$id);
		$stm->execute();
}
}
 ?>