<?php 

require_once 'DAL.php';

class BLLUsuario{

    function verificaCredenciais($login, $senha):bool{
        
        $usuario = new DALUsuario();
        return $usuario->verificaCredenciais($login, $senha);
        
    }
}


?>