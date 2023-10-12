<div class="text-center">
  <h1 class="mb-4">Connection</h1>
  <form method="post">
    <div class="mb-3">
      <label class="titre" for="email">email</label>
    </div>
    <input type="email" name="email">

    <div class="mb-3">
      <label class="titre" for="Mot de passe">Mot de passe</label>
    </div>
    <div class="mb-3">
      <input type="password" name="password">
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="submit">Se connecter</button>
      <?php
      $erreur = "";
      ?>
    </div>
  </form>
</div>

<?php
if (isset($_POST["submit"])) {
  $data = [
    "email" => $_POST["email"],
    "password" => $_POST['password'],
  ];

  $user = $unController->connectionUser($data);
  if ($user != null) {
    $_SESSION["id_user"] = $user["idUser"];
    $_SESSION["nom"] = $user["nom"];
    $_SESSION["prenom"] = $user["prenom"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["tel"] = $user["tel"];
    $_SESSION["cp"] = $user["cp"];
    $_SESSION["ville"] = $user["ville"];
    $_SESSION["image"] = $user["image"];
    
    header("location: index.php?page=home&id_user=" . $_SESSION["id_user"] . "");
    exit;
  } else {
    echo '<div class="alert alert-danger text-center" role="alert">
      Mot de passe ou email incorrect !
      </div>';
  }
}
?>