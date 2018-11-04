<?php
include_once ('../cabecalho.php');
?>

    <div class="container">
        <ul class="nav nav-pills nav-justified cadastro">
            <li class="active"><a href="#aluno" data-toggle="tab">Alunos</a></li>
            <li><a href="#responsavel" data-toggle="tab">Responsaveis</a></li>
            <li><a href="#escola" data-toggle="tab">Escola</a></li>
            <li><a href="#contrato" data-toggle="tab">Contrato</a></li>
            <li><a href="#pagamento" data-toggle="tab">Pagamento</a></li>
            <li><a href="#usuario" data-toggle="tab">Usuário</a></li>
            <li><a href="#perfil" data-toggle="tab">Perfil</a></li>
            <li><a href="#pagina" data-toggle="tab">Página</a></li>
        </ul>
    </div>

    <div class="tab-content tab">
        <div class="tab-pane active" id="aluno">
            <?php include_once ('../aluno/index.php');?>
        </div>
        <div class="tab-pane" id="contrato">
            <?php include_once ('../contrato/index.php');?>
        </div>
        <div class="tab-pane" id="escola">
            <?php include_once ('../escola/index.php');?>
        </div>
        <div class="tab-pane" id="pagamento">
            <?php include_once ('../pagamento/index.php');?>
        </div>
        <div class="tab-pane" id="responsavel">
            <?php include_once ('../responsavel/index.php');?>
        </div>
        <div class="tab-pane" id="usuario">
            <?php include_once ('../usuario/index.php');?>
        </div>
        <div class="tab-pane" id="perfil">
            <?php include_once ('../perfil/index.php');?>
        </div>
        <div class="tab-pane" id="pagina">
            <?php include_once ('../pagina/index.php');?>
        </div>

    </div>

<?php
include_once ('../rodape.php');
?>