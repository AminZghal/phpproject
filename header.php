<?php


include_once "../includes/common.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="fn.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
  

    <link href="starter-template.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
    
    <title>Valorant</title>
</head>
<nav class="container navbar navbar-light ">
  <a class="navbar-brand" href="crudProduit.php">
    <img src="image/LOGOV.png" height="50" class="d-inline-block" alt="">
    Valorant
  </a>
  <?php
 
  ?>
    <a href="../../index.php" class="btn d-flex align-items-center" title="Login" data-toggle="tooltip" >Logout</a>
    <a href="#" class="navbar-brand d-flex align-items-center" title="Login" data-toggle="tooltip" ><i class="material-icons">&#xe7fd;</i><?php echo $_SESSION['email'] ?></a>

  <?php
  
  ?>
  
</nav>
