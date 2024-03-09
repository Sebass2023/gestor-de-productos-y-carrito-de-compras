<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i> Home</a> -> Catalogo<br><br>               

<div class="row">
    <?php 

    foreach ($productos as $pro) { ?>
        <div class="col-lg-3 mb-4">
            <div class="card shadow mb-4">
                <img src="../assets/img/catalogo/<?php echo $pro['imagen_productos']; ?>">
                <div class="card-body">
                    <form method="POST" action="productos_controller.php?accion=carrito" enctype="multipart/form-data">
                        <h4 class="text-info"><b><?php echo $pro['nombre_productos']; ?></b></h4>
                        <input type="hidden" name="nombre" value="<?php echo $pro['nombre_productos']; ?>">
                        <h5>$ <?php echo $pro['precio_productos']; ?></h5>
                        <input type="hidden" name="precio" value="<?php echo $pro['precio_productos']; ?>">
                        <br>
                        <input type="hidden" name="imagen" value="<?php echo $pro['imagen_productos']; ?>">
                        <br>
                        <div style="width: 70%;" class='input-group mb-3'>
                            <div class='input-group-prepend'>
                                <span class='input-group-text'>Cantidad</span>
                            </div>
                            <input type='number' id='typeNumber' min="1" max="100" name="cantidad" class='form-control' required />
                        </div>     
                       
                            <input type='submit' class='btn btn-info' value='Agregar al carrito'>
                       
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>