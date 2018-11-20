<?php
include_once 'Responsavel.php';

$responsavel = new Responsavel();

switch ($_GET['acao']){
    case 'salvar':
        if(!empty($_POST['id_responsavel'])){
            $responsavel->alterar($_POST);
            //print_r($_POST);
            //echo "Upadate";
            //die;
            break;
        }
        else {
            $responsavel->inserir($_POST);
            //print_r($_POST);
            //echo "Inserir";
            //die;
            break;
        }
    case 'excluir':
        $responsavel->excluir($_GET['id_responsavel']);
        break;

    case 'verificar_nome':
        $existe = $responsavel->existeNome($_GET['nome']);

        if ($existe){
            if ($existe > 1){
                echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existem {$existe} pessoas chamadas de  {$_GET['nome']}, informe outra. </h3></div>";
            } else {
                echo "<div class='alert' style='background: #2093ee; color: #ffffff'><h3 class='text-center'>Já existe {$existe} pessoa chamada de {$_GET['nome']}, informe outra.</h3></div>";
            }
        }
        die;
        break;

}

header('location: index.php');
