<?php include '../include/header.php';?>

<?php
  $useridq=$_SESSION["uid"];
  $con=mysqli_connect("localhost","root","","proyectofinal");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM usuarios u, compra c, productos p WHERE c.id_usuario = u.id AND c.id_producto = p.id");

  mysqli_close($con);

?>

<div class="container">
    <div class="row vertical-offset-100">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Toda la Informacion</h3>
        </div>
          <div class="panel-body">
            <table class="table">
              <thead class="thead-dark">
            <tr>
            <th scope="col">Fecha de Compra</th>
            <th scope="col">Id_Game</th>
            <th scope="col">Foto_Game</th>
            <th scope="col">Nombre_Game</th>
            <th scope="col">Id_Usuario</th>
            <th scope="col">Email_Usuario</th>
            <th scope="col">Precio</th>
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
              echo "<th>".$row['date']."</th>";
              echo "<th>".$row['id_producto']."</th>";
              echo "<th><img src='".$urlimg."' alt='juego' width='100' height='120'></th>";
              echo "<th>".$row['nombre']."</th>";
              echo "<th>".$row['id_usuario']."</th>";
              echo "<th>".$row['email']."</th>";
              echo "<th>".$row['precio']."$</th>";
              echo "</tr>";
            } ?>
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>

<?php include '../include/footer.php';?>
