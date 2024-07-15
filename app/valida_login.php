<?php
    session_start();
    
    // Variável para autenticação
    $usuario_valido = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    $usuario_email = null;

    $conexao = new PDO(
        "mysql:host=localhost;dbname=app_help_desk",
        "root",
        ""
    );
    $query = "
        SELECT id, email, perfil_adm
        FROM tb_usuarios
        WHERE email = :email AND senha = :senha
    ";
    $stmt = $conexao->prepare($query);
    $stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
    $stmt->bindValue(":senha", $_POST['senha'], PDO::PARAM_STR);
    $stmt->execute();

    $dados_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

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
?>