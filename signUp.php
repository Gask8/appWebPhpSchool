<?php include './include/header.php';?>

  <?php
    $nombre = $email = $password = $postal = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $nombre=$_POST["nombre"];
          $email=$_POST["email"];
          $password=$_POST["password"];
          $nacimiento=$_POST["nacimiento"];
          $postal=$_POST["postal"];

          $con=mysqli_connect("localhost","root","","proyectofinal");

          // Check connection
          if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          mysqli_query($con,"INSERT INTO usuarios (nombre, email, password, nacimiento, postal)
          VALUES ('$nombre', '$email', '$password', '$nacimiento', '$postal')");
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
      <div class="row vertical-offset-40">
      	<div class="col-md-8 col-md-offset-2">
      		<div class="panel panel-default">
  			  	<div class="panel-heading">
  			    	<h3 class="panel-title">Ingresar Informacion</h3>
  			 	  </div>
  			  	<div class="panel-body">
  			    	<form accept-charset="UTF-8" role="form" action="signUp.php" method="post">
                      <fieldset>
  			    	  <div class="form-group col-md-6">
                    <p>Nombre y Apellido</p>
  			    		    <input class="form-control" placeholder="Nombre" name="nombre" type="text" required>
  			    		</div>
  			    		<div class="form-group col-md-6">
                  <p>Correo</p>
  			    			<input class="form-control" placeholder="E-mail" name="email" type="email" value="" required>
  			    		</div>
                <div class="form-group col-md-6">
                  <p>Contraseña</p>
  			    			<input class="form-control" name="password" type="password" required>
  			    		</div>
                <div class="form-group col-md-6">
                  <p>Contraseña (de nuevo)</p>
  			    			<input class="form-control" name="password" type="password" required>
  			    		</div>
                <div class="form-group col-md-6">
                  <p>Fecha de Nacimiento</p>
  			    			<input class="form-control" name="nacimiento" type="date">
  			    		</div>
                <div class="form-group col-md-6">
                  <p>Codigo Postal</p>
  			    			<input class="form-control" placeholder="Postal" name="postal" type="text" value="">
  			    		</div>
  			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Registrarse">
  			    	</fieldset>
  			      	</form>
  			    </div>
  			</div>
  		</div>
  	</div>
  </div>

<?php include './include/footer.php';?>
