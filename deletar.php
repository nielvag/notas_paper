<?php
  include_once("conectar.php");

  $id = $_POST['id'];
  $sql = "DELETE FROM notas WHERE id = $id;";
  
  mysqli_query($strcon,$sql) or die("Erro ao tentar cadastrar registro");

  mysqli_close($strcon);

  header("Location: index.php");
  exit;
?>