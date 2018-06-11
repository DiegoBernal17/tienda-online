<?php 
define("URL", 'http://localhost:8080/');
define("SITENAME", 'MyShopOnline');
define("MONEDA", 'Pesos Mexicanos');

$host   =   "localhost";
$dbuser =   "root";
$dbpass =   "";
$db     =   "shopdb";

$link	=	mysqli_connect($host,$dbuser,$dbpass,$db);
if(mysqli_connect_error()){
	echo "<script>alert('No se pudo conectar con la base de datos.');</script>";
}
mysqli_select_db($link, $db) or die('No se puede abrir la estructura de BD'.mysqli_connect_error());
session_start();

if(isset($_SESSION['user'])) {
	$m = mysqli_query($link, "SELECT id_usuario FROM usuarios WHERE correo = '".$_SESSION['user']."'");
	$a = mysqli_fetch_array($m);
	define("ID_USER", $a['id_usuario']);
}
?>
