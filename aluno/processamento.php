<?php
include_once 'Aluno.php';

$aluno = new Aluno();

switch ($_GET['acao']){
    case 'salvar':

        if(!empty($_POST['id_aluno'])){
            $aluno->alterar($_POST);
            break;
        }
        else {
            $aluno->inserir($_POST);
            break;
        }
    case 'excluir':
        $aluno->excluir($_GET['id_aluno']);
        break;

    case 'verificar_nome':
        $existe = $aluno->existeNome($_GET['nome']);

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

header('location: ../cadastro/index.php#aluno');