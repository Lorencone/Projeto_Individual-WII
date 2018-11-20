<?php
include_once '../conexao/conectar.php';

$aescolas = new Escola();
$escolas = $aescolas->recuperarDados();

include_once '../cabecalho.php';
?>

<div class="container">
    <h1>Escolas</h1>
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <?php foreach ($escolas as $escola) {?>
                <label>
                    <a href="escola.php?id_escola=<?= $escola['id_escola'];?>"><img src="../upload/escola/<?= $escola['imagem'];?>" style="width: 150px; height: 150px" class="img-rounded"></a>
                    <a href="escola.php?id_escola=<?= $escola['id_escola'];?>"><h4><?= $escola['nome'];?></h4></a>
                </label>
            <?php }?>
        </div>
    </div>
</div>

<?php
include_once '../rodape.php';
?>
