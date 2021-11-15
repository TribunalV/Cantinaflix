<?php
   require "Produto.php";

   $produto = new Produto();
   //receber os dados do formulario e setar o objeto
   
   $produto->setCodigo($_POST["codigo"]);
   $produto->setNome($_POST["nome"]);
   $produto->setPreco($_POST["preco"]);
   
   //mandar salvar
   $produto->incluirProduto();

   header('Location:ListarProdutos.php', true,302);
?>