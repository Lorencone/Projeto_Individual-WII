<?php
include_once ('../conexao/conectar.php');

$pagamento = new Pagamento();
$contratante = new Contrato();

$contratos = $contratante->recuperarDados();

if(!empty($_GET['id_pagamento'])){
    $pagamento->carregarPorId($_GET['id_pagamento']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Pagamento</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_pagamento" value="<?= $pagamento->getIdpagamento(); ?>">
            <div class="form-group">
                <label for="id_contrato" class="col-sm-2 control-label">Contrato</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_contrato" name="id_contrato">
                        <option>Selecione</option>
                        <?php
                        foreach ($contratos as $contrato) {
                            ?>
                            <option value="<?= $contrato['id_contrato'];?>" <?= ($pagamento->getIdContrato() == $contrato['id_contrato'])? "selected" : '';?> >
                                <?= $contrato['numero']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="valor" class="col-sm-2 control-label">Valor Total</label>
                <div class="col-sm-10">
                    <input type="int" class="form-control" id="valor" name="valor" value="<?= $pagamento->getValor(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tipo_pagamento" class="col-sm-2 control-label">Tipo de Pagamento</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="tipo_pagamento" id="tipo_pagamento" value="A" <?= $pagamento->getTipoPagamento() == "A" ? "checked" : '';?>>À vista</label>
                    <label class="radio-inline"><input required type="radio" name="tipo_pagamento" id="tipo_pagamento" value="B" <?= $pagamento->getTipoPagamento() == "B" ? "checked" : '';?>>Boleto</label>
                </div>
            </div>
            <div class="form-group">
                <label for="parcelas" class="col-sm-2 control-label">Parcelas</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="parcelas" name="parcelas" value="<?= $pagamento->getParcelas(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="valor_parcelado" class="col-sm-2 control-label">Valor Parcelado</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="valor_parcelado" name="valor_parcelado" value="<?= $pagamento->getValorParcelado(); ?>">
                </div>
            </div><div class="form-group">
                <label for="data_vencimento" class="col-sm-2 control-label">Data de Vencimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" value="<?= $pagamento->getDataVencimento(); ?>">
                </div>
            </div><div class="form-group">
                <label for="data_desconto" class="col-sm-2 control-label">Data de Desconto</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_desconto" name="data_desconto" value="<?= $pagamento->getDataDesconto(); ?>">
                </div>
            </div><div class="form-group">
                <label for="desconto" class="col-sm-2 control-label">Desconto</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="desconto" name="desconto" value="<?= $pagamento->getDesconto(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>