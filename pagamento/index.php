<?php
include_once ('../conexao/conectar.php');

$pagamentos = new Pagamento();
$contratante = new Contrato();
$pagamento = $pagamentos->recuperarDados();
$contratos = $contratante->recuperarDados();

include_once ('../cabecalho.php');
?>

    <div class="container" style="margin-top: 60px;">
        <h2>Pagamentos</h2>
        <br/>
        <a href="../pagamento/insert.php" class="btn btn-success">Cadastrar</a>
        <br/>
        <br/>
        <table class="table table-hover active">
            <thead>
            <tr>
                <th>Ação</th>
                <th>ID Pagamento</th>
                <th>Contrato</th>
                <th>Aluno</th>
                <th>Valor</th>
                <th>Data Vencimento</th>
            </tr>
            </thead>
            <?php
            // Foreach para exibição dos resultados da consulta
            foreach ($pagamento as $row) {
                ?>
                <tr>
                    <td>
                        <a href="../pagamento/formaulario.php?id_pagamento=<?= $row['id_pagamento'];?>" class="btn btn-info">Alterar</a>
                        <a href="../pagamento/processamento.php?acao=excluir&id_pagamento=<?= $row['id_pagamento'];?>" class="btn btn-danger">Excluir</a>
                    </td>
                    <td><?= $row['id_pagamento'];?></td>
                    <td>
                        <?php
                        foreach ($contratos as $contrato){ ?>
                            <?= ($row['id_contrato'] == $contrato['id_contrato'])? "{$contrato['numero']}" : '';?>
                        <?php } ?>
                    </td>
                    <td><?= $row['valor'];?></td>
                    <td><?= $row['data_vencimento'];?></td>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php
include_once ('../rodape.php');
?>