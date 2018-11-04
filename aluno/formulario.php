<?php
include_once ('../conexao/conectar.php');

$aluno = new Aluno();
$escolas = new Escola();
$responsaveis = new Responsavel();

$instituicao = $escolas->recuperarDados();
$responsavel = $responsaveis->recuperarDados();

if(!empty($_GET['id_aluno'])){
    $aluno->carregarPorId($_GET['id_aluno']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Aluno</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_aluno" value="<?= $aluno->getIdAluno(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno->getNome(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="col-sm-2 control-label">Data Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $aluno->getDataNascimento(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="M" <?= $aluno->getSexo() == "M" ? "checked" : '';?>>Masculino</label>
                    <label class="radio-inline"><input required type="radio" name="sexo" id="sexo" value="F" <?= $aluno->getSexo() == "F" ? "checked" : '';?>>Feminino</label>
                </div>
            </div>
            <div class="form-group">
                <label for="telefone" class="col-sm-2 control-label">Telefone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $aluno->getTelefone(); ?>">
                </div>
            </div>                        
            <div class="form-group">
                <label for="cpf" class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $aluno->getCpf(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="turno" class="col-sm-2 control-label">Turno</label>
                <div class="col-sm-10">
                    <label class="radio-inline"><input required type="radio" name="turno" id="turno" value="M" <?= $aluno->getTurno() == "M" ? "checked" : '';?>>Matutino</label>
                    <label class="radio-inline"><input required type="radio" name="turno" id="turno" value="V" <?= $aluno->getTurno() == "V" ? "checked" : '';?>>Vespertino</label>
                    <label class="radio-inline"><input required type="radio" name="turno" id="turno" value="N" <?= $aluno->getTurno() == "N" ? "checked" : '';?>>Noturno</label>
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">CEP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getCep(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getLogradouro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getNumero(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getBairro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">Localidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getLocalidade(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="endereco" class="col-sm-2 control-label">UF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $aluno->getUf(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_responsavel" class="col-sm-2 control-label">Responsavel</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_responsavel" name="id_responsavel">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($responsavel as $pais) {
                            ?>
                            <option value="<?= $pais['id_responsavel'];?>" <?= ($aluno->getIdResponsavel() == $pais['id_responsavel'])? "selected" : '';?> >
                                <?= $pais['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="id_escola" class="col-sm-2 control-label">Escola</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_escola" name="id_escola">
                        <option value="">Selecione</option>
                        <?php
                        foreach ($instituicao as $escola) {
                            ?>
                            <option value="<?= $escola['id_escola'];?>" <?= ($aluno->getIdEscola() == $escola['id_escola'])? "selected" : '';?> >
                                <?= $escola['nome']; ?>
                            </option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="reset" class="btn btn-info">Limpar</button>
                    <a href="../cadastro/index.php#aluno" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../rodape.php");
?>