<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Estilos/EstiloCadastro.css">
    <link rel="stylesheet" href="Estilos/responsive.css">
    <title>Cadastre um Aluno</title>
   

</head>
<body>
   <main>
        <div>  
          <form class="Formulario2" action="/CantinaFlix/Controller/ProcessaCadAluno.php" method="post">
            <h1>Insira as informações: </h1>

            <label for="matricula">
               <span>Matricula</span>
               <input type="text" class="form-control" id="matricula"  name="matricula" required>   
            </label>

            <label for="name">
               <span>Nome</span>
               <input type="text" class="form-control" id="nome"  name="nome" required>   
            </label>

            <label for="login">
              <span>Login</span>
              <input type="text" class="form-control" id="login"  name="login" required>
           </label>
            
            <label for="password">
               <span>Senha</span>
               <input type="text" class="form-control" id="senha"  name="senha" required>        
            </label>      
        
             
            <button  type="submit" class="btn btn-default">Enviar</button>

         </form>        
            

        </div>
    </main>
    
</body>
</html>