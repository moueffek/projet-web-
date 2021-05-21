<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
    }
    include_once '../../Controller/wishlistC.php';
    include_once '../../Controller/serviceC.php';
    include_once '../../Controller/paniersC.php';
    
    $paniersC = new paniersC();
    $rows=$paniersC->sumPaniers($_SESSION['idlogin']);

    $wishlistC = new wishlistC();
    $serviceC = new serviceC();

    $idProds=$wishlistC->retourIdprod($_SESSION['idlogin']);
    $typeProds=$wishlistC->retourTypeProd($_SESSION['idlogin']);
    $count=$wishlistC->nombreWishlists($_SESSION['idlogin']);

?>


<html lang="en">

<head>
    <title>MiniArt | WishList</title>
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
    <style>
    .img1 {
        width: 110px;
        height: 73px;
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

        </ul>

    </div>

    <div class="container contact_container">
        <div class="row">
            <div class="col">

                <!-- Breadcrumbs -->

                <div class="breadcrumbs d-flex flex-row align-items-center">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Contact</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Contact Us -->
        <h3>Mes Wishlists</h3>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="20%" style="text-align: center;">Produit</th>
                    <th scope="col" style="text-align: center;">Titre</th>
                    <th scope="col" style="text-align: center;">Prix</th>
                    <th scope="col" style="text-align: center;">Carte</th>
                    <th scope="col" style="text-align: center;">Gestion</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if($count != 0){
      foreach($typeProds as $type){
      foreach($idProds as $id){
      if($type['typeProd']=='art')
      $table='produitsart';
      if($type['typeProd']=='cult')
      $table='produitscult';   
      $wishlists=$serviceC->retourProduit($table,$id['idProd']);
      foreach($wishlists as $row){
                    ?>
                <tr style="text-align: center;">
                    <th scope="row"><img class="img1" src="<?php echo $row['img1']; ?>" alt=""></th>
                    <td><?php echo $row['titreProd']; ?></td>
                    <td><?php echo $row['prixProd']; ?></td>
                    <td><button type="button" class="btn btn-danger"><a
                                href="../back/ajoutpanier.php?idProd=<?php echo $row['idProd']; ?>&idUsr=<?php echo $_SESSION['idlogin'] ?>&titreProd=<?php echo $row['titreProd'] ?>&descProd=<?php echo $row['descProd'] ?>&prixProd=<?php echo $row['prixProd'] ?>&quant=<?php $quant=1; echo $quant; ?>&typeProd=<?php echo 'art' ;?>&img1=<?php echo $row['img1'] ?>"
                                style="border-style: none; color:white;">Ajouter a la carte</a></button></td>
                    <td><button type="button" class="btn btn-danger"><a
                                href="../back/supprimer-wishlist.php?idProd=<?php echo $row['idProd']; ?>"
                                style="border-style: none; color:white;">Supprimer</a></button></td>
                </tr>
                <?php }}} }?>
            </tbody>
        </table>

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
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
</body>

</html>