<?php

    include_once '../../Controller/wishlistC.php';
    $wishlistC = new wishlistC();
    $idProd=$_GET['idProd'];


    $wishlistC->supprimerWishlist($idProd);



    header('Location:../front/wishlist.php');



?>