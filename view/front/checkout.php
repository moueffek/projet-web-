<?php 
session_start();
error_reporting(0);
include_once '../../Controller/paniersC.php';
include_once '../../Controller/utilisateurC.php';
if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
    }	


$idUsr=$_GET['idUsr'];
$total=$_GET['total'];
$ids=$_GET['idProds'];
$prixV=$_GET['prixProds'];

$id=$_SESSION['idlogin'];
$paniersC = new paniersC();
$utilisateurC = new utilisateurC();
$paniers=$paniersC->afficherPanier($id);
$rows=$paniersC->sumPaniers($_SESSION['idlogin']);
$usrs=$utilisateurC->NomUtilisateur($_SESSION['idlogin']);

$sitekey ='6Le70eEaAAAAAP_8bCy4j1dfqlDrcosZZd47-mzs';
$secretkey='6Le70eEaAAAAAP-U0ubD2dbG_nYZ0dbLcWBy3lG6';
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){ 
    // Google reCAPTCHA API secret key 
    $secretKey = '6Le70eEaAAAAAP-U0ubD2dbG_nYZ0dbLcWBy3lG6'; 
     
    // Verify the reCAPTCHA response 
    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']); 
     
    // Decode json data 
    $responseData = json_decode($verifyResponse); 
     
    // If reCAPTCHA response is valid 
    if($responseData->success){ 
    $status = 'success'; 
    }else{ 
        $errors['verfication'] = 'Robot verification failed, please try again.'; 
    } 
}else{ 
    $errors['checkbox'] = 'Please check on the reCAPTCHA box.'; 
}


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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .row .col-75 .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        background-color: #04AA6D;
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: #45a049;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
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
                                            <li><a href="index.php"><i class="fa fa-sign-in"
                                                        aria-hidden="true"></i>Login</a></li>
                                            <li><a href="logout.php"><i class="fa fa-user-plus"
                                                        aria-hidden="true"></i>Logout</a></li>
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


            <div class="row">
                <div class="col-75">
                    <div class="container">
                        <form action="../back/ajouterCommande.php" method="GET">

                            <div class="row">
                                <div class="col-50">
                                    <h3>Billing Address</h3>
                                    <input type="text" name="idUsr" value="<?php echo $_SESSION['idlogin']; ?>" hidden>
                                    <input type="text" name="total" value="<?php echo $total; ?>" hidden>
                                    <label for="fname"><i class="fa fa-user" style="color: #fe4c50;"></i> Nom et
                                        Prenom</label>
                                    <input type="text" id="nomUt" name="nomUt" placeholder="Hamza Ghariani">
                                    <label for="email"><i class="fa fa-envelope" style="color: #fe4c50;"></i>
                                        Email</label>
                                    <input type="text" id="email" name="email" placeholder="john@example.com">
                                    <label for="adr"><i class="fa fa-address-card-o" style="color: #fe4c50;"></i>
                                        Address</label>
                                    <input type="text" id="address" name="address" placeholder="542 W. 15th Street">
                                    <label for="city"><i class="fa fa-institution" style="color: #fe4c50;"></i>
                                        Etat</label>
                                    <input type="text" id="etat" name="etat" placeholder="Tunis">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="state">Etat</label>
                                            <input type="text" id="state" name="state" placeholder="TN">
                                        </div>
                                        <div class="col-50">
                                            <label for="zip">Code Postal</label>
                                            <input type="text" id="cp" name="cp" placeholder="2015">
                                            <input type="text" id="total" name="total" value="<?php echo $total; ?>"
                                                hidden>
                                            <input type="text" name="date" id="date"
                                                value="<?php $date=date('Y/m/d'); echo $date; ?>" hidden>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-50">
                                    <h3>Payment</h3>
                                    <label for="fname">Cartes Acceptee</label>
                                    <div class="icon-container">
                                        <i class="fa fa-cc-visa" style="color:navy;"></i>
                                        <i class="fa fa-cc-amex" style="color:blue;"></i>
                                        <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                        <i class="fa fa-cc-discover" style="color:orange;"></i>
                                    </div>
                                    <label for="cname">Nom de Proprietaire</label>
                                    <input type="text" id="cnom" name="cnom" placeholder="John More Doe">
                                    <label for="ccnum">Numero Carte credit</label>
                                    <input type="text" id="nc" name="nc" placeholder="1111-2222-3333-4444">
                                    <label for="expmonth">Mois d'expiration</label>
                                    <input type="text" id="cmois" name="cmois" placeholder="September">

                                    <div class="row">
                                        <div class="col-50">
                                            <label for="expyear">Annee d'expiration</label>
                                            <input type="text" id="cann" name="cann" placeholder="2021">
                                        </div>
                                        <div class="col-50">
                                            <label for="cvv">CVV</label>
                                            <input type="text" id="cvv" name="cvv" placeholder="352">
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary launch" data-toggle="modal"
                                        data-target="#staticBackdrop" style="background:#fe4c50;"> Payer
                                    </button>

                                    <div class="col-12 mt-4">
                                        <div class="g-recaptcha" data-sitekey="<?php echo $sitekey ;?>"
                                            data-theme="dark"></div>
                                    </div>
                                    <form action="">
                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body ">
                                                        <div class="px-4 py-5">
                                                            <?php foreach($usrs as $us){ ?>
                                                            <h5 class="text-uppercase"><?php echo $us['nomPrenom'];?>
                                                            </h5>
                                                            <?php } ?>
                                                            <h4 class="mt-5 theme-color mb-5">Merci Pour votre Commande.
                                                            </h4>
                                                            <span class="theme-color">Payment Summary</span>
                                                            <div class="mb-3">
                                                                <hr class="new1">
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <small>Shippement</small>
                                                                <small>Gratuit</small>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <small>Tax</small>
                                                                <small>0%</small>
                                                            </div>
                                                            <div class="d-flex justify-content-between mt-3"> <span
                                                                    class="font-weight-bold">Total</span> <span
                                                                    class="font-weight-bold theme-color"><?php echo $total; ?></span>
                                                            </div>
                                                            <div class="text-center mt-5"> <button
                                                                    class="btn btn-primary"
                                                                    style="background: #fe4c50;">Continuer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                        </form>
                    </div>
                </div>
            </div>










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

</body>

</html>