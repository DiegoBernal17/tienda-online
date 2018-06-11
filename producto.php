<?php 
require_once('header.php');

  if(!isset($_GET['id']) || is_null($_GET['id']) || !is_numeric($_GET['id'])) { ?>
    <hr>
    <h1>ERROR 404. PRODUCTO NO ENCONTRADO.</h1>
    <hr>
  <?php 
    } else {
    $id_articulo = mysqli_real_escape_string($link, $_GET['id']);
    $sql = mysqli_query($link, "SELECT a.id_articulo as articulo, a.*, c.nombre as nombre_categoria, o.* FROM articulos a INNER JOIN categorias c ON c.id_categoria = a.id_categoria LEFT JOIN ofertas o ON o.id_articulo = a.id_articulo AND inicio <= '".date("o-m-d G:i:s")."' AND finaliza >= '".date("o-m-d G:i:s")."' WHERE a.id_articulo = '$id_articulo' LIMIT 1");
    while($row = mysqli_fetch_array($sql)){ ?>
  <div class="row">
    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <?php if($row['disponibles'] > 0) { ?>
            <button class="btn btn-warning" onclick="comprar(<?php echo $row['articulo'] ?>)">Comprar</button>
            <button class="btn btn-success" onclick="agregarACarrito(<?php echo $row['articulo'] ?>)"><i class="fas fa-cart-plus"></i></button>
          <?php } else { ?>
            <button class="btn btn-danger" disabled>Agotado</button>
          <?php } ?>
          <button class="btn btn-inline-info"><i class="fas fa-share-alt"></i></button>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <?php echo '<img width="100%" src="'.$row['imagen_1'].'"><br>'; ?>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
          <div class="card-body">
            <div class="float-right">
              <span class="badge badge-secondary mr-2"><u><?php echo $row['disponibles']; ?> disponibles</u></span>
              <span class="badge badge-info">Marca: <b><?php echo $row['marca']; ?></b></span><br>
              Categoría: <b><?php echo $row['nombre_categoria']; ?></b>
            </div>
            <h3 class="d-inline-block"><?php echo $row['nombre']; ?></h3>
            <a href="<?php echo URL; ?>producto_pdf.php?id=<?php echo $row['articulo'] ?>" class="badge badge-danger ml-2">Ver PDF</a>
            <a href="<?php echo URL; ?>producto_xml.php?id=<?php echo $row['articulo'] ?>" class="badge badge-warning">Ver XML</a><br>
            $ <b>
            <?php
              if(is_null($row['id_oferta']))
                echo $row['precio_venta'];
              else {
                if($row['tipo_descuento'] == 'porciento') {
                  echo ($row['precio_venta'] - ($row['precio_venta'] * $row['descuento'] / 100));
                } else {
                  echo ($row['precio_venta'] - $row['descuento']);
                }
              } ?>
            </b> 
            <?php echo MONEDA; ?>
            <?php
            if(!is_null($row['id_oferta'])) {
              echo '<span class="badge badge-success mx-1">';
              if($row['tipo_descuento'] == 'porciento') 
                echo $row['descuento'].' %';
              else 
                echo '- $'.$row['descuento'];
              echo '</span>';
              echo ' <i><strike class="text-muted">$ '.$row['precio_venta'].'</strike></i>';
             } ?>
            <br><hr>
            <?php echo $row['descripcion']; ?><br>
          <?php } ?>
          </div>
      </div>
    </div>
  </div>
  <?php }
require_once('footer.php'); ?>
