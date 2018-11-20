<?php
include_once '../conexao/conectar.php';

$escola = new Escola();
$escola->carregarPorId($_GET['id_escola']);

include_once '../cabecalho.php';
?>

    <div class="container">
        <h1><?= $escola->getNome() ?></h1>
        <br>
        <img src="../upload/escola/<?= $escola->getImagem();?>" style="width: 400px; height: 400px" class="img-rounded">

        <p><strong>CEP: </strong><?= $escola->getEstreia(); ?></p>
        <p><strong>Logradouro: </strong><?= $escola->getEstudio(); ?></p>
        <p><strong>Numero: </strong><?= $escola->getEstudio(); ?></p>
        <p><strong>Bairro: </strong><?= $escola->getEstudio(); ?></p>
        <p><strong>Localidade: </strong><?= $escola->getEstudio(); ?></p>
        <p><strong>UF: </strong><?= $escola->getEstudio(); ?></p>
    </div>

<?php
include_once '../rodape.php';
?>