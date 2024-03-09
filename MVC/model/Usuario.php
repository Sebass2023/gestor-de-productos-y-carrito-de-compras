<?php

include_once "database.php";

class Usuario extends Conexion{

	
	public function ConsultarUsuarios(){
		$db = $this->conectar();
		$sql = "SELECT id_usuario, nombre_usuario, correo_usuario, contraseña_usuario, nombre_rol as rol_usuario FROM usuarios JOIN rol ON rol_usuario = id_rol";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	public function ConsultarUsuarioModificar(){
		$db = $this->conectar();
		$sql = "SELECT * FROM usuarios WHERE id_usuario = '$this->id_usuario'";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	public function ConsultaLogin(){
		try {
			$db = $this->conectar();
			$sql = "SELECT * FROM usuarios WHERE correo_usuario = '$this->correo_usuario'";
			$query = mysqli_query($db, $sql);

			$i = 0;

			while ($fila = $query->fetch_assoc()) {
				$retorno[$i] = $fila;
				$i++;
			}

			return $retorno;

		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function RegistroUsuario(){
		try {

			$db = $this->conectar();
			$sql = "INSERT INTO usuarios (nombre_usuario, correo_usuario, contraseña_usuario, rol_usuario) VALUES ('$this->nombre_usuario', '$this->correo_usuario', '$this->contraseña_usuario', '$this->rol_usuario')";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			echo ("error: " . $e);
		}
	}

	public function ModificarUsuario(){
		try{
			$db = $this->conectar();
			$sql = "UPDATE usuarios SET nombre_usuario = '$this->nombre_usuario', correo_usuario='$this->correo_usuario', contraseña_usuario='$this->contraseña_usuario' WHERE id_usuario='$this->id_usuario'";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			die("Error: " . $e);
		}
	}

	public function EliminarRegistro(){
		try{

			$db = $this->conectar();
			$sql= "DELETE FROM usuarios WHERE id_usuario = '$this->id_usuario'";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			echo ("error: " . $e);
		}
	}

}


?> 