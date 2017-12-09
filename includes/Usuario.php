<?php
class Usuario {
    private $idusuario;
    private $usuario;
    private $senha;
    private $dataCadastro;
    private $email;
    private $sexo;
    private $ativo;
    private $dataNascimento;
    private $nome;    
        
    
    
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function loadById($id){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM USUARIO WHERE IDUSUARIO = :ID", array(
            ":ID"=>$id
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }
    public static function getList(){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }
    public static function search($login){
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=>"%".$login."%"
        ));
    }
    public function login($login, $password){
        $sql = new Sql();
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        } else {
            throw new Exception("Login e/ou senha inválidos.");
        }
    }
    public function setData($data){
               
        $this->setIdusuario($data['IDUSUARIO']);
        $this->setUsuario($data['USUARIO']);
        $this->setSenha($data['SENHA']);
        $this->setEmail($data['EMAIL']);
        $this->setSexo($data['SEXO']);
        $this->setAtivo($data['ATIVO']);
        $this->setNome($data['NOME']);
        $this->setDataNascimento(new DateTime($data['DATANASCIMENTO']));
        $this->setDataCadastro(new DateTime($data['DATACADASTRO']));        
    }
    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
        ));
        if (count($results) > 0) {
            $this->setData($results[0]);
        }
    }
    public function update($login, $password){
        $this->setUsuario($login);
        $this->setSenha($password);
        $sql = new Sql();
        $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
            ':LOGIN'=>$this->getLogin(),
            ':PASSWORD'=>$this->getSenha(),
            ':ID'=>$this->getIdusuario()
        ));
    }
    public function delete(){
        $sql = new Sql();
        $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
            ':ID'=>$this->getIdusuario()
        ));
        $this->setIdusuario(0);
        $this->setUsuario("");
        $this->setSenha("");
        $this->setDataCadastro(new DateTime());
    }
    public function __construct($login = "", $password = ""){
        $this->setUsuario($login);
        $this->setSenha($password);
    }
    public function __toString(){
        return json_encode(array(
            "Id"=>$this->getIdusuario(),
            "Login"=>$this->getUsuario(),
            "Senha"=>$this->getSenha(),
            "Email"=>$this->getEmail(),
            "Sexo"=>$this->getSexo(),
            "Ativo"=>$this->getAtivo(),
            "Nome"=>$this->getNome(),
            "Nascimento"=>$this->getDataNascimento()->format("d/m/Y H:i:s"),
            "DataCadastro"=>$this->getDataCadastro()->format("d/m/Y H:i:s")            
        ));
    }
}


?>