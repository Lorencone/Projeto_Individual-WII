<?php
include_once ('../conexao/conectar.php');

$escola = new Escola();

if(!empty($_GET['id_escola'])){
    $escola->carregarPorId($_GET['id_escola']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Escola</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="id_escola" value="<?= $escola->getIdEscola(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $escola->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="cep" class="col-sm-2 control-label">CEP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cep" name="cep" value="<?= $escola->getCep(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="logradouro" class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= $escola->getLogradouro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="numero" class="col-sm-2 control-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numero" name="numero" value="<?= $escola->getNumero(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $escola->getBairro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="localidade" class="col-sm-2 control-label">Localidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="localidade" name="localidade" value="<?= $escola->getLocalidade(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="uf" class="col-sm-2 control-label">UF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="uf" name="uf" value="<?= $escola->getUf(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="imagem" name="imagem" value="<?= $escola->getImagem(); ?>">
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
include_once("../location/viacep.php");
include_once("../rodape.php");
?>
<script>
    // AJAX para verificação do nome
    $('#nome').change(function () {

        $.ajax({
            url: 'processamento.php?acao=verificar_nome&' + $('#nome').serialize(),
            success: function (dados) {
                $('#mensagemNome').html(dados);
            }
        });

        // Verificação em JQUERY Load
        // $('#mensagemNome').load('processamento.php?acao=verificar_nome&nome=' + $('#nome').val());

    });
</script>
