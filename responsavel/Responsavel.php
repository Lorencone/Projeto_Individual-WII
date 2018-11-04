<?php
/**
 * Created by PhpStorm.
 * User: Lorençone
 * Date: 03/11/2018
 * Time: 19:23
 */

class Responsavel
{
    protected $id_responsavel;
    protected $nome;
    protected $data_nascimento;
    protected $sexo;
    protected $telefone;
    protected $cpf;

    public function getIdResponsavel()
    {
        return $this->id_responsavel;
    }

    public function setIdResponsavel($id_responsavel)
    {
        $this->id_responsavel = $id_responsavel;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from responsavel";

        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_responsavel)
    {
        $conexao = new Conexao();

        $sql = "select * from responsavel where id_responsavel = $id_responsavel";
        $dados = $conexao->recuperar($sql);

        $this->id_responsavel = $dados[0]['id_responsavel'];
        $this->nome = $dados[0]['nome'];
        $this->data_nascimento = $dados[0]['data_nascimento'];
        $this->sexo = $dados[0]['sexo'];
        $this->telefone = $dados[0]['telefone'];
        $this->cpf = $dados[0]['cpf'];
    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $telefone = $dados['telefone'];
        $cpf = $dados['cpf'];

        $conexao = new Conexao();

        $sql = "insert into responsavel (nome, data_nascimento, sexo, telefone, cpf)
                values ('$nome', '$data_nascimento', '$sexo', '$telefone', '$cpf')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_responsavel = $dados['id_responsavel'];
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $telefone = $dados['telefone'];
        $cpf = $dados['cpf'];

        $conexao = new Conexao();

        $sql = "update responsavel set
                nome = '$nome',
                data_nascimento = '$data_nascimento', 
                sexo = '$sexo',
                telefone = '$telefone',
                cpf = '$cpf' 
                where id_responsavel = $id_responsavel ";

        return $conexao->executar($sql);
    }

    public function excluir($id_responsavel)
    {
        $conexao = new Conexao();

        $sql = "delete from responsavel where id_responsavel = $id_responsavel";
        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM responsavel WHERE nome = '$nome'";
        $dados = $conexao->recuperar($sql);

        return $dados[0]['qtd'];
    }

}