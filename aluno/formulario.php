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

include_once('../cabecalho.php');
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Aluno</h1>
        <br/>
        <form method="post" action="processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_aluno" id="id_aluno" value="<?= $aluno->getIdAluno(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $aluno->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="data_nascimento" class="col-sm-2 control-label">Data Nascimento</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?= $aluno->getDataNascimento(); ?>" required>
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
                <label for="cep" class="col-sm-2 control-label">CEP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="cep" name="cep" value="<?= $aluno->getCep(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="logradouro" class="col-sm-2 control-label">Logradouro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= $aluno->getLogradouro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="numero" class="col-sm-2 control-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="numero" name="numero" value="<?= $aluno->getNumero(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="bairro" class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $aluno->getBairro(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="localidade" class="col-sm-2 control-label">Localidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="localidade" name="localidade" value="<?= $aluno->getLocalidade(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="uf" class="col-sm-2 control-label">UF</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="uf" name="uf" value="<?= $aluno->getUf(); ?>">
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
                    <a href="index.php" class="btn btn-danger">Voltar</a>
                </div>
            </div>
        </form>
    </div>
<?php
include_once("../location/viacep.php");
include_once("../rodape.php");
?>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
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
<script>
    $(document).ready(function () {

        // Telefone
        var maskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },
            options = {
                onKeyPress: function (val, e, field, options) {
                    field.mask(maskBehavior.apply({}, arguments), options);
                }
            };
        $('#telefone').mask(maskBehavior, options);

        // CPF
        $('#cpf').mask('000.000.000-00', {reverse: true});

    });
</script>
