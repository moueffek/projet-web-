<?php
include_once "../../config.php";
require_once '../../Model/achats.php';

class achatC{

    function afficherAchats($idUsr){
        $sql="SELECT * FROM  achats where idUsr=$idUsr";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
            }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }
        }

        function afficherFacture($idAchat){
            $sql="SELECT * FROM  achats where idAchat=$idAchat";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
                }
                catch (Exception $e){
                die('Erreur: '.$e->getMessage());
                }
            }

    function ajouterAchat($achat){
        $sql="INSERT INTO achats (idCmd,prixtot,idUsr,lieu) 
        VALUES (:idCmd,:prixtot,:idUsr,:lieu)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idCmd' => $achat->getIdCmd(),
                ':prixtot' => $achat->getPrixtot(), 
                ':idUsr' => $achat->getId(), 
                ':lieu' => $achat->getLieu()
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>