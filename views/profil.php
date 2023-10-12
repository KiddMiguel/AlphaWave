
<div class="text-center">
    <h1  class="mb-4">Mon profil</h1>
        <h2>Photo de profil</h2>
            <div class="mb-3">
                <img src="<?php echo  $_SESSION["image"] ? htmlspecialchars( $_SESSION["image"]): ""; ?>" alt="photo profile" 
                style="width:200px;">
                <h2>Url image</h2>
                    <form method="POST" action="">
                        <input type="url">
            </div>
                    <h2>Nom</h2>
                        <input type="text" value="<?php echo  $_SESSION["nom"] ? htmlspecialchars( $_SESSION["nom"]): ""; ?>">
                    <h2>Prenom</h2>
                        <input type="text" value="<?php echo  $_SESSION["prenom"] ? htmlspecialchars( $_SESSION["prenom"]): ""; ?>">
                    <h2>email</h2>
                        <input type="eamil" value="<?php echo  $_SESSION["email"] ? htmlspecialchars( $_SESSION["email"]): ""; ?>">
                    <h2>tel</h2>
                        <input type="text" value="<?php echo  $_SESSION["tel"] ? htmlspecialchars( $_SESSION["tel"]): ""; ?>">
                    <h2>Code postale</h2>
                        <input type="text" value="<?php echo  $_SESSION["cp"] ? htmlspecialchars( $_SESSION["cp"]): ""; ?>">
                    <h2>Code postale</h2>
                        <input type="text" value="<?php echo  $_SESSION["ville"] ? htmlspecialchars( $_SESSION["ville"]): ""; ?>">
                    <div class="mb-3 margin">
                        <button type="submit" class="btn btn-success">Changer</button>
                    </div>
                    </form>
               
</div>
<?php
require_once "./service/controllers/controller.php"; 
$controller = new Controller(
$userProfile = $controller->getUserProfile($_SESSION['user_id']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"],
        "email" => $_POST["email"],
        "tel" => $_POST["tel"],
        "cp" => $_POST["cp"],
        "ville" => $_POST["ville"],
        'id' => $_SESSION['id'],  // Assurez-vous que l'id de l'utilisateur est stocké dans la session
        $updateStatus = $controller->updateUserProfile($_POST, $_SESSION['user_id']),
    ];

    if ($controller->updateUser($data)) {

        $_SESSION['nom'] = $data['nom'];
        $_SESSION['image'] = $data['image'];
        $userProfile = $controller->getUserProfile($_SESSION['user_id']);
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour du profil.";
    }
}


?>
<style>
.margin {
    margin: 20px;
}
</style>