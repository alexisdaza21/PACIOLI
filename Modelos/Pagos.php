<?php 

require_once("Conexion.php");

class Pagos extends Conexion{ 

	public $id_pagos;
	public $fecha;
	public $valor;
	public $id_trabajos;

	public function __construct(){
	
		parent::__construct();
	}
	public function save($fec,$val,$tra){

	$this->fecha = $fec;
	$this->valor = $val;
	$this->id_trabajos = $tra;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO pagos VALUES (:id_pagos,:fecha,:valor,:id_trabajos)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
		
	public function update(){

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE pagos SET fecha = :fecha,valor = :valor,id_trabajos = :id_trabajos WHERE id_pagos= :id");
		 
	
		 $stm->bindParam(":fecha",$this->fecha);
		 $stm->bindParam(":valor",$this->valor);
		 $stm->bindParam(":id_trabajos",$this->id_trabajos);
		
		 $stm->bindParam(":id",$this->id_pagos);

		 $stm->execute();
	}
		
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM pagos WHERE id_pagos = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM pagos WHERE id_pagos = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

}



		public function admin(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM pagos ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Pagos');
		$pagos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$pagos[]=$obj;
			}
			
			return $pagos;

}
}


 ?>
