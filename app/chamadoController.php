<?php
    require '../app/Conexao.php';
    require '../app/ChamadoModel.php';
    require '../app/ChamadoService.php';

    if(!isset($_SESSION)){
        session_start();
    }
    
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    
    if ($acao == 'inserir') {

        $chamado = new Chamado;
        $chamado->__set('titulo', $_POST['titulo']);
        $chamado->__set('categoria', $_POST['categoria']);
        $chamado->__set('descricao', $_POST['descricao']);
        $chamado->__set('id_usuario', $_SESSION['id']);

        date_default_timezone_set('America/Sao_Paulo');        
        $_SESSION['horario'] = date('H:i:s');
        $_SESSION['data'] = date('d/m/Y');

        $conexao = new Conexao;

        $chamadoService = new ChamadoService($conexao, $chamado);
        $chamadoService->inserir();

        header('Location: ../screens/abrir_chamado.php?chamado=sucesso');
        die();
    } else if ( $acao == 'recuperar' ) {
        $chamado = new Chamado();
        $conexao = new Conexao();

        $id_usuario = $_SESSION['id'];
        $notAdm = $_SESSION['perfil_id'] == 2;

        $chamadoService = new ChamadoService($conexao, $chamado);
        $chamados = $chamadoService->recuperar($id_usuario, $notAdm);
    }
?>