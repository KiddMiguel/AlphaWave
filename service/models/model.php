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
                $query = "SELECT * FROM produit ORDER BY idProduit DESC";
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
    public function connectionUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "SELECT * FROM user WHERE BINARY email=:email and BINARY password=:password";
                $select = $this->unPDO->prepare($query);
                $select->bindParam('email', $data['email'], PDO::PARAM_STR);
                $select->bindParam('password', $data['password'], PDO::PARAM_STR);
                $select->execute();
                $user = $select->fetch();
                return $user;
            } catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }
    public function updateUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "UPDATE user SET nom=:nom, prenom=:prenom, email=:email, tel=:tel, cp=:cp, ville=:ville, image=:image WHERE id=:id";
                $update = $this->unPDO->prepare($query);
                $update->bindParam(':nom', $data['nom'], PDO::PARAM_STR);
                $update->bindParam(':prenom', $data['prenom'], PDO::PARAM_STR);
                $update->bindParam(':email', $data['email'], PDO::PARAM_STR);
                $update->bindParam(':tel', $data['tel'], PDO::PARAM_STR);
                $update->bindParam(':cp', $data['cp'], PDO::PARAM_STR);
                $update->bindParam(':ville', $data['ville'], PDO::PARAM_STR);
                $update->bindParam(':image', $data['image'], PDO::PARAM_STR);
                $update->bindParam(':id', $data['id'], PDO::PARAM_INT);
                $update->execute();
                return true;
            } catch (PDOException $exp) {
                echo 'Erreur de mise à jour du profil: ' . $exp->getMessage();
            }
        }
        return false;
    }
    public function getUserProfile($userId)
    {
        if ($this->unPDO != null) {
            try {
                $query = "SELECT * FROM user WHERE id = :idUser";
                $stmt = $this->unPDO->prepare($query);
                $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return $user;
            } catch (PDOException $exp) {
                echo 'Erreur de récupération du profil: ' . $exp->getMessage();
            }
        }
        return null;
    }

    /*TEST HACH ----------------------

    public function createUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $hashed_password = password_hash($data["password"], PASSWORD_DEFAULT);
                $query = "INSERT INTO user(nom, prenom, email, tel, cp , ville ,password ) 
                          VALUES(:nom, :prenom, :email, :tel, :cp, :ville, :password)";
                $insert = $this->unPDO->prepare($query);
                $insert->bindParam(':nom', $data["nom"], PDO::PARAM_STR);
                $insert->bindParam(':prenom', $data["prenom"], PDO::PARAM_STR);
                $insert->bindParam(':email', $data["email"], PDO::PARAM_STR);
                $insert->bindParam(':tel', $data["tel"], PDO::PARAM_STR);
                $insert->bindParam(':cp', $data["cp"], PDO::PARAM_STR);
                $insert->bindParam(':ville', $data["ville"], PDO::PARAM_STR);
                $insert->bindParam(':password', $hashed_password, PDO::PARAM_STR);
                $insert->execute();
                return true;
            } catch (PDOException $exp) {
                echo 'Erreur de création de l\'utilisateur: ' . $exp->getMessage();
                return false;
            }
        }
    }

    public function connectionUser($data)
    {
        if ($this->unPDO != null) {
            try {
                $query = "SELECT * FROM user WHERE BINARY email=:email";
                $select = $this->unPDO->prepare($query);
                $select->bindParam(':email', $data['email'], PDO::PARAM_STR);
                $select->execute();
                $user = $select->fetch();
                var_dump($user);
                var_dump($data['password']);
                var_dump($user['password']);
                if ($user && password_verify($data['password'], $user['password'])) {
                    return $user;
                } else {
                    return null;
                }
            } catch (PDOException $exp) {
                echo 'Erreur de connexion utilisateur: ' . $exp->getMessage();
            }
        }
    }*/
}
