<?php require_once('header.php');

if(!isset($_GET['id'])) {
?>
  <hr><center><h1>Selecciona la categoría</h1></center><hr>
    <?php 
      $sql = mysqli_query($link, "SELECT * FROM categorias");
      $i = 0;
      while($row = mysqli_fetch_array($sql)){
        if($i%2 == 0 && $i != 0) echo '</div>'; 
        if($i == 0 || $i%2 == 0) echo '<div class="row">'; ?>
          <div class="col-sm-6 mb-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                <p class="card-text"><?php echo $row['descripcion'] ?></p>
                <a href="<?php echo URL."categorias.php?id=".$row['id_categoria'] ?>" class="btn btn-primary">Ver artículos</a>
              </div>
            </div>
          </div>
      <?php
        $i++; 
      } ?>
     </div>
<?php } else {
  $id_categoria = mysqli_real_escape_string($link, $_GET['id']);
  $sql = mysqli_query($link, "SELECT * FROM articulos WHERE id_categoria = '$id_categoria'");
  ?>
  <div class="card">
    <div class="card-body">
      <table id="mi_tabla" class="display">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Disponibles</th>
            <th>Marca</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_array($sql)) { ?>
            <tr>
              <td><a href="<?php echo URL."producto.php?id=".$row['id_articulo']; ?>"><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['precio_venta']; ?></td>
              <td><?php echo $row['disponibles']; ?></td>
              <td><?php echo $row['marca']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

<?php }
require_once('footer.php'); ?>