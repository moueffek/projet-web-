<?php
session_start();
error_reporting(E_ALL);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } 
  else{
      $id=$_GET['editid'];
       $sql =mysqli_query($con,"DELETE FROM ventes WHERE id=$id");
     if($sql){
        header("location:ventes.php");
      }
      else{
        echo '<script> alert("vous devez supprimer la commande avant!"); </script>';
        header("location:commandes.php");
      }
  }
  ?>