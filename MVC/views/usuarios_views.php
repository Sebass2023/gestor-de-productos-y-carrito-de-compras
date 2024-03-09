<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> Lista usuarios<br><br>
	<br>	
	<center>
	
	<br>
	<div class="card" style="width: 70%;">

		<div class="card-body">
			<h3 class="text-primary">Lista de usuarios</h3><br>
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">	
					<thead>
						<tr>		
							<td>Nombre</td>
							<td>Correo</td>
							<td>Contraseña</td>
							<td>Rol</td>
							<td>Eliminar</td>
							<td>Editar</td>
						</tr>
					</thead>

					<tbody>
					<?php foreach ($usuarios as $user) { ?>
							<tr>
								<td><?php echo $user['nombre_usuario']; ?></td>
								<td><?php echo $user['correo_usuario']; ?> </td>
								<td><?php echo $user['contraseña_usuario']; ?> </td>
								<td><?php echo $user['rol_usuario']; ?> </td>
								<td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEliminar<?php echo $user['id_usuario'];?>"><i class="bi bi-trash3-fill"></i></a></td>
								<td><a href="usuarios_controller.php?id=<?php echo $user['id_usuario'];?>&accion=consulta_modificar"><i class="bi bi-pen-fill"></i></a></td>
							</tr>

							<!-- The Modal -->
								<div class="modal fade" id="ModalEliminar<?php echo $user['id_usuario'];?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								      	<!-- boton pa cerrar el modal -->
								        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								      </div>

								      <!-- Modal body -->
								      <div class="modal-body">
								        <h5>Esta seguro de eliminar este usuario?</h5><br>
								        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
								        <a href="usuarios_controller.php?id=<?php echo $user['id_usuario'];?>&accion=eliminar" class="btn btn-primary">Si</a>
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
	</div>
	</center>
</body>
</html>