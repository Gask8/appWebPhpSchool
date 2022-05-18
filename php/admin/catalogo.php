<?php include '../include/header.php';?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if( isset($_SESSION['uid']) ){
      $juegosid=$_POST["juego"];
      $userid=$_SESSION["uid"];
      $arreglo = explode(",", $juegosid);

      $con=mysqli_connect("localhost","root","","proyectofinal");

      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      foreach ($arreglo as $value) {
        mysqli_query($con,"INSERT INTO carrito (`id_usuario`, `id_producto`)
        VALUES ('$userid','$value')");
      }

      echo "<div class='alert alert-success' style='text-align: center;'>
      <strong>Exito!</strong> Se ha añadido el juego a tu carrito.
      <a class='btn btn-primary' href='carrito.php'>Ir a Carrito</a>
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
  $con=mysqli_connect("localhost","root","","proyectofinal");
  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM productos;");
  mysqli_close($con);

?>
<link rel="stylesheet" href="/desarolloWeb/css/flex.css">

<div class="container">

<div class="col-sm-12 centercol">
  <h2>TIENDA</h2>
  <div class="container flexy">
      <?php while($row = mysqli_fetch_array($result)) {
        if(strpos($row['fotos'], "http") !== false){
            $urlimg = $row['fotos'];
        } else{
            $urlimg = "/desarolloWeb/img/covers/".$row['fotos'];
        }
        if($row['noalmacen']>0){
        echo "<div class='well'>";
          echo "<input class='checkboxsel' type='radio' id='juego".$row['id']."' name='juego' value='".$row['id']."'>";
          echo "<div class='innerFlex'><img src='".$urlimg."' alt='juego' width='100' height='120'><div class='innerinner'>
          <h3>".$row['nombre']."</h3>
          <p class='price'>Price: ".$row['precio']."$</p>";
          if($row['noalmacen']<=10){
              echo "<p class='soldout'>Left:".$row['noalmacen']."</p></div></div>";
          } else {
              echo "<p>Left:".$row['noalmacen']."</p></div></div>";
          }
          echo"<div class='box'>
              <a class='button' href='#popup".$row['id']."'>Ver Info</a>
            </div>
            <div id='popup".$row['id']."' class='overlay'>
              <div class='popup'>
                <h2>".$row['nombre']."</h2>
                <a class='close' href='#'>&times;</a>
                <div class='content'>
                  <b>Descripcion:</b><br>".$row['descripcion']." <hr> Desarollador: ".$row['fabricante']." <hr> Plataforma: ".$row['origen']."
                </div>
              </div>
            </div>";
        echo "</div>";
        }
      } ?>
  </div>
  <form accept-charset="UTF-8" role="form" action="tienda.php" method="post" onsubmit="return validar();">
    <input id="recolector" type='hidden' id='juego' name='juego' value=''>
    <input class="btn btn-primary btn-lg btnright" type="submit" value="Añadir al Carrito">
  </form>
  </div>
</div>

<script type="text/javascript">
var flexys=document.querySelectorAll('.well');

for(let i=0; i<flexys.length; i++){
  flexys[i].addEventListener("click", function(){
    let x = this.querySelectorAll('input')[0]
    if(x.checked){
      this.classList.remove("selectedf");
      x.checked=false;
    } else {
      this.classList.add("selectedf");
      x.checked=true;
    }
    addToHidden();
  });
}

function addToHidden(){
  var newValue="";
  for(let i=0; i<creareventosplus.length; i++){
    if(creareventosplus[i].checked){
      if(newValue!=""){
        newValue+=",";
      }
      newValue+=creareventosplus[i].value;
    }
  }
  y.value=newValue;
}

function validar(){
  x = document.querySelectorAll("#recolector");
  if(x[0].value!=""){
    return true;
  } else {
    alert("Selecciones un item");
  }
  return false;
}

</script>

<script type="text/javascript" src="/desarolloWeb/js/check.js"></script>

<?php include '../include/footer.php';?>
