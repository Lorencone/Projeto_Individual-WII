<?php
include_once "../conexao/Conexao.php";

class Escola
{
    protected $id_escola;
    protected $nome;
    protected $imagem;
    protected $cep;
    protected $logradouro;
    protected $numero;
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

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
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

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
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
        $this->imagem = $dados[0]['imagem'];
        $this->cep = $dados[0]['cep'];
        $this->logradouro = $dados[0]['logradouro'];
        $this->numero = $dados[0]['numero'];
        $this->bairro = $dados[0]['bairro'];
        $this->localidade = $dados[0]['localidade'];
        $this->uf = $dados[0]['uf'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $imagem = $_FILES['imagem']['name'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $numero = $dados['numero'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];

        $conexao = new Conexao();

        $sql = "insert into escola (nome, imagem, cep, logradouro, numero, bairro, localidade, uf)
                          values ('$nome', '$imagem','$cep','$logradouro','$numero','$bairro','$localidade','$uf')";


//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_escola = $dados['id_escola'];
        $nome = $dados['nome'];
        $imagem = $_FILES['imagem']['name'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $numero = $dados['numero'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];


        $conexao = new Conexao();

        $sql = "update escola set
                  nome = '$nome',
                  imagem = '$imagem',
                  cep = '$cep',
                  logradouro = '$logradouro',
                  numero = '$numero',
                  bairro = '$bairro',
                  localidade = '$localidade',
                  uf = '$uf'
                      
                where id_escola = $id_escola";


//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function excluir($id_escola)
    {
        $conexao = new Conexao();

        $sql = "delete from escola where id_escola = $id_escola";

//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM escola WHERE nome = '$nome'";
        $dados = $conexao->recuperar($sql);

        return $dados[0]['qtd'];
    }

    public function uploadFoto()
    {
        if ($_FILES['imagem']['erro'] == UPLOAD_ERR_OK){
            $origem = $_FILES['imagem']['tmp_name'];
            $destino = '../upload/escola/' . $_FILES['imagem']['name'];

            move_uploaded_file($origem, $destino);
        }
    }

}