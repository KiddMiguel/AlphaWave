<div class="text-center">
  <h1 class="mb-4">Connection</h1>
    <form action="post">
      <div class="mb-3">
        <label class="titre" for="email">email</label>
        </div>
        <input type="email" name="email">
      
      <div class="mb-3">
        <label class="titre" for="Mot de passe">Mot de passe</label>
      </div>
      <div class="mb-3">
      <input type="text" name="password">
      </div>
      <div class="mb-3">
      <subm
      <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
    </form>
</div>

<?php 
if (isset($_POST["submit"])) {
  $data = [
      "email" => $_POST["email"],
      "password" => $_POST["password"],
  ];
  $unController->connectionUser($data);
}?>