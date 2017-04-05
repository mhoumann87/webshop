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
                    <h3>DKR '.$products['prod_price'].'</h3>
                    <a href="./products.php?id='.$products['prod_number'].'">Read more</a>
                    
                </div>
            </div>
            ';
        }

        ?>

        </div>
    </main>

    <!-- Maybe an aside here with a contact form -->

<?php include_once('./../includes/footer.inc.php'); ?>