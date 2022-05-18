<?php include './include/header.php';?>

<link rel="stylesheet" href="../css/paralaje.css">
<div class="bgimg-1">
  <div class="caption">
    <span class="border">SOBRE EL USUARIO</span>
  </div>
</div>

<div style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
  <h3 style="text-align:center;">Información de contacto</h3>
  <?php
  echo " <p style='text-align: center'>
      NOMBRE: ".$_SESSION["nombre"]."<br>
      EMAIL: ".$_SESSION["email"]."<br>
      NATALIDAD: ".$_SESSION["nacimiento"]."<br>
      TARJETA: ".$_SESSION["tarjeta"]."<br>
      POSTAL: ".$_SESSION["postal"]."<br>
    </p>";
  ?>
</div>

<div class="bgimg-2">
  <div class="caption">
    <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;">
      <?php
      echo strtoupper($_SESSION["nombre"]);
      ?>
    </span>
  </div>
</div>

<?php include './include/footer.php';?>
