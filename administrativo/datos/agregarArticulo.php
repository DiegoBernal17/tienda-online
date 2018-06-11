<?php
require_once '../../global.php';

$nombre = mysqli_real_escape_string($link ,$_POST['nombre']);
$precio_venta = mysqli_real_escape_string($link, $_POST['precio_venta']);
$disponibles = mysqli_real_escape_string($link, $_POST['disponibles']);
$marca = mysqli_real_escape_string($link, $_POST['marca']);
$proveedores = mysqli_real_escape_string($link, $_POST['proveedores']);
$categorias = mysqli_real_escape_string($link, $_POST['categorias']);
$descripcion = mysqli_real_escape_string($link, $_POST['descripcion']);
$imagen = mysqli_real_escape_string($link, $_POST['imagen']);
$imagen2 = mysqli_real_escape_string($link, $_POST['imagen2']);

if($nombre!="" && $precio_venta!="" && $disponibles!="" && $marca!="" && $proveedores!="" && $categorias!="" && $descripcion!="") {
    mysqli_query($link, "INSERT INTO `articulos` (`id_articulo`, `nombre`, `precio_venta`, `disponibles`, `marca`, `id_proveedor`, `id_categoria`, `descripcion`, `fecha_agregado`, `imagen_1`, `imagen_2`) VALUES (NULL, '$nombre', '$precio_venta', '$disponibles', '$marca', '$proveedores', '$categorias', '$descripcion', CURRENT_TIMESTAMP, '$imagen', '$imagen2');");
    echo '1';
} else
echo '2';
?>