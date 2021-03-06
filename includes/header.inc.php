<?php include_once ('../includes/connection.php'); ?>
<?php include_once ('../includes/functions.php'); ?>
<?php include_once ('../includes/sessions.inc.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
    <title>Web Shop - Home</title>
</head>
<div>

<header>
    <div class="headerBox">
        <div class="shopName">
            <h1>ReMusic</h1>
        </div>
        <div class="shopLogo">
            <a href="index.php"><img src="./assets/images/logo.svg" class="logoSvg"></a>
        </div>
    </div>
</header>
<?php

if (isset($_SESSION['id'])) {
    echo '
         
       <div class="fullWidth">
            <div class="welcomeBox">
                <div class="welBox"><p>Welcome '.$_SESSION['name'].'</p></div>
     ';
          if (isset($_SESSION['cart'])) {
              $quant = count($_SESSION['cart']);
              echo '<div class="welBox"><p><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;'.$quant.' items</p></div>
                    <div class="welBox"><a href="./cart.php" class="center">Go to cart</a></div>';
          }
    echo '
                <div class="welBox"><a href="./logout.php">Log Out</a></div>
            </div>
        </div>
    ';
}
?>

<?php include_once ('navbar.inc.php') ?>
