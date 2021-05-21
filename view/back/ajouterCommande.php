<?php
session_start();
error_reporting(E_ALL);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
include_once '../../Controller/livraisonC.php';
include_once '../../Model/livraison.php';

include_once '../../Controller/commandeC.php';
include_once '../../Model/commande.php';

include_once '../../Controller/paniersC.php';
include_once '../../Controller/serviceC.php';

include_once '../../Model/utilisateur.php';
include_once '../../Controller/utilisateurC.php';

include_once '../../Model/achats.php';
include_once '../../Controller/achatsC.php';

include_once '../../Model/ventes.php';
include_once '../../Controller/ventesC.php';




// Livraison
$idUsr=$_GET['idUsr'];
echo $idUsr;

$nomUt=$_GET['nomUt'];
$adr=$_GET['address'];
$etat=$_GET['etat'];
$state=$_GET['state'];
$cp=$_GET['cp'];

$adresse=$adr.','.$etat.','.$state.','.$cp;
$date=$_GET['date'];


//Commande
$total=$_GET['total'];


$livraisonC = new livraisonC();
$livraison = new livraison(
    $date,
    $adresse,
    $idUsr
);
$livraisonC->ajouterLivraison($livraison);

$idLiv=$livraisonC->totalLivs();


$commandeC = new commandeC();
$commande = new commande(
    $idUsr,
    $total,
    $idLiv
);
$commandeC->ajoutercommande($commande);


//achats
$utilisateurC = new utilisateurC();
$email=$utilisateurC->emailUsr($idUsr);
$idCmd=$commandeC->totalCmd();

$achatC = new achatC();
$achat = new achat(
    $idCmd,
    $total,
    $idUsr,
    $adresse
);
$achatC->ajouterAchat($achat);

//ventes
$panierC = new paniersC();
$serviceC = new serviceC();
$venteC = new venteC();
$paniers=$panierC->afficherPanier($idUsr);

foreach($paniers as $row){

    if ($row['typeProd']=='art')
    $table='produitsart';
    else
    $table='produitscult';

$titreProd=$serviceC->titreProd($table,$row['idProd']);

$venteC->ajouterVente($idCmd,$total,$email,$titreProd,$row['idProp'],$row['idProd']);
}




// Vider la carte
$panierC->supprimerPanierApresCommande($idUsr);

echo '<script type="text/javascript"> alert("Modification avec success ! "); </script>';
header("location:../front/home.php");



?>