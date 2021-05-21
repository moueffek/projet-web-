<?php
include_once "../../config.php";
require_once '../../Model/ventes.php';

class venteC{

    function afficherVentes($idUsr){
        $sql="SELECT * FROM  ventes where idUsr=$idUsr";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
            }
            catch (Exception $e){
            die('Erreur: '.$e->getMessage());
            }
        }

    function ajouterVente($idCmd,$total,$email,$titreProd,$idProp,$idProd){
        $sql="INSERT INTO ventes (idCmd,prixtot,email_client,titreProd,idUsr,idProd) 
        VALUES (:a,:b,:c,:d,:e,:f)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':a' => $idCmd,
                ':b' => $total, 
                ':c' => $email, 
                ':d' => $titreProd, 
                ':e' => $idProp, 
                ':f' => $idProd
            ]);
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }
}
?>