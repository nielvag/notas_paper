<?php
  include_once("conectar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <title>Notas</title>
</head>
<body>
  <div class="corpo">
    <h1>NOTAS</h1>

    <div class="cadastro">
      <form action="cadastrar.php" method="POST">
        <input name="nota" class="input" type="text" placeholder="Nova nota...">
        <button class="botao" type="submit">
          <img width="40px" src="plus.png" />
        </button>
      </form>
    </div>

    <div class="conteudo">
    <?php
      $sql = "SELECT * FROM notas ORDER BY id DESC";
      $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
      
      while ($registro = mysqli_fetch_array($resultado)) {
        $texto = $registro['texto'];
        $id = $registro['id'];
        echo "<div>
          <img title='Deletar nota' onClick={deletarNota('$id')} src='delete.png' class='icon' />
          <p title='$texto'>".$texto."</p>
        </div>";
      }
      mysqli_close($strcon);
    ?>
    </div>
  </div>

  <script>
    function deletarNota(id) {
      $.ajax({
                url: 'deletar.php',
                type: 'POST',
                data: { id },
                success: function(response) {
                  location.reload();
                }
            });
    }
</script>
</body>
</html>
