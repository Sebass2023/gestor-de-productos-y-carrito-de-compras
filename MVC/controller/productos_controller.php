<?php
session_start();

include_once '../model/Productos.php';


class ProductosController extends Productos{


	public function MostrarProductos(){

		$productos = $this->ConsultarProductos();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/productos_views.php';
	}

	public function RedirectProductos(){
		header("location: productos_controller.php?accion=productos");
	}

	public function RedirectCatalogo(){
		header("location: productos_controller.php?accion=catalogo");
	}

	public function RedirectPago(){
		header("location: productos_controller.php?accion=pago");
	}


	public function MostrarAgregarProductos(){
		$categorias = $this->ConsultarCategoria();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/agregar_productos.php';
	}

	public function MostrarCatalogoProductos(){
		$productos = $this->ConsultarProductos();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/catalogo_views.php';
	}

	public function MostrarCatalogoPago(){
		$pago = $this->ConsultarProductos();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/pago_catalogo.php';
	}


    public function AgregarProductos($nombre, $categoria, $stock, $precio, $imagen, $imageName){
		$this->nombre_productos = $nombre;
		$this->categoria_productos = $categoria;
		$this->stock_productos = $stock;
		$this->precio_productos = $precio;
		$this->imagen_productos = $imagen;

		$this->AñadirProductos();
		move_uploaded_file($imageName, '../assets/img/catalogo/' . $imagen);
		$this->RedirectProductos();
	}

	public function ConsultaModificarProductos($id){
		$this->id_productos = $id;

		$productos = $this->ConsultarProductosModificar();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/modificar_productos.php';
	}

	public function CarritoProductos($nombre, $precio, $imagen, $cantidad)
	{
	    $this->nombre_productos = $nombre;
	    $this->precio_productos = $precio;
	    $this->imagen_productos = $imagen;
	    $this->cantidad_productos = $cantidad;

	    if (!isset($_SESSION['carrito'])) {
	        $_SESSION['carrito'] = array("0" => array("Producto" => $this->nombre_productos, "Valor" => $this->precio_productos, "Imagen" => $this->imagen_productos, "Cantidad" => $this->cantidad_productos));
	        $_SESSION['nombre_carrito'] = array($nombre);

	    } else {
	        // Buscar el dato del producto en el carrito
	        $arreglo = array_search($nombre, $_SESSION['nombre_carrito']);

	        if ($arreglo !== false) {
	            // suma del dato
	            $_SESSION['carrito'][$arreglo]['Cantidad'] += $cantidad;

	        } else {
	            array_push($_SESSION['carrito'], array("Producto" => $this->nombre_productos, "Valor" => $this->precio_productos, "Imagen" => $this->imagen_productos, "Cantidad" => $this->cantidad_productos));
	            array_push($_SESSION['nombre_carrito'], $nombre);
	        }
	    }

	    $_SESSION['carrito_contador'] = count($_SESSION['carrito']);
	    $this->RedirectCatalogo();
	}

	public function ModificarProductosController($id, $nombre, $categoria, $stock, $precio, $imagen, $imageName){
		$this->id_productos = $id;
		$this->nombre_productos = $nombre;
		$this->categoria_productos = $categoria;
		$this->stock_productos = $stock;
		$this->precio_productos = $precio;
		$this->imagen_productos = $imagen;

		$this->ModificarProductos();
		move_uploaded_file($imageName, '../assets/img/catalogo/' . $imagen);
		$this->RedirectProductos();

    }

    public function EliminarProductosController($id){
		$this->id_productos = $id;

		$this->EliminarProductos();
		$this->RedirectProductos();

	}

	public function EliminarCarrito($id){
		
		unset($_SESSION['carrito'][$id]);

		$this->RedirectPago();
	}
}









if (isset($_GET['accion']) && $_GET['accion'] == 'productos') {
	$ic = new ProductosController();
	$ic->MostrarProductos();
}


if (isset($_GET['accion']) && $_GET['accion'] == 'home') {
	$ic = new ProductosController();
	$ic->MostrarHome();
}


if (isset($_GET['accion']) && $_GET['accion'] == 'agregarproductos') {
	$ic = new ProductosController();
	$ic->MostrarAgregarProductos();
}


if (isset($_GET['accion']) && $_GET['accion'] == 'agregar') {
    $imageName = $_FILES['imagen']['tmp_name'];
    $imagen = $_FILES['imagen']['name'];
	$ic = new ProductosController();
	$ic->AgregarProductos($_POST['nombre'], $_POST['categoria'], $_POST['stock'], $_POST['precio'], $imagen, $imageName);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'consulta_productos') {
	$ic = new ProductosController();
	$id = $_GET['id'];
	$ic->ConsultaModificarProductos($id);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'catalogo') {
	$ic = new ProductosController();
	$ic->MostrarCatalogoProductos();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'pago') {
	$ic = new ProductosController();
	$ic->MostrarCatalogoPago();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'carrito'){
	$ic = new ProductosController();
	$ic->CarritoProductos($_POST['nombre'], $_POST['precio'], $_POST['imagen'], $_POST['cantidad']);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'modificar_productos') {
    $imageName = $_FILES['imagen']['tmp_name'];
    $imagen = $_FILES['imagen']['name'];
	$ic = new ProductosController();
	$ic->ModificarProductosController($_POST['id'], $_POST['nombre'], $_POST['categoria'], $_POST['stock'], $_POST['precio'], $imagen, $imageName);
}



if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar_productos') {
	$ic = new ProductosController();
	$id = $_GET['id'];
	$ic->EliminarProductosController($id);
}

if(isset($_GET['accion']) && $_GET['accion'] == 'eliminar_carrito') {
	$ic = new ProductosController();
	$id = $_POST['id'];
	$ic->EliminarCarrito($id);
}

?>