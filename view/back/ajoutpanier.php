<?php 
    include_once '../../Model/paniers.php';
    include_once '../../Controller/paniersC.php';
    include_once '../../Controller/serviceC.php';
    $serviceC = new serviceC();
    $panier = null;
    $panierC = new paniersC();
    $error = "";

    $idProd=$_GET['idProd'];
    $idUsr=$_GET['idUsr'];
    $titreProd=$_GET['titreProd'];
    $descProd=$_GET['descProd'];
    $prixProd=$_GET['prixProd'];
    $quantProd=$_GET['quant'];
    $typeProd=$_GET['typeProd'];

    if($typeProd == 'art'){
    $table='produitsart';
    $idProp=$serviceC->idProp($table,$idProd);
    }
    else
    {
        $table='produitscult';
        $idProp=$serviceC->idProp($table,$idProd);
    }
    $img1=$_GET['img1'];

    $panier = new paniers(
        $idProd,
        $idUsr, 
        $idProp,
        $titreProd,
        $descProd,
        $prixProd,
        $quantProd,
        $typeProd,
        $img1
    );

    $panierC->ajouterPaniers($panier);
    header('Location:../front/home.php');
    echo "ajout avec succes!";




?>