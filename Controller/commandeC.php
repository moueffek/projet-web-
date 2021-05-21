<?php
include_once "../../config.php";
require_once '../../Model/commande.php';
class commandeC{

    function ajoutercommande($commande){
        $sql="INSERT INTO commandes (idUsr,prixtot,idLiv) 
        VALUES (:idUsr,:prixtot,:idLiv)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idUsr'=> $commande->getIdUsr(),
                ':prixtot' =>$commande->getPrixtot(),
                ':idLiv' => $commande->getIdLiv(),     
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    

    function affichercommande($idUsr){
    $sql="SELECT * FROM  commandes where idUsr=$idUsr";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
        }
        catch (Exception $e){
        die('Erreur: '.$e->getMessage());
        }
    }

    function factCommande($idUsr){
        $sql="SELECT * FROM  commandes where idUsr=$idUsr LIMIT 1";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
            }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }
        }
 


    
    function nbCommandes($id){
        $sql="SELECT * FROM commandes WHERE idUsr=$id";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $count = $query->rowCount();
            return $count;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
        
    }

    function totalCmd(){
        $sql="SELECT idCmd FROM commandes ORDER BY idCmd DESC LIMIT 1";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $derId=$query->fetch();
            return $derId['idCmd'];
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

    }



}


?>