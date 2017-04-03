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
                                <h3>Price: ' . $product['prod_price'] . '</h3>
                                <br>
                                <button class="button" >Add To Cart</button>
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
            echo '<p>Both type and category</p>';
        } else {
            echo '<p>WE have a category</p>';
        }//if (isset($_GET['type']))
    } else {
        redirect('./not_found_404.php');
    }//if (isset($_GET['id']) && (is_numeric($_GET['id'])))

    ?>

</main>










<?php include_once ('../includes/footer.inc.php'); ?>
