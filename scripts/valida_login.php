<?php
    session_start();
    
    // Variável para autenticação
    $usuario_valido = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    $usuario_email = null;

    // Usuários da aplicação
    $usuarios_app = array(
        array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 5, 'email' => 'anderson@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    );

    foreach($usuarios_app as $usuario) {

        if($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']){
            $usuario_valido = true;
            $usuario_id = $usuario['id'];
            $usuario_perfil_id = $usuario['perfil_id'];
            $usuario_email = $usuario['email'];
        }
    }

    if($usuario_valido){
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        $_SESSION['email'] = $usuario_email;
        header('Location: ../screens/home.php');
        exit;
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: ../index.php?login=erro');
        exit;
    }
?>