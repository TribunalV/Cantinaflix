<?php
    require "Responsavel.php";
    $responsavel = new Responsavel();
    $listaResponsavel = $responsavel->listarResponsavel();
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
  <h2>Listar Responsavel</h2>
  <a href="CadastroResponsavel.php" class="btn btn-primary">Novo Responsavel</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Email</th>
        <th>Login</th>
        <th>Senha</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($listaResponsavel);$i++){ ?>
           <tr>
           <td><?php echo $listaResponsavel[$i]->getId(); ?></td>
           <td><?php echo $listaResponsavel[$i]->getNome(); ?></td>
           <td><?php echo $listaResponsavel[$i]->getTelefone(); ?></td>
           <td><?php echo $listaResponsavel[$i]->getEmail(); ?></td>
           <td><?php echo $listaResponsavel[$i]->getLogin(); ?></td>
           <td><?php echo $listaResponsavel[$i]->getSenha(); ?></td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>