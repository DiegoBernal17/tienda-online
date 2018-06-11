<?php
require_once('../global.php');
$correo = mysqli_real_escape_string($link, $_POST['correo']);
$contrasena = mysqli_real_escape_string($link, $_POST['contrasena']);

if($correo!="" && $contrasena!="") {
  $cuenta = mysqli_query($link, "SELECT nombre, paterno, correo, contrasena FROM usuarios WHERE correo = '$correo' LIMIT 1");
  $existe = mysqli_num_rows($cuenta);
  if($existe > 0) {
    $datos = mysqli_fetch_array($cuenta);
    if(password_verify($contrasena, $datos['contrasena'])) {
      $_SESSION['user'] = $correo;
      $_SESSION['name'] = $datos['nombre']." ".$datos['paterno'];
      echo 'true';
      return;
    }
  }
}
echo 'false';
?>