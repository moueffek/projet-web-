<?PHP
	class Promotion{
		private $id = null;
		private $id_produit = null;
		private $codePromo = null;
		private $pourcentage = null;

	
		
		
	 function __construct( int $id_produit,string $codePromo,int $pourcentage){
			
			$this->id_produit=$id_produit;
			$this->codePromo=$codePromo;
			$this->pourcentage=$pourcentage;
	
	
		}
		
		function setCodePromo($codePromo) { $this->codePromo = $codePromo; }
		
		function getCodePromo() { return $this->codePromo; }
		
        function getId(): int{
			return $this->id;
		}
	 function getid_produit(): int{
			return $this->id_produit;
		}
		 function getpourcentage(): int{
			return $this->pourcentage;
		}	



	

		 function setid_produit(int $id_produit): void{
			$this->id_produit=$id_produit;
		}
		 function setpourcentage( int $pourcentage): void{
			$this->pourcentage=$pourcentage;
		}


		}
	
?>