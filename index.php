<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="https://s.brightspace.com/lib/favicon/3.0.0/favicon.ico" sizes="any">
  <link rel="stylesheet" href="main.css">

  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
  <title>PHP/MySQL/Boot</title>
</head>
<body>

  <?php
    $nombre = $correo = $edad = $url = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nombre=$_POST["nombre"];
          $correo=$_POST["correo"];
          $edad=$_POST["edad"];
          $url=$_POST["url"];

          $con=mysqli_connect("localhost","root","","practica8");

          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          mysqli_query($con,"INSERT INTO info (nombre, correo, edad, url)
          VALUES ('$nombre', '$correo', '$edad', '$url')");
          echo "
          <div class='alert alert-success' style='text-align: center;'>
          <strong>Exito!</strong> Se ha registrado el usuario en la base de datos.
          </div>
          ";
          mysqli_close($con);
    }
  ?>

  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
  <div class="container">
      <div class="row vertical-offset-100">
      	<div class="col-md-4 col-md-offset-4">
      		<div class="panel panel-default">
  			  	<div class="panel-heading">
  			    	<h3 class="panel-title">Ingresar Informacion</h3>
  			 	</div>
  			  	<div class="panel-body">
  			    	<form accept-charset="UTF-8" role="form" action="index.php" method="post">
                      <fieldset>
  			    	  	<div class="form-group">
  			    		    <input class="form-control" placeholder="Nombre" name="nombre" type="text">
  			    		</div>
  			    		<div class="form-group">
  			    			<input class="form-control" placeholder="E-mail" name="correo" type="email" value="">
  			    		</div>
                <div class="form-group">
  			    			<input class="form-control" placeholder="Edad" name="edad" type="number" value="">
  			    		</div>
                <div class="form-group">
  			    			<input class="form-control" placeholder="Facebook" name="url" type="text" value="">
  			    		</div>
  			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Isertar">
  			    	</fieldset>
  			      	</form>
  			    </div>
  			</div>
  		</div>
  	</div>
  </div>

  <a class="btr" href="read.php"><button type="button" class="btn btn-primary">Ver Registros</button></a>
<script type="text/javascript" src="main.js"></script>
</body>
</html>
