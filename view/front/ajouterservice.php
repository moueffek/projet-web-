<?php
session_start();
error_reporting(0);
include_once '../../Controller/paniersC.php';

$paniersC = new paniersC();
$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
    }
	else{
    include_once '../../Model/service.php';
    include_once '../../Controller/serviceC.php';
	include_once '../../Controller/paniersC.php';
	$paniersC = new paniersC();
    $serviceC = new serviceC();
    $error = "";

    if (
        isset($_POST["idusr"]) &&
        isset($_POST["titre"]) && 
        isset($_POST["desc"]) && 
        isset($_POST["prix"]) && 
        isset($_POST["quant"]) && 
        isset($_POST["img1"]) && 
        isset($_POST["img2"]) && 
        isset($_POST["img3"])
    ){
        if (
            !empty($_POST["idusr"]) &&
            !empty($_POST["titre"]) && 
            !empty($_POST["desc"]) && 
            !empty($_POST["prix"]) && 
            !empty($_POST["quant"]) && 
            !empty($_POST["img1"]) &&
            !empty($_POST["img2"]) && 
            !empty($_POST["img3"])
        ){
            $service = new service(
                $_SESSION['idlogin'],
                $_POST["titre"], 
                $_POST["desc"],
                $_POST["prix"],
                $_POST["quant"],
                $_POST["img1"],
                $_POST["img2"],
                $_POST["img3"]
            );
            if($_POST['typeservice']=="artistique"){
			$serviceC->ajouterServiceArt($service);}
            else if($_POST['typeservice']=="culturelle"){
            $serviceC->ajouterServiceCult($service);}
            else{
                echo '<script type="text/javascript">alert("Valeur ' . $_POST['typeservice'] . '");</script>';
            }

            $error="Message envoyer!";
        }
        else
        $error="non envoyer!";
    }}
?>


<html lang="en">
<head>
<title>Ajouter une service</title>
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
								<li><a href="services.php">Services</a></li>
								<li><a href="afficher_livraison.php">Livraison</a></li>
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
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Ajouter Service</a></li>
					</ul>
				</div>

			</div>
		</div>

		<!-- Contact Us -->

		<div class="row">

			<div class="col-lg-12 get_in_touch_col">
				<div class="get_in_touch_contents">
					<h1>Ajouter une Service</h1>
					<p>Vous devez remplir ce formulaire.</p>
					<form method="post">
						<div>
							<input id="input_name" class="form_input input_name input_ph" type="number" name="idusr" value=<?php echo $_SESSION['idlogin']; ?> hidden>
							<input id="input_email" class="form_input input_email input_ph" type="text" name="titre" placeholder="Titre" required="required" data-error="Valid email is required.">
                            <textarea id="input_message" class="input_ph input_message" name="desc"  placeholder="Description" rows="3" required data-error="Message Vide !"></textarea>
							<input id="input_website" class="form_input input_website input_ph" type="calendar" name="prix" placeholder="prix" required="required" data-error="Name is required.">
                            <input id="input_email" class="form_input input_email input_ph" type="text" name="quant" placeholder="Quantite" required="required" data-error="Valid email is required.">
                            <input id="input_email" class="form_input input_email input_ph" type="text" name="img1" placeholder="Image 1" required="required" data-error="Valid email is required.">
                            <input id="input_email" class="form_input input_email input_ph" type="text" name="img2" placeholder="Image 2" required="required" data-error="Valid email is required.">
                            <input id="input_email" class="form_input input_email input_ph" type="text" name="img3" placeholder="Image 2" required="required" data-error="Valid email is required.">
                            <input name="typeservice" list="typeservice" class="form_input input_email input_ph">
                            <datalist id="typeservice">
                            <option value="artistique">
                            <option value="culturelle">
                            </datalist>
						</div>
						<div>
							<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">Ajouter</button>
						</div>
						<?php
						if(strlen($error) > 0) {echo "<script type='text/javascript'>alert('$error');</script>";}
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