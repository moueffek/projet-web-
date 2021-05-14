<?php 
 require '_header.php';
 if(isset($_GET['id'])){
    $product =  $DB->query('SELECT id FROM products WHERE id=:id', array('id' => $_GET['id']));
    if(empty($product)){
    die("Ce produit n'existe pas");
    }
    $panier->add($product[0]->id);
    die('le produit a bien ete ajouter a votre panier  <a href="cart.php"> aller au panier');
 }else{
    die("vous n'avez pas selectionner de produit a ajouter au panier");
 }
?>
