<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $ids=$_POST['id_r'];
    $id_produit=$_POST['idprod_r'];
    $codePromo=$_POST['codep_r'];
    $pourcentage=$_POST['pour_r'];

   

     
    $query=mysqli_query($con, "INSERT INTO `promotion`( `id_produit`,`codePromo`, `pourcentage`) 
    VALUES ('$id_produit','$codePromo','$pourcentage')");
    if ($query) {
    	echo "<script>alert('Ajout avec success.');</script>"; 
    		echo "<script>window.location.href = 'ajouter-promotion.php'</script>";   
    $msg="";
  }
  else
    {
    echo "<script>alert('Probleme lors de l'ajout.');</script>";  	
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>BPMS | Ajouter Promotion</title>

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
        <!-- //header-ends -->
        <!-- main content start-->
        <div id="page-wrapper">
            <div class="main-page">
                <div class="forms">
                    <h3 class="title1">Ajouter une promotion</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Ajouter :</h4>
                        </div>
                        <div class="form-body">
                            <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>


                                    <label>Id Produit</label><input type="text" id="idprod_r" name="idprod_r"
                                        class="form-control" required>
                                        <label>Code Promotion</label><input type="text" id="codep_r" name="codep_r"
                                        class="form-control" required>
                                    <label>Pourcentage</label><input type="text" id="pour_r" name="pour_r"
                                        class="form-control" required>
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Ajouter</button>
                            </form>
                        </div>

                    </div>


                </div>
            </div>
            <?php include_once('includes/footer.php');?>
        </div>
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
<?php } ?>