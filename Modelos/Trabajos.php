<?php 

require_once("Conexion.php");
require_once("Trabajadores.php");
class Trabajos extends Conexion{ 

	public $id_trabajos;
	public $fechaInicio;
	public $tipo;
	public $id_trabajadores;
	public $id_clientes;

	public function __construct(){
	
		parent::__construct();
	}
	public function save($feIni,$tip,$tra,$cli){

	$this->fechaInicio = $feIni;
	$this->tipo = $tip;
	$this->id_trabajadores = $tra;
	$this->id_clientes = $cli;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO trabajos VALUES (:id_trabajos,:fechaInicio,:tipo,:id_trabajadores,:id_clientes)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
		
	public function update(){

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE trabajos SET fechaInicio = :fechaInicio,tipo = :tipo,id_trabajadores = :id_trabajadores,id_clientes = :id_clientes WHERE id_trabajos= :id");
		 
	
		 $stm->bindParam(":fechaInicio",$this->fechaInicio);
		 $stm->bindParam(":tipo",$this->tipo);
		 $stm->bindParam(":id_trabajadores",$this->id_trabajadores);
		 $stm->bindParam(":id_clientes",$this->id_clientes);
		
		 $stm->bindParam(":id",$this->id_trabajos);

		 $stm->execute();
	}
		public function fkeyPagos($id){

		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM pagos where id_trabajos = :id ");
		$stm->bindParam(":id",$id);
		$stm->setFetchMode(PDO::FETCH_CLASS,'Trabajos');
		$trabajos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$trabajos[]=$obj;
			}
			
			return $trabajos;

}
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM trabajos WHERE id_trabajos = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM trabajos WHERE id_trabajos = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

}



		public function admin($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM trabajos  where id_trabajos = :id");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Trabajos');
		$stm->bindParam(":id",$id);
		$trabajos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;
				$cli = new Clientes();
				$cli->findByPk($obj->id_clientes);
				$obj->Clie = $cli;
				$trabajos[]=$obj;
			}
			
			return $trabajos;

}
public function admintra(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM trabajos ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Trabajos');
		$trabajos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;
				$cli = new Clientes();
				$cli->findByPk($obj->id_clientes);
				$obj->Clie = $cli;
				$trabajos[]=$obj;
			}
			
			return $trabajos;

}
}


 ?>
