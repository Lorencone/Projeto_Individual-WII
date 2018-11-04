<?php
include_once ('../conexao/conectar.php');

$contrato = new Contrato();
$alunos = new Aluno();

$estudante = $alunos->recuperarDados();

if(!empty($_GET['id_contrato'])){
    $contrato->carregarPorId($_GET['id_contrato']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Contrato</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_contrato" value="<?= $contrato->getIdContrato(); ?>">
            <div class="form-group">
                <label for="numero" class="col-sm-2 control-label">Número do Contrato</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="numero" name="numero" value="<?= $contrato->getNumero(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_aluno" class="col-sm-2 control-label">Aluno</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_aluno" name="id_aluno">
                        <option>Selecione</option>
                        <?php
                        foreach ($estudante as $aluno) {
                            ?>
                            <option value="<?= $aluno['id_aluno'];?>" <?= ($contrato->getIdAluno() == $aluno['id_aluno'])? "selected" : '';?> >
                                <?= $aluno['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="valor" class="col-sm-2 control-label">Valor a ser Pago</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="valor" name="valor" value="<?= $contrato->getValor(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="data_inicio" class="col-sm-2 control-label">Data de Inicio</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_inicio" name="data_inicio" value="<?= $contrato->getDataInicio(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="data_termino" class="col-sm-2 control-label">Data de Término</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_termino" name="data_termino" value="<?= $contrato->getDataTermino(); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#contrato" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>