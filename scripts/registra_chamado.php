<?php
    session_start();

    $perfil_id = $_SESSION['perfil_id'];

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    date_default_timezone_set('America/Sao_Paulo');
    $horario = date('H:i:s');
    $data = date('d/m/Y');
    
    $_SESSION['horario'] = $horario;
    $_SESSION['data'] = $data;

    $conexao = null;

    try {
        $conexao = new PDO(
            "mysql:host=localhost;dbname=app_help_desk", "root", ""
        );
    } catch (PDOException $e) {
        echo '<p>' . $e->getMessage() . '</p>';
    }

    $query = "
        insert into tb_chamados (titulo, categoria, descricao, id_usuario)
        values(:titulo, :categoria, :descricao, :id_usuario)
    ";

    $stmt = $conexao->prepare($query);
    $stmt->bindValue(':titulo', $titulo);
    $stmt->bindValue(':categoria', $categoria);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':id_usuario', $perfil_id);
    $stmt->execute();

    header('Location: ../screens/abrir_chamado.php?chamado=sucesso');
    exit;
?>