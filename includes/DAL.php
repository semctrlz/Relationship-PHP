<?php

require_once 'DTO.php';

//Classe que cria a cnexão com o banco
class Conection{
    
        function conecta(){
            
        return $conn = new mysqli("zwaredb.mysql.dbaas.com.br", "zwaredb", "shamboga2099", "zwaredb");
        
        if($conn->connect_error){
            echo "Erro ". $conn->connect_error;
        }
    }
}

//Classe que executa e retorna as consultas do Banco de dados
class Querry{
    
    function conecta(){
        
        $connection = new Conection();
        
        return $connection->conecta();
    }
    
    function executaQuerry($querry){
        
        return $result = $this->conecta()->query("$querry");
    }
}

//Classe de usuario
class DALUsuario{
    
    //Verifica credenciais
    
    function verificaCredenciais($login, $senha):bool{
        
        $senhaCripto = hash("whirlpool", $senha);
        
        $querry = new Querry();        
        
        $result = $querry->executaQuerry("SELECT IDUSUARIO FROM USUARIO WHERE SENHA = '$senhaCripto' AND USUARIO = '$login';");
       
        IF($result->num_rows >0){
            return true;
        }
        else
        {
            return false;
        }
       
    }
    
    //Altera do banco
    
    //Retorna dados
    
    
}



?>