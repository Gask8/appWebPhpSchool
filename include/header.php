<?php
session_start();
$idS = session_status();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="https://s.brightspace.com/lib/favicon/3.0.0/favicon.ico" sizes="any">
  <link rel="stylesheet" href="./css/main.css">

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
      <a class="navbar-brand" href="/desarolloWeb"><img src="./img/gamego.png" alt="logo" width="100"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/desarolloWeb">Home</a></li>
      <li><a href="tienda.php">Tienda</a></li>
      <li><a href="carrito.php">Tienda</a></li>
      <li><a href="about.php">About</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php
        if( !isset($_SESSION['nombre']) ){
          echo "<li><a href='signUp.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
          <li><form class='flexNF' accept-charset='UTF-8' role='form' action='./summit/login.php' method='post'>
        <li><input class='form-control' placeholder='Email' name='emailH' type='email' value='' required></li>
        <li><input class='form-control' placeholder='Password' name='passwordH' type='password' required></li>
        <li><button class='btn btn-success navButton'><span class='glyphicon glyphicon-log-in'></span> Login</button></li>
        </form></li>";
        } else {
          echo "<li><a href='/user.php'><span class='glyphicon glyphicon-user'></span> Hola," . $_SESSION['nombre'] . "</a></li>
          <li><form class='flexNF' accept-charset='UTF-8' role='form' action='./summit/logout.php' method='post'>
          <li><button class='btn btn-danger navButton'><span class='glyphicon glyphicon-log-in'></span> Logout</button></li>
          </form></li>";
        }
      ?>

    </ul>
  </div>
</nav>
