<?php require_once('header.php'); ?>
<center><h1>Artículos en oferta</h1><hr>
  <div class="card">
    <div class="card-body">
    <?php
    $sql = mysqli_query($link, "SELECT * FROM ofertas o INNER JOIN articulos a ON a.id_articulo = o.id_articulo WHERE inicio <= '".date("o-m-d G:i:s")."' AND finaliza >= '".date("o-m-d G:i:s")."' ORDER BY finaliza DESC");
    $count = mysqli_num_rows($sql);
    if($count > 0) {
      while($row = mysqli_fetch_array($sql)){ ?>
      <a href="<?php echo URL."producto.php?id=".$row['id_articulo']; ?>">
        <div class="card card-articulo d-inline-block" style="width: 18rem;">
          <div class="card-img-top"><img class="card-img-top" src="<?php if(is_null($row['imagen_1'])) { echo URL."images/none_item.jpg"; } else { echo $row['imagen_1']; } ?>" alt="IMAGEN DEL PRODUCTO"></div>
          <div class="card-body">
            <p class="card-text d-inline"><?php echo $row['nombre'].'</p>';
              echo '<h5 class="d-inline"><span class="badge badge-danger ml-2">';
              if($row['tipo_descuento'] == 'porciento') 
                echo $row['descuento'].' %';
              else 
                echo '- $'.$row['descuento'];
              echo '</span></h5>';
            ?>
          </div>
        </div>
        </a>
      <?php } } else {
        echo '<h4>¡Espera nuestras grandes ofertas!</h4>';
      } ?>
    </div>
  </div>
</div>
  <div class="cabecera">
    Nuevos artículos
  </div>
  <div class="text-center">
    <?php
    $sql = mysqli_query($link, "SELECT * FROM articulos WHERE disponibles > 0 ORDER BY fecha_agregado DESC LIMIT 4");
    while($row = mysqli_fetch_array($sql)){ ?>
      <div class="card my-1 card-articulo d-inline-block" style="width: 18rem;">
        <div class="card-item-image"><img class="card-img-top" src="<?php if(is_null($row['imagen_1'])) { echo URL."images/none_item.jpg"; } else { echo $row['imagen_1']; } ?>" alt="IMAGEN DEL PRODUCTO"></div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
          <p class="card-text"><?php echo substr($row['descripcion'], 0, 160); ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <?php if($row['disponibles'] > 0) { ?>
            <li class="list-group-item">$ <?php echo $row['precio_venta']; ?></li>
          <?php } else { ?>
              <div class="bg-danger text-white">Agotado</div>
          <?php } ?>
        </ul>
        <div class="card-body">
          <a href="<?php echo URL; ?>producto.php?id=<?php echo $row['id_articulo']; ?>" class="btn btn-primary">Ver detalles</a>
          <?php if($row['disponibles'] > 0) { ?>
            <button class="btn btn-success" onclick="agregarACarrito(<?php echo $row['id_articulo'] ?>)"><i class="fas fa-cart-plus"></i></button>
          <?php } ?>
          <button class="btn btn-inline-info"><i class="fas fa-share-alt"></i></button>
        </div>
      </div>
    <?php } ?>
  </div>
<div class="cabecera">
  Artículos más vendidos
</div>
<div class="text-center">
    <?php 
    $sql = mysqli_query($link, "SELECT va.id_articulo, count(va.id_articulo) as num, a.* FROM ventasarticulos va INNER JOIN articulos a ON a.id_articulo = va.id_articulo GROUP BY va.id_articulo ORDER BY num DESC LIMIT 4");
    while($row = mysqli_fetch_array($sql)) { ?>
      <div class="card my-1 card-articulo d-inline-block" style="width: 18rem;">
      <div class="card-item-image"><img class="card-img-top" src="<?php if(is_null($row['imagen_1'])) { echo URL."images/none_item.jpg"; } else { echo $row['imagen_1']; } ?>" alt="IMAGEN DEL PRODUCTO"></div>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
          <p class="card-text"><?php echo substr($row['descripcion'], 0, 150); ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <?php if($row['disponibles'] > 0) { ?>
            <li class="list-group-item">$ <?php echo $row['precio_venta']; ?></li>
          <?php } else { ?>
              <div class="bg-danger text-white">Agotado</div>
          <?php } ?>
        </ul>
        <div class="card-body">
          <a href="<?php echo URL; ?>producto.php?id=<?php echo $row['id_articulo']; ?>" class="btn btn-primary">Ver detalles</a>
          <?php if($row['disponibles'] > 0) { ?>
            <button class="btn btn-success" onclick="agregarACarrito(<?php echo $row['id_articulo'] ?>)"><i class="fas fa-cart-plus"></i></button>
          <?php } ?>
          <button class="btn btn-inline-info"><i class="fas fa-share-alt"></i></button>
        </div>
      </div>
    <?php } ?>
<?php require_once('footer.php'); ?>