<?php include './include/header.php';?>

<style media="screen">
body {
  font-family: Arial, sans-serif;
  background: url(https://cdn.dribbble.com/users/673549/screenshots/3159371/videogamecontroller_background.jpg) no-repeat;
  background-size: cover;
}
</style>

<?php
  $useridq=$_SESSION["uid"];
  $con=mysqli_connect("localhost","root","","proyectofinal");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM usuarios u, compra c, productos p WHERE c.id_usuario = u.id AND c.id_producto = p.id AND c.id_usuario = $useridq");

  mysqli_close($con);

?>

<div class="container" style="min-height: 600px;">
  <h2 style="color: white">COMPRAS</h2>
    <div class="row vertical-offset-50" style="margin-bottom: 100px">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Toda la Informacion</h3>
        </div>
          <div class="panel-body">
            <table class="table">
              <thead class="thead-dark">
            <tr>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Precio</th>
            <th scope="col">Fecha de Compra</th>
            </tr>
             </thead>
             <tbody>
            <?php while($row = mysqli_fetch_array($result)) {
              if(strpos($row['fotos'], "http") !== false){
                  $urlimg = $row['fotos'];
              } else{
                  $urlimg = "/desarolloWeb/img/covers/".$row['fotos'];
              }
              echo "<tr>";
              echo "<th><img src='".$urlimg."' alt='juego' width='100' height='120'></th>";
              echo "<th>".$row['nombre']."</th>";
              echo "<th>".$row['descripcion']." - ".$row['fabricante']."</th>";
              echo "<th>".$row['origen']."</th>";
              echo "<th>".$row['precio']."$</th>";
              echo "<th>".$row['date']."</th>";
              echo "</tr>";
            } ?>
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

<?php include './include/footer.php';?>
