<?php require_once('global.php'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi Tienda Online</title>

    <link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script>var URL = '<?php echo URL;?>';</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="<?php echo URL; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <a href="<?php echo URL; ?>" class="nav-item btn btn-info mr-1">
            <i class="fas fa-home"></i> Inicio
        </a>
        <a href="<?php echo URL; ?>categorias.php" class="nav-item btn btn-info mr-1">
            <i class="fas fa-shopping-bag"></i> Categorías
        </a>
        <form class="form-inline" id="search">
            <input class="form-control" type="search" placeholder="Busca productos" aria-label="Buscar" id="valSearch">
            <button class="btn btn-secondary" type="submit">Buscar</button>
        </form>
    </ul>
    <div class="my-2 my-md-0">
        <?php if(!empty($_SESSION['user'])){
            $sql = mysqli_query($link, "SELECT id_permiso FROM usuarios WHERE correo = '".$_SESSION['user']."';");
            $dato = mysqli_fetch_array($sql);
            if($dato['id_permiso'] > 0) { ?>

        <a href="<?php echo URL; ?>administrativo/index.php" class="nav-item btn btn-dark mr-1">
            <i class="fas fa-cogs"></i> Panel Administrativo
            </a> <?php } ?>

        <button class="btn btn-success btn-sm dropdown mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <b id="navbarDropdown" role="button" >
            <i class="fas fa-user-circle"></i> <?php echo $_SESSION['name']; ?>
        </b>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><i class="fas fa-user"></i> Mis datos</a>
            <a class="dropdown-item" href="#"><i class="fas fa-shipping-fast"></i> Mis compras</a>
            <a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Ajustes</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#"><i class="fas fa-door-open"></i></i> Cerrar sesión</a>
        </div>
        </button>

        <a href="<?php echo URL; ?>comprar.php" class="btn btn-sm btn-warning">
            <i class="fas fa-shopping-cart" id="carrito"> 
                <?php 
                $sql = mysqli_query($link, "SELECT id_carrito FROM carrito WHERE id_usuario = '".ID_USER."'");
                echo mysqli_num_rows($sql);
                ?>
            </i>
        </a>
        <?php } else { ?>
            <a href="<?php echo URL; ?>registro.php" class="btn btn-warning"><i class="fas fa-user-plus"></i> Registrarse</a>
            <a href="<?php echo URL; ?>login.php" class="btn btn-success"><i class="fas fa-door-closed"></i> Ingresar</a>
        <?php } ?>
    </div>
  </div>
</nav>
<div class="container">
<div class="card" id="searchContainer">
    <div class="card-body"> 
      <table id="search_table" class="display">
        <thead>
          <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Disponibles</th>
            <th>Marca</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>