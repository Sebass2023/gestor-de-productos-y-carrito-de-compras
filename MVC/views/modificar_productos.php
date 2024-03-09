<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> <a href="productos_controller.php?accion=productos">Lista productos</a> -> Modificar Productos<br><br>
	<?php
    	foreach ($productos as $pro) {
    ?>
    <br>
    <center>
	  	<div class="card" id="resize">
		  	<div class="card-body">
		  		<h1 style="color:white;">Modificar Productos</h1><br>
		    	<form action="productos_controller.php?accion=modificar_productos" method="POST" enctype="multipart/form-data">
		    		<input type="hidden" name="id" value="<?php echo $pro['id_productos']; ?>">
		    		<input class="form-control" type="text" name="nombre" value="<?php echo $pro['nombre_productos']; ?>" required><br>
		    		<select class="form-control" name="categoria" value="<?php echo $pro['categoria_productos']; ?>" required>
		    			<option value="1">Verduras</option>
		    			<option value="2">Dulces</option>
		    			<option value="3">Licores</option>
		    			<option value="4">Embutidos</option>
		    		</select><br>
		    		<input class="form-control" type="number" name="stock" value="<?php echo $pro['stock_productos']; ?>" required><br>
		    		<input class="form-control" type="number" name="precio" value="<?php echo $pro['precio_productos']; ?>" required><br>
		    		<input class="form-control" type="file" name="imagen" value="<?php echo $pro['imagen_productos']; ?>" required><br>

		    		<div class="d-grid">
		    			<input class="btn btn-primary btn-block" type="submit">
		    		</div>
		    	</form>
		    </div>
		</div>
	</center>    
    <?php } ?>
</body>
</html>	