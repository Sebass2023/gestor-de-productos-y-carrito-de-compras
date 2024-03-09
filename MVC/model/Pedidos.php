<?php

include_once "database.php";

class Pedidos extends Conexion{
	
	public function ConsultarPedidos(){
		$db = $this->conectar();
		$sql = "SELECT * FROM pedidos;";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	Public function ConsultarPedidosUsuario(){
		$db = $this->conectar();
		$id = $_SESSION['id_usuario'];
		$sql = "SELECT * FROM pedidos WHERE id_usuario = '$id';";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	
	}

	public function GuardarPedidos(){
		try {

			$db = $this->conectar();
			$sql = "INSERT INTO pedidos (id_usuario, descrip_pedido, total_pedido) VALUES ('$this->id_usuario', '$this->descrip_pedido', '$this->total_pedido')";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			die("error: " . $e);
		}
	}

	public function EliminarPedidos(){
		try{

			$db = $this->conectar();
			$sql= "DELETE FROM pedidos WHERE id_pedidos = '$this->id_pedidos'";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			echo ("error: " . $e);
		}
	}

}