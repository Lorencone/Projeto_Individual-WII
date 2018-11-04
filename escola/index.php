<?php
include_once ('../conexao/conectar.php');

$escolas = new Escola();
$escola = $escolas->recuperarDados();

include_once ('../cabecalho.php');
?>

    <div class="container" style="margin-top: 60px;">
        <h2>Escolas</h2>
        <br/>
        <a href="../escola/formulario.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ação</th>
                <th>ID Escola</th>
                <th>Nome</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição dos resultados da consulta
            foreach ($escola as $row) {
                ?>
                <tr>
                    <td>
                        <a href="../escola/formulario.php?id_escola=<?= $row['id_escola'];?>" class="btn btn-info">Alterar</a>
                        <a href="../escola/processamento.php?acao=excluir&id_escola=<?= $row['id_escola'];?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $row['id_escola'];?></td>
                    <td><?= $row['nome'];?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php
include_once ('../rodape.php');
?>