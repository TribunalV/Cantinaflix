<?php
  
 class Produto{
    private $codigo;
    private $nome;
    private $preco;

    

    public function getCodigo(){
        return $this->codigo;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getPreco(){
        return $this->preco;
    }

    
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }

    

    public function getConexao(){
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "mega12345678";
        $dbname = "cantinaflix";

        try {
           $minhaConexao = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           // set the PDO error mode to exception
           $minhaConexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           return $minhaConexao;
        }
        catch(PDOException $e) {
         echo "entrou no catch".$e->getmessage();
         return null;
       }
    }

    public function listarProdutos(){
    
        try{
            $minhaConexao = $this->getConexao();
            $sql = $minhaConexao->prepare("select * from cantinaflix.produto");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaProd=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $produto = new Produto();
            $produto->setCodigo($linha['codigo']);
            $produto->setNome($linha['nome']);
            $produto->setPreco($linha['preco']);
            $listaProd[$i] = $produto;
            $i++;
          }
        return $listaProd;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function incluirProduto(){
       try{
           $minhaConexao = $this->getConexao();
           $sql = $minhaConexao->prepare("insert into cantinaflix.produto (codigo,nome,preco) values (:codigo,:nome,:preco)");
           $sql->bindParam("codigo",$codigo);
           $sql->bindParam("nome",$nome);
           $sql->bindParam("preco",$preco);

           $matricula = $this->getCodigo();
           $nome = $this->getNome();
           $preco = $this->getPreco();

           $sql->execute();
           //echo "incluido com sucesso";
        }
        catch(PDOException $e){
            //return "entrou no catch".$e->getmessage();
            return 0;
        }
    }
 }
?>