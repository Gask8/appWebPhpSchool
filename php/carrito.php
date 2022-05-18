<?php include './include/header.php';?>

<style media="screen">
body {
  font-family: Arial, sans-serif;
  background: url(https://wallpaperaccess.com/full/242332.jpg) no-repeat;
  background-size: cover;
}
</style>

<?php
  $juego = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_SESSION['uid']) ){
        $juegosid=$_POST["comprarjuego"];
        $userid=$_SESSION["uid"];
        $arreglo = explode(",", $juegosid);

        $con=mysqli_connect("localhost","root","","proyectofinal");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        foreach ($arreglo as $value) {
          mysqli_query($con,"UPDATE productos SET noalmacen = noalmacen - 1 WHERE id = $value");
          mysqli_query($con,"INSERT INTO compra (`id_usuario`, `id_producto`) VALUES ('$userid','$value')");
          mysqli_query($con,"DELETE FROM carrito WHERE id_usuario = $userid AND id_producto = $value LIMIT 1");
        }

        echo "<div class='alert alert-success' style='text-align: center;'>
        <strong>Exito!</strong> has comprado juegos!.
        <a class='btn btn-primary' href='compras.php'>Ir a tu Historial</a>
        </div>";

        mysqli_close($con);
  } else {
    echo "<div class='alert alert-danger' style='text-align: center;'>
    <strong>Error!</strong> Debes estar registrado.
    <a class='btn btn-primary' href='signUp.php'>Registrarte</a>
    </div>";
  }
}
?>


<?php
  $useridq=$_SESSION["uid"];

  $con=mysqli_connect("localhost","root","","proyectofinal");

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM usuarios u, carrito c, productos p WHERE c.id_usuario = u.id AND c.id_producto = p.id AND c.id_usuario = $useridq");

  mysqli_close($con);

?>

<div class="container" style="min-height: 600px;">
  <h2 style="color: white">CARRITO</h2>
    <div class="row vertical-offset-50">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Toda la Informacion</h3>
        </div>
          <div class="panel-body">
            <table class="table">
              <thead class="thead-dark">
            <tr>
            <th scope="col"></th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Plataforma</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Borrar</th>
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
              echo "<th><input class='checkboxsel' type='checkbox' id='juego".$row['id_producto']."' name='juego".$row['id_producto']."' value='".$row['id_producto']."'></th>";
              echo "<th><img src='".$urlimg."' alt='juego' width='100' height='120'></th>";
              echo "<th>".$row['nombre']."</th>";
              echo "<th>".$row['descripcion']." - ".$row['fabricante']."</th>";
              echo "<th>".$row['origen']."</th>";
              echo "<th>".$row['precio']."$</th>";
              echo "<th>".$row['noalmacen']."</th>";
              echo "<th><form accept-charset='UTF-8' role='form' action='/desarolloWeb/php/summit/borrarC.php' method='post'><input type='hidden' id='borrarjuego".$row['id_producto']."' name='borrarjuego' value='".$row['id_producto']."'><button class='btn btn-danger navButton'><span class='glyphicon glyphicon-remove-circle'></span></button></form></th>";
              echo "</tr>";
            } ?>
            </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
  <div class="container" style="background: lightgrey;
    padding: 50px;
    border-radius: 25px;
    border: 10px solid #ffffff;
    margin-bottom: 100px;">
    <h4>Datos de la Tarjeta de Pago<h4>
      <form accept-charset="UTF-8" role="form" action="carrito.php" method="post" onsubmit="return validar();">
        <input id="recolector" type='hidden' id='juegoscomprados' name='comprarjuego' value=''>
        <input id="money" style="width: 400px;text-align: center;margin: auto;" class='form-control' type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">
        <input class="btn btn-primary" style="position: absolute;right: 20%;" type="submit" value="Comprar">
      </form>
  </div>
</div>

<script type="text/javascript">
function validar(){
  x = document.querySelectorAll("#recolector");
  y = document.querySelectorAll("#money");
  if(x[0].value!="" && y[0].value!=""){
    return true;
  } else {
    alert("Seleccione un item y la tarjeta");
  }
  return false;
}
</script>
<script type="text/javascript" src="/desarolloWeb/js/check.js"></script>
<?php include './include/footer.php';?>
