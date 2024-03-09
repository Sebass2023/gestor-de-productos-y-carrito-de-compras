	<nav class="navbar navbar-expand-sm bg-info navbar-dark">
	  <div class="container-fluid">
		    <a class="navbar-brand" href="usuarios_controller.php?accion=home"><h3><i class="bi bi-person"></i> Hola <?php echo $_SESSION['nombre_usuario']; ?></h3></a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="mynavbar">
			      <ul class="navbar-nav me-auto">
			      	<!-- Links de la barra de navegacion -->
			      </ul>
			      <form class="d-flex">
			      	<!-- Boton carrito de compras -->

			  		<div class="dropdown">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
					      	<?php 
					      		if (isset($_SESSION['carrito_contador'])) {
					      			echo "<b class='border border-danger rounded-circle' style='background-color:red; position:absolute; right:50px; top:-10px;'>(". $_SESSION['carrito_contador'] .")</b>";
					      		}else{
					      			echo "<b class='border border-danger rounded-circle' style='background-color:red; position:absolute; right:50px; top:-10px;'>(0)</b>";
					      		}
					      	 ?>
					      	<i class="bi bi-cart2"></i><span class="caret"></span>
					    </button>
					    <ul class="dropdown-menu" style="width:200px;">
					    <center><h6 class="dropdown-header">Carrito de compras</h6></center>

					    <?php
					 
					    if (!isset($_SESSION['carrito_contador'])) {
					    	echo "<center>No existen productos en el carrito</center>";
					 
					    }else{
					    	foreach($_SESSION['carrito'] as $indice => $carrito){
					    		echo"<center><div class='mr-3'><img width='50px' src='../assets/img/catalogo/".$carrito['Imagen']."'></div></center>";
					    		echo"<li><u>".$carrito['Producto']."</li></u>";
					    		echo"<li><b class='text-primary'>Precio:</b> ".$carrito['Valor']."</li>";
					    		echo"<li><b class='text-primary'>Cantidad:</b> ".$carrito['Cantidad']."</li>";
					    		echo"<li><hr class='dropdown-divider'></li>";
        						
					    		echo"<center><li><a class='dropdown-item' href='productos_controller.php?accion=pago'>Proceder al pago</a></li></center>";
					    	}
					    }

					     ?>
					      
					      
					    </ul>
					</div>

			      	<!-- Fin boton carrito de compras -->
			        <a href="usuarios_controller.php?accion=cerrarsesion" class="btn btn-outline-light"> Cerrar sesion <i class="bi bi-box-arrow-right"></i></a>
			      </form>
		    </div>
	  </div>

	</nav>