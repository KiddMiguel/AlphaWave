<div class="text-center">
    <h1 class="mb-4">Inscriptions</h1>
    <form action="" method="post">
        <label class="titre" for="nom">Nom</label>
        <div class="mb-3">
            <input type="text" name="nom">
        </div>
        <label class="titre" for="prenom">Prenom</label>
        <div class="mb-3">
            <input type="text" name="prenom">
        </div>
        <label class="titre" for="email">email</label>
        <div class="mb-3">
            <input type="email" name="email">
        </div>
        <label class="titre" for="telephone">telephone</label>
        <div class="mb-3">
            <input type="int" name="tel">
        </div>
        <label class="titre" for="codePostale">code Postale</label>
        <div class="mb-3">
            <input type="int" name="cp">
        </div>
        <label class="titre" for="ville">Ville</label>
        <div class="mb-3">
            <input type="text" name="ville">
        </div>
        <label class="titre" for="password">Mot de passe</label>
        <div class="mb-3">
            <input type="text" name="password">
        </div>
        <label class="titre" for="image">Photo de profil</label>
        <div class="mb-3">
            <input type="file">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="submit"></button>Valider</button>
        </div>
    </form>

</div>

<style>
    .titre {
        font-size: x-large
    }
</style>

<?php
if (isset($_POST["submit"])) {
    $data = [
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "email" => $_POST["email"],
        "tel" => $_POST["tel"],
        "cp" => $_POST["cp"],
        "ville" => $_POST["ville"],
        "password" => $_POST["password"],
    ];
    $unController->createUser($data);
}
?>