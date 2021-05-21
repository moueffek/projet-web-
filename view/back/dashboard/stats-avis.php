<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
$idProduit=0;
$_GET['idProd'];
$idProduit=$_GET['idProd'];
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>MiniArt | Avis </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>


         <div id="page-wrapper">
		<div class="main-page">
        <center>
        <form action="stats-avis.php" method="get">
        <input type="text" id="idProd" name="idProd">
        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>


        </center>
        <?php if($idProduit!=0){ ?>

            <div class="tables">
					<h3 class="title1">Statistiques Avis</h3>
					
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Reclamations :</h4>
						<table class="table table-bordered"> <thead> <tr> <th>Id Avis</th> <th>Id Utilisateur</th> <th>Id Produit</th> <th>Message</th><th>Nb Etoiles</th></tr> </thead> <tbody>
<?php
$ret=mysqli_query($con,"select * from  avisproduits where idProd=$idProduit");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $cnt;?></th><td><?php  echo $row['idUsr'];?></td><td><?php  echo $row['idProd'];?></td><td><?php  echo $row['message'];?></td><td><?php  echo $row['etoiles'];?></td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table>
</div>
<button onclick="window.print();" class="btn btn-primary" id="print-btn">Sauvegarder ou Imprimer</button>

<script> window.open("includes/charts/charts.php?idProd=<?php echo $idProduit; ?>"); </script>

        <?php }?>
        </div>
        </div>
    </div>
    <?php include_once('includes/footer.php');?>
</body>
</html>
<?php }  ?>