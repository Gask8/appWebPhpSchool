<?php
  session_start();

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emailH=$_POST["emailH"];
        $passwordH=$_POST["passwordH"];

        $con=mysqli_connect("localhost","root","","proyectofinal");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM usuarios WHERE email = '$emailH'");

        if($result) {
          while($row = mysqli_fetch_assoc($result)) {
            $uidG=$row["id"];
            $nombreG=$row["nombre"];
            $emailG=$row["email"];
            $passwordG=$row["password"];
            $nacimientoG=$row["nacimiento"];
            $tarjetaG=$row["tarjeta"];
            $postalG=$row["postal"];
          }

            if($passwordG == $passwordH){
               $_SESSION["uid"] = $uidG;
               $_SESSION["nombre"] = $nombreG;
               $_SESSION["email"] = $emailG;
               $_SESSION["nacimiento"] = $nacimientoG;
               $_SESSION["tarjeta"] = $tarjetaG;
               $_SESSION["postal"] = $postalG;
            } else {
              echo "Contraseña equivocada";
            }
        } else {
            echo "Error de Busqueda! ".$sql->errorno;
        }

        mysqli_close($con);
  }

  header("Location: /desarolloWeb/index.php");
?>
