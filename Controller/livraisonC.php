<?PHP
	include_once "../../config.php";
	require_once '../../Model/livraison.php';

		

	class livraisonC {

		function ilyaAdresse($id){
			$sql="SELECT lieu FROM livraison WHERE id_client=$id";
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
		
		function ajouterLivraison($livraison){
			$sql="INSERT INTO livraison (date, lieu, id_client) 
			VALUES (:date,:lieu,:id_client)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'date' => $livraison->getdate(),
					'lieu' => $livraison->getlieu(),
					'id_client' => $livraison->getid_client()
				
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function afficherLivraison(){
			
			$sql="SELECT * FROM livraison";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function totalLivs(){
			$sql="SELECT id FROM livraison ORDER BY id DESC LIMIT 1";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute();
				$derId=$query->fetch();
				return $derId['id'];
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}

		}

		function retourAdresse($id){
			$sql="SELECT lieu FROM livraison WHERE id_client=$id";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function factAdresse($id){
			$sql="SELECT lieu FROM livraison WHERE id_client=$id LIMIT 1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function retourDate($id){
			$sql="SELECT date FROM livraison WHERE id_client=$id LIMIT 1";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

	}