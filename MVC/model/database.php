<?php

class Conexion{

	public $servername = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "colegio1";
	public $conn;
	
	// Create connection
	public function conectar(){ 

		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
			// Check connection
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		return $this->conn;
	}

		
}

?>