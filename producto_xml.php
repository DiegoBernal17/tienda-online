<?php
include_once './global.php';

if(isset($_GET['id'])) {

  $id_articulo = mysqli_real_escape_string($link, $_GET['id']);
  $sql  = mysqli_query($link, "SELECT * FROM articulos WHERE id_articulo = '$id_articulo'");
  $data = mysqli_fetch_array($sql);

$xmlstr = <<<XML
<?xml version='1.0' standalone='yes'?>
<articulos>
 <articulo>
  <nombre>Nombre produco</nombre>
  <precio>$ 0.0</precio>
  <marca>Marca del artículo</marca>
  <descripcion>Descripción</descripcion>
 </articulo>
</articulos>
XML;

  $articulos = new SimpleXMLElement($xmlstr);
  $articulos->articulo[0]->nombre = $data['nombre'];
  $articulos->articulo[0]->precio = '$ '.$data['precio_venta'];
  $articulos->articulo[0]->marca = $data['marca'];
  $articulos->articulo[0]->descripcion = $data['descripcion'];

  echo $articulos->asXML();
} else 
echo "Artículo no encontrado";
?>
