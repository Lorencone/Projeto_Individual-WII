<?php
include_once 'Escola.php';

$escola = new Escola();

switch ($_GET['acao']) {
    case 'salvar':

        if (!empty($_POST['id_escola'])) {
            $escola->alterar($_POST);
            break;
        } else {
            $escola->inserir($_POST);
            break;
        }

    case 'excluir':
        $escola->excluir($_GET['id_escola']);
        break;

    case 'verificar_nome':
        $existe = $escola->existeNome($_GET['nome']);

        if ($existe) {
            echo "<div class='alert' style='background: #ffffff; color: #000000'><h3 class='text-center'>Já existe {$existe} escola chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }
        die;
        break;

}

header('location: index.php');
