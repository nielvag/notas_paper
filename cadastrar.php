<?php
  include_once("conectar.php");

  $texto = $_POST['nota'];
  $sql = "INSERT INTO notas(texto) VALUES ('$texto')";
  if (strlen($texto) > 0) {
    mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");
  }
  mysqli_close($strcon);

  header("Location: index.php");
  exit;
?>