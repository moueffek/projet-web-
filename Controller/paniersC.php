<?php
include_once "../../config.php";
require_once '../../Model/paniers.php';

class paniersC{
    function ajouterPaniers($panier){
        $sql="INSERT INTO paniers (idProd, idUsr,idProp,titreProd,descProd, prixProd, quantProd,typeProd, img1)
        VALUES (:idProd,:idUsr,:idProp,:titreProd,:descProd,:prixProd,:quantProd,:typeProd,:img1)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idProd' => $panier->getIdProd(),
                ':idUsr' => $panier->getIdUsr(),
                ':idProp' => $panier->getIdPro(),
                ':titreProd' => $panier->getTitreProd(),
                ':descProd' => $panier->getDescProd(),
                ':prixProd' => $panier->getPrixProd(),
                ':quantProd' => $panier->getQuantProd(),
                ':typeProd' => $panier->getType(),
                ':img1' => $panier->getImg1()     
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    function suprrimerPaniers($idpanier){
        $sql="DELETE FROM paniers WHERE idPanier=$idpanier";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherPanier($idusr){
        $sql="SELECT * FROM  paniers WHERE idUsr=$idusr";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function sumPaniers($id){
        $sql="SELECT SUM(quantProd) AS somme_v FROM paniers WHERE idUsr=$id";
        $db = config::getConnexion();
        try{
            $row = $db->query($sql);
            return $row;
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function supprimerPanierApresCommande($idUsr){
        $sql="DELETE FROM paniers WHERE idUsr=$idUsr";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

}
?>