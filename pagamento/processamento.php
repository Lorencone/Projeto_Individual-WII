<?php
include_once 'Pagamento.php';
include_once '../contrato/Contrato.php';

$pagamento = new Pagamento();
$contrato = new Contrato();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_pagamento'])){
            $pagamento->alterar($_POST);
        } else {
            $pagamento->inserir($_POST);
        }
        break;
    case 'excluir':
        $pagamento->excluir($_GET['id_pagamento']);
        break;
    case 'buscarvalor':
        echo $contrato->pagamento($_GET['id_contrato']);
        die;
        break;
}

header('location: index.php');
