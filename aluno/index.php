<?php
include_once ('../conexao/conectar.php');

$alunos = new Aluno();
$escolas = new Escola();
$responsaveis = new Responsavel();

$aaluno = $alunos->recuperarDados();
$instituicao = $escolas->recuperarDados();
$aresponsavel = $responsaveis->recuperarDados();

include_once ('../cabecalho.php');
?>

    <div class="container" style="margin-top: 60px;">
        <h2>Alunos</h2>
        <br/>
        <a href="../aluno/insert.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ação</th>
                <th>ID Aluno</th>
                <th>Nome</th>
                <th>Sexo</th>
                <th>Data Nascimento</th>
                <th>Responsavel</th>
                <th>Escola</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição dos resultados da consulta
            foreach ($aaluno as $aluno) {
                ?>
                <tr>
                    <td><a href="../aluno/formaulario.php?id_aluno=<?= $aluno['id_aluno'];?>" class="btn btn-info">Alterar</a>
                        <a href="../aluno/processamento.php?acao=excluir&id_aluno=<?= $aluno['id_aluno'];?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $aluno['id_aluno'];?></td>
                    <td><?= $aluno['nome'];?></td>
                    <td><?= $aluno['sexo'];?></td>
                    <td><?= $aluno['data_nascimento'];?></td>
                    <td><?php
                        foreach ($aresponsavel as $responsavel){ ?>
                            <?= ($aluno['id_responsavel'] == $responsavel['id_responsavel'])? "{$responsavel['nome']}" : '';?>

                        <?php } ?>
                    </td>
                    <td><?php
                        foreach ($instituicao as $escola){ ?>
                            <?= ($aluno['id_escola'] == $escola['id_escola'])? "{$escola['nome']}" : '';?>
                        <?php } ?>
                    </td>
                </tr>

            <?php } ?>
        </table>
    </div>

<?php
include_once ('../rodape.php');
?>