<?php
include_once 'Pagamento.php';

$pagamento = new Pagamento();

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
}

header('location: index.php');
