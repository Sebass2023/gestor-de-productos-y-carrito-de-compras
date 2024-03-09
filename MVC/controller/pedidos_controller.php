<?php
session_start();

include_once '../model/Pedidos.php';


class PedidosController extends Pedidos{


	public function MostrarPedidos(){

		$pedidos = $this->ConsultarPedidos();
		$pedidos_usuario = $this->ConsultarPedidosUsuario();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/pedidos_views.php';
	}

	public function RedirectPedidos(){
		header("location: pedidos_controller.php?accion=pedidos");
	}

	public function AgregarPedidos($id, $descripcion, $total){

		$this->id_usuario = $id;
		$this->descrip_pedido = $descripcion;
		$this->total_pedido = $total;

		$this->GuardarPedidos();
		$_SESSION['carrito'] = null;
		$_SESSION['carrito_contador'] = null;
		$this->RedirectPedidos();
	}

    public function EliminarPedidosController($id){
		$this->id_pedidos = $id;

		$this->EliminarPedidos();
		$this->RedirectPedidos();

		}

}




if (isset($_GET['accion']) && $_GET['accion'] == 'pedidos') {
	$ic = new PedidosController();
	$ic->MostrarPedidos();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'agregarpedidos') {
	$ic = new PedidosController();
	$ic->AgregarPedidos($_POST['id'], $_POST['descripcion'], $_POST['total']);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar_pedidos') {
	$ic = new PedidosController();
	$ic->EliminarPedidosController($_GET['id']);
}



