<?php
session_start();
$idS = session_status();
?>
<!-- https://getbootstrap.com/docs/3.3/components/ -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="https://s.brightspace.com/lib/favicon/3.0.0/favicon.ico" sizes="any">
  <link rel="stylesheet" href="/desarolloWeb/css/main.css">

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
  <title>ProyectoFinal</title>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/desarolloWeb"><img src="/desarolloWeb/img/gamego.png" alt="logo" width="60"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/desarolloWeb">Home</a></li>
      <li><a href="/desarolloWeb/php/tienda.php">Tienda</a></li>
      <?php
        if(isset($_SESSION['uid'])){
          if($_SESSION['uid']==1){
            echo "<li class='dropdown'>
              <a class='dropdown-toggle' data-toggle='dropdown' href='/desarolloWeb/php/admin/historial.php'>Dashboard
              <span class='caret'></span></a>
              <ul class='dropdown-menu'>
                <li><a href='/desarolloWeb/php/admin/catalogo.php'>Catalogo</a></li>
                <li><a href='/desarolloWeb/php/admin/historial.php'>Historial</a></li>
                <li><a href='#'>Page 1-3</a></li>
              </ul>
              </li>";
          }
        }
        if(isset($_SESSION['nombre']) ){
          echo "<li><a href='/desarolloWeb/php/carrito.php'>Carrito</a></li>";
          echo "<li><a href='/desarolloWeb/php/compras.php'>Compras</a></li>";
        }
      ?>
      <li><a href='/desarolloWeb/php/about.php'>About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
        if( !isset($_SESSION['nombre']) ){
          echo "<li><a href='signUp.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
          <li><form class='flexNF' accept-charset='UTF-8' role='form' action='/desarolloWeb/php/summit/login.php' method='post'>
        <li><input class='form-control' placeholder='Email' name='emailH' type='email' value='' required></li>
        <li><input class='form-control' placeholder='Password' name='passwordH' type='password' required></li>
        <li><button class='btn btn-success navButton'><span class='glyphicon glyphicon-log-in'></span> Login</button></li>
        </form></li>";
        } else {
          echo "<li><a href='/user.php'><span class='glyphicon glyphicon-user'></span> Hola, " . $_SESSION['nombre'] . "</a></li>
          <li><form class='flexNF' accept-charset='UTF-8' role='form' action='/desarolloWeb/php/summit/logout.php' method='post'>
          <li><button class='btn btn-danger navButton'><span class='glyphicon glyphicon-log-in'></span> Logout</button></li>
          </form></li>";
        }
      ?>

    </ul>
  </div>
</nav>
