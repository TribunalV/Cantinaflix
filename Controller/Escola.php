<?php
  
 class Escola{
    private $id;
    private $login;
    private $senha;
    private $nome;

    public function getId(){
        return $this->id;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setNome($nome){
        $this->nome = $nome;
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

    public function listarEscolas(){
    
        try{
            $minhaConexao = $this->getConexao();
            $sql = $minhaConexao->prepare("select * from cantinaflix.escola");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaEsc=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $escola = new Escola();
            $escola->setLogin($linha['login']);
            $escola->setSenha($linha['senha']);
            $escola->setNome($linha['nome']);
            $listaEsc[$i] = $escola;
            $i++;
          }
        return $listaEsc;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function incluirEscola(){
       try{
           $minhaConexao = $this->getConexao();
           $sql = $minhaConexao->prepare("insert into cantinaflix.escola (login,senha,nome) values (:login,:senha,:nome)");
           $sql->bindParam("login",$login);
           $sql->bindParam("senha",$senha);
           $sql->bindParam("nome",$nome);
           $login = $this->getLogin();
           $senha = $this->getSenha();
           $nome = $this->getNome();
           $sql->execute();
           //echo "incluido com sucesso";
           $last_id = $minhaConexao->lastInsertId();
           $this->setId($last_id);
           //echo "o numero gerado foi ",$last_id;
           return $last_id;
        }
        catch(PDOException $e){
            //return "entrou no catch".$e->getmessage();
            return 0;
        }
    }
 }
?>