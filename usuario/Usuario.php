<?php
include_once "../conexao/Conexao.php";

class Usuario{

    protected $id_usuario;
    protected $nome;
    protected $email;
    protected $senha;
    protected $id_perfil;
    
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getIdPerfil()
    {
        return $this->id_perfil;
    }

    public function setIdPerfil($id_perfil)
    {
        $this->id_perfil = $id_perfil;
    }

    public function recuperarDados()
    {

        $conexao = new Conexao();
        $sql = "select * from usuario";
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_usuario)
    {
        $conexao = new Conexao();

        $sql = "select * from usuario WHERE id_usuario = '$id_usuario'";
        $dados = $conexao->recuperar($sql);

        $this->id_usuario = $dados[0]['id_usuario'];
        $this->nome = $dados[0]['nome'];
        $this->email = $dados[0]['email'];
        $this->senha = $dados[0]['senha'];
        $this->id_perfil = $dados[0]['id_perfil'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $id_perfil = $dados['id_perfil'];

        $conexao = new Conexao();
        $sql = "insert into usuario (nome, email, senha, id_perfil) 
                values ('$nome','$email', '".md5($senha)."', '$id_perfil')";

        //print_r($sql);
        //die;
        
        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_usuario = $dados['id_usuario'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $id_perfil = $dados['id_perfil'];

        $conexao = new Conexao();

        $sql = "update usuario set 
                nome = '$nome' , 
                email = '$email', 
                senha = '".md5($senha)."', 
                id_perfil = '$id_perfil'

                WHERE id_usuario = '$id_usuario'";
        
        //print_r($sql);
        //die;
        
        return $conexao->executar($sql);
    }

    public function excluir($id_usuario)
    {

        $conexao = new Conexao();
        $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
        
        //print_r($sql);
        //die;
        
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM usuario WHERE nome = '$nome'";
        $dados = $conexao->recuperar($sql);

        return $dados[0]['qtd'];
    }

    public function logar($dados)
    {

        $email = $dados['email'];
        $senha  = md5($dados['senha']);

        $conexao = new Conexao();

        $sql = "select * from usuario where email = '$email' and senha = '$senha'";

        $dados = $conexao->recuperar($sql);

//        print_r($sql);
//        echo "<br>";
//        print_r($dados);

        if (count($dados)){

            $_SESSION['usuario']['id_usuario'] = $dados[0]['id_usuario'];
            $_SESSION['usuario']['nome'] = $dados[0]['nome'];
            $_SESSION['usuario']['email'] = $dados[0]['email'];
            $_SESSION['usuario']['id_perfil'] = $dados[0]['id_perfil'];

//            $nome = $dados[0]['nome'];
//            print_r($nome);
        }

//        die;

        return $conexao->executar($sql);
    }

    public function possuiAcesso()
    {
        $raizUrl = '/php/Projeto_Individual-WII/';
        $url = $_SERVER['REQUEST_URI'];

        $sql = "select *from pagina where publica = 1";

        $conexao = new Conexao();
        $paginas = $conexao->recuperar($sql);

        foreach ($paginas as $pagina){
            if ($url == $raizUrl . $pagina['caminho']){
                return true;
            }
        }

        if (!empty($_SESSION['usuario']['id_usuario'])){

            $perfil = $_SESSION['usuario']['id_perfil'];

            $sql = "select * from permissao pe
                      inner join pagina pa on pa.id_pagina = pe.id_pagina
                    where id_perfil = '$perfil'";

            $paginas = $conexao->recuperar($sql);

            foreach ($paginas as $pagina){
                if ($url == $raizUrl . $pagina['caminho']){
                    return true;
                }
            }
        }

        return false;
    }

    public function deslogar(){

        unset($_SESSION['usuario']);
    }
}