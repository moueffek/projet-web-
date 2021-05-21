<?php 
session_start();
error_reporting(0);
include_once '../../Controller/paniersC.php';
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
}	
include_once '../../Controller/promotionC.php';
$promotionC = new promotionC();
$idUsr=$_GET['idUsr'];

$id=$_SESSION['idlogin'];
$paniersC = new paniersC();
$paniers=$paniersC->afficherPanier($id);
$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
$prodV='';
$prixV='';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniArt | Mon Panier</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="styles/single_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/single_responsive.css">


    <style>
    @charset "utf-8";

    img,
    .basket-module,
    .basket-labels,
    .basket-product {
        width: 100%;
    }

    input,
    button,
    .basket,
    .basket-module,
    .basket-labels,
    .item,
    .price,
    .quantity,
    .subtotal,
    .basket-product,
    .product-image,
    .product-details {
        float: left;
    }



    .hide {
        display: none;
    }

    main {
        clear: both;
        font-size: 0.75rem;
        margin: 0 auto;
        overflow: hidden;
        padding: 1rem 0;
        width: 960px;
    }

    .basket,
    aside {
        padding: 0 1rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .basket {
        width: 70%;
    }

    .basket-module {
        color: #111;
    }

    label {
        display: block;
        margin-bottom: 0.3125rem;
    }

    .promo-code-field {
        border: 1px solid #ccc;
        padding: 0.5rem;
        text-transform: uppercase;
        transition: all 0.2s linear;
        width: 48%;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        -o-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    }

    .promo-code-field:hover,
    .promo-code-field:focus {
        border: 1px solid #999;
    }

    .promo-code-cta {
        width: 100px;
        height: 46px;
        border: none;
        font-family: 'Poppins', sans-serif;
        background: #fe4c50;
        color: #FFFFFF;
        font-size: 1rem;
        margin-left: 0.625rem;
        padding: 0.6875rem 1.25rem 0.625rem;
    }

    .basket-labels {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        margin-top: 1.625rem;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    li {
        color: #111;
        display: inline-block;
        padding: 0.625rem 0;
    }

    li.price:before,
    li.subtotal:before {
        content: '';
    }

    .item {
        width: 50%;
    }

    .price,
    .subtotal {
        width: 15%;
        font-family: 'Poppins', sans-serif;
        font-size: 0.90rem;
    }

    .quantity {
        width: 15%;
        font-family: 'Poppins', sans-serif;
        font-size: 0.90rem;
    }

    .subtotal {
        text-align: right;
    }

    .remove {
        bottom: 1.125rem;
        border: none;
        float: right;
        position: absolute;
        right: 0;
        text-align: right;
        width: 45%;
    }

    .remove button {

        color: #FFFFFF;
        float: none;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
    }

    .item-heading {
        padding-left: 4.375rem;
        font-family: 'Poppins', sans-serif;
        font-size: 1rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .basket-product {
        border-bottom: 1px solid #ccc;
        padding: 1rem 0;
        position: relative;
    }

    .product-image {
        width: 35%;
    }

    .product-details {
        width: 65%;
    }

    .product-frame {
        border: 1px solid #aaa;
    }

    .product-details {
        padding: 0 1.5rem;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .quantity-field {
        background-color: #ccc;
        border: 1px solid #aaa;
        border-radius: 4px;
        font-size: 0.8rem;
        padding: 2px;
        width: 3.75rem;
    }

    aside {
        float: right;
        position: relative;
        width: 30%;
    }

    .summary {
        background-color: #eee;
        border: 1px solid #aaa;
        padding: 1rem;
        position: relative;
        width: 250px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .summary-total-items {
        color: #666;
        font-size: 0.875rem;
        text-align: center;
    }

    .summary-subtotal,
    .summary-total {
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        clear: both;
        margin: 1rem 0;
        overflow: hidden;
        padding: 0.5rem 0;
    }


    .subtotal-value,
    .total-title,
    .total-value,
    .promo-title,
    .promo-value {
        float: left;
        width: 50%;
        font-family: 'Poppins', sans-serif;
    }

    .summary-promo {
        -webkit-transition: all .3s ease;
        -moz-transition: all .3s ease;
        -o-transition: all .3s ease;
        transition: all .3s ease;
    }

    .promo-title {
        float: left;
        width: 70%;
    }

    .promo-value {
        color: #8B0000;
        float: left;
        text-align: right;
        width: 30%;
    }

    .summary-delivery {
        padding-bottom: 3rem;
    }

    .subtotal-title {
        float: left;
        width: 50%;
        font-family: 'Poppins', sans-serif;
        color: #fe4c50;

    }

    .subtotal-value,
    .total-value {
        text-align: right;
    }

    .total-title {
        font-weight: bold;
        color: #fe4c50;
        text-transform: uppercase;
        font-size: 0.90rem;

    }

    .summary-checkout {
        display: block;
    }

    .checkout-cta {
        display: block;
        border: none;
        float: none;
        font-size: 0.75rem;
        background: #fe4c50;
        color: #FFFFFF;
        text-align: center;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        padding: 0.625rem 0;
        width: 100%;
    }

    .summary-delivery-selection {
        background-color: #ccc;
        border: 1px solid #aaa;
        border-radius: 4px;
        display: block;
        font-size: 0.625rem;
        height: 34px;
        width: 100%;
    }

    @media screen and (max-width: 640px) {

        aside,
        .basket,
        .summary,
        .item,
        .remove {
            width: 100%;
        }

        .basket-labels {
            display: none;
        }

        .basket-module {
            margin-bottom: 1rem;
        }

        .item {
            margin-bottom: 1rem;

        }

        .product-image {
            width: 40%;
        }

        .product-details {
            width: 60%;
        }

        .price,
        .subtotal {
            width: 33%;
        }

        .quantity {
            text-align: center;
            width: 34%;
            font-size: 1px;
        }

        .quantity-field {
            float: none;
        }

        .remove {
            bottom: 0;
            border: none;
            text-align: left;
            margin-top: 0.75rem;
            position: relative;
        }

        .remove button {
            padding: 0;
        }

        .summary {
            margin-top: 1.25rem;
            position: relative;
        }
    }

    @media screen and (min-width: 641px) and (max-width: 960px) {
        aside {
            padding: 0 1rem 0 0;
        }

        .summary {
            width: 28%;
        }
    }

    @media screen and (max-width: 960px) {
        main {
            width: 100%;
        }

        .product-details {
            padding: 0 1rem;
        }
    }
    </style>



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
                            <div class="top_nav_left">Livraison gratuite sur toutes les commandes de plus de 100 DT
                            </div>
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
                                            <span id="checkout_items"
                                                class="checkout_items"><?php foreach($rows as $row){echo $row['somme_v']; if($row['somme_v']==0){echo 0;}}?></span>
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
                    <li class="menu_item"><a href="home.php">Acceuil</a></li>
                    <li class="menu_item"><a href="#">Services</a></li>
                    <li class="menu_item"><a href="afficher_livraison.php">Livraison</a></li>
                    <li class="menu_item"><a href="promotion.php">Promotions</a></li>
                    <li class="menu_item"><a href="#">A propos</a></li>
                    <li class="menu_item"><a href="#">contact</a></li>
                </ul>
            </div>
        </div>

        <div class="container single_product_container">
            <div class="row">
                <div class="col">

                    <!-- Breadcrumbs -->

                    <div class="breadcrumbs d-flex flex-row align-items-center">
                        <ul>
                            <li><a href="index.html">Acceuil</a></li>
                            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Services</a></li>
                            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Apercu et
                                    Achats</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <main>
                <div class="basket">
                    <div class="basket-module">
                        <label for="promo-code">Enter a promotional code</label>
                        <input id="promo-code" type="text" name="promo-code" maxlength="5" class="promo-code-field">
                        <button class="promo-code-cta">Apply</button>
                    </div>
                    <div class="basket-labels">
                        <ul>
                            <li class="item item-heading">Item</li>
                            <li class="price">Price</li>
                            <li class="price">Quantity</li>
                            <li class="subtotal">Subtotal</li>
                        </ul>
                    </div>
                    <?php foreach($paniers as $row){$prodV=$prodV.$row['idProd'].'+';?>
                    <div class="basket-product">
                        <div class="item">
                            <div class="product-image">
                                <img src="<?php echo $row['img1']; ?>" alt="Placholder Image 2" class="product-frame">
                            </div>
                            <div class="product-details">
                                <p><?php echo $row['titreProd']; ?></p>
                            </div>
                        </div>
                        <div class="price">
                            <?php
                            $prixV=$prixV.$row['prixProd'].'+'; 
                        $test=$promotionC->existPromo($row['idProd'],$row['typeProd']);
                        $pourcs=$promotionC->retourPourc($row['idProd'],$row['typeProd']);
                         if($test==1){
                            foreach($pourcs as $row1){
                                $pourc=$row1['pourcentage'];
                                $remise=$row['prixProd']-($row['prixProd']*($row1['pourcentage']/100));
                                echo $remise;
                            }
                        }
                        if($test==0){
                            echo $row['prixProd'];
                        }
                        
                         ?>
                        </div>
                        <div class="quantity">
                            <input type="number" value="1" min="1" class="quantity-field">
                        </div>
                        <div class="subtotal">
                            <center>
                                <?php
                        $test=$promotionC->existPromo($row['idProd'],$row['typeProd']);
                        $pourcs=$promotionC->retourPourc($row['idProd'],$row['typeProd']);
                         if($test==1){
                            foreach($pourcs as $row1){
                                $pourc=$row1['pourcentage'];
                                $remise=$row['prixProd']-($row['prixProd']*($row1['pourcentage']/100));
                                echo $remise;
                            }
                        }
                        if($test==0){
                            echo $row['prixProd']; 
                        }
                         ?>
                            </center>
                        </div>
                        <div class="remove">
                            <a
                                href='../back/supprimerpanier.php?idUsr=<?php echo $id; ?>&idPanier=<?php echo $row['idPanier']; ?>'><i
                                    class="fa fa-trash" style="color:red; font-size: 20px;"></i></a>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <aside>
                    <div class="summary">
                        <div class="summary-total-items"><span class="total-items"></span> Produits en Carte</div>
                        <div class="summary-subtotal">
                            <div class="subtotal-title">Prix Services:</div>
                            <div class="summary-promo hide">
                                <div class="promo-title">Promotion</div>
                                <div class="promo-value final-value" id="basket-promo"></div>
                            </div>
                        </div>
                        <div class="summary-total">
                            <div class="total-title">Total</div>
                            <div class="total-value final-value" id="basket-total">0</div>
                            <div id="iduser" hidden><?php echo $idUsr; ?></div>
                            <div id="idprods" hidden><?php echo $prodV; ?></div>
                            <div id="prixprods" hidden><?php echo $prixV; ?></div>
                        </div>
                        <div class="summary-checkout">
                            <button class="checkout-cta" onclick="test()">Payment</button>
                        </div>
                    </div>
                </aside>
            </main>










            <!-- Newsletter -->
            <form action="../back/envoiNouveaute.php" method="GET">
                <div class="newsletter">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div
                                    class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                                    <h4>Inscription</h4>
                                    <p>Recevez les dernières promotions jusqu'à 50% de réduction par e-mail</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <form action="post">
                                    <div
                                        class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                                        <input id="newsletter_email" name="newsletter_email" type="email"
                                            placeholder="Votre email" required="required"
                                            data-error="Valid email is required.">
                                        <button id="newsletter_submit" type="submit"
                                            class="newsletter_submit_btn trans_300" value="Submit">Inscription</button>
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
                            <div
                                class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                                <ul class="footer_nav">
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div
                                class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                                <ul>
                                    <li><a href="https://www.facebook.com/Hamza.FIFA2/"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="Ma3andish Twitter ya Akh"><i class="fa fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="Manish Maghroum bih"><i class="fa fa-instagram"
                                                aria-hidden="true"></i></a></li>
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

    </div>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="styles/bootstrap4/popper.js"></script>
    <script src="styles/bootstrap4/bootstrap.min.js"></script>
    <script src="plugins/Isotope/isotope.pkgd.min.js"></script>
    <script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="plugins/easing/easing.js"></script>
    <script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <script src="js/single_custom.js"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
    </script>
    <script src="js/cart.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <script>

    function test() {
        $(document).ready(function() {
                var total = $('#basket-total').text();
                var iduser = $('#iduser').text();
                var prixV = $('#prixprods').text();
                var idV = $('#idprods').text();
                window.location.href='checkout.php?idUsr='+iduser+'&total='+total+'&idProds='+idV+'&prixProds='+prixV;

        });
    }
    </script>
    <script>
    /* Set values + misc */
    var promoCode;
    var promoPrice;
    var fadeTime = 300;

    /* Assign actions */
    $('.quantity input').change(function() {
        updateQuantity(this);
    });

    $('.remove button').click(function() {
        removeItem(this);
    });

    $(document).ready(function() {
        updateSumItems();
    });

    $('.promo-code-cta').click(function() {

        promoCode = $('#promo-code').val();

        if (promoCode == '10off' || promoCode == '10OFF') {
            //If promoPrice has no value, set it as 10 for the 10OFF promocode
            if (!promoPrice) {
                promoPrice = 10;
            } else if (promoCode) {
                promoPrice = promoPrice * 1;
            }
        } else if (promoCode != '') {
            alert("Invalid Promo Code");
            promoPrice = 0;
        }
        //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
        if (promoPrice) {
            $('.summary-promo').removeClass('hide');
            $('.promo-value').text(promoPrice.toFixed(2));
            recalculateCart(true);
        }
    });

    /* Recalculate cart */
    function recalculateCart(onlyTotal) {
        var subtotal = 0;

        /* Sum up row totals */
        $('.basket-product').each(function() {
            subtotal += parseFloat($(this).children('.subtotal').text());
        });

        /* Calculate totals */
        var total = subtotal;

        //If there is a valid promoCode, and subtotal < 10 subtract from total
        var promoPrice = parseFloat($('.promo-value').text());
        if (promoPrice) {
            if (subtotal >= 10) {
                total -= promoPrice;
            } else {
                alert('Order must be more than £10 for Promo code to apply.');
                $('.summary-promo').addClass('hide');
            }
        }

        /*If switch for update only total, update only total display*/
        if (onlyTotal) {
            /* Update total display */
            $('.total-value').fadeOut(fadeTime, function() {
                $('#basket-total').html(total.toFixed(2));
                $('.total-value').fadeIn(fadeTime);
            });
        } else {
            /* Update summary display. */
            $('.final-value').fadeOut(fadeTime, function() {
                $('#basket-subtotal').html(subtotal.toFixed(2));
                $('#basket-total').html(total.toFixed(2));
                if (total == 0) {
                    $('.checkout-cta').fadeOut(fadeTime);
                } else {
                    $('.checkout-cta').fadeIn(fadeTime);
                }
                $('.final-value').fadeIn(fadeTime);
            });
        }
    }

    /* Update quantity */
    function updateQuantity(quantityInput) {
        /* Calculate line price */
        var productRow = $(quantityInput).parent().parent();
        var price = parseFloat(productRow.children('.price').text());
        var quantity = $(quantityInput).val();
        var linePrice = price * quantity;

        /* Update line price display and recalc cart totals */
        productRow.children('.subtotal').each(function() {
            $(this).fadeOut(fadeTime, function() {
                $(this).text(linePrice.toFixed(2));
                recalculateCart();
                $(this).fadeIn(fadeTime);
            });
        });

        productRow.find('.item-quantity').text(quantity);
        updateSumItems();
    }

    function updateSumItems() {
        var sumItems = 0;
        $('.quantity input').each(function() {
            sumItems += parseInt($(this).val());
        });
        $('.total-items').text(sumItems);
    }

    /* Remove item from cart */
    function removeItem(removeButton) {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).parent().parent();
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            recalculateCart();
            updateSumItems();
        });
    }
    </script>
</body>

</html>