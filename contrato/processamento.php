<?php
include_once 'Contrato.php';

$contrato = new Contrato();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_contrato'])){
            $contrato->alterar($_POST);
            //print_r($_POST);
            //echo "update";
            //die;
            break;
        } else {
            $contrato->inserir($_POST);
            //print_r($_POST);
            //echo "inserir";
            //die;
            break;
        }
    case 'excluir':
        $contrato->excluir($_GET['id_contrato']);
        break;
}

header('location: index.php');
