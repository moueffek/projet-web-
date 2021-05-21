<?php 
session_start();
error_reporting(0);
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
include_once '../../Controller/paniersC.php';
include_once '../../Controller/serviceC.php';
$paniersC = new paniersC();
$serviceC = new serviceC();
$curr="DT";
$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
$servicesArt=$serviceC->serviceParUtilisateurArt($_SESSION['idlogin']);
$servicesCult=$serviceC->serviceParUtilisateurCult($_SESSION['idlogin']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>MiniArt | Mes Produits</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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
										<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Connexion</a></li>
										<li><a href="index.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Inscription</a></li>
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

	<!-- Hamburger Menu -->

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
					<li><a href="index.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
					<li><a href="logout.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Logout</a></li>
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

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="home.php">Acceuil</a></li>
						<li class="service.php"><a href="index.html"><i class="fa fa-angle-right" aria-hidden="true"></i>Services</a></li>
					</ul>
				</div>


				<!-- Main Content -->

				<div class="main_content">
				<button type="button" class="btn btn-danger" style="margin-bottom: 50px;"><a href="ajouterservice.php" style="color: white; border:none;">Ajouter une Service</a></button>

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
						
							<div class="col">
							

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Par default</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Par default</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Par Prix</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Par Nom</span></li>
											</ul>
										</li>
										<li>
											<span>Afficher</span>
											<span class="num_sorting_text">6</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->
									<?php foreach($servicesArt as $row){ ?>
									<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="<?php echo $row['img1']; ?>" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="produit.php?type=<?php echo 'art'; ?>&id=<?php echo $row['idProd']; ?>"><?php echo $row['titreProd']; ?></a></h6>
												<div class="product_price"><?php echo $row['prixProd']; ?></div>
											</div>
										</div>

									</div>
									<?php } ?>


									<?php foreach($servicesCult as $row){ ?>
										<div class="product-item men">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="<?php echo $row['img1']; ?>" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="produit.php?type=<?php echo 'cult'; ?>&id=<?php echo $row['idProd']; ?>"><?php echo $row['titreProd']; ?></a></h6>
												<div class="product_price"><?php echo $row['prixProd']." ".$curr; ?></div>
											</div>
										</div>

									</div>
									<?php } ?>


								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<!-- Benefit -->

		<div class="benefit">
			<div class="container">
				<div class="row benefit_row">
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>LIVRAISON GRATUITE</h6>
								<p>Pour les commandes de plus de 100 DT</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Paiement à la livraison</h6>
								<p>payer lorsque vous recevez votre produit</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>30 Jours Pour les Retours</h6>
								<p>vous avez 30 jours pour retourner votre produit</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 benefit_col">
						<div class="benefit_item d-flex flex-row align-items-center">
							<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
							<div class="benefit_content">
								<h6>Support En Ligne</h6>
								<p>8AM - 09PM</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Newsletter -->
	
		<form action="../back/envoiNouveaute.php" method="GET">
		<div class="newsletter">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
							<h4>Inscription</h4>
							<p>Recevez les dernières promotions jusqu'à 50% de réduction par e-mail</p>
						</div>
					</div>
					<div class="col-lg-6">
						<form action="post">
							<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
								<input id="newsletter_email" name="newsletter_email" type="email" placeholder="Votre email" required="required" data-error="Valid email is required.">
								<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">Inscription</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</form>
	
		<!-- Footer -->
	
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
							<ul class="footer_nav">
								<li><a href="#">Contact</a></li>
								<li><a href="#">FAQ</a></li>
								<div id="google_translate_element"></div>
							</ul>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
							<ul>
								<li><a href="https://www.facebook.com/Hamza.FIFA2/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="Ma3andish Twitter ya Akh"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="Manish Maghroum bih"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="Hamza.FIFA2"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
								<li><a href="NON"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="footer_nav_container">
							<div class="cr">© 2021 Par ExeCode.</div>
						</div>
					</div>
				</div>
			</div>
		</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
	}
</script>
	
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>