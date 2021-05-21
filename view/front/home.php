<?php
session_start();
error_reporting(E_ALL);

include_once '../../Model/service.php';
include_once '../../Controller/serviceC.php';
include_once '../../Controller/promotionC.php';

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}
$serviceC = new serviceC();
$promotionC = new promotionC();
$produitsArt=$serviceC->acceuilNouvauArt();
$produitsCult=$serviceC->acceuilNouvauCult();
$meilleureArt=$serviceC->meilleureServicesArt();
$meilleureCult=$serviceC->meilleureServicesCult();
$infoProd=$promotionC->idDerPromo();
foreach($infoProd as $row){
$idProd=$row['id_produit'];
$typeP=$row['typeProd'];
if($row['typeProd']=='art')
	$table="produitsart";
if($row['typeProd']=='cult')
	$table="produitscult";
}

$enPromo=$serviceC->enPromo($table,$idProd);

$id=$_SESSION['idlogin'];
//echo '<script type="text/javascript"> alert("Bienvenue !"); </script>';
?>

<?php include_once('header.php'); ?>


	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Le plus grand marché arabe pour l'achat et la vente de microservices</h6>
						<h1>Bienvenue au MiniArt</h1>
						<div class="red_button shop_now_button"><a href="#">Services</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/art.jpg)">
						<div class="banner_category">
							<a href="categories.html">Artistiques</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/culture.jpg)">
						<div class="banner_category">
							<a href="categories.html">Culturelles</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/promotion.jpg)">
						<div class="banner_category">
							<a href="categories.html">En Promotion</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Nouveau Services</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Tout</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".art">Artistiques</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".cult">Culturelle</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<!-- Product 1 -->
						<?php
						foreach($produitsArt as $row){?>
						<form action="produit.php" method="get">
						<input type="text" name="id" value="<?php echo $row['idProd'];?>" hidden>
						<input type="text" name="type" value="art" hidden>
						<div class="product-item art">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $row['img1'] ?>" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>New</span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $row['titreProd'] ?></a></h6>
									<div class="product_price"><?php echo $row['prixProd'].' DT'; ?></div>
								</div>
							</div>
							<button type="submit" class="red_button add_to_cart_button" value="submit"><i class="fa fa-eye" style="color: white;"></i></button>
							<div class="red_button add_to_cart_button"><a href="../back/ajoutpanier.php?idProd=<?php echo $row['idProd']; ?>&idUsr=<?php echo $_SESSION['idlogin'] ?>&titreProd=<?php echo $row['titreProd'] ?>&descProd=<?php echo $row['descProd'] ?>&prixProd=<?php echo $row['prixProd'] ?>&quant=<?php $quant=1; echo $quant; ?>&typeProd=<?php echo 'art' ;?>&img1=<?php echo $row['img1'] ?>">add to cart</a></div>
						</div>
						</form>
						<?php } ?>
						<!-- Product 2 -->
						<?php foreach($produitsCult as $row){?>
						<form action="produit.php" method="get">
						<input type="text" name="id" value="<?php echo $row['idProd'];?>" hidden>
						<input type="text" name="type" value="cult" hidden>
						<div class="product-item cult">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $row['img1'] ?>" alt="">
								</div>
								<div class="favorite favorite_left"></div>
								<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>New</span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $row['titreProd'] ?></a></h6>
									<div class="product_price"><?php echo $row['prixProd'].' DT'; ?></div>
								</div>
								</div>
							<button type="submit" class="red_button add_to_cart_button" value="submit"><i class="fa fa-eye" style="color: white;"></i></button>
							<div class="red_button add_to_cart_button"><a href="../back/ajoutpanier.php?idProd=<?php echo $row['idProd']; ?>&idUsr=<?php echo $_SESSION['idlogin'] ?>&titreProd=<?php echo $row['titreProd'] ?>&descProd=<?php echo $row['descProd'] ?>&prixProd=<?php echo $row['prixProd'] ?>&quant=<?php $quant=1; echo $quant; ?>&typeProd=<?php echo 'cult' ;?>&img1=<?php echo $row['img1'] ?>">add to cart</a></div>
						</div>
						</form>
						<?php } ?>


						<!-- Product 3 -->



						<!-- Product 4 -->



						<!-- Product 5 -->



						<!-- Product 6 -->


						<!-- Product 7 -->



						<!-- Product 8 -->



						<!-- Product 9 -->



						<!-- Product 10 -->


					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deal of the week -->
<?php foreach($enPromo as $row) { ?>
	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="<?php echo $row['img1']?>" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Meilleure Promotion</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num">03</div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num">15</div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num">45</div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num">23</div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="produit.php?type=<?php echo $typeP; ?>&id=<?php echo $idProd; ?>">Voir le Produit</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
	<!-- Best Sellers -->
	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Meilleure Services</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">

						<?php foreach($meilleureArt as $row){?>
							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="<?php echo $row['img1']; ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="produit.php?id=<?php echo $row['idProd']; ?>&type=art"><?php echo $row['titreProd']; ?></a></h6>
											<div class="product_price"><?php echo $row['prixProd']; ?></div>
										</div>
									</div>
								</div>
							</div>
							<?php }?>

							<?php foreach($meilleureCult as $row){?>
							<div class="owl-item product_slider_item">
								<div class="product-item">
									<div class="product discount">
										<div class="product_image">
											<img src="<?php echo $row['img1']; ?>" alt="">
										</div>
										<div class="favorite favorite_left"></div>
										<div class="product_info">
											<h6 class="product_name"><a href="produit.php?id=<?php echo $row['idProd']; ?>&type=art"><?php echo $row['titreProd']; ?></a></h6>
											<div class="product_price"><?php echo $row['prixProd']; ?></div>
										</div>
									</div>
								</div>
							</div>


						<!-- Slider Navigation -->
						<?php }?>
						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
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

	<!-- Blogs -->



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
