<?php include '../include/header.php';?>

<style media="screen">
body {
  font-family: Arial, sans-serif;
  background: url(https://wallpaperaccess.com/full/242332.jpg) no-repeat;
  background-size: cover;
}
</style>

<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $jid=$_POST["jid"];
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
        mysqli_query($con,"UPDATE productos SET nombre='$nombre',descripcion='$descripcion',fotos='$fotos',
        precio=$precio,noalmacen=$noalmacen,fabricante='$fabricante',origen='$origen'
        WHERE id = $jid");
        echo "<div class='alert alert-success' style='text-align: center;'>
        <strong>Exito!</strong> Se ha alterado el juego en la base de datos.
        </div>";
        mysqli_close($con);
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
  <h2>Catalogo</h2>
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
        echo "<div id='totalinfo' style='display: none;'>
        <p id='infoid'>".$row['id']."</p>
        <p id='infonombre'>".$row['nombre']."</p>
        <p id='infofotos'>".$row['fotos']."</p>
        <p id='infonoalmacen'>".$row['noalmacen']."</p>
        <p id='infoprecio'>".$row['precio']."</p>
        <p id='infoorigen'>".$row['origen']."</p>
        <p id='infofabricante'>".$row['fabricante']."</p>
        <p id='infodescripcion'>".$row['descripcion']."</p>
        </div>";
        echo "</div>";
        }
      } ?>
  </div>
    <button class="btn btn-primary btn-lg btnright" onclick="addToForm()">Alterar</button>
  </div>
  <hr>
  <div class="row vertical-offset-100" style="margin-bottom: 100px">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Alter Game</h3>
        </div>
        <div class="panel-body">
          <form id="newcatalogo" accept-charset="UTF-8" role="form" action="catalogo.php" method="post" onsubmit="return validar();">
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
            <input name="jid" type="hidden">
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Alterar Juego">
          </fieldset>
            </form>
        </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
var flexys=document.querySelectorAll('.well');
var cuales=0;
for(let i=0; i<flexys.length; i++){
  flexys[i].addEventListener("click", function(){
    let x = this.querySelectorAll('input')[0]
    if(x.checked){
      this.classList.remove("selectedf");
      x.checked=false;
    } else {
      for(let j=0; j<flexys.length; j++){flexys[j].classList.remove("selectedf");}
      this.classList.add("selectedf");
      cuales=i;
      x.checked=true;
    }
  });
}

function addToForm(){
  var x = flexys[cuales].querySelector('#totalinfo');
  var y = document.getElementById('newcatalogo');
  var yi = y.querySelectorAll('input');

  y.scrollIntoView();
  yi[0].value=x.querySelector('#infonombre').innerHTML;
  yi[1].value=x.querySelector('#infofotos').innerHTML;
  yi[2].value=x.querySelector('#infoprecio').innerHTML;
  yi[3].value=x.querySelector('#infonoalmacen').innerHTML;
  yi[4].value=x.querySelector('#infofabricante').innerHTML;
  yi[5].value=x.querySelector('#infoorigen').innerHTML;
  yi[6].value=x.querySelector('#infoid').innerHTML;
  y.querySelectorAll('textarea')[0].value=x.querySelector('#infodescripcion').innerHTML;

}

function validar(){
  var val = document.getElementById('newcatalogo').querySelectorAll('input')[6];
  if(val.value!=""){
    return true;
  } else {
    alert("Seleccione un item");
  }
  return false;
}

</script>

<?php include '../include/footer.php';?>
