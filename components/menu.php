<?php
  $current_page = $_SERVER['PHP_SELF'];

  $menu_links = array(
      'Home' => 'http://localhost/App-Help-Desk/screens/home.php',
      'Consultar' => 'http://localhost/App-Help-Desk/screens/consultar_chamado.php',
  );
?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark menu-link">
  <a class="navbar-brand" href="<?php echo (basename($current_page) == 'index.php') ? '' : $menu_links['Home']; ?>">
    <div>
      <img src="http://localhost/App-Help-Desk/images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php
    if(basename($current_page) != 'index.php'){
  ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto d-flex align-items-center">

        <?php foreach ($menu_links as $label => $url): ?>
          <li class="nav-item <?php echo (basename($current_page) === basename($url)) ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo (basename($current_page) === basename($url)) ? '' : $url; ?>">
                <?php echo $label; ?>
              </a>
          </li>
        <?php endforeach; ?>

        <li class="nav-item">
          <a href="../screens/abrir_chamado.php" style="text-decoration: none;">
            <button class="btn btn-sm btn-success ml-1 d-flex align-items-center" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
              </svg>
              <span class="ml-1">Novo</span>
            </button>
          </a>
        </li>
        <li class="nav-item">
          <div class="ml-3 mr-1" style="width: 2px; height: 30px; background: grey;">
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="min-width: auto; width: auto;">
              <a class="dropdown-item" href="../scripts/logout.php">Sair</a>
          </div>
        </li>
      </ul>
    </div>
  <?php } ?>

</nav>