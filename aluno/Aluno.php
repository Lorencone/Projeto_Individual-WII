<?php
include_once "../conexao/Conexao.php";

class Aluno
{
    protected $id_aluno;
    protected $nome;
    protected $data_nascimento;
    protected $sexo;
    protected $telefone;
    protected $cpf;
    protected $turno;
    protected $cep;
    protected $logradouro;
    protected $numero;
    protected $bairro;
    protected $localidade;
    protected $uf;
    protected $id_responsavel;
    protected $id_escola;

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
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

    public function getTurno()
    {
        return $this->turno;
    }

    public function setTurno($turno)
    {
        $this->turno = $turno;
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

    public function getIdResponsavel()
    {
        return $this->id_responsavel;
    }

    public function setIdResponsavel($id_responsavel)
    {
        $this->id_responsavel = $id_responsavel;
    }

    public function getIdEscola()
    {
        return $this->id_escola;
    }

    public function setIdEscola($id_escola)
    {
        $this->id_escola = $id_escola;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();
        $sql = "select * from aluno";

        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_aluno)
    {
        $conexao = new Conexao();

        $sql = "select * from aluno where id_aluno = $id_aluno";
        $dados = $conexao->recuperar($sql);

        $this->id_aluno = $dados[0]['id_aluno'];
        $this->nome = $dados[0]['nome'];
        $this->data_nascimento = $dados[0]['data_nascimento'];
        $this->sexo = $dados[0]['sexo'];
        $this->telefone = $dados[0]['telefone'];
        $this->cpf = $dados[0]['cpf'];
        $this->turno = $dados[0]['turno'];
        $this->cep = $dados[0]['cep'];
        $this->logradouro = $dados[0]['logradouro'];
        $this->numero = $dados[0]['numero'];
        $this->bairro = $dados[0]['bairro'];
        $this->localidade = $dados[0]['localidade'];
        $this->uf = $dados[0]['uf'];
        $this->id_responsavel = $dados[0]['id_responsavel'];
        $this->id_escola = $dados[0]['id_escola'];

    }

    public function inserir($dados)
    {
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $telefone = $dados['telefone'];
        $cpf = $dados['cpf'];
        $turno = $dados['turno'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $numero = $dados['numero'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];
        $id_responsavel = $dados['id_responsavel'];
        $id_escola = $dados['id_escola'];

        $conexao = new Conexao();

        $sql = "insert into aluno (nome, data_nascimento, sexo, telefone, cpf, turno, cep, 
                                  logradouro, bairro, localidade, uf, id_responsavel, id_escola) 
                          values ('$nome','$data_nascimento','$sexo','$telefone','$cpf','$turno','$cep',
                                  '$logradouro','$numero','$bairro','$localidade','$uf','$id_responsavel','$id_escola')";

//        print_r($sql);
//        die;

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_aluno = $dados['id_aluno'];
        $nome = $dados['nome'];
        $data_nascimento = $dados['data_nascimento'];
        $sexo = $dados['sexo'];
        $telefone = $dados['telefone'];
        $cpf = $dados['cpf'];
        $turno = $dados['turno'];
        $cep = $dados['cep'];
        $logradouro = $dados['logradouro'];
        $numero = $dados['numero'];
        $bairro = $dados['bairro'];
        $localidade = $dados['localidade'];
        $uf = $dados['uf'];
        $id_responsavel = $dados['id_responsavel'];
        $id_escola = $dados['id_escola'];


        $conexao = new Conexao();

        $sql = "update aluno set
                  nome = '$nome',
                  data_nascimento = '$data_nascimento',
                  sexo = '$sexo',
                  telefone = '$telefone',
                  cpf = '$cpf',
                  turno = '$turno',
                  cep = '$cep',
                  logradouro = '$logradouro',
                  numero = '$numero',
                  bairro = '$bairro',
                  localidade = '$localidade',
                  uf = '$uf',
                  id_responsavel = '$id_responsavel',
                  id_escola = '$id_escola'
                  
                where id_aluno = $id_aluno";

        print_r($sql);
        die;

        return $conexao->executar($sql);
    }

    public function excluir($id_aluno)
    {
        $conexao = new Conexao();

        $sql = "delete from aluno where id_aluno = $id_aluno";

        print_r($sql);
        die;

        return $conexao->executar($sql);
    }

    public function existeNome($nome)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(nome) qtd FROM aluno WHERE nome = '$nome'";
        $dados = $conexao->recuperar($sql);

        return $dados[0]['qtd'];
    }

}