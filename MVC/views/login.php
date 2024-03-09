
	<style type="text/css">
		body{
			background-color: #F1F5F5;
		}
		#card_style{
			position: relative;
			width: 400px;
			text-align: center;
			top: 150px;
			background-color: #9DE7E7;
		}

		@media screen and (max-width: 800px){
			#card_style{
				position: relative;
				width: 300px;
				text-align: center;
				top: 150px;
				background-color: #9DE7E7;
			}
		}
	</style>

	<?php if (isset($_SESSION['error'])) { ?> 
	 
		<div class="alert alert-danger alert-dismissible fade show">
	    	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	    	<strong>Error: </strong> <?php echo $_SESSION['error']; ?>
	  	</div>

	<?php } ?>
  	
	<center>
	  	<div class="card" id="card_style">
		  	<div class="card-body">
		  		<h1 style="color: white;">Inicio de sesión</h1><br>
		  		<form action="usuarios_controller.php?accion=login" method="POST">
					<input type="email" name="correo" placeholder="Ingrese su correo" class="form-control" required><br>
					<input type="password" name="contraseña" placeholder="Ingrese la contraseña" class="form-control" required><br>

					<input type="submit" class="btn btn-primary" value="Iniciar sesion">
				</form>
				<a href="usuarios_controller.php?accion=paginaregistro">Registrarse</a>
		  	</div>
		</div>
	</center>

</body>
</html>