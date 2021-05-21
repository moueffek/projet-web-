<?php
include_once "../../Config.php";
require_once '../../Model/reclamation.php';

class reclamationC{
    /* ajouter reclamation */
    function ajouterReclamation($reclamations){
        $sql="INSERT INTO reclamations (idUsr, titreRec, descRec, dateRec) 
        VALUES (:idUsr,:titreRec,:descRec,:dateRec)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idUsr' => $reclamations->getIdUsr(),
                ':titreRec' => $reclamations->getTitreRec(),
                ':descRec' => $reclamations->getDescRec(),
                ':dateRec' => $reclamations->getDateRec()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }  

    function nombreReclamation($id){
        $sql="SELECT count(codeRec) AS somme_r FROM reclamations WHERE idUsr=$id";
        $db = config::getConnexion();
        try{
            $row = $db->query($sql);
            return $row;
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function totalreclamations($idUsr){
        $sql="SELECT * FROM reclamations WHERE idUsr=$idUsr";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

    }
    
}

?>