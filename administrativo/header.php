<?php require_once('../global.php');
if(!empty($_SESSION['user'])){
  $sql = mysqli_query($link, "SELECT id_permiso FROM usuarios WHERE correo = '".$_SESSION['user']."';");
  $dato = mysqli_fetch_array($sql);
  if($dato['id_permiso'] == 0) {
    header('Location: '.URL);
  }
} else {
  header('Location: '.URL);
}
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Administrativo</title>

    <link rel="shortcut icon" href="<?php echo URL; ?>images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URL; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <script>var URL = '<?php echo URL;?>';</script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
  <a class="navbar-brand" href="<?php echo URL; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <a href="<?php echo URL; ?>administrativo/" class="nav-item btn btn-primary mr-1">
        Agregar artículo
      </a>
    </ul>
  </div>
</nav>
<div class="container">