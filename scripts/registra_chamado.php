<?php
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    print_r($_POST);
    
    $texto = $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;
    
    $arquivo = fopen('../chamados/arquivo.hd','a');
    fwrite($arquivo, $texto);
    fclose($arquivo);

    header('Location: ../screens/abrir_chamado.php?chamado=sucesso');
    exit;
?>