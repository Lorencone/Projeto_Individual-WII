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

    case 'verificar_nome':
        $existe = $contrato->existeNome($_GET['numero']);

        if ($existe){
            echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} contrato com o número de {$_GET['numero']}, informe outra.</h3></div>";
        }
        die;
        break;

}

header('location: ../cadastro/index.php#contrato');
