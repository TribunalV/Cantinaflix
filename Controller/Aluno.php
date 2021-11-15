<?php
  
 class Aluno{
    private $matricula;
    private $nome;
    private $login;
    private $senha;
    

    public function getMatricula(){
        return $this->matricula;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }
    public function setNome($nome){
        $this->nome = $nome;
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

    public function listarAlunos(){
    
        try{
            $minhaConexao = $this->getConexao();
            $sql = $minhaConexao->prepare("select * from cantinaflix.aluno");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaAluno=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $aluno = new Aluno();
            $aluno->setMatricula($linha['matricula']);
            $aluno->setNome($linha['nome']);
            $aluno->setLogin($linha['login']);
            $aluno->setSenha($linha['senha']);
            $listaAluno[$i] = $aluno;
            $i++;
          }
        return $listaAluno;
       }
       catch(PDOException $e){
        return array();
       }
    }

    public function incluirAluno(){
       try{
           $minhaConexao = $this->getConexao();
           $sql = $minhaConexao->prepare("insert into cantinaflix.aluno (matricula,nome,login,senha) values (:matricula,:nome,:login,:senha)");
           $sql->bindParam("matricula",$matricula);
           $sql->bindParam("nome",$nome);
           $sql->bindParam("login",$login);
           $sql->bindParam("senha",$senha);

           $matricula = $this->getMatricula();
           $nome = $this->getNome();
           $login = $this->getLogin();
           $senha = $this->getSenha();
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