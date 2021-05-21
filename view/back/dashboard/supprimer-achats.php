<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } 
  else{
      $id=$_GET['editid'];
       $sql =mysqli_query($con,"DELETE FROM achats WHERE idAchat=$id");
     if($sql){
        header("location:achats.php");
      }
  }
  ?>