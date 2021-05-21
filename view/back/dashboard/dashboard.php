<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>MiniArt | Administration</title>

    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
    new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- chart -->
    <script src="js/Chart.js"></script>
    <!-- //chart -->
    <!--Calender-->
    <link rel="stylesheet" href="css/clndr.css" type="text/css" />
    <script src="js/underscore-min.js" type="text/javascript"></script>
    <script src="js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="js/clndr.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
    <!--End Calender-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
</head>

<body class="cbp-spmenu-push">
    <div class="main-content">

        <?php include_once('includes/sidebar.php');?>

        <?php include_once('includes/header.php');?>
        <!-- main content start-->
        <div id="page-wrapper" class="row calender widget-shadow">
            <div class="main-page">
                <div class="row calender widget-shadow">
                    <div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1=mysqli_query($con,"Select * from reclamations");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Reclamations</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query1=mysqli_query($con,"Select * from utilisateurs");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Utilisateurs
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-last">
                            <?php  $query1=mysqli_query($con,"Select * from avisproduits");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Avis
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot;/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>



					<div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1=mysqli_query($con,"Select * from abonnements");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Abonnements</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query1=mysqli_query($con,"Select * from produitsart");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Service Artistiques
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-last">
                            <?php  $query1=mysqli_query($con,"Select * from produitscult");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Service Culturelles
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot;/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>



					<div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1=mysqli_query($con,"Select * from achats");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Achats</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query1=mysqli_query($con,"Select * from commandes");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Commandes
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-last">
                            <?php  $query1=mysqli_query($con,"Select * from livraison");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Livraison
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot;/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>


					<div class="row-one">
                        <div class="col-md-4 widget">
                            <?php $query1=mysqli_query($con,"Select * from ventes");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left ">
                                <h5>Total</h5>
                                <h4>Ventes</h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="col-md-4 widget states-mdl">
                            <?php $query1=mysqli_query($con,"Select * from promotion");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->Promotions
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
						<div class="col-md-4 widget states-last">
                            <?php  $query1=mysqli_query($con,"Select * from paniers");$nbtot=mysqli_num_rows($query1);/* requete affectation variable */ ?>
                            <div class="stats-left">
                                <h5>
                                    <!-- Texte -->Total
                                </h5>
                                <h4>
                                    <!-- Texte -->paniers
                                </h4>
                            </div>
                            <div class="stats-right">
                                <label> <?php echo $nbtot;/* echo variable */?></label>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                
				
				
				
				
				
				
				
				
				
				
				</div>




				



                <!-- repetition de widget -->

                <!--footer-->
                <?php include_once('includes/footer.php');?>
                <!--//footer-->
                <!-- Classie -->
                <script src="js/classie.js"></script>
                <script>
                var menuLeft = document.getElementById('cbp-spmenu-s1'),
                    showLeftPush = document.getElementById('showLeftPush'),
                    body = document.body;

                showLeftPush.onclick = function() {
                    classie.toggle(this, 'active');
                    classie.toggle(body, 'cbp-spmenu-push-toright');
                    classie.toggle(menuLeft, 'cbp-spmenu-open');
                    disableOther('showLeftPush');
                };


                function disableOther(button) {
                    if (button !== 'showLeftPush') {
                        classie.toggle(showLeftPush, 'disabled');
                    }
                }
                </script>
                <!--scrolling js-->
                <script src="js/jquery.nicescroll.js"></script>
                <script src="js/scripts.js"></script>
                <!--//scrolling js-->
                <!-- Bootstrap Core JavaScript -->
                <script src="js/bootstrap.js"> </script>
</body>

</html>