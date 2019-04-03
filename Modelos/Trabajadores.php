<?php 

require_once("Conexion.php");

class Trabajadores extends Conexion{ 

	public $id_trabajadores;
	public $nombres;
	public $apellidos;
	public $documento;
	public $fechaNacimiento;
	public $telefono;
	public $foto;
	public $perfilPro;
	public $fechaIngreso;
	public $hojaVida;
	public $pass;
	public $tipo;
	

	public function __construct(){
	
		parent::__construct();
	}
	public function save($nom,$ape,$doc,$fecnac,$tel, $foto, $perpro, $fechin, $hojavida, $pass, $tip){

		$this->nombres = $nom;
		$this->apellidos = $ape;
		$this->documento = $doc;
		$this->fechaNacimiento = $fecnac;
		$this->telefono = $tel;
		$this->foto = $foto;
		$this->perfilPro = $perpro;
		$this->fechaIngreso = $fechin;
		$this->hojaVida = $hojavida;
		$this->pass = $pass;
		$this->tipo = $tip;
		

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("INSERT INTO trabajadores VALUES (:id_trabajadores,:nombres,:apellidos,:documento, :fechaNacimiento,:telefono,:foto,:perfilPro,:fechaIngreso,:hojaVida,:pass,:tipo)");
		
		try {

				return $stm->execute((array) $this);
		} 

			catch (Exception $e) {
			
		}

		
	}
		public function telefono(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE trabajadores SET 	telefono = :telefono WHERE id_trabajadores = :id");

		$stm->bindParam(":telefono",$this->telefono);
		$stm->bindParam(":id",$this->id_trabajadores);
		$stm->execute();
	}
	public function update(){

		$conexion = $this->getConexion();
		$stm = $conexion-> prepare("UPDATE trabajadores SET nombres = :nombres, apellidos = :apellidos, documento = :documento, fechaNacimiento = :fechaNacimiento, telefono = :telefono, foto = :foto, perfilPro = :perfilPro, fechaIngreso = :fechaIngreso, hojaVida =:hojaVida, tipo = :tipo, pass =:pass  WHERE id_trabajadores = :id"); 
		 
		 $stm->bindParam(":nombres",$this->nombres);
		 $stm->bindParam(":apellidos",$this->apellidos);
		 $stm->bindParam(":documento",$this->documento);
		 $stm->bindParam(":fechaNacimiento",$this->fechaNacimiento);
		 $stm->bindParam(":telefono",$this->telefono);
		 $stm->bindParam(":foto",$this->foto);
		 $stm->bindParam(":perfilPro",$this->perfilPro);
		 $stm->bindParam(":fechaIngreso",$this->fechaIngreso);
		 $stm->bindParam(":hojaVida",$this->hojaVida);
		 $stm->bindParam(":tipo",$this->tipo);
		 $stm->bindParam(":pass",$this->pass);
		
		 $stm->bindParam(":id",$this->id_trabajadores);
		 $stm->execute();
	}

	public function pass(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE trabajadores SET 	pass = :pass WHERE id_trabajadores = :id");

		$stm->bindParam(":pass",$this->pass);
		$stm->bindParam(":id",$this->id_trabajadores);
		$stm->execute();
	}

	public function foto(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE trabajadores SET 	foto = :foto WHERE id_trabajadores = :id");

		$stm->bindParam(":foto",$this->foto);
		$stm->bindParam(":id",$this->id_trabajadores);
		$stm->execute();
	}

	public function hojaVida(){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("UPDATE trabajadores SET 	hojaVida = :hojaVida WHERE id_trabajadores = :id");

		$stm->bindParam(":hojaVida",$this->hojaVida);
		$stm->bindParam(":id",$this->id_trabajadores);
		$stm->execute();
	}


	public function findByPk($id){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM trabajadores WHERE id_trabajadores = :id");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":id",$id);
		$stm-> execute();
		$stm->fetch();
		
	}

	public function findByDocument($doc){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM trabajadores WHERE documento = :doc");
		$stm ->setFetchMode(PDO::FETCH_INTO,$this);

		$stm->bindParam(":doc",$doc);
		$stm-> execute();
		$stm->fetch();
		
	}

	public function delete($id){
		$conexion = $this->getConexion();
		$stm =$conexion->prepare("DELETE FROM trabajadores WHERE id_trabajadores = :id");

		$stm->bindParam(":id",$id);
		$stm->execute();

}

	public function view (){
		$conexion = $this->getConexion();
		$stm = $conexion->prepare("SELECT * FROM trabajadores");
		$stm ->setFetchMode(PDO::FETCH_CLASS,'Trabajadores');

		$trabajadores = array();
		$stm-> execute();

		while ($obj = $stm->fetch()) {
			
			$trabajadores[]=$obj;
		}
		return $trabajadores;
	}

}


 ?>
