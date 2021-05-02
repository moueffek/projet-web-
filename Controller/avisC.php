<?php
include "../../config.php";
require_once '../../Model/avis.php';

class avisC{
    function ajouterAvis($avis){
        $sql="INSERT INTO avisproduits (idUsr, idProd, message, etoiles) 
        VALUES (:idUsr,:idProd,:message,:etoiles)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idUsr' => $avis->getIdusr(),
                ':idProd' => $avis->getIdprod(),
                ':message' => $avis->getMessage(),
                ':etoiles' => $avis->getEtoiles()                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>