<?php
require_once '../global.php';

if(isset($_POST['id'])) {
  $id_articulo = mysqli_real_escape_string($link, $_POST['id']);
  if($_POST['accion'] == 'agregar') {
    mysqli_query($link, "INSERT INTO `carrito` (`id_carrito`, `id_articulo`, `id_usuario`) VALUES (NULL, '$id_articulo', ".ID_USER.");");
    echo '1';
  } else if($_POST['accion'] == 'eliminar') {
    mysqli_query($link, "DELETE FROM `carrito` WHERE `id_carrito` = '$id_articulo'");
    echo '2';
  }
} else
  echo '0';
?>