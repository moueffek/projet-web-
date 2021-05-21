<?PHP
	
    include_once '../../config.php' ;
	require_once '../../Model/promotion.php';
   
		

	class promotionC {
		function idDerPromo(){
			$sql="SELECT id_produit,typeProd FROM promotion as infoProd ORDER BY id DESC";
			$db = config::getConnexion();
			try{
				$row = $db->query($sql);
				return $row;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}

		function idPromotions(){
				$sql="SELECT id_produit,codePromo,typeProd,pourcentage FROM promotion as infoProd";
				$db = config::getConnexion();
				try{
					$row = $db->query($sql);
					return $row;
				}
				catch (Exception $e){
					echo 'Erreur: '.$e->getMessage();
				}
		}

		function existPromo($idProd,$typeProd){
			$sql="SELECT * FROM promotion WHERE id_produit=$idProd AND typeProd='$typeProd'";
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

		function retourPourc($idProd,$typeProd){
			$sql="SELECT pourcentage FROM promotion WHERE id_produit=$idProd AND typeProd='$typeProd'";
			$db = config::getConnexion();
			try{
				$row=$db->query($sql);
				return $row;
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
		}
		

}


?>