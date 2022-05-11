<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_destroy();
  }

  header("Location: /desarolloWeb/index.php");
  exit();
?>
