<?php
    require "Escola.php";
    $escola = new Escola();
    $listaEscola = $escola->listarEscolas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<div class="container">
  <h2>Listar Escola</h2>
  <a href="CadastroEscola.php" class="btn btn-primary">Nova Escola</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Login</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($listaEscola);$i++){ ?>
           <tr>
           <td><?php echo $listaEscola[$i]->getId(); ?></td>
           <td><?php echo $listaEscola[$i]->getLogin(); ?></td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>