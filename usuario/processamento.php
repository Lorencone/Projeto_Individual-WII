<?php
include_once('Usuario.php');

$usuario = new Usuario();

switch ($_GET['acao']) {

    case 'salvar':
        if (!empty($_POST['id_usuario'])) {
            $usuario->alterar($_POST);
        } else {
            $usuario->inserir($_POST);
        }
    case 'excluir':
        $usuario->excluir($_GET['id_usuario']);
        break;

    case 'verificar_nome':
        $existe = $usuario->existeNome($_GET['nome']);

        if ($existe) {
            echo "<div class='alert' style='background: #ffffff; color: #000000'><h3 class='text-center'>Já existe {$existe} pessoa chamada de {$_GET['nome']}, informe outra.</h3></div>";
        }
        die;
        break;

    case 'logar':
        $usuario->logar($_POST);
        if (!empty($_SESSION['usuario'])) {

            switch ($_SESSION['usuario']['id_perfil']) {
                case Perfil::PERFIL_ADMINISTRADOR:
                    header('location: ../pagina/index.php');
                case Perfil::PERFIL_EDITOR:
                    header('location: ../escola/index.php');
                case Perfil::PERFIL_USUARIO:
                    header('location: ../destino/index.php');
            }
        }
        die;
        break;
    case 'deslogar':
        $usuario->deslogar();
        break;
}

header('location: index.php');
