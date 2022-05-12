<?php include './include/header.php';?>

<?php
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
              $urlimg = "./img/covers/".$row['fotos'];
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
          <form accept-charset="UTF-8" role="form" action="carrito.php" method="post">
            <input id="recolector" type='hidden' id='juegoscomprados' name='comprarjuego' value=''>
            <input class="btn btn-primary" style="position: absolute;right: 25px;margin-top: 20px;" type="submit" value="Comprar">
          </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
var creareventosplus=document.querySelectorAll('.checkboxsel');
var y = document.querySelectorAll('#recolector')[0];

for(let i=0; i<creareventosplus.length; i++){
  creareventosplus[i].addEventListener("click", function(){
    addToHidden();
  });
}

function addToHidden(){
  var newValue="";
  for(let i=0; i<creareventosplus.length; i++){
    if(creareventosplus[i].checked){
      newValue+=creareventosplus[i].value;
      if(i!=creareventosplus.length-1){
        newValue+=",";
      }
    }
  }
  y.value=newValue;
}
</script>
<?php include './include/footer.php';?>
