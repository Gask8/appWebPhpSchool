<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( isset($_SESSION['uid']) ){
        $juegoid=$_POST["borrarjuego"];
        $userid=$_SESSION["uid"];

        $con=mysqli_connect("localhost","root","","proyectofinal");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        mysqli_query($con,"DELETE FROM carrito WHERE id_usuario = $userid AND id_producto = $juegoid LIMIT 1");

        mysqli_close($con);
  }
}

  header("Location: /desarolloWeb/php/carrito.php");
?>
