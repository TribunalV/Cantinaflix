<?php
   require "Escola.php";
   //criar um objeto livro
   $escola = new Escola();
   //receber os dados do formulario e setar o objeto
   
   $escola->setNome($_POST["nome"]);
   $escola->setLogin($_POST["login"]);
   $escola->setSenha($_POST["senha"]);
   
   //mandar salvar
   $escola->incluirEscola();

   header('Location:ListarEscolas.php', true,302);
?>