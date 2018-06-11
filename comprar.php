<?php
require_once('header.php');
$_SESSION['subtotal'] = 0;
?>
  <div class="row">
    <div class="col"></div>
    <div class="col-6">
      <div id="messages"></div>
      <div class="card">
        <div class="card-header">Artículos a comprar</div>
        <div class="card-body">
          <table id="mi_tabla" class="display">
            <thead>
              <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sql = mysqli_query($link, "SELECT a.id_articulo as articulo, a.*, c.* FROM carrito c INNER JOIN articulos a ON a.id_articulo = c.id_articulo WHERE id_usuario = '".ID_USER."'");
              while($row = mysqli_fetch_array($sql)) {
              $_SESSION['subtotal'] += $row['precio_venta']; 
              ?>
                <tr>
                  <td><a href="<?php echo URL."producto.php?id=".$row['articulo']; ?>"><?php echo $row['nombre']; ?></td>
                  <td><?php echo $row['precio_venta']; ?></td>
                  <td>
                    <button class="btn btn-danger btn-sm" onclick="quitarDeCarrito(<?php echo $row['id_carrito']; ?>)">x</button>
                  </td>
                </tr>
              <?php }
              $_SESSION['iva'] = $_SESSION['subtotal']*0.10;
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card bg-light mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <p class="card-text" id="subtotal"><b>Subtotal:</b> $ <?php echo $_SESSION['subtotal']; ?></p>
          <p class="card-text" id="iva"><b>Iva:</b> $ <?php echo $_SESSION['iva']; ?></p>
          <hr>
          <p class="card-text" id="total"><b>Total:</b> $ <?php echo $_SESSION['subtotal']+$_SESSION['iva']; ?></p>
        </div>
      </div>
      <div class="card bg-light mb-1" style="max-width: 18rem;" onclick="realizarCompra()">
        <button class="btn btn-success">Realizar compra</button>
      </div>
      <div class="card bg-light mb-3" style="max-width: 18rem;" onclick="vaciarCarrito()">
        <button class="btn btn-danger">Vaciar carrito</button>
      </div>
    </div>
    <div class="col"></div>
  </div>
<?php
require_once('footer.php');
?>