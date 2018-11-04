<?php
include_once ('../conexao/conectar.php');

$responsavel = new Responsavel();
$aresponsavel = $responsavel->recuperarDados();

include_once ('../cabecalho.php');
?>

    <div class="container responsavel" style="margin-top: 60px;">
        <h2>Responsaveis</h2>
        <br/>
        <a href="../responsavel/insert.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ação</th>
                <th>ID Responsavel</th>
                <th>Nome</th>
                <th>Sexo</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição dos resultados da consulta
            foreach ($responsavel as $row) {
                ?>
                <tr>
                    <td>
                        <a href="../responsavel/formaulario.php?id_responsavel=<?= $row['id_responsavel'];?>" class="btn btn-info">Alterar</a>
                        <a href="../responsavel/processamento.php?acao=excluir&id_responsavel=<?= $row['id_responsavel'];?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $row['id_responsavel'];?></td>
                    <td><?= $row['nome'];?></td>
                    <td><?= $row['sexo'];?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php
include_once ('../rodape.php');
?>