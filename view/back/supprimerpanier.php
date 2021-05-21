<?php

    include_once '../../Controller/paniersC.php';
    $panierC = new paniersC();
    $idusr=$_GET['idUsr'];
    $idpanier=$_GET['idPanier'];

    $panierC->suprrimerPaniers($idpanier);
    header('Location:../front/cart.php?idUsr='.$idusr);



?>