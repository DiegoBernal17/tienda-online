<?php
require_once('../global.php');
$datos = array();
if(isset($_GET['item']) && !is_null($_GET['item'])) {
  $sql = mysqli_query($link, "SELECT nombre,precio_venta,disponibles,marca,descripcion FROM articulos WHERE nombre LIKE '%".mysqli_real_escape_string($link,$_GET['item'])."%'");
  while($rows = mysqli_fetch_array($sql)) {
    $datos[] = $rows;
  }
  echo json_encode($datos);
}
?>