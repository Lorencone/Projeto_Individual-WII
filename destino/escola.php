<?php
include_once '../conexao/conectar.php';

$escola = new Escola();
$escola->carregarPorId($_GET['id_escola']);

include_once '../cabecalho.php';
?>

    <div class="container">
        <h1><?= $escola->getNome() ?></h1>
        <br>
        <img src="../upload/escola/<?= $escola->getImagem();?>" style="width: 250px; height: 250px" class="img-rounded">
        <br>
        <br>

        <p><strong>CEP: </strong><?= $escola->getCep(); ?></p>
        <p><strong>Logradouro: </strong><?= $escola->getLogradouro(); ?></p>
        <p><strong>Numero: </strong><?= $escola->getNumero(); ?></p>
        <p><strong>Bairro: </strong><?= $escola->getBairro(); ?></p>
        <p><strong>Localidade: </strong><?= $escola->getLocalidade(); ?></p>
        <p><strong>UF: </strong><?= $escola->getUf(); ?></p>
    </div>

<?php
include_once '../rodape.php';
?>