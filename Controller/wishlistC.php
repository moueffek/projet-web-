<?php
include_once "../../config.php";
require_once '../../Model/wishlist.php';

class wishlistC{

    function ajouterWishlist($wishlist){
        $sql="INSERT INTO wishlist (idUsr,idProd,typeProd) 
        VALUES (:a,:b,:c)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':a' => $wishlist->getIdUsr(),                
                ':b' => $wishlist->getIdProd(),
                ':c' => $wishlist->getTypeProd()            
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    function retourIdprod($idUsr){
        $sql="SELECT * FROM  wishlist where idUsr=$idUsr";
        $db = config::getConnexion();
        try{
            $row = $db->query($sql);
            return $row;
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

        }


        function retourTypeProd($idUsr){
            $sql="SELECT * FROM  wishlist where idUsr=$idUsr";
            $db = config::getConnexion();
            try{
                $row = $db->query($sql);
                return $row;
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
    
            }

            function supprimerWishlist($idProd){
                $sql="DELETE FROM wishlist WHERE idProd=$idProd";
                $db = config::getConnexion();
                try{
                    $query = $db->prepare($sql);
                    $query->execute();
                }
                catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
                }
            }

            function nombreWishlists($idUsr){
                $sql="SELECT * FROM wishlist WHERE idUsr=$idUsr";
                $db = config::getConnexion();
                try{
                    $query = $db->prepare($sql);
                    $query->execute();
                    $count=$query->rowCount();
                    return $count;
                }
                catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
                }
            }



}
?>