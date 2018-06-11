<?php
require_once '../global.php';

if(isset($_POST['confirm'])) {
  $sql = mysqli_query($link, "SELECT id_articulo, id_carrito FROM carrito WHERE id_usuario = '".ID_USER."'");

  if(mysqli_num_rows($sql) > 0) {
    if($_POST['confirm'] == '1') {
      $sql2 = mysqli_query($link, "SELECT c.*, a.* FROM carrito c INNER JOIN articulos a ON a.id_articulo = c.id_articulo WHERE c.id_usuario = '".ID_USER."' AND a.disponibles < 1");
      if(mysqli_num_rows($sql2) == 0) {
        mysqli_query($link, "INSERT INTO `ventas` (`id_venta`, `id_usuario`, `fecha`, `importe`, `iva`, `realizada`) VALUES (NULL, '".ID_USER."', NULL, '".$_SESSION['subtotal']."', '".$_SESSION['iva']."', '0');");
        $id_venta = mysqli_insert_id($link);
        while($row = mysqli_fetch_array($sql)) {
          mysqli_query($link, "INSERT INTO `ventasarticulos` (`id_ventaArticulo`, `id_articulo`, `id_venta`) VALUES (NULL, '".$row['id_articulo']."', '$id_venta');");
          mysqli_query($link, "DELETE FROM `carrito` WHERE `id_carrito` = '".$row['id_carrito']."'");
          mysqli_query($link, "UPDATE `articulos` SET `disponibles` = disponibles-1 WHERE `id_articulo` = ".$row['id_articulo']);
        }
        echo '1';
      } else {
        echo '3';
        return;
      }
    } else if($_POST['confirm'] == '2') {
      mysqli_query($link, "DELETE FROM `carrito` WHERE `id_usuario` = '".ID_USER."'");
      echo '2';
    }
    unset($_SESSION['subtotal']);
    unset($_SESSION['iva']);
    return;
  }
}
echo '0';
?>