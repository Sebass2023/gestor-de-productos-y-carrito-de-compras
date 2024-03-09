<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> Pedidos<br><br>
<br>	
	<center>
	
	<br>
	<div class="card" style="width: 70%;">

		<div class="card-body">
			<h3 class="text-primary">Pedidos</h3><br>
			<div class="table-responsive">
				<table id="example" class="table table-striped" style="width:100%">	
					<thead>
						<tr>		
							<td>Id Pedidos</td>
							<td>Usuario</td>
							<td>Descripcion</td>
							<td>Total</td>

							<?php if ($_SESSION['rol_usuario'] == "1"){ ?>
								<td>Eliminar</td>
							<?php  } ?>
						</tr>
					</thead>

					<!-- Validacion mostrar pedidos segun el rol -->
					
					<tbody>
						
					<?php 
						if ($_SESSION['rol_usuario'] == "1") {
							$listar_pedidos = $pedidos;
						}else{
							$listar_pedidos = $pedidos_usuario;
						}

						foreach ($listar_pedidos as $ped) { ?>
							<tr>
								<td><?php echo $ped['id_pedidos']; ?></td>
								<td><?php echo $ped['id_usuario']; ?></td>
								<td><?php echo $ped['descrip_pedido']; ?> </td>
								<td><?php echo $ped['total_pedido']; ?> </td>

								<?php if ($_SESSION['rol_usuario'] == "1"){  ?>
									<td><a href="" data-bs-toggle="modal" data-bs-target="#ModalEliminar<?php echo $ped['id_pedidos'];?>"><i class="bi bi-trash3-fill"></i></a></td>
								<?php  } ?>
							</tr>


							<!-- The Modal -->
								<div class="modal fade" id="ModalEliminar<?php echo $ped['id_pedidos'];?>">
								  <div class="modal-dialog">
								    <div class="modal-content">

								      <!-- Modal Header -->
								      <div class="modal-header">
								      	<!-- boton pa cerrar el modal -->
								        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								      </div>

								      <!-- Modal body -->
								      <div class="modal-body">
								        <h5>Esta seguro de eliminar este pedido?</h5><br>
								        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
								        <a href="pedidos_controller.php?id=<?php echo $ped['id_pedidos'];?>&accion=eliminar_pedidos" class="btn btn-primary">Si</a>
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