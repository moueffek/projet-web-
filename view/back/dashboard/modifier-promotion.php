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
    $id_produit=$_POST['idProd_r'];
    $codePromo=$_POST['codep_r'];
    $pourcentage=$_POST['pour_r'];

   
 $eid=$_GET['editid'];
     
$query=mysqli_query($con, "UPDATE promotion SET codePromo='$codePromo',pourcentage=$pourcentage WHERE id=$eid");
    if ($query) {
    $msg="Modification Avec Success !.";
    $secondsWait = 1;
    header("refresh:$secondsWait");
  }
  else
    {
      $msg="Probleme lors de la modification.";
    }

  
}


  ?>
<!DOCTYPE HTML>
<html>

<head>
    <title>MiniArt | Modifier promotions</title>

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
                    <h3 class="title1">Modifer une promotion</h3>
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Modification :</h4>
                        </div>
                        <div class="form-body">
                        <form method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
    
  }  ?> </p>
                                <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  promotion where id='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                    <div class="form-group"><label>Id Promotion</label><input type="number" id="id_r"
                                        name="id_r" class="form-control" value="<?php echo $row['id']; ?>" disabled>

                                    <label>Id Promotion</label><input type="text" id="idProd_r" name="idProd_r"
                                        class="form-control" value="<?php echo $row['id_produit']; ?>" disabled>

                                    <label>Code Promotion</label><input type="text" id="codep_r" name="codep_r"
                                        class="form-control" value="<?php echo $row['codePromo']; ?>" required>

                                    <label>Pourcentage</label><input type="text" id="pour_r" name="pour_r" class="form-control"
                                        value="<?php echo $row['pourcentage']; ?>" required>
                                </div>
                                <?php } ?>
                                <button type="submit" name="submit" class="btn btn-default">Modifer</button>
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