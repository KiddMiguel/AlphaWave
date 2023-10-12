<div class="" style="background: rgb(1, 48, 97);">
  <header class="d-flex container flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-light fs-4 text-decoration-none">
      AlphaWave
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
      <li><a href="index?page=home" class="nav-link px-2 link-light">Accueil</a></li>
      <li><a href="index?page=produit" class="nav-link px-2 link-light">Nos Produits</a></li>
      <li><a href="#" class="nav-link px-2 link-light">A propos</a></li>
    </ul>

    <?php

    if (!isset($_SESSION['id_user'])) {
      echo '
      <div class="col-md-3 text-end">
      <button type="button" class="btn btn-outline-primary me-2 text-light" style="border: none !important"><a href="index?page=connexixon" class="text-white text-decoration-none">Login</a></button>
      <button type="button" class="btn btn-primary "><a href="index?page=inscription" class="text-white text-decoration-none">Créer un compte</a></button>
    </div>
      ';
    } else {
      echo '
      <div class="col-md-3 text-end">
      <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
 ' . $_SESSION["prenom"] . ' ' . $_SESSION["nom"] . '</button>
  <ul class="dropdown-menu dropdown-menu-white">
    <li><a class="dropdown-item " href="index.php?page=profil&id_user=' . $_SESSION['id_user'] . '">Profil</a></li>
    <li><a class="dropdown-item" href="index.php?page=deconnexion">Déconnexon</a></li>
  </ul>
</div> </div>
      ';
    }
    ?>
  </header>
</div>