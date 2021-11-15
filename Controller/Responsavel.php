<?php
  
 class Responsavel{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $login;
    private $senha;

    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getTelefone(){
        return $this->telefone;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
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

    public function listarResponsavel(){
        //vai ao banco de dados e pega todos os livros
        try{
            $minhaConexao = $this->getConexao();
            $sql = $minhaConexao->prepare("select * from cantinaflix.responsavel");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaResp=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $responsavel = new responsavel();
            $responsavel->setNome($linha['nome']);
            $responsavel->setTelefone($linha['telefone']);
            $responsavel->setEmail($linha['email']);
            $responsavel->setLogin($linha['login']);
            $responsavel->setSenha($linha['senha']);
            $listaResp[$i] = $responsavel;
            $i++;
          }
        return $listaResp;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function incluirResponsavel(){
       try{
           $minhaConexao = $this->getConexao();
           $sql = $minhaConexao->prepare("insert into cantinaflix.responsavel (nome,telefone,email,login,senha) values (:nome,:telefone,:email,:login,:senha)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("telefone",$telefone);
           $sql->bindParam("email",$email);
           $sql->bindParam("login",$login);
           $sql->bindParam("senha",$senha);
           
           $nome = $this->getNome();
           $telefone = $this->getTelefone();
           $email = $this->getEmail();
           $login = $this->getLogin();
           $senha = $this->getSenha();
           
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