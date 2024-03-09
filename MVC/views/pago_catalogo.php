<br><a href="usuarios_controller.php?accion=home"><i class="bi bi-house-fill"></i>Home</a> -> <a href="productos_controller.php?accion=catalogo"> Catalogo</a> -> Pago<br><br>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pago Pedido</h1>
    </div>
    
    <?php 
    $total = 0;
    foreach ($_SESSION['carrito'] as $car => $pago) {
        echo "<div class='card-body'>";
        echo "<div class='table-responsive'>";
        echo "<div class='card shadow mb-4'>";
        echo "<div class='card-body'><div class='d-flex align-items-center'>";
        echo "<div class'mr-3'><img width='100px' src='../assets/img/catalogo/".$pago['Imagen']."'></div>";
        echo "<div style='margin-left: 20px;'><h4>".$pago['Producto']."</h4>";
        echo "<h5>$ ".$pago['Valor']."</h5>"."<br>";

        ?>
        <div style="width: 100%;" class='input-group mb-3'>
            <div class='input-group-prepend'>
                <span class='input-group-text'>Cantidad</span>
            </div>
            <input type='number' id='cantidad-<?php echo $car; ?>' min="1" max="100" name="cantidad" class='form-control cantidad' value="<?php echo $pago['Cantidad'];?>" data-valor="<?php echo $pago['Valor']; ?>" required>

            <form action='productos_controller.php?accion=eliminar_carrito' method='POST'>
                <input type='hidden' name='id' value='<?php echo $car; ?>'>
                <button type='submit' class='form-control'><i class='bi bi-trash3-fill'></i></button>
            </form>
        </div>

        <?php 
        echo "</div></div></div>";
        echo "</div></div></div></div>";

        $total = $pago['Valor'] * $pago['Cantidad'];
    }
    if (!isset($_SESSION['carrito'])) {
        echo "<center>No existen productos en el carrito</center>";
                     
    }
    ?>
    



    <p><h5 style="display: none;"><?php echo "Total productos: $".$total;?></h5></p>
 


    <!-- Formulario guardar pedidos -->

    <form action="pedidos_controller.php?accion=agregarpedidos" method="POST">
        <textarea name='descripcion' style="display: none;">
            <?php
            foreach ($_SESSION['carrito'] as $p) {
                echo  "Producto: " . $p['Producto']. "\nvalor: $" .$p['Valor']. "\ncantidad: " .$p['Cantidad']. "<br>";
            } 
            ?>
        </textarea>
        <input type="hidden" name="id" value="<?php echo $_SESSION['id_usuario'];?>">
        <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
        <br><input type="submit" class='btn btn-info' value="Proceder al pago">
    </form>
</div>

<script>


    // Obtener los elementos de cantidad

    const cantidad = document.querySelectorAll('.cantidad');

    // listener a cada input de cantidad

    cantidad.forEach(function(input) {
        input.addEventListener('change', function() {
            recalcularTotal();
        });
    });


    // Función para el total

    function recalcularTotal() {
        let total = 0;
        cantidad.forEach(function(input, index) {
            const cantidad = parseInt(input.value);
            const valor = parseFloat(input.dataset.valor);

            total += cantidad * valor;
        });

        document.getElementById('total').value = total;
        document.querySelector('p').innerHTML = "<h5>Total productos: $" + total + "</h5>";
    }

    document.addEventListener('DOMContentLoaded', function() {
    recalcularTotal();
    
    });

</script>
