<?php
session_start();
require_once "./service/controllers/controller.php"; 

// Vous devrez ajuster ces valeurs selon votre configuration de la base de données.
$controller = new Controller($server, $bdd, $user, $md);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        // Ajoutez d'autres champs ici...
        'image' => $_POST['image'],
        'id' => $_SESSION['id']  // Assurez-vous que l'id de l'utilisateur est stocké dans la session
    ];

    if ($controller->updateUser($data)) {
        // Mettez à jour les données de la session si nécessaire
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['image'] = $data['image'];
        // Redirect to the profile page
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du profil.";
    }
}
