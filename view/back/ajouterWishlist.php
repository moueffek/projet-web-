<?php
session_start();
error_reporting(E_ALL);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}

include_once '../../Model/wishlist.php';
include_once '../../Controller/wishlistC.php';


$idUsr=$_GET['idUsr'];
$idProd=$_GET['idProd'];
$typeProd=$_GET['typeProd'];

$wishlistC = new wishlistC();
$wishlist = new wishlist(
$idUsr,
$idProd,
$typeProd
);

$wishlistC->ajouterWishlist($wishlist);

echo '<script type="text/javascript"> alert("Modification avec success ! "); </script>';
header("location:../front/wishlist.php");



?>