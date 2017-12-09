<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Flat Login Form 3.0</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  
  <?php

require_once('includes'.DIRECTORY_SEPARATOR.'Header.php');
require_once 'includes'.DIRECTORY_SEPARATOR.'BLL.php';

if(isset($_POST['login']) && isset($_POST['senha'])){
    
    $login=$_POST['login'];	//Pegando dados passados por AJAX
    $senha=$_POST['senha'];
    
    
    
    $usuario = new BLLUsuario();
    if($usuario->verificaCredenciais($login, $senha)){
        echo "Logado";        
    }else{
        echo "Erro!";
    }
}

require_once('includes'.DIRECTORY_SEPARATOR.'Bottom.php');
?>
<div class="pen-title">
  <h1>Login</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
    <div class="tooltip">Clique Me</div>
  </div>
  <div class="form">
    <h2>Login</h2>
    <form method="post">
      <input type="text" name="login" placeholder="Login"/>
      <input type="password" name="senha" placeholder="Senha"/>
      <button>Login</button>
    </form>
  </div>
  <div class="form">
    <h2>Criar conta</h2>
    <form method="post">
      <input type="text" placeholder="Login"/>
      <input type="password" placeholder="Senha"/>
      <input type="email" placeholder="Email"/>
      
      <button>Criar</button>
    </form>
  </div>
  <div class="cta"><a href="http://andytran.me">Esqueceu sua senha?</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


    <script  src="js/index.js"></script>

</body>
</html>



