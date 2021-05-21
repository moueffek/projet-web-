<?PHP
	class livraison{
		private $id = null;
		private $date = null;
		private $lieu = null;
		private $id_client = null;

		
	 function __construct(string $date, string $lieu, int $id_client){
			
			$this->date=$date;
			$this->lieu=$lieu;
			$this->id_client=$id_client;

		}
		
        function getId(): int{
			return $this->id;
		}

		 function getdate(): string{
			return $this->date;
		}	
		 function getid_client(): int{
			return $this->id_client;
		}
		 function getlieu(): string{
			return $this->lieu;
		}



		 function setdate( string $date): void{
			$this->date=$date;
		}
		 function setid_client(int $id_client): void{
			$this->id_client=$id_client;
		}
		 function setlieu(string $lieu): void{
			$this->lieu=$lieu;
		}

		}
	
?>