<?php
class panier{
    private $id;
    private $date;
    private $DB;

   public function __construct($DB){
    $this->DB = $DB;
    
      if(!isset($_SESSION)){

         session_start();
       }     
        $panier = $this->DB->query('SELECT * FROM paniers limit 1 ');
        if(!$panier){
        $this->id = $this->DB->insert("INSERT INTO paniers ( `date` ) VALUES ('".date('c')."')");
        $this->date = date('c');
        }else{
         $this->id = $panier[0]->id;
         $this->date = $panier[0]->date; 
        }
        if(isset($_GET['delpanier'])){
            $this->del($_GET['delpanier']);
        }
    }


    public function add($product_id){
        if($this->count($product_id)){
            $this->DB->update('UPDATE panier_produit set quantite = quantite + 1 WHERE id_produit = :prod AND id_panier = :pan ',['prod'=>$product_id , 'pan'=>$this->id]);
        }else{
            $this->DB->insert("INSERT INTO panier_produit (id_panier , id_produit , quantite ) VALUES ($this->id , $product_id , 1 )");
        }
    }

    public function total(){
    $total= $this->DB->query('SELECT SUM(products.Prix * panier_produit.quantite) as total from products inner join panier_produit on products.id = panier_produit.id_produit WHERE panier_produit.id_panier ='.$this->id);
    return $total[0]->total;
    }

    public function count($product_id =NULL){
     $sum= $this->DB->query('SELECT SUM(quantite) as somme FROM `panier_produit` WHERE id_panier='.$this->id.($product_id?' AND id_produit = '.$product_id :''));
     return $sum[0]->somme;
    }
 
    

    public function del($product_id){
     $this->DB->delete('DELETE FROM panier_produit WHERE id_produit = :id_produit AND id_panier = :id_panier ',['id_produit'=>$product_id , 'id_panier'=>$this->id]);
    }



    public function getProducts(){
    return $this->DB->query('SELECT products.* , panier_produit.quantite from products inner join panier_produit on products.id = panier_produit.id_produit WHERE panier_produit.id_panier ='.$this->id);
    }
}
