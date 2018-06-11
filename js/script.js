$(document).ready( function () {
  var search = false;
  var $table;
  var $registerForm = $("#registerForm");
  var $loginForm = $("#loginForm");
  var $logout = $("#logout");
  var $mi_tabla = $("#mi_tabla");
  
  $("#search").submit(function(e){
    e.preventDefault();
    var valor = $("#valSearch").val();
    if(!search) {
       $table = $('#search_table').DataTable( {
        ajax: {"url": URL+'datos/search.php?item='+valor,  "dataSrc": "" }
      } );
      search=true;
    } else {
      if(valor != "") {
        $("#searchContainer").show();
          $table.ajax.url( URL+'datos/search.php?item='+valor ).load();
          $table.ajax.reload();
      }
    }
  });

  $registerForm.submit(function(e) {
    e.preventDefault();

    var nombre = $("#nombre").val();
    var paterno = $("#paterno").val();
    var materno = $("#materno").val();
    var genero = $("input[name=genero]:checked").val();
    var correo = $("#correo").val();
    var contrasena = $("#contrasena").val();
    
    $.ajax({
      type: 'POST',
      url: URL+'datos/registro.php',
      data: { nombre:nombre, paterno:paterno, materno:materno, genero:genero, correo:correo, contrasena:contrasena }
    })
    .done(function(data) {
      if(data)
        $("#messages").html('<div class="alert alert-success" role="alert">Te haz registrado con exito. Ahora ya puedes <b>Iniciar sesión</b></div>');
      else
        $("#messages").html('<div class="alert alert-danger" role="alert">Ha ocurrido un error (1).</div>');
    })
    .fail(function(e) {
      $("#messages").html('<div class="alert alert-danger" role="alert">Ha ocurrido un error (2).</div>');
    });
  });

  $mi_tabla.DataTable();

  $loginForm.submit(function(e) {
    e.preventDefault();
    var correo = $("#correo").val();
    var contrasena = $("#contrasena").val();

    $.ajax({
      type: 'POST',
      url: URL+'datos/login.php',
      data: { correo:correo, contrasena:contrasena }
    })
    .done(function(data) {
      if(data == 'true') {
        $("#messages").html('<div class="alert alert-success" role="alert">Conexión exitosa. Redireccionando...</div>');
        $(location).attr('href',URL);
      } else
        $("#messages").html('<div class="alert alert-danger" role="alert">Correo y/o contraseña incorrectos.</div>');
    })
    .fail(function(e) {
      $("#messages").html('<div class="alert alert-danger" role="alert">Ha ocurrido un error.</div>');
    });
  });

  $mi_tabla.DataTable();

  $logout.click(function (){
    $(location).attr('href',URL+"datos/logout.php");
  });
});

var $carrito = $("#carrito");

function agregarACarrito(id, comprar) {
  $.ajax({
    url: URL+'datos/sesion.php'
  })
  .done(function(data){
    if(data == '1') {
      if(comprar != null || confirm("¿Agregar al carrito?")) {
        $.ajax({
          type: 'POST',
          url: URL+'datos/carrito.php',
          data: { id:id, accion: 'agregar' }
        })
        .done(function(data2) {
          if(data2 == '1') {
            $carrito.text(" "+(parseInt($carrito.text())+1));
          }
        });
      }
    } else if(data == '0') {
      $(location).attr('href',URL+"login.php");
    }
  })
  .fail(function(e) {
    console.log('Algo ha salido mal');
  });
}

function comprar(id) {
    agregarACarrito(id, ' ');
    $(location).attr('href',URL+"comprar.php");
}

function quitarDeCarrito(id) {
  if(confirm("¿Eliminar del carrito?")) {
    $.ajax({
      type: 'POST',
      url: URL+'datos/carrito.php',
      data: { id:id, accion: 'eliminar' }
    })
    .done(function(data) {
      if(data == '2') {
        $carrito.text(" "+(parseInt($carrito.text())-1));
        location.reload();
      }
    });
  }
}

function realizarCompra() {
  if(confirm('¿Confirmar compra?')) {
    $.ajax({
      type: 'POST',
      url: URL+'datos/compra.php',
      data: { confirm: '1' }
    })
    .done(function(data) {
      if(data == '1') {
        $("#messages").html('<div class="alert alert-success" role="alert">Haz realizado la compra correctamente.</div>');
        setTimeout(function(){ location.reload(); }, 2500);
      } else if(data == '3') {
        $("#messages").html('<div class="alert alert-danger" role="alert">Tienes un articulo agotado en el carrito</div>');
      } else {
        $("#messages").html('<div class="alert alert-danger" role="alert">Algo ha salido mal, vuelve a intentarlo</div>');
      }
    });
  }
}

function vaciarCarrito() {
  if(confirm('¿Vaciar carrito?')) {
    $.ajax({
      type: 'POST',
      url: URL+'datos/compra.php',
      data: { confirm: '2' }
    })
    .done(function(data) {
      if(data == '2') {
        location.reload();
      } else {
        $("#messages").html('<div class="alert alert-danger" role="alert">Algo ha salido mal</div>');
      }
    });
  }
}