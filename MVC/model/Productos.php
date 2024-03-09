<?php

include_once "database.php";

class Productos extends Conexion{
	
	public function ConsultarProductos(){
		$db = $this->conectar();
		$sql = "SELECT id_productos, nombre_productos, stock_productos, precio_productos, imagen_productos, tipo_categoria as categoria_productos FROM productos JOIN categoria ON categoria_productos = id_categoria";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	public function AñadirProductos(){
		try {

			$db = $this->conectar();
			$sql = "INSERT INTO productos (nombre_productos, categoria_productos, stock_productos, precio_productos, imagen_productos) VALUES ('$this->nombre_productos', '$this->categoria_productos', '$this->stock_productos', '$this->precio_productos', '$this->imagen_productos')";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			die("error: " . $e);
		}
	}

	public function ConsultarProductosModificar(){
		$db = $this->conectar();
		$sql = "SELECT * FROM productos WHERE id_productos = '$this->id_productos'";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	public function ConsultarCategoria(){
		$db = $this->conectar();
		$sql = "SELECT * FROM categoria";
		$query = mysqli_query($db, $sql);

		$i = 0;

		while ($fila = $query->fetch_assoc()) {
			$retorno[$i] = $fila;
			$i++;
		}

		return $retorno;
	}

	public function ModificarProductos(){
		try{
			$db = $this->conectar();
			$sql = "UPDATE productos SET nombre_productos = '$this->nombre_productos', categoria_productos='$this->categoria_productos', stock_productos='$this->stock_productos', precio_productos = '$this->precio_productos', imagen_productos = '$this->imagen_productos' WHERE id_productos='$this->id_productos'";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			die("Error: " . $e);
		}
	}

	public function EliminarProductos(){
		try{

			$db = $this->conectar();
			$sql= "DELETE FROM productos WHERE id_productos = '$this->id_productos'";
			$query = mysqli_query($db, $sql);

		} catch (Exception $e) {
			echo ("error: " . $e);
		}
	}
}

?>