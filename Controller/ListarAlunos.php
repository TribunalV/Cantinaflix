<?php
    require "Aluno.php";
    $aluno = new Aluno();
    $listaAluno = $aluno->listarAlunos();
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
  <h2>Listar Alunos</h2>
  <a href="CadastroEscola.php" class="btn btn-primary">Novo Aluno</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Matricula</th>
        <th>Login</th>
      </tr>
    </thead>
    <tbody>
      <?php for($i=0;$i<count($listaAluno);$i++){ ?>
           <tr>
           <td><?php echo $listaAluno[$i]->getMatricula(); ?></td>
           <td><?php echo $listaAluno[$i]->getLogin(); ?></td>
           </tr>   
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>