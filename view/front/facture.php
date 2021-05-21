<?php
session_start();
error_reporting(0);

if (strlen($_SESSION['idlogin']==0)) {
    header("location:logout.php");
    }
    include_once '../../Controller/utilisateurC.php';
    $utilisateurC = new utilisateurC();
    include_once '../../Controller/livraisonC.php';
    $livraisonC = new livraisonC();
    include_once '../../Controller/commandeC.php';
    $commandeC = new commandeC();
    include_once '../../Controller/achatsC.php';
    $achatC = new achatC();

    $idAchat=$_GET['idAchat'];

    $utilisateurs=$utilisateurC->infoUtilisateur($_SESSION['idlogin']);
    $livaisons=$livraisonC->factAdresse($_SESSION['idlogin']);
    $date=$livraisonC->retourDate($_SESSION['idlogin']);
    $cmds=$commandeC->factCommande($_SESSION['idlogin']);
    $achats=$achatC->afficherFacture($idAchat);
?>


<html lang="en">

<head>
    <title>MiniArt | Ma facture</title>
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
    .invoice-title h2,
    .invoice-title h3 {
        display: inline-block;
    }

    .table>tbody>tr>.no-line {
        border-top: none;
    }

    .table>thead>tr>.no-line {
        border-bottom: none;
    }

    .table>tbody>tr>.thick-line {
        border-top: 2px solid;
    }
    </style>
</head>

<body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <img src="images/logo.png" alt="MiniArt Ya bro">
                    <?php foreach ($cmds as $row){ ?>
                    <h3 class="pull-right"><?php echo 'N° : #'.$row['idCmd']; ?></h3>
                    <?php }?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <?php foreach ($utilisateurs as $row){ ?>
                            <strong>facturé à:</strong>
                            <br>
                            <?php echo $row['nomPrenom']; ?>
                            <br>
                            <?php echo $row['tel']; ?>
                            <br>
                            <?php echo $row['email']; ?>
                            <br>
                            <?php echo $row['adresse']; ?>
                        </address>
                        <?php }?>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                        <?php foreach ($livaisons as $row){ ?>
                            <strong>Adresse livraison:</strong>
                            <br>
                            <?php echo $row['lieu']; ?>
                            <br>
                        </address>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Methode de Payment:</strong><br>
                            Carte Banquaire<br>
                        </address>
                    </div>

                    <?php foreach ($date as $row){ ?>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Date de Commande:</strong><br>
                            <?php echo $row['date']; ?><br><br>
                        </address>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td class="text-center"><strong>Prix Total</strong></td>
                                        <td class="text-center"><strong>Adresse</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($achats as $row){?>
                                    <tr>
                                        <td class="text-center"><?php echo $row['prixtot'].' DT';?></td>
                                        <td class="text-center"><?php echo $row['lieu'];?></td>
                                    </tr>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-danger"onclick="printfac()">Imprimer ou Sauvegarder</button>
            </div>
        </div>
    </div>

    <script>
        function printfac(){
            window.print();
        }
    </script>
</body>

</html>