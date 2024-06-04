<?php
  require_once '../scripts/validador_acesso.php';
  require_once '../components/menu.php';

  $chamados = array();
  $arquivo = fopen('../chamados/arquivo.hd', 'r');

  while(!feof($arquivo)){
    $registro = fgets($arquivo);
    $chamados[] = $registro;
  }

  fclose($arquivo);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>
    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              
              <?php
                foreach($chamados as $chamado){
                  $chamado_dados = explode('#', $chamado);

                  if($_SESSION['perfil_id'] == 2 && $chamado_dados[0] != $_SESSION['id']){
                    continue;
                  }
                  
                  if(count($chamado_dados) < 4){
                    continue;
                  }
              ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $chamado_dados[1] ?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> <?php echo $chamado_dados[2] ?> </h6>
                    <p class="card-text"> <?php echo $chamado_dados[3] ?> </p>

                  </div>
                </div>
              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                <a class="btn btn-lg btn-warning btn-block" href="http://localhost/App-Help-Desk/screens/home.php">Voltar</a>
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