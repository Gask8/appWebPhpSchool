<?php include '../include/header.php';?>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre=$_POST["nombre"];
        $descripcion=$_POST["descripcion"];
        $fotos=$_POST["fotos"];
        $precio=$_POST["precio"];
        $noalmacen=$_POST["noalmacen"];
        $fabricante=$_POST["fabricante"];
        $origen=$_POST["origen"];

        $con=mysqli_connect("localhost","root","","proyectofinal");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        mysqli_query($con,"INSERT INTO productos (nombre, descripcion, fotos, precio, noalmacen, fabricante, origen)
        VALUES ('$nombre', '$descripcion', '$fotos', '$precio', '$noalmacen', '$fabricante', '$origen')");
        echo "<div class='alert alert-success' style='text-align: center;'>
        <strong>Exito!</strong> Se ha registrado el nuevo juego en la base de datos.
        </div>";
        mysqli_close($con);
  }
?>

<div class="container">
    <div class="row vertical-offset-100" style="margin-bottom: 100px">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Ingresar un juego al Catalogo</h3>
          </div>
          <div class="panel-body">
            <form accept-charset="UTF-8" role="form" action="add.php" method="post">
                    <fieldset>
              <div class="form-group col-md-6">
                  <p>Game Name</p>
                  <input class="form-control" placeholder="Nombre" name="nombre" type="text" required>
              </div>
              <div class="form-group col-md-6">
                <p>Photo</p>
                <input class="form-control" placeholder="some.jpg" name="fotos" type="text" required>
              </div>
              <div class="form-group col-md-6">
                <p>Precio</p>
                <input class="form-control" name="precio" type="number" required>
              </div>
              <div class="form-group col-md-6">
                <p>Stock</p>
                <input class="form-control" name="noalmacen" type="number" required>
              </div>
              <div class="form-group col-md-6">
                <p>Desarollador</p>
                <input class="form-control" placeholder="Desarollador" name="fabricante" type="text">
              </div>
              <div class="form-group col-md-6">
                <p>Plataforma</p>
                <input class="form-control" placeholder="Plataforma" name="origen" type="text">
              </div>
              <div class="form-group col-md-12">
                <p>Descripcion</p>
                <textarea class="form-control" name="descripcion" rows="6" cols="80">Descripcion.</textarea>
              </div>
              <input class="btn btn-lg btn-success btn-block" type="submit" value="Registrar">
            </fieldset>
              </form>
          </div>
      </div>
    </div>
  </div>
</div>
<?php include '../include/footer.php';?>
