<?php


class Pagamento
{
    protected $id_pagamento;
    protected $valor;
    protected $tipo_pagamento;
    protected $data_vencimento;
    protected $data_desconto;
    protected $parcelas;
    protected $valor_parcelado;
    protected $desconto;
    protected $id_contrato;

    public function getIdPagamento()
    {
        return $this->id_pagamento;
    }

    public function setIdPagamento($id_pagamento)
    {
        $this->id_pagamento = $id_pagamento;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getTipoPagamento()
    {
        return $this->tipo_pagamento;
    }

    public function setTipoPagamento($tipo_pagamento)
    {
        $this->tipo_pagamento = $tipo_pagamento;
    }

    public function getDataVencimento()
    {
        return $this->data_vencimento;
    }

    public function setDataVencimento($data_vencimento)
    {
        $this->data_vencimento = $data_vencimento;
    }

    public function getDataDesconto()
    {
        return $this->data_desconto;
    }

    public function setDataDesconto($data_desconto)
    {
        $this->data_desconto = $data_desconto;
    }

    public function getParcelas()
    {
        return $this->parcelas;
    }

    public function setParcelas($parcelas)
    {
        $this->parcelas = $parcelas;
    }

    public function getValorParcelado()
    {
        return $this->valor_parcelado;
    }

    public function setValorParcelado($valor_parcelado)
    {
        $this->valor_parcelado = $valor_parcelado;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }

    public function getIdContrato()
    {
        return $this->id_contrato;
    }

    public function setIdContrato($id_contrato)
    {
        $this->id_contrato = $id_contrato;
    }

    public function recuperarDados()
    {
        $conexao = new Conexao();

        $sql = "select * from pagamento";

        return $conexao->recuperar($sql);
    }

    public function carregarPorId($id_pagamento)
    {
        $conexao = new Conexao();

        $sql = "select * from pagamento where id_pagamento = $id_pagamento";
        $dados = $conexao->recuperar($sql);

        $this->id_pagamento = $dados[0]['id_pagamento'];
        $this->valor = $dados[0]['valor'];
        $this->tipo_pagamento = $dados[0]['tipo_pagamento'];
        $this->parcelas = $dados[0]['parcelas'];
        $this->valor_parcelado = $dados[0]['valor_parcelado'];
        $this->data_vencimento = $dados[0]['data_vencimento'];
        $this->data_desconto = $dados[0]['data_desconto'];
        $this->desconto = $dados[0]['desconto'];
        $this->id_contrato = $dados[0]['id_contrato'];
    }

    public function inserir($dados)
    {
        $valor = $dados['valor'];
        $tipo_pagamento = $dados['tipo_pagamento'];
        $data_vencimento = $dados['data_vencimento'];
        $data_desconto = $dados['data_desconto'];
        $parcelas = $dados['parcelas'];
        $valor_parcelado = $dados['valor_parcelado'];
        $desconto = $dados['desconto'];
        $id_contrato = $dados['id_contrato'];

        $conexao = new Conexao();

        $sql = "insert into pagamento (valor, tipo_pagamento, data_vencimento, data_desconto, 
                                        parcelas, valor_parcelado, desconto, id_contrato)
                values ('$valor','$tipo_pagamento','$data_vencimento','$data_desconto',
                        '$parcelas','$valor_parcelado','$desconto','$id_contrato')";

        return $conexao->executar($sql);
    }

    public function alterar($dados)
    {
        $id_pagamento = $dados['id_pagamento'];
        $valor = $dados['valor'];
        $tipo_pagamento = $dados['tipo_pagamento'];
        $data_vencimento = $dados['data_vencimento'];
        $data_desconto = $dados['data_desconto'];
        $parcelas = $dados['parcelas'];
        $valor_parcelado = $dados['valor_parcelado'];
        $desconto = $dados['desconto'];
        $id_contrato = $dados['id_contrato'];

        $conexao = new Conexao();

        $sql = "update pagamento set
                valor = '$valor',
                tipo_pagamento = '$tipo_pagamento',
                data_vencimento = '$data_vencimento',
                data_desconto = '$data_desconto',
                parcelas = '$parcelas',
                valor_parcelado = '$valor_parcelado',
                desconto = '$desconto',
                id_contrato = '$id_contrato'
                where id_pagamento = $id_pagamento ";

        return $conexao->executar($sql);
    }

    public function excluir($id_pagamento)
    {
        $conexao = new Conexao();

        $sql = "delete from pagamento where id_pagamento = $id_pagamento";
        return $conexao->executar($sql);
    }
}