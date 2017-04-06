<?php include_once('./../includes/header.inc.php'); ?>

    <main>
        <h2>Our newest products</h2>
        <div class="productList">

        <?php

        $newProducts = getNewest();

        while ($products = mysqli_fetch_assoc($newProducts)) {

            echo '
            <div class="product">
                <div class="hl">
                    <h4>'.$products['prod_category'].'</h4>
                    <p>'.$products['prod_type'].'</p>
                </div>
                <div class="photoBox">
               <a href="./products.php?id='.$products['prod_number'].'"><img src="./assets/images/uploads/'.$products['prod_photo'].'" class="prodPhoto" alt="Photo of product"></a>
                </div>
                <div class="prodText">
                    <h4>'.$products['prod_artist'].'</h4>
                    <h4>'.$products['prod_title'].'</h4>
                    <br>
                    <h3>DKR '.number_format((float)$products['prod_price'], 2, ',', '').'</h3>
                    <a href="./products.php?id='.$products['prod_number'].'">Read more</a>
                                                    <form action="./index.php" method="post">
                                <p><label>Quantity:&nbsp;</label><select name="quantity">
                                   <option value="1" selected>1</option>
                                   <option value="2">2</option>
                                   <option value="3">3</option>
                                   <option value="4">4</option>
                                   <option value="5">5</option>
                                   </select><input type="submit" value="Add to chart"> </p>
                                </form>   
             ';
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        if ($_SESSION['id']) {

                            if (isset($_SESSION['cart'])) {

                                $_SESSION['cart'] = addToCart($_SESSION['cart'], $products['prod_number'], $_POST['quantity']);
                                redirect( './shop.php');

                            } else {
                                $_SESSION['cart'] = array();
                                $_SESSION['cart'] = addToCart($_SESSION['cart'], $products['prod_number'], $_POST['quantity']);
                                redirect( './shop.php');
                            }
                        } else {
                            redirect('./login.php?id=shop');
                        }
                    }//server request
                    echo ';
                    
                </div>
            </div>
            ';
        }

        ?>

        </div>
    </main>

    <!-- Maybe an aside here with a contact form -->

<?php include_once('./../includes/footer.inc.php'); ?>