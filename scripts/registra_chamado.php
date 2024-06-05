<?php
    session_start();

    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    date_default_timezone_set('America/Sao_Paulo');
    $horario = date('H:i:s');
    
    $data = date('d/m/Y');
    $id_chamado = sprintf('%04d', definirIdChamado()+1);

    $_SESSION['horario'] = $horario;
    $_SESSION['data'] = $data;
    $_SESSION['id_chamado'] = $id_chamado;

    $dados_registro = [$_SESSION['id'], $titulo, $categoria, $descricao, $_SESSION['email'], $horario, $data, $id_chamado];

    $texto = implode('#', $dados_registro) . PHP_EOL;

    $arquivo = fopen('../chamados/arquivo.hd','a');
    fwrite($arquivo, $texto);
    fclose($arquivo);

    header('Location: ../screens/abrir_chamado.php?chamado=sucesso');
    exit;

    function definirIdChamado(){
        $arquivo = fopen('../chamados/arquivo.hd','r');
        $chamados = array();

        while(!feof($arquivo)){
            $registro = fgets($arquivo);
            $chamado = explode('#', $registro);

            if(count($chamado) < 3) {
            continue;
            }
            $chamados[] = $chamado;
        }

        fclose($arquivo);

        print_r($chamados);

        $total_chamados = count($chamados);

        $id = $chamados[$total_chamados-1][7] == null ? 0 : (int) $chamados[count($chamados)-1][7];
        return $id;
    }
?>