<?php 

require_once("Conexion.php");
require_once("Modelos/Trabajos.php");

class Clientes extends Conexion{ 

	public $id_clientes;
	public $nit;
	public $direccion;
	public $razonSocial;
	public $email;
	public $telefono;
	public $pass;
	public $logo;

	public function __construct(){
	
		parent::__construct();
	}
	public function save($nit,$dir,$raSo,$ema,$tel,$pass, $logo){

	$this->nit = $nit;
	$this->direccion = $dir;
	$this->razonSocial = $raSo;
	$this->email = $ema;
	$this->telefono = $tel;
	$this->pass = $pass;
	$this->logo = $logo;
	

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO clientes VALUES (:id_clientes,:nit,:direccion,:razonSocial,:email,:telefono,:pass, :logo)");
		try{
			 $stm->execute((array) $this);
			 return true;
		}catch(Exception  $e){
			return false;
		}
		}
		public function pass(){

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE clientes SET  pass = :pass WHERE id_clientes = :id");
		 
		
		 $stm->bindParam(":pass",$this->pass);		 
		
		 $stm->bindParam(":id",$this->id_clientes);

		 $stm->execute();
	}
	public function fkeyTra($id){

		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM trabajos where id_clientes = :id order by id_trabajos desc  ");
		$stm->bindParam(":id",$id);
		$stm->setFetchMode(PDO::FETCH_CLASS,'Trabajos');
		$trabajos = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$tra = new Trabajadores();
				$tra->findByPk($obj->id_trabajadores);
				$obj->Trab = $tra;

				$tra2 = new Trabajadores();
				$tra2->findByPk($obj->id_trabajadores2);
				$obj->Trab2 = $tra2;

				$tra3 = new Trabajadores();
				$tra3->findByPk($obj->id_trabajadores3);
				$obj->Trab3 = $tra3;

				
				$cli = new Clientes();
				$cli->findByPk($obj->id_clientes);
				$obj->Clie = $cli;
				$trabajos[]=$obj;
			}
			
			return $trabajos;

}


	public function update(){

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE clientes SET nit = :nit,direccion = :direccion,razonSocial = :razonSocial,email = :email,telefono = :telefono,pass = :pass, logo = :logo WHERE id_clientes = :id");
		 
	
		 $stm->bindParam(":nit",$this->nit);
		 $stm->bindParam(":direccion",$this->direccion);
		 $stm->bindParam(":razonSocial",$this->razonSocial);
		 $stm->bindParam(":email",$this->email);
		 $stm->bindParam(":telefono",$this->telefono);
		 $stm->bindParam(":pass",$this->pass);
		 $stm->bindParam(":logo",$this->logo);
		
		 $stm->bindParam(":id",$this->id_clientes);

		 $stm->execute();
	}
		
	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM clientes WHERE id_clientes = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}
	
	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM clientes WHERE id_clientes = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

}

	public function findByDocument($nit){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM clientes WHERE nit = :nit");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":nit",$nit);
		$client = array();
		$stm-> execute();
		$stm->fetch();
		while ($obj = $stm->fetch()) {
				$client[]=$obj;
			}
			
			return $client;
		
	}

		public function admin(){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("SELECT * FROM clientes ");
		$stm->setFetchMode(PDO::FETCH_CLASS,'Clientes');
		$clientes = array();	
		$stm->execute();

			
			while ($obj = $stm->fetch()) {
				$clientes[]=$obj;
			}
			
			return $clientes;

}

public function telefono(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE clientes SET 	telefono = :telefono WHERE id_clientes = :id");

		$stm->bindParam(":telefono",$this->telefono);
		$stm->bindParam(":id",$this->id_clientes);
		$stm->execute();
	}


public function email(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE clientes SET 	email = :email WHERE id_clientes = :id");

		$stm->bindParam(":email",$this->email);
		$stm->bindParam(":id",$this->id_clientes);
		$stm->execute();
	} 

public function password(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE clientes SET 	pass = :pass WHERE id_clientes = :id");

		$stm->bindParam(":pass",$this->pass);
		$stm->bindParam(":id",$this->id_clientes);
		$stm->execute();
	}

	public function logo(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE clientes SET 	logo = :logo WHERE id_clientes = :id");

		$stm->bindParam(":logo",$this->logo);
		$stm->bindParam(":id",$this->id_clientes);
		$stm->execute();
	}

}



 ?>
