<?php
require_once('../global.php');
$nombre = mysqli_real_escape_string($link ,$_POST['nombre']);
$paterno = mysqli_real_escape_string($link, $_POST['paterno']);
$materno = mysqli_real_escape_string($link, $_POST['materno']);
$genero = mysqli_real_escape_string($link, $_POST['genero']);
$correo = mysqli_real_escape_string($link, $_POST['correo']);
$contrasena = mysqli_real_escape_string($link, $_POST['contrasena']);

if($nombre!="" && $paterno!="" && $materno!="" && $genero!="" && $correo!="" && $contrasena!="") {
  $existe = mysqli_num_rows(mysqli_query($link, "SELECT correo FROM usuarios WHERE correo = '$correo'"));
  if($existe == 0) {
    mysqli_query($link, "INSERT INTO `usuarios` (`nombre`, `paterno`, `materno`, `genero`, `telefono`, `id_direccion`, `correo`, `contrasena`, `id_permiso`) VALUES ('$nombre', '$paterno', '$materno', '$genero', NULL, '0', '$correo', '".password_hash($contrasena,PASSWORD_DEFAULT)."', '0');");
    echo true;
    return;
  }
}
echo false;
?>