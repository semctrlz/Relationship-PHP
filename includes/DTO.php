<?php

//Arquivo Meta




//Encapsulando os dados do usuário

class Usuario
{
    private $id;
    private $nome;
    private $login;
    private $senha;
    private $sexo;
    private $email;
    private $ativo;
    private $dataNascimento;
    private $dataCadastro;   

    public function getId():int
    {
        return $this->id;
    }

    public function getNome():string
    {
        return $this->nome;
    }

    public function getLogin():string
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    function __construct()
    {
        //Deixa padrão a data atual
        SetDataCadastro(date());
    }
        
}

class Telefone
{
    private $idT;
    private $tipo;
    private $numero;
    private $idUsuario;
    
    public function GetId(){
        return $this->id;
    }
    
    public function GetTipo(){
        return $this->tipo;
    }
    
    public function GetNumero(){
        return $this->numero;
    }
    
    public function GetIdUsuario(){
        return $this->idUsuario;
    }
    
    public function SetId($valor){
        $this->id = $valor;
    }
    
    public function SetTipo($valor){
        $this->tipo = $valor;
    }
    
    public function SetIdNumero($valor){
        $this->numero = $valor;
    }
    
    public function SetIdIdUsuario($valor){
        $this->idUsuario = $valor;
    }
}

class EmailConfirmacao
{
    private $idEmailConfirmacao;
    private $codigo;
    private $dataCriacao;
    private $emailConfirmacao;
    private $status;
    private $validade;
    private $idUsuario;
    
    
    public function getIdEmailConfirmacao()
    {
        return $this->idEmailConfirmacao;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getDataCriacao()
    {
        return $this->dataCriacao;
    }

    public function getEmailConfirmacao()
    {
        return $this->emailConfirmacao;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getValidade()
    {
        return $this->validade;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdEmailConfirmacao($idEmailConfirmacao)
    {
        $this->idEmailConfirmacao = $idEmailConfirmacao;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;
    }

    public function setEmailConfirmacao($emailConfirmacao)
    {
        $this->emailConfirmacao = $emailConfirmacao;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setValidade($validade)
    {
        $this->validade = $validade;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    function __construct()
    {
        SetDataCriacao(date());
    }
}

?>