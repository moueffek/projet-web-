<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
include_once '../../Controller/livraisonC.php';
include_once '../../Controller/livraison.php';
$date=$_POST['date'];
$adresse=$_POST['adLiv'];
$idUsr=$_POST['idUsr'];

$livraisonC = new livraisonC();
$livraison = new livraison(
    $date,
    $adresse,
    $idUsr
);

$livraisonC->ajouterLivraison($livraison);


echo '<script type="text/javascript"> alert("Modification avec success ! "); </script>';
header("location:../front/usercp.php");



?>