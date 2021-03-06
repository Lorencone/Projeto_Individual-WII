<?php
include_once ('../conexao/conectar.php');

$usuario = new Usuario();
$aperfil = new Perfil();

$perfies = $aperfil->recuperarDados();

if(!empty($_GET['id_usuario'])){
    $usuario->carregarPorId($_GET['id_usuario']);
}

include_once("../cabecalho.php");
?>
    <div class="container" style="margin-top: 60px;">
        <h1>Usuario</h1>
        <br/>
        <form method="post" action="../usuario/processamento.php?acao=salvar" class="form-horizontal">
            <input type="hidden" name="id_usuario" value="<?= $usuario->getIdUsuario(); ?>">
            <div class="form-group">
                <label for="nome" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" name="nome" value="<?= $usuario->getNome(); ?>">
                </div>
                <div id="mensagemNome" role="alert"></div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $usuario->getEmail(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="senha" class="col-sm-2 control-label">Senha</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="senha" name="senha" value="<?= $usuario->getSenha(); ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="id_perfil" class="col-sm-2 control-label">Perfil</label>
                <div class="col-sm-10">
                    <select class="form-control" id="id_perfil" name="id_perfil">
                        <option>Selecione</option>
                        <?php
                        foreach ($perfies as $perfil) {
                            ?>
                            <option value="<?= $perfil['id_perfil'];?>" <?= ($usuario->getIdPerfil() == $perfil['id_perfil'])? "selected" : '';?> >
                                <?= $perfil['nome']; ?>
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
