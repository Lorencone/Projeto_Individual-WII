<?php
/**
 * Created by PhpStorm.
 * User: Lorençone
 * Date: 03/11/2018
 * Time: 19:24
 */

class Contrato
{
    protected $id_contrato;
    protected $numero;
    protected $data_inicio;
    protected $data_termino;
    protected $valor;
    protected $id_aluno;

    public function getIdContrato()
    {
        return $this->id_contrato;
    }

    public function setIdContrato($id_contrato)
    {
        $this->id_contrato = $id_contrato;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getDataInicio()
    {
        return $this->data_inicio;
    }

    public function setDataInicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
    }

    public function getDataTermino()
    {
        return $this->data_termino;
    }

    public function setDataTermino($data_termino)
    {
        $this->data_termino = $data_termino;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function setIdAluno($id_aluno)
    {
        $this->id_aluno = $id_aluno;
    }

    public function recuperarDados()
    {
        $sql = "SELECT * FROM contrato";
        $conexao = new Conexao();
        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_contrato)
    {
        $sql = "SELECT * FROM contrato WHERE id_contrato = $id_contrato";
        $conexao = new Conexao();

        $dados = $conexao->recuperar($sql);

        $this->id_contrato = $dados[0]['id_contrato'];
        $this->numero = $dados[0]['numero'];
        $this->data_inicio = $dados[0]['data_inicio'];
        $this->data_termino = $dados[0]['data_termino'];
        $this->valor = $dados[0]['valor'];
        $this->id_aluno = $dados[0]['id_aluno'];

    }

    public function inserir($dados)
    {
        $numero = $dados['numero'];
        $data_inicio = $dados['data_inicio'];
        $data_termino = $dados['data_termino'];
        $valor = $dados['valor'];
        $id_aluno = $dados['id_aluno'];

        $sql = "INSERT INTO contrato (numero, data_inicio, data_termino, valor, id_aluno) 
                VALUES ('$numero', '$data_inicio', '$data_termino', '$valor', '$id_aluno')";
        $conexao = new Conexao();

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_contrato = $dados['id_contrato'];
        $numero = $dados['numero'];
        $data_inicio = $dados['data_inicio'];
        $data_termino = $dados['data_termino'];
        $valor = $dados['valor'];
        $id_aluno = $dados['id_aluno'];

        $sql = "UPDATE contrato SET
                numero = '$numero',
                data_inicio = '$data_inicio',
                data_termino = '$data_termino',
                valor = '$valor',
                id_aluno = '$id_aluno' 
                WHERE id_contrato = $id_contrato";

        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function excluir($id_contrato)
    {
        $sql = "DELETE FROM contrato WHERE id_contrato = $id_contrato";
        $conexao = new Conexao();
        return $conexao->executar($sql);
    }

    public function existeNome($numero)
    {
        $conexao = new Conexao();

        $sql = "SELECT COUNT(numero) qtd FROM contrato WHERE numero = '$numero'";
        $dados = $conexao->recuperar($sql);

        return $dados[0]['qtd'];
    }

}