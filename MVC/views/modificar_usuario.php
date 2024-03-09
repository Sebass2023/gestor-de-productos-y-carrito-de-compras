<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> <a href="usuarios_controller.php?accion=inicio"> Lista usuarios</a> -> Modificar usuario<br><br>
	<?php
    	foreach ($usuarios as $user) {
    ?>
    <br>
    <center>
	  	<div class="card" id="resize">
		  	<div class="card-body">
		  		<h1 style="color:white;">Modificar usuario</h1><br>
		    	<form action="usuarios_controller.php?accion=modificar" method="POST" onsubmit="return validate(this)>
		    		<input type="hidden" name="id" value="<?php echo $user['id_usuario']; ?>">
		    		<input class="form-control" type="text" name="nombre" value="<?php echo $user['nombre_usuario']; ?>" required><br>
		    		<input class="form-control" type="email" name="correo" value="<?php echo $user['correo_usuario']; ?>" required><br>
		    		<input class="form-control" type="password" id="contraseña" name="contraseña" value="<?php echo $user['contraseña_usuario']; ?>" required><br>

		    		<div class="d-grid">
		    			<input class="btn btn-primary btn-block" type="submit">
		    		</div>
		    	</form>
		    	<script>
				    function validate(form){
					fail = "";
					fail += validatecorreo(form.correo.value);
					fail += validatecontraseña(form.contraseña.value);

					if (fail === "") {
						return true;
					} else {
						alert(fail);
						return false;
					}
				}

				function validatecorreo(field) {
			        if (field === "") {
			        	return "No ingresó el Email.\n";
			        } else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)) {
			            return "El email debe contener un @ y un .\n";
			        }
			        return "";
		      	}

		      	function validatecontraseña(field) {
		      		var fail = "";

					// Validar mayúsculas
					if (!/[A-Z]/.test(field)) {
						fail += "La contraseña debe contener al menos una letra mayúscula.\n";
					}

					// Validar minúsculas
					if (!/[a-z]/.test(field)) {
						fail += "La contraseña debe contener al menos una letra minúscula.\n";
					}

					// Validar dígitos
					if (!/[0-9]/.test(field)) {
						fail += "La contraseña debe contener al menos un número.\n";
					}

					// Validar caracteres especiales
					if (!/[!@#$%^&*.+]/.test(field)) {
						fail += "La contraseña debe contener al menos un carácter especial (!@#$%^&*).\n";
					}

					// Validar longitud mínima de 8 caracteres
					if (field.length < 8) {
						fail += "La contraseña debe tener al menos 8 caracteres.\n";
					}

					return fail;
		      	}
		    	</script>
		    </div>
		</div>
	</center>    
    <?php } ?>
</body>
</html>	