<?php

include_once "../../config.php";
require_once '../../Model/utilisateur.php';

class utilisateurC {

    /* Ajouter un utilisateur */
    function ajouterUtilisateur($utilisateur){
        $sql="INSERT INTO utilisateurs (nomUt, pass, email, nomPrenom, pays, adresse, tel, sexe, verifier) 
        VALUES (:nomUt,:pass,:email,:nomPrenom,:pays,:adresse,:tel,:sexe,:verifier)";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
        
            $query->execute([
                ':nomUt' => $utilisateur->getNomUt(),
                ':pass' => $utilisateur->getPass(),
                ':email' => $utilisateur->getEmail(),
                ':nomPrenom' => $utilisateur->getNomPrenom(),
                ':pays' => $utilisateur->getPays(),
                ':adresse' => $utilisateur->getAdresse(),
                ':tel' => $utilisateur->getTel(),
                ':sexe' => $utilisateur->getSexe(),
                ':verifier' => $utilisateur->getVerifier()                
            ]);			
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }			
    }
    /* afficher un utilisateur */
    function afficherUtilisateurs(){
			
        $sql="SELECT * FROM utilisateurs";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function NomUtilisateur($sessionId){
        $sql="SELECT nomPrenom FROM utilisateurs where id=$sessionId";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
    
    function infoUtilisateur($id){
        $sql="SELECT * FROM utilisateurs where id=$id";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }


    function SeConnecter($usr,$pass){
        $query="SELECT id FROM utilisateurs WHERE nomUt=:nomUt and pass=:pass";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($query);
        
            $query->execute([
                ':nomUt' => $usr,
                ':pass' => $pass
            ]);	
            $ret = $query->fetchColumn();
            $count = $query->rowCount();
            if($count > 0){
                return true;
            }
            else{
                return false;
            }
        }
        catch (Exception $e){
            $msg="Erreur de connexion";
            return false;
        }

    }

    function idUtilisateur($usr,$pass){
        $query="SELECT id FROM utilisateurs WHERE nomUt=:nomUt and pass=:pass";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($query);
        
            $query->execute([
                ':nomUt' => $usr,
                ':pass' => $pass
            ]);	
            $ret = $query->fetchColumn();
            $count = $query->rowCount();
            if($count > 0){
                return $ret;
            }
            else{
                return 0;
            }
        }
        catch (Exception $e){
            $msg="Erreur de connexion";
            return 0;
        }
    }

    function modifierUtilisateur($nomUt,$pass,$email,$nomPrenom,$adresse,$tel,$idUsr){
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateurs SET 
                nomUt = :a, 
                pass = :b,
                email = :c,
                nomPrenom = :d,
                adresse = :x,
                tel = :e
            
            WHERE id = :f'
        );
        try{
            $query->execute([
                'a' => $nomUt,
                'b' => $pass,
                'c' => $email,
                'd' => $nomPrenom,
                'x' => $adresse,
                'e' => $tel,
            
                'f' => $idUsr
            ]);
            return true;
        }
        catch (Exception $e){
            $msg="Erreur de connexion";
            return false;
        }
    }

    function adressUsr($id){
        $sql="SELECT adresse FROM utilisateurs where id=$id";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $row = $query->fetch();
            return $row['adresse'];
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }

    function emailUsr($id){
        $sql="SELECT email FROM utilisateurs where id=$id";
        $db = config::getConnexion();
        try{
            $query = $db->prepare($sql);
            $query->execute();
            $row = $query->fetch();
            return $row['email'];
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }



    
}

?>