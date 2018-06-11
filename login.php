<?php
require_once('header.php');
?>
  <div id="messages"></div>
  <div class="row">
    <div class="col"></div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header bg-success text-white">Inicia sesión</div>
        <div class="card-body">
          <form id="loginForm">
            <input class="form-control mb-1" type="email" name="correo" placeholder="Correo electrónico" id="correo">
            <input class="form-control mb-1" type="password" name="contrasena" placeholder="Contraseña" id="contrasena">
            <input class="btn btn-success" type="submit" value="Entrar">
          </form>
        </div>
      </div>
    </div>
    <div class="col"></div>
  </div>
<?php
require_once('footer.php');
?>