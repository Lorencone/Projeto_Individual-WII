<?php
include_once ('../conexao/conectar.php');

$responsavel = new Responsavel();

if(!empty($_GET['id_responsavel'])){
    $responsavel->carregarPorId($_GET['id_responsavel']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Responsavel</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal responsavel">
            <input type="hidden" name="id_responsavel" value="<?= $responsavel->getIdResponsavel(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="nome" class="form-control" id="nome" name="nome" value="<?= $responsavel->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="col-sm-2 control-label">Data Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $responsavel->getDataNascimento(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="M" <?= ($responsavel->getSexo() == "M") ? "checked" : '';?>>Masculino</label>
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="F" <?= ($responsavel->getSexo() == "F")? "checked" : '';?>>Feminino</label>
                </div>
            </div>
            <div class="form-group">
                <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $responsavel->getTelefone(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="cpf" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $responsavel->getCpf(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#responsavel" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>