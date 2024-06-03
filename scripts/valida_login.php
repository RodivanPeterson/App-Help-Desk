<?php
    session_start();
    
    // Variável para autenticação
    $usuario_valido = false;

    // Usuários da aplicação
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
    );

    foreach($usuarios_app as $usuario) {

        if($_POST['email'] == $usuario['email'] && $_POST['senha'] == $usuario['senha']){
            $usuario_valido = true;
        }

        echo "Usuário formulário: <br>";
        print_r($usuario);
        echo "<br><br>Usuário banco de dados: <br>";
        print_r($_POST);
        echo "<br><br><hr><br>";
    }

    if($usuario_valido){
        $_SESSION['autenticado'] = 'SIM';
        header('Location: ../screens/home.php');
        exit;
    } else {
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: ../index.php?login=erro');
        exit;
    }
?>