<?php

class Escola
{
    protected $id_escola;
    protected $nome;
    protected $cep;
    protected $logradouro;
    protected $bairro;
    protected $localidade;
    protected $uf;

    public function getIdEscola()
    {
        return $this->id_escola;
    }

    public function setIdEscola($id_escola)
    {
        $this->id_escola = $id_escola;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getLogradouro()
    {
        return $this->logradouro;
    }

    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getLocalidade()
    {
        return $this->localidade;
    }

    public function setLocalidade($localidade)
    {
        $this->localidade = $localidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from escola";

        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_escola)
    {
        $conexao = new Conexao();

        $sql = "select * from escola where id_escola = $id_escola";
        $dados = $conexao->recuperar($sql);

        $this->id_escola = $dados[0]['id_escola'];
        $this->nome = $dados[0]['nome'];
        $this->cep = $dados[0]['cep'];
        $this->logradouro = $dados[0]['logradouro'];
        $this->bairro = $dados[0]['bairro'];
        $this->localidade = $dados[0]['localidade'];
        $this->uf = $dados[0]['uf'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];

        $conexao = new Conexao();

        $sql = "insert into escola (nome, cep, logradouro, bairro, localidade, uf)
                          values ('$nome','$cep','$logradouro','$bairro','$localidade','$uf')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_escola = $dados['id_escola'];
        $nome = $dados['nome'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];


        $conexao = new Conexao();

        $sql = "update escola set
                  nome = '$nome',
                  cep = '$cep',
                  logradouro = '$logradouro',
                  bairro = '$bairro',
                  localidade = '$localidade',
                  uf = '$uf'
                      
                where id_escola = $id_escola";

        return $conexao->executar($sql);
    }

    public function excluir($id_escola)
    {
        $conexao = new Conexao();

        $sql = "delete from escola where id_escola = $id_escola";
        return $conexao->executar($sql);
    }
}