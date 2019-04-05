<?php 
require_once("Conexion.php");
require_once("Modelos/Trabajadores.php");

class Archivos extends Conexion{ 

	public $id_archivos;
	public $fechaHora;
	public $nombre;
	public $id_carpetas;


	public function __construct(){
	
		parent::__construct();


	}
		public function save($fech,$nom,$car){

	$this->fechaHora = $fech;
	$this->nombre = $nom;
	$this->id_carpetas = $car;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO carpetas VALUES (:id_archivos,:fechaHora,:nombre,:id_carpetas)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
	public function admin($id){

		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM archivos where id_carpetas = :id  ");
		$stm->bindParam(":id",$id);
		$stm->setFetchMode(PDO::FETCH_CLASS,'Archivos');
		$archivos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {

				//$tra = new Trabajadores();
				//$tra->findByPk($obj->id_trabajadores);
				//$obj->Trab = $tra;
				
				//$cli = new Trabjaos();
				//$cli->findByPk($obj->id_clientes);
				//$obj->Clie = $cli;
				$archivos[]=$obj;
			}
			
			return $archivos;

}


}


?>