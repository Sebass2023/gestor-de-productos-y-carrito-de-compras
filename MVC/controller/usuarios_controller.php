<?php
session_start();

include_once '../model/Productos.php';
include_once '../model/Usuario.php';


class UsuariosController extends Usuario{

	private $model;

	public function MostrarHome(){

		include_once '../views/header.php';

		if (empty($_SESSION['nombre_usuario'])) {
			include_once '../views/login.php';

		}
		elseif (isset($_SESSION['rol_usuario']) && $_SESSION['rol_usuario'] == "1") {
			include_once '../views/navbar.php';
			include_once '../views/home_admin.php';
		}
		elseif (isset($_SESSION['rol_usuario']) && $_SESSION['rol_usuario'] == "2") {
			include_once '../views/navbar.php';
			include_once '../views/home_usuario.php';
		}

	}


	public function MostrarInicio(){

		$usuarios = $this->ConsultarUsuarios();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/usuarios_views.php';
	}

	public function RedirectHome(){
		header("location: usuarios_controller.php?accion=home");
	}

	public function MostrarRegistro(){
		include_once '../views/header.php';
		include_once '../views/registro_usuario.php';
	}

	public function CerrarSesion(){
        session_destroy();
        $this->RedirectHome();
    }

	public function VerificarLogin($correo, $contraseña){

		$this->correo_usuario = $correo;
		$this->contraseña = $contraseña;
		$consulta = $this->ConsultaLogin();
		$usuario = $consulta[0];		


		if (empty($usuario)) {
			$_SESSION['error'] = "El correo ingresado no existe";
			$this->RedirectHome();

		}else{

			if (password_verify($this->contraseña, $usuario['contraseña_usuario'])) {
				$_SESSION['id_usuario'] = $usuario['id_usuario'];
				$_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
				$_SESSION['correo_usuario'] = $usuario['correo_usuario'];
				$_SESSION['rol_usuario'] = $usuario['rol_usuario'];
				$this->RedirectHome();

			}else{
				$_SESSION['error'] = "El correo o la contraseña no coinciden";
				$this->RedirectHome();
			}
		}
	}

	public function RegistroController($nombre, $correo, $contraseña, $rol){
		$this->nombre_usuario = $nombre;
		$this->correo_usuario = $correo;
		$this->contraseña_usuario = password_hash($contraseña, PASSWORD_DEFAULT);
		$this->rol_usuario = $rol;

		$this->RegistroUsuario();
		$this->RedirectHome();
	}

	public function ConsultaModificar($id){
		$this->id_usuario = $id;

		$usuarios = $this->ConsultarUsuarioModificar();
		include_once '../views/header.php';
		include_once '../views/navbar.php';
		include_once '../views/modificar_usuario.php';
	}

	public function ModificarController($id, $nombre, $correo, $contraseña){
		$this->id_usuario = $id;
		$this->nombre_usuario = $nombre;
		$this->correo_usuario = $correo;
		$this->contraseña_usuario = $contraseña;

		$this->ModificarUsuario();
		$this->RedirectHome();
	}

	public function EliminarController($id){
		$this->id_usuario = $id;

		$this->EliminarRegistro();
		$this->RedirectHome();

		}
	}






if (isset($_GET['accion']) && $_GET['accion'] == 'inicio') {
	$ic = new UsuariosController();
	$ic->MostrarInicio();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'home') {
	$ic = new UsuariosController();
	$ic->MostrarHome();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'login') {
	$ic = new UsuariosController();
	$ic->VerificarLogin($_POST['correo'], $_POST['contraseña']);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'cerrarsesion') {
	$ic = new UsuariosController();
	$ic->CerrarSesion();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'registro'){
	$ic = new UsuariosController();
	$ic->RegistroController($_POST['nombre'], $_POST['correo'], $_POST['contraseña'], $_POST['rol']);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'paginaregistro') {
	$ic = new UsuariosController();
	$ic->MostrarRegistro();
}

if (isset($_GET['accion']) && $_GET['accion'] == 'consulta_modificar') {
	$ic = new UsuariosController();
	$id = $_GET['id'];
	$ic->ConsultaModificar($id);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'modificar') {
	$ic = new UsuariosController();
	$ic->ModificarController($_POST['id'], $_POST['nombre'], $_POST['correo'], $_POST['contraseña']);
}

if (isset($_GET['accion']) && $_GET['accion'] == 'eliminar') {
	$ic = new UsuariosController();
	$id = $_GET['id'];
	$ic->EliminarController($id);
	
}

?>

