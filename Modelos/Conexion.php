<?php 
	class Conexion{
		static $connection;

		public function __construct(){
			 $server = "localhost";
			 $db = "pacioli";
			 $user = "root";
			 $password = "";

			try {
				Conexion::$connection = new PDO(
					"mysql:host=$server; dbname=$db",
					$user,
					$password
				);
				Conexion::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			} catch (PDOException $ex) {
				echo "Ha ocurrido un error al conectar al servidor de base de datos: ". $ex->getMessage();
			}
		}
		public function getConexion(){
			return Conexion::$connection;
		}
	}

 ?>