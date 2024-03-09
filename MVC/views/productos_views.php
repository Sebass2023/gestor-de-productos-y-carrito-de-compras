<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> Lista productos<br><br>
<br>	
	<center>
	
	<br>
	<div class="card" style="width: 70%;">

		<div class="card-body">
			<h3 class="text-primary">Productos</h3><br>
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">	
					<thead>
						<tr>		
							<td>Nombre</td>
							<td>Categoria</td>
							<td>Stock</td>
							<td>Precio</td>
							<td>Imagen</td>
							<?php if ($_SESSION['rol_usuario'] == "1"){ ?>
								<td>Eliminar</td>
								<td>Editar</td>
							<?php  } ?>
						</tr>
					</thead>

					<tbody>
					<?php foreach ($productos as $pro) { ?>
							<tr>
								<td><?php echo $pro['nombre_productos']; ?></td>
								<td><?php echo $pro['categoria_productos']; ?> </td>
								<td><?php echo $pro['stock_productos']; ?> </td>
								<td><?php echo $pro['precio_productos']; ?></td>
								<td><img width='100px' src='../assets/img/catalogo/<?php echo $pro['imagen_productos']; ?>'></td>

								<?php if ($_SESSION['rol_usuario'] == "1"){  ?>
									<td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEliminar<?php echo $pro['id_productos'];?>"><i class="bi bi-trash3-fill"></i></a></td>
									<td><a href="productos_controller.php?id=<?php echo $pro['id_productos'];?>&accion=consulta_productos"><i class="bi bi-pen-fill"></i></a></td>
								<?php  } ?>
							</tr>


							<!-- The Modal -->
								<div class="modal fade" id="ModalEliminar<?php echo $pro['id_productos'];?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								      	<!-- boton pa cerrar el modal -->
								        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								      </div>

								      <!-- Modal body -->
								      <div class="modal-body">
								        <h5>Esta seguro de eliminar este producto?</h5><br>
								        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
								        <a href="productos_controller.php?id=<?php echo $pro['id_productos'];?>&accion=eliminar_productos" class="btn btn-primary">Si</a>
								      </div>

								    </div>
								  </div>
								</div>
							<!-- Fin del modal -->
					<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
		<?php if($_SESSION['rol_usuario'] == "1"){ ?>
		<div class="d-grid">
		    <a href="productos_controller.php?accion=agregarproductos" class="btn btn-primary"> Agregar Productos </a>
		</div>
		<?php  } ?>
	</div>
	</center>
</body>
</html>