<?php
  require_once '../scripts/validador_acesso.php';
  require_once '../components/menu.php';

  $chamados = array();
  $arquivo = fopen('../chamados/arquivo.hd','r');
  
  while(!feof($arquivo)){
    $registro = fgets($arquivo);
    $chamado = explode('#', $registro);
    $notAdm = $_SESSION['perfil_id'] == 2;
    
    if($notAdm) {
      if($_SESSION['id'] != $chamado[0]) {
        continue;
      }
    }
    if(count($chamado) < 3) {
      continue;
    }
    $chamados[] = $chamado;
  }

  fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/estilo_menu.css">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      .dados-abertura-chamado{
        float: right;
        margin: 0 0 5px 20px;
        text-align: end;
        font-size: 12px;
        line-height: 1em;
        font-weight: 400;
      }
      .dados-abertura-chamado .email {
        color: blue;
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h1 class="h5">Consultar chamados</h1>
            </div>
            
            <div class="card-body">
              
            <?php if($chamados === []){ ?>
              <div class="card mb-3 bg-light">
                <div class="card-body d-flex align-items-center text-center" style="flex-direction: column;">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" width="50px"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#cfcdcc" d="M40.1 467.1l-11.2 9c-3.2 2.5-7.1 3.9-11.1 3.9C8 480 0 472 0 462.2V192C0 86 86 0 192 0S384 86 384 192V462.2c0 9.8-8 17.8-17.8 17.8c-4 0-7.9-1.4-11.1-3.9l-11.2-9c-13.4-10.7-32.8-9-44.1 3.9L269.3 506c-3.3 3.8-8.2 6-13.3 6s-9.9-2.2-13.3-6l-26.6-30.5c-12.7-14.6-35.4-14.6-48.2 0L141.3 506c-3.3 3.8-8.2 6-13.3 6s-9.9-2.2-13.3-6L84.2 471c-11.3-12.9-30.7-14.6-44.1-3.9zM160 192a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64z"/></svg>
                  <p class="h6 card-title mt-2">
                    Parece que você está pronto para começar! Não encontramos nenhum chamado aberto no momento.<br>Deseja <a href="./abrir_chamado.php">abrir um chamado?</a>
                  </p>
                </div>
              </div>
            <?php
              } else {
                foreach($chamados as $chamado_dados){
            ?>

              <div class="card mb-3 bg-light">
                <div class="card-body">
                  <span class="dados-abertura-chamado">
                    <?php echo $chamado_dados[5]; ?> <br>
                    <?php echo $chamado_dados[6]; ?> <br>
                    <span class="email"><?php echo $chamado_dados[4]; ?></span>
                  </span>
                  <span class="h6 text-muted">#<?php echo $chamado_dados[7]; ?></span>
                  <h2 class="h5 card-title"><?php echo $chamado_dados[1]; ?></h2>
                  <h3 class="h6 card-subtitle mb-2 text-muted"><?php echo $chamado_dados[2]; ?></h3>
                  <p class="card-text"><?php echo $chamado_dados[3]; ?></p>
                </div>
              </div>

            <?php }} ?>

              <div class="row mt-5 justify-content-center">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="./home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>