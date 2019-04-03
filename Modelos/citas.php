<?php 
require_once("Conexion.php");

class Citas extends Conexion{ 

	public $id_citas;
	public $fechaHora;
	public $caracteristicas;
	public $estado;
			

 
	public function __construct(){
	
		parent::__construct();
	}

	public function save($fecH,$car,$est){

		$this->fechaHora = $fecH;
		$this->caracteristicas = $car; 
		$this->estado = $est; 


		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO citas VALUES (:id_citas,:fechaHora,:caracteristicas,:estado)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
		public function admin(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM citas ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Citas');
		$citas = array();	
		$stm->execute();
			
			while ($obj = $stm->fetch()) {
				$citas[]=$obj;


			}
			
			return $citas;
}

	public function update(){
		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE citas SET fechaHora = :fechaHora, caracteristicas = :caracteristicas, estado = :estado WHERE id_citas = :id");
		 
		 $stm->bindParam(":fechaHora",$this->fechaHora);
		  $stm->bindParam(":caracteristicas",$this->caracteristicas);
		   $stm->bindParam(":estado",$this->estado);

		 $stm->bindParam(":id",$this->id_citas);
		 $stm->execute();
	}
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM citas WHERE id_citas = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);
		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM citas WHERE id_citas = :id");
		$stm->bindParam(":id",$id);
		$stm->execute();
}
}
 ?>