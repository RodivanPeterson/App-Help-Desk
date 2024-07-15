<?php
    session_start();

    if (strpos($_SERVER['PHP_SELF'], 'screens') !== false) {
        if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
            header('Location: ../index.php?login=erro2');
            exit;
        }
    } else {

        require './Conexao.php';
        require './AutenticacaoModel.php';
        require './AutenticacaoService.php';

        if(isset($_GET['acao']) && $_GET['acao'] == 'validarLogin'){
            
            $conexao = new Conexao;

            $autenticacao = new Autenticacao;
            $autenticacao->__set('email', $_POST['email']);
            $autenticacao->__set('senha', $_POST['senha']);

            $autenticacaoService = new AutenticacaoService($conexao, $autenticacao);
            
            $dados_usuario = $autenticacaoService->validarUsuario();

            if(empty($dados_usuario)) {
                $_SESSION['autenticado'] = 'NÃO';

                header('Location: ../index.php?login=erro');
                exit;
            } else {
                $_SESSION['autenticado'] = 'SIM';
                $_SESSION['id'] = $dados_usuario['id'];
                $_SESSION['email'] = $dados_usuario['email'];
                $_SESSION['perfil_id'] = $dados_usuario['perfil_adm'];

                header('Location: ../screens/home.php');
                exit;
            }
        } else if(isset($_GET['acao']) && $_GET['acao'] == 'logout') {
            $_SESSION = array();
            session_destroy();

            header('Location: ../index.php?login=logout');
            exit;
        }
    }
?>