<?php
session_start();
include_once('service/databases/config_database.php');
include_once('service/controllers/controller.php');

$unController = new Controller($server, $bdd, $user, $mdp);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" href="logoAlpha.ico" />
    <link rel="stylesheet" href="public/styles/style.css">
    <title>AlphaWave</title>
</head>

<body class="d-flex flex-column min-vh-100">

    <?php require_once 'views/includes/header.php'; ?>
    <main class="flex-grow-1">
        <?php
        $page = '';
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = "home";
            // header("location: index.php?page=home");
        }

        switch ($page) {
            case 'home':
                require_once 'views/acceuil.php';
                break;
            case 'inscription':
                require_once 'views/inscription.php';
                break;
            case 'connexixon':
                require_once 'views/login.php';
                break;
            case 'produit':
                require_once 'views/produit.php';
                break;
            case 'profil':
                require_once 'views/profil.php';
                break;
            default:
                require_once 'views/acceuil.php';
        }
        ?>
    </main>
    <?php
    require_once 'views/includes/footer.php'; ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="public/javaScript/script.js"></script>
</body>

</html>