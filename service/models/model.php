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
    
    public function getProduits(){
        if($this->unPDO != null){
            try{
            $query = "SELECT * FROM produits";
            $select = $this->unPDO->prepare($query);
            $select->execute();
            $produits = $select->fetchAll();
            return $produits;
            }catch (PDOException $exp) {
                echo 'Erreur de récupération des produits: ' . $exp->getMessage();
            }
        }
    }
}