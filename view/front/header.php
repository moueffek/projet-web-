<?php 

include_once '../../Controller/paniersC.php';

$paniersC = new paniersC();
$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>MiniArt - Bienvenue</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
					<a href="#">
						Mon Compte
						<i class="fa fa-angle-down"></i>
					</a>
					<ul class="menu_selection">
						<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
						<li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li>
					</ul>
				</li>
				<li class="menu_item"><a href="#">Acceuil</a></li>
				<li class="menu_item"><a href="services.php">Services</a></li>
				<li class="menu_item"><a href="afficher_livraison.php">Livraison</a></li>
				<li class="menu_item"><a href="promotion.php">Promotions</a></li>
				<li class="menu_item"><a href="#">A propos</a></li>
				<li class="menu_item"><a href="#">contact</a></li>
			</ul>
		</div>
	</div>