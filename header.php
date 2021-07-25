<?php

session_start();

if(isset($_SESSION['cart'])){

  $how_many_items = count($_SESSION['cart']); 
}
else
{
  $how_many_items = "0";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bhandari Shopping</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <style>
     .loader{
       background: url('items/1.gif') no-repeat;
       height: 100vh;
       width:100%;
       border: 1px solid teal;
       z-index: 100;
       align-items: center;
       justify-content: center;
       margin:auto;
     }
    </style>
</head>

<body onload=loader()>

<div class="loader"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-info nav-fixed">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Online Shopping</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
        </li>
    </div>
  </div>
 
<button class="btn btn-warning" data-toggle="modal" data-target="#myModal"> <a href="cart.php">Cart(<?php echo $how_many_items; ?>)</a></button>
</nav>

