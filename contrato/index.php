<?php
include_once ('../conexao/conectar.php');

$alunos = new Aluno();
$contratos = new Contrato();

$contrato = $contratos->recuperarDados();
$aaluno = $alunos->recuperarDados();

include_once ('../cabecalho.php');
?>

    <div class="container" style="margin-top: 60px;">
        <h2>Contratos</h2>
        <br/>
        <a href="../contrato/formulario.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ação</th>
                <th>ID Contrato</th>
                <th>Número do Contrato</th>
                <th>Data Inicio</th>
                <th>Data Termino</th>
                <th>Aluno</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição dos resultados da consulta
            foreach ($contrato as $row) {
                ?>
                <tr>
                    <td>
                        <a href="../contrato/formulario.php?id_contrato=<?= $row['id_contrato'];?>" class="btn btn-info">Alterar</a>
                        <a href="../contrato/processamento.php?id_contrato=<?= $row['id_contrato'];?>" class="btn btn-danger">Excluir</a></td>
                    <td><?= $row['id_contrato'];?></td>
                    <td><?= $row['numero'];?></td>
                    <td><?= $row['data_inicio'];?></td>
                    <td><?= $row['data_termino'];?></td>
                    <td><?php
                        foreach ($aaluno as $aluno){ ?>
                            <?= ($row['id_aluno'] == $aluno['id_aluno'])? "{$aluno['nome']}" : '';?>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php
include_once ('../rodape.php');
?>