<?php
   require "Aluno.php";
   //criar um objeto livro
   $aluno = new Aluno();
   //receber os dados do formulario e setar o objeto
   
   $aluno->setMatricula($_POST["matricula"]);
   $aluno->setNome($_POST["nome"]);
   $aluno->setLogin($_POST["login"]);
   $aluno->setSenha($_POST["senha"]);
   
   //mandar salvar
   $aluno->incluirAluno();

   header('Location:ListarAlunos.php', true,302);
?>