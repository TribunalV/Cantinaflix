<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="Estilos/EstiloCadastro.css">
    <link rel="stylesheet" href="Estilos/responsive.css">
    <title>Faça seu Cadastro</title>
   

</head>
<body>
   <main>
        <div>  
          <form class="Formulario" action="/CantinaFlix/Controller/ProcessaCadEscola.php" method="post">
            <h1>Cadastre-se</h1>

         
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