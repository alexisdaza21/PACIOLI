<?php 
require_once("Conexion.php");
require_once("Modelos/Trabajadores.php");

class Carpetas extends Conexion{ 

	public $id_carpetas;
	public $nombre;
	public $fechaCre;
	public $id_trabajadores;
	public $id_trabajos;


	public function __construct(){
	
		parent::__construct();


	}
		public function save($nom,$fech,$tra,$trab){

	$this->nombre = $nom;
	$this->fechaCre = $fech;
	$this->id_trabajadores = $tra;
	$this->id_trabajos = $trab;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO carpetas VALUES (:id_carpetas,:nombre,:fechaCre,:id_trabajadores,:id_trabajos)");
		try{
			 $stm->execute((array) $this);
			  return $conexion->LastInsertId();
		}catch(Exception  $e){
			return false;
		}
		}
	public function admin($id){

		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM carpetas where id_trabajos = :id  ");
		$stm->bindParam(":id",$id);
		$stm->setFetchMode(PDO::FETCH_CLASS,'Carpetas');
		$carpetas = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;
				
				//$cli = new Trabjaos();
				//$cli->findByPk($obj->id_clientes);
				//$obj->Clie = $cli;
				$carpetas[]=$obj;
			}
			
			return $carpetas;

}


}


?>