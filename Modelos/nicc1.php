<?php 
require_once("Conexion.php");

class Nicc1 extends Conexion{ 

	public $id_nicc1;
	public $archivo;
	public $nombre;
	public $descripcion;


	public function __construct(){
	
		parent::__construct();


	}


	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM nicc1 WHERE id_nicc1 = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}

		public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM nicc1 WHERE id_nicc1 = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

		}

		public function save($arc,$nom,$des){

	$this->archivo = $arc;
	$this->nombre = $nom;
	$this->descripcion = $des;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO nicc1 VALUES (:id_nicc1,:archivo,:nombre,:descripcion)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
	public function admin(){

		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM nicc1 ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Nicc1');
		$nicc1 = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$nicc1[]=$obj;
			}
			
			return $nicc1;

}


}


?>