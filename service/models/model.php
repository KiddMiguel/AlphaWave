<?php
class Modele
{
    private $unPDO;

    public function __construct($server, $bdd, $user, $mdp)
    {
        $this->unPDO = null;
        try {
            $url = "mysql:host=" . $server . ";dbname=" . $bdd;
            $this->unPDO = new PDO($url, $user, $mdp);
        } catch (PDOException $exp) {
            echo "<br/>Erreur de connexion à la base de données !";
            echo $exp->getMessage();
        }
    }

    public function getProduits()
    {
        if ($this->unPDO != null) {
            try {
                $query = "SELECT * FROM produit";
                $select = $this->unPDO->prepare($query);
                $select->execute();
                $produits = $select->fetchAll();
                return $produits;
            } catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }
    public function createUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "INSERT INTO user(nom, prenom, email, tel, cp , ville ,password ) VALUE(:nom,:prenom,:email,:tel,:cp,:ville,:password)";
                $insert = $this->unPDO->prepare($query);
                $insert->bindParam(':nom', $data["nom"], PDO::PARAM_STR);
                $insert->bindParam(':prenom', $data["prenom"], PDO::PARAM_STR);
                $insert->bindParam(':email', $data["email"], PDO::PARAM_STR);
                $insert->bindParam(':tel', $data["tel"], PDO::PARAM_STR);
                $insert->bindParam(':cp', $data["cp"], PDO::PARAM_STR);
                $insert->bindParam(':ville', $data["ville"], PDO::PARAM_STR);
                $insert->bindParam(':password', $data["password"], PDO::PARAM_STR);
                $insert->execute();
                return true;
            } catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }
    public function connectionUser ($data) {
        if($this->unPDO != null) {
            try {
                $query = "SELECT * FROM user WHERE BINARY email=:email and BINARY password=:password";
                $select = $this->unPDO->prepare($query);
                $select->bindParam('email', $data['email'], PDO::PARAM_STR);
                $select->bindParam('password', $data['password'], PDO::PARAM_STR);
                $select->execute();
                $user = $select->fetch();
                return $user;
            }
        }
    }
}
