<?php require_once('header.php'); ?>

<div class="card">
  <div class="card-header">Agregar artículos</div>
  <div class="card-body">

    <div id="messages"></div>
    
    <form id="agregarArticulo">
      <input class="form-control" type="text" id="nombre" placeholder="Nombre del artículo">
      <input class="form-control" type="text" id="precio_venta" placeholder="Precio de venta">
      <input class="form-control" type="text" id="disponibles" placeholder="Disponibles">
      <input class="form-control" type="text" id="marca" placeholder="marca">

      <select class="form-control" id="proveedores">
        <?php $sql = mysqli_query($link, "SELECT * FROM proveedores ORDER BY nombre DESC");
        while($row = mysqli_fetch_array($sql)) { ?>
          <option value="<?php echo $row['id_proveedor']; ?>"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select>
      <select class="form-control" id="categorias">
        <?php $sql2 = mysqli_query($link, "SELECT * FROM categorias ORDER BY nombre DESC");
        while($row = mysqli_fetch_array($sql2))  { ?>
          <option value="<?php echo $row['id_categoria']; ?>"><?php echo $row['nombre']; ?></option>
        <?php } ?>
      </select>

      <textarea id="descripcion" rows="6" style="width: 100%" placeholder="Descripción"></textarea>
      <input class="form-control" type="text" id="imagen" placeholder="URL de la imagen">
      <input class="form-control" type="text" id="imagen2" placeholder="Imagen 2 (opcional)">
    
      <button class="btn btn-success">Agregar artículo</button>
    </form>
  </div>
</div>

<?php require_once('footer.php'); ?>