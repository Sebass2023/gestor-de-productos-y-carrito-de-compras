
 <a href="productos_controller.php?accion=productos"><i class="bi bi-house-fill"></i> Productos</a> -> Agregar<br>
<br>
	<center>
	  	<div class="card" style="position: relative; background-color: #9DE7E7; width: 500px;">
		  	<div class="card-body">

		  		<h1 style="color:white;">Agregar Productos</h1><br>
				<form action="productos_controller.php?accion=agregar" method="POST" enctype="multipart/form-data">

					<input class="form-control" type="text" name="nombre" placeholder="Nombre" required><br>
					<select class="form-control" name="categoria" placeholder="categoria" required>
						<?php foreach ($categorias as $cat) { ?>
							<option value="<?php echo $cat['id_categoria']; ?>"><?php echo $cat['tipo_categoria']; ?></option>						
						<?php } ?>
					</select><br>
					<input class="form-control" type="number" name="stock" placeholder="stock" required><br>
					<input class="form-control" type="number" name="precio" placeholder="precio" required><br>
					<div class="form-group">
                        <label class="text-primary">Imagen producto:</label>
                        <input type="file" name="imagen" id="imagen" class="form-control" required>
                    </div>
					<div class="d-grid">
						<input class="btn btn-primary btn-block" type="submit">
					</div>

				</form>
			</div>
		</div>

	</center>
	