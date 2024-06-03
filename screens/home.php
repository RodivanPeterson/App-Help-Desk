<?php
  require_once '../scripts/validador_acesso.php';
  require_once '../components/menu.php';
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding-top: 30px;
        width: 100%;
        margin: 0;
      }
      .card-home a {
        text-decoration: none;
        color: #17a2b8;
      }
    </style>
  </head>

  <body>
    <div class="container">
      
      <div class="row">
        
        <span class="h2 mt-4 w-100 text-center">Bem vindo(a) ao App Help Desk!</span>

        <div class="card-home">
          <div class="card">
            <div class="card-header d-flex justify-content-center">
              <span class="">Menu</span>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href="./abrir_chamado.php" class="d-flex align-items-center" style="flex-direction: column;">
                    <img src="../images/formulario_abrir_chamado.png" width="70" height="70">
                    <span class="mt-2">Abrir chamado</span>
                  </a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                  <a href="./consultar_chamado.php" class="d-flex align-items-center" style="flex-direction: column;">
                    <img src="../images/formulario_consultar_chamado.png" width="70" height="70">
                    <span class="mt-2">Consultar chamados</span>
                  </a>
                </div>
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