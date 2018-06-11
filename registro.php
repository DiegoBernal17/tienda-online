<?php
require_once('header.php');
?>
  <div id="messages"></div>
  <div class="row">
    <div class="col"></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-warning text-white">Regístrate</div>
        <div class="card-body">
          <form id="registerForm">
            <div class="form-group">
              <input class="form-control mb-1" type="text" name="nombre" placeholder="Nombre(s)" id="nombre">
              <input class="form-control mb-1" type="text" name="paterno" placeholder="Apellido Paterno" id="paterno">
              <input class="form-control mb-1" type="text" name="materno" placeholder="Apellido Materno" id="materno">
             
              <div class="custom-control custom-radio d-inline-block my-1">
                <input type="radio" name="genero" class="custom-control-input" value="M" id="customRadio1" checked>
                <label class="custom-control-label" for="customRadio1">Hombre</label>
              </div>
              <div class="custom-control custom-radio d-inline-block">
                <input type="radio" name="genero" class="custom-control-input" value="F" id="customRadio2">
                <label class="custom-control-label" for="customRadio2">Mujer</label>
              </div>
             
              <input class="form-control mb-1" type="email" name="correo" placeholder="Correo electrónico" id="correo">
              <input class="form-control mb-1" type="password" name="contrasena" placeholder="Contraseña" id="contrasena">
              <input class="btn btn-warning" type="submit" value="Regístrarse">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>
<?php
require_once('footer.php');
?>