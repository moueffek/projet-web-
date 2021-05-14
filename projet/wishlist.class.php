<?php
class wishlist{
    private $DB;

   public function __construct($DB){
      if(!isset($_SESSION)){
         session_start();
       }
       if(!isset($_SESSION['panier'])){
           $_SESSION['panier'] = array();
       }
       $this->DB = $DB;
       if(isset($_GET['delpanier'])){
           $this->del($_GET['delpanier']);
       }
    }