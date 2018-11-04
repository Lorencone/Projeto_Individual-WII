<?php
include_once 'Escola.php';

$escola = new Escola();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_escola'])){
            $escola->alterar($_POST);
            break;
        } else {
            $escola->inserir($_POST);
            break;
        }

    case 'excluir':
        $escola->excluir($_GET['id_escola']);
        break;
}

header('location: ../cadastro/index.php#escola');
