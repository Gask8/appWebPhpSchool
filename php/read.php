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
  <title>PHP/MySQL/Boot - Read</title>
</head>
<body>

  <?php
    $con=mysqli_connect("localhost","root","","practica8");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($con,"SELECT * FROM info;");

    mysqli_close($con);

  ?>

  <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
  <div class="container">
      <div class="row vertical-offset-100">
      	<div class="col-md-8 col-md-offset-2">
      		<div class="panel panel-default">
  			  	<div class="panel-heading">
  			    	<h3 class="panel-title">Toda la Informacion</h3>
  			 	</div>
  			  	<div class="panel-body">
              <table class="table">
                <thead class="thead-dark">
              <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              <th scope="col">Edad</th>
              <th scope="col">Facebook</th>
              </tr>
               </thead>
               <tbody>
              <?php while($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<th>".$row['id']."</th>";
                echo "<th>".$row['nombre']."</th>";
                echo "<th>".$row['correo']."</th>";
                echo "<th>".$row['edad']."</th>";
                echo "<th><a href='".$row['url']."'>".$row['url']."</a></th>";
                echo "</tr>";
              } ?>
              </tbody>
              </table>
  			    </div>
  			</div>
  		</div>
  	</div>
  </div>
  <a class="btr" href="index.php"><button type="button" class="btn btn-primary">Regresar</button></a>

<script type="text/javascript" src="main.js"></script>
</body>
</html>
