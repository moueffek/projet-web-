<?php
include_once "../../config.php";
require_once '../../Model/service.php';

class serviceC{

    function ajouterServiceArt($service){
        $sql="INSERT INTO produitsart (idUsr,titreProd,descProd,prixProd,quantProd,img1,img2,img3) 
        VALUES (:idusr,:titre,:desc,:prix,:quant,:img1,:img2,:img3)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idusr' => $service->getIdUsr(),                
                ':titre' => $service->getTitreProd(),
                ':desc' => $service->getDescProd(),
                ':prix' => $service->getPrixProd(),
                ':quant' => $service->getQuantProd(),
                ':img1' => $service->getImg1(),
                ':img2' => $service->getImg2(),
                ':img3' => $service->getImg3()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    
    function toutProduitArt(){
        $sql="SELECT * FROM  produitsart";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    function toutProduitCult(){
        $sql="SELECT * FROM  produitscult";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }




    function acceuilNouvauArt(){
        $sql="SELECT * FROM  produitsart order by idProd limit 5";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function acceuilNouvauCult(){
        $sql="SELECT * FROM  produitscult order by idProd limit 5";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function ajouterServiceCult($service){
        $sql="INSERT INTO produitscult (idUsr,titreProd,descProd,prixProd,quantProd,img1,img2,img3) 
        VALUES (:idusr,:titre,:desc,:prix,:quant,:img1,:img2,:img3)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':idusr' => $service->getIdUsr(),                
                ':titre' => $service->getTitreProd(),
                ':desc' => $service->getDescProd(),
                ':prix' => $service->getPrixProd(),
                ':quant' => $service->getQuantProd(),
                ':img1' => $service->getImg1(),
                ':img2' => $service->getImg2(),
                ':img3' => $service->getImg3()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function afficherServiceArt($idProd){
        $sql="SELECT * FROM  produitsart where idProd=$idProd";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function afficherServiceCult($idProd){
        $sql="SELECT * FROM  produitscult where idProd=$idProd";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function meilleureServicesArt(){
        $sql="SELECT DISTINCT * FROM produitsart INNER JOIN avisproduits WHERE produitsart.idProd=avisproduits.idProd AND avisproduits.etoiles=5 GROUP BY produitsart.idProd;";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function meilleureServicesCult(){
        $sql="SELECT DISTINCT * FROM produitscult INNER JOIN avisproduits WHERE produitscult.idProd=avisproduits.idProd AND avisproduits.etoiles=5 GROUP BY produitscult.idProd;";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function serviceParUtilisateurArt($id){
        $sql="SELECT * FROM produitsart WHERE idUsr=$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function serviceParUtilisateurCult($id){
        $sql="SELECT * FROM produitscult WHERE idUsr=$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function enPromo($table,$idProd){
        $sql="SELECT * FROM $table as enPromo where idProd=$idProd";
        $db = config::getConnexion();
        try{
            $row = $db->query($sql);
            return $row;
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function idProp($table,$idProd){
        $sql="SELECT idUsr FROM $table where idProd=$idProd";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $derId=$query->fetch();
            return $derId['idUsr'];
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function titreProd($table,$idProd){
        $sql="SELECT titreProd FROM $table where idProd=$idProd";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $derId=$query->fetch();
            return $derId['titreProd'];
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function retourProduit($table,$idProd){
        $sql="SELECT * FROM $table WHERE idProd=$idProd";
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