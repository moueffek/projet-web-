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

$idPromo=$promotionC->idPromotions();


$id=$_SESSION['idlogin'];

?>

<?php include_once('header.php'); ?>




	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Nos Services</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">En Promotion</li>
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
						foreach($idPromo as $row1){
                             if ($row1['typeProd']=='art')
                             $promoArt = $serviceC->afficherServiceArt($row1['id_produit']);
                             foreach($promoArt as $row) {
                             
                        ?>
						<form action="produit.php" method="get">
						<input type="text" name="id" value="<?php echo $row['idProd'];?>" hidden>
						<input type="text" name="type" value="art" hidden>
						<div class="product-item art">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $row['img1'] ?>" alt="">
								</div>
								<div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span><?php echo '-'.$row1['pourcentage'].' %'; ?></span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $row['titreProd'] ?></a></h6>
									<div class="product_price"><?php echo $row['prixProd'].' DT'; ?></div>
                                    <div class="code" style="color: #818d9c; font-size: 14px;"><?php echo 'Code : '.$row1['codePromo'] ?></div>
								</div>
							</div>
							<button type="submit" class="red_button add_to_cart_button" value="submit"><i class="fa fa-eye" style="color: white;"></i></button>
							<div class="red_button add_to_cart_button"><a href="../back/ajoutpanier.php?idProd=<?php echo $row['idProd']; ?>&idUsr=<?php echo $_SESSION['idlogin'] ?>&titreProd=<?php echo $row['titreProd'] ?>&descProd=<?php echo $row['descProd'] ?>&prixProd=<?php echo $row['prixProd'] ?>&quant=<?php $quant=1; echo $quant; ?>&typeProd=<?php echo 'art' ;?>&img1=<?php echo $row['img1'] ?>">add to cart</a></div>
						</div>
						</form>
						<?php }} ?>
						<!-- Product 2 -->
                        <?php
						foreach($idPromo as $row1){
                             if ($row1['typeProd']=='cult')
                             $promoCult = $serviceC->afficherServiceCult($row1['id_produit']);
                             foreach($promoCult as $row) {
                             
                        ?>
						<form action="produit.php" method="get">
						<input type="text" name="id" value="<?php echo $row['idProd'];?>" hidden>
						<input type="text" name="type" value="cult" hidden>
						<div class="product-item cult">
							<div class="product discount product_filter">
								<div class="product_image">
									<img src="<?php echo $row['img1'] ?>" alt="">
								</div>
								<div class="favorite favorite_left"></div>
                                <div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span><?php echo '-'.$row1['pourcentage'].' %'; ?></span></div>
								<div class="product_info">
									<h6 class="product_name"><a href="single.html"><?php echo $row['titreProd'] ?></a></h6>
									<div class="product_price"><?php echo $row['prixProd'].' DT'; ?></div>
                                    <div class="code" style="color: #818d9c; font-size: 10px;"><?php echo 'Code Promotion : '.$row1['codePromo'] ?></div>
								</div>
								</div>
							<button type="submit" class="red_button add_to_cart_button" value="submit"><i class="fa fa-eye" style="color: white;"></i></button>
							<div class="red_button add_to_cart_button"><a href="../back/ajoutpanier.php?idProd=<?php echo $row['idProd']; ?>&idUsr=<?php echo $_SESSION['idlogin'] ?>&titreProd=<?php echo $row['titreProd'] ?>&descProd=<?php echo $row['descProd'] ?>&prixProd=<?php echo $row['prixProd'] ?>&quant=<?php $quant=1; echo $quant; ?>&typeProd=<?php echo 'cult' ;?>&img1=<?php echo $row['img1'] ?>">add to cart</a></div>
						</div>
						</form>
						<?php }} ?>


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
