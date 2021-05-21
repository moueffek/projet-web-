<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
include_once '../../Controller/commandeC.php';
include_once '../../Controller/paniersC.php';
include_once '../../Controller/utilisateurC.php';
include_once '../../Controller/livraisonC.php';
include_once '../../Controller/reclamationC.php';

$utilisateurC = new utilisateurC();
$paniersC = new paniersC();
$commandeC = new commandeC();
$livraisonC = new livraisonC();
$reclamationC = new reclamationC();

$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
$users=$utilisateurC->infoUtilisateur($_SESSION['idlogin']);
$adrLiv=$utilisateurC->adressUsr($_SESSION['idlogin']);
$countLiv=$livraisonC->ilyaAdresse($_SESSION['idlogin']);
$countRec=$reclamationC->nombreReclamation($_SESSION['idlogin']);
$reclams=$reclamationC->totalreclamations($_SESSION['idlogin']);

?>

<html lang="en">
<head>
<title>MiniArt | Mon Compte</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">Livraison gratuite sur toutes les commandes de plus de 100 DT</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">
								
								<!-- Currency / Language / My Account -->
								<li class="account">
									<a href="#">
										Mon Compte
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
									<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
									<li><a href="logout.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="#">Mini<span>Art</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
							<li><a href="home.php">Acceuil</a></li>
							<li><a href="mes-services.php">Mes Services</a></li>
								<li><a href="nos-services.php">Nos Services</a></li>
								<li><a href="promotion.php">Promotions</a></li>
								<li><a href="#">A propos</a></li>
								<li><a href="contact.php">contact</a></li>
							</ul>
							<ul class="navbar_user">
								<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
								<li><a href="usercp.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
								<li class="checkout">
								<a href="cart.php?idUsr=<?php echo $_SESSION['idlogin']; ?>">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items"><?php foreach($rows as $row){echo $row['somme_v']; if($row['somme_v']==0){echo 0;}}?></span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>

	</ul>

	</div>

	<div class="container contact_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-6 contact_col">
			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
                    <h1>Bienvenue</h1>
                    <div class="follow_us_contents">
					<ul class="social d-flex flex-row">
						<li><a href="#" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
						<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					</ul>
                    </div>

                    <br>
                    <br>
                    <br>
                    <p> Reclamations : </p>
					<form action="">
                    <input class="form_input" type="text" value="<?php foreach($countRec as $row){echo $row['somme_r'];} ?>" disabled>
					</form>
					<p> Reclamations Traite : </p>
					<?php
					foreach($reclams as $rec){
						if(strlen($rec['message']) != 0){ $id=$rec['codeRec']; $i=1;

					?>
					<form action="">
                    <input class="form_input" type="text" value="<?php echo $i; ?>" disabled>
					</form>
					<br>
					<br>
                    <?php echo '<script type="text/javascript"> alert("Votre Reclamation['.$id.'] Traitee. Notre Message :'.$rec['message'].'  !"); </script>'; $i++;}} ?>
   

                    <?php if($countLiv==0) {?>
					<p style="color:#fb4343;">Vous avez aucun adresse livraison.</p>
					<br>
					<h4>Ajouter livraison : </h4>
					<form action="../back/ajouterLivraison.php"method="post">
						<div>
						<input class="form_input" type="text" name="adLiv" id="adLiv" value="<?php echo $adrLiv; ?>">
						<input type="text" name="date" id="date" value="<?php $date=date('Y/m/d'); echo $date; ?>" hidden>
						<input type="text" name="idUsr" id="idUsr" value="<?php echo $_SESSION['idlogin']; ?>" hidden>

						</div>
                        <div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Confirmer</button>
						</div>

					</form>
                    <?php } ?>
				</div>
			</div>

			</div>

			<div class="col-lg-6 get_in_touch_col">
				<div class="get_in_touch_contents">
				<button type="button" class="btn btn-danger"><a href="mes-achats.php" style="text-decoration: none; color:white;">Mes Achats</a></button> <button type="button" class="btn btn-danger"><a href="mes-ventes.php" style="text-decoration: none; color:white;">Mes Ventes</a></button> <button type="button" class="btn btn-danger"><a href="wishlist.php" style="text-decoration: none; color:white;">Mes Wishlist</a></button>
				<br>
				<br>
					<h1>Information Compte</h1>
					<br>
					<br>
					<form action="../back/modifierUtilisateur.php" method="post">
                    <?php foreach($users as $row){ ?>
						<div>
						<label>Nom Utilisateur: </label>
						<input id="nomUt" class="form_input input_name input_ph" type="text" name="nomUt" value="<?php echo $row['nomUt']; ?>">
						<label>Nom et Prenom: </label>
                        <input id="nomPrenom" class="form_input input_email input_ph" type="text" name="nomPrenom" value="<?php echo $row['nomPrenom']; ?>">
						<label>Email: </label>
						<input id="email" class="form_input input_email input_ph" type="text" name="email" value="<?php echo $row['email']; ?>">
						<label>Mot de Pass: </label>
                        <input id="pass" class="form_input input_email input_ph" type="password" name="pass" value="<?php echo $row['pass']; ?>">
						<label>Adresse Contact: </label>
                        <input id="adresse" class="form_input input_email input_ph" type="text" name="adresse" value="<?php echo $row['adresse']; ?>">
						<label>Tel: </label>
                        <input id="tel" class="form_input input_email input_ph" type="text" name="tel" value="<?php echo $row['tel']; ?>">
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Modifier Compte</button>
						</div>
						<?php
                    }
						?>
					</form>
				</div>
			</div>

		</div>
	</div>

	<?php include_once('footer.php'); ?>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>