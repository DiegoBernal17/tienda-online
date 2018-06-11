$("#agregarArticulo").submit(function(e){
  e.preventDefault();

  var nombre = $("#nombre").val();
  var precio_venta = $("#precio_venta").val();
  var disponibles = $("#disponibles").val();
  var marca = $("#marca").val();
  var proveedores = $("#proveedores").val();
  var categorias = $("#categorias").val();
  var descripcion = $("#descripcion").val();
  var imagen = $("#imagen").val();
  var imagen2 = $("#imagen2").val();

  $.ajax({
    type: 'POST',
    url: URL+'administrativo/datos/agregarArticulo.php',
    data: { nombre:nombre,precio_venta:precio_venta,disponibles:disponibles,marca:marca,proveedores:proveedores,categorias:categorias,descripcion:descripcion,imagen:imagen,imagen2:imagen2 }
  })
  .done(function(data) {
    if(data == '1')
      $("#messages").html('<div class="alert alert-success" role="alert">Haz agregado un nuevo artículo <b>'+nombre+'</b></div>');
    else
      $("#messages").html('<div class="alert alert-danger" role="alert">Ha ocurrido un error (1).</div>');
  })
  .fail(function(e) {
    $("#messages").html('<div class="alert alert-danger" role="alert">Ha ocurrido un error (2).</div>');
  });
});