<?php
   require "Responsavel.php";
   //criar um objeto responsavel
   $responsavel = new Responsavel();
   //receber os dados do formulario e setar o objeto
   
   $responsavel->setNome($_POST["nome"]);
   $responsavel->setTelefone($_POST["telefone"]);
   $responsavel->setEmail($_POST["email"]);
   $responsavel->setLogin($_POST["login"]);
   $responsavel->setSenha($_POST["senha"]);
   
   //mandar salvar
   $responsavel->incluirResponsavel();

   header('Location:ListarResponsaveis.php', true,302);
?>