<?php include_once ('../includes/header.inc.php'); ?>

<main>
    <?php

    //check to see if there is a GET value and what kind else show am error page
    if (isset($_GET['id']) && (is_numeric($_GET['id']))) {

        $prodNo = cleanInput($_GET['id']);

        $product = mysqli_fetch_assoc(findProduct($prodNo));
        //check to see if we found a product
        if ($product) {


            echo '
            <div class="oneProduct">
                <div class="prodBox">
                    <div class="prodInfo">
                        <div class="photoBox">
                            <img src="./assets/images/uploads/' . $product['prod_photo'] . '" class="prodPhoto" alt="' . $product['prod_artist'] . ' ' . $product['prod_title'] . '">
                        </div>
                        <div class="prodText">
                                <p>Category: ' . $product['prod_category'] . '</p>
                                <p>Type: ' . $product['prod_type'] . '</p>
                                <br>
                                <h3>' . $product['prod_artist'] . '</h3>
                                <h3>' . $product['prod_title'] . '</h3>
                                <br>
                                <p>Product no.: ' . $product['prod_number'] . '</p>
                                <br>
                                <h3>Price: '.number_format((float)$product['prod_price'], 2, ',', '').'</h3>
                                <br>
                                <form action="products.php?id='.$prodNo.'" method="post">
                                <p><label>Quantity:&nbsp;</label><select name="quantity">
                                   <option value="1" selected>1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   </select><input type="submit" value="Add to chart"> </p>
                                   
             ';
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        if ($_SESSION['id']) {

                            if (isset($_SESSION['cart'])) {

                                $_SESSION['cart'] = addToCart($_SESSION['cart'], $product['prod_number'], $_POST['quantity']);
                                echo '<p class="success">Product added to your cart</p>';
                            } else {
                                $_SESSION['cart'] = array();
                                $_SESSION['cart'] = addToCart($_SESSION['cart'], $product['prod_number'], $_POST['quantity']);
                                echo '<p class="success">Product added to your cart</p>';
                            }
                        } else {
                            redirect('./login.php?id=shop');
                        }
                    }//server request
            echo '
                         </div>
                    </div>
                    <div class="description">
                        <h4>Description</h4>
                        <p>' . $product['prod_description'] . '</p>
                    </div>
                </div>
            </div>
        ';
        } else {
            redirect('./not_found_404.php');
        }// if($product)
    } else if (isset($_GET['cat'])) {

        if (isset($_GET['type'])) {
            //show all products with category and type
            $cat = cleanInput($_GET['cat']);
            $type = cleanInput($_GET['type']);

            //check to see if category AND type exsist in db
            $checkCat = checkCatagory($cat);
            $checkType = checkType($type);

            if (mysqli_num_rows($checkCat) > 0 && mysqli_num_rows($checkType) > 0) {

                echo '
                <div class="webshop">
                    <div class="category"> 
                        <div class="topbar">
                            <h3>'.$cat.'</h3>
                        </div>
                    <div class="type">
                        <div class="typeTop">
                            <h3>'.$type.'</h3>                
                          </div>
                 ';
                $products = productList($cat, $type);
                while ($product = mysqli_fetch_assoc($products)) {
                    echo '
                    <div class="product">

                    <div class="photoBox">
                    <a href="./products.php?id='.$product['prod_number'].'"><img src="./assets/images/uploads/'.$product['prod_photo'].'" class="prodPhoto" alt="Photo of product"></a>
                    </div>
                     <div class="prodText">
                        <h4>'.$product['prod_artist'].'</h4>
                        <h4>'.$product['prod_title'].'</h4>
                        <br>
                        <h3>DKR '.number_format((float)$product['prod_price'], 2, ',', '').'</h3>
                        <a href="./products.php?id='.$product['prod_number'].'">Read more</a>
                    </div>
                </div>
            
                 ';
                }//while product




                echo '
                </div>
                </div>
                </div>
                ';
            } else {
                redirect('./not_found_404.php');
            }//if (mysqli_num_rows($checkCat) > 0 && mysqli_num_rows($checkType) > 0)

        } else {
            //show all products in this category all types
            $cat = cleanInput($_GET['cat']);
            $checkCat =  checkCatagory($cat);


            if (mysqli_num_rows($checkCat) > 0) {

                echo '
                <div class="webshop">
                    <div class="category"> 
                        <div class="topbar">
                            <h3>'.$cat.'</h3>
                        </div>
                ';


                $types = findTypes();
                while ($type = mysqli_fetch_assoc($types)) {
                    echo '
                    <div class="type">
                        <div class="typeTop">
                            <h3>'.$type['prod_type'].'</h3>                
                        </div>
                    ';
                    $products = productList($cat, cleanInput($type['prod_type']));
                    while ($product = mysqli_fetch_assoc($products)) {
                        echo '
                    <div class="product">

                    <div class="photoBox">
                        <a href="./products.php?id='.$product['prod_number'].'"><img src="./assets/images/uploads/'.$product['prod_photo'].'" class="prodPhoto" alt="Photo of product"></a>
                    </div>
                     <div class="prodText">
                        <h4>'.$product['prod_artist'].'</h4>
                        <h4>'.$product['prod_title'].'</h4>
                        <br>
                        <h3>DKR '.number_format((float)$product['prod_price'], 2, ',', '').'</h3>
                        <a href="./products.php?id='.$product['prod_number'].'">Read more</a>
                    </div>
                </div>
            
                 ';
                    }//while product

                    echo '</div>';
                }//while type

                echo '</div>';
            } else {
                redirect('./not_found_404.php');
            }
        }//if (isset($_GET['type']))
    } else {
        redirect('./not_found_404.php');
    }//if (isset($_GET['id']) && (is_numeric($_GET['id'])))

    ?>

</main>










<?php include_once ('../includes/footer.inc.php'); ?>
