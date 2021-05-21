<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
include_once '../../Controller/utilisateurC.php';
$utilisateurC = new utilisateurC();

$idUsr=$_SESSION['idlogin'];
$nomUt=$_POST['nomUt'];
$nomPrenom=$_POST['nomPrenom'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$adresse=$_POST['adresse'];
$tel=$_POST['tel'];

echo $adresse;


$utilisateurC->modifierUtilisateur($nomUt,$pass,$email,$nomPrenom,$adresse,$tel,$idUsr);


echo '<script type="text/javascript"> alert("Modification avec success ! :( "); </script>';
header("location:../front/usercp.php");



?>