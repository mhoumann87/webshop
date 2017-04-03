<?php include_once ('../includes/header.inc.php'); ?>

<main>
    <h2>Web Shop</h2>
    <div class="webshop">

        <?php

        $categories = findCategories();

        while ($category = mysqli_fetch_assoc($categories)) {

            echo '
                       <div class="category"> 
                
                <div class="topbar">
                    <h3><a href="./products.php?cat='.cleanInput($category['prod_category']).'">'.cleanInput($category['prod_category']).'</a></h3>
                </div>
            
            ';

            $types = findTypes();
            while ($type = mysqli_fetch_assoc($types)) {
                echo '
               
                <div class="type">
                <div class="typeTop">
                    <h3><h3><a href="./products.php?cat='.cleanInput($category['prod_category']).'&type='.cleanInput($type['prod_type']).'">'.cleanInput($type['prod_type']).'</a></h3></h3>                
                </div>
                ';

                $cat = cleanInput($category['prod_category']);
                $type = cleanInput($type['prod_type']);
                $products = productList($cat, $type );

                while ($product = mysqli_fetch_assoc($products)) {

                    echo '
            <div class="product">

                <div class="photoBox">
                    <img src="./assets/images/uploads/'.$product['prod_photo'].'" class="prodPhoto" alt="Photo of product">
                </div>
                <div class="prodText">
                    <h4>'.$product['prod_artist'].'</h4>
                    <h4>'.$product['prod_title'].'</h4>
                    <br>
                    <h3>DKR '.$product['prod_price'].'</h3>
                    <a href="./products.php?id='.$product['prod_number'].'">Read more</a>
                </div>
            </div>
            
            ';
                }//while product

                echo '</div>';
                }//while type


            echo '</div>';

        }//while category



        ?>

    </div>
</main>








<?php include_once ('../includes/footer.inc.php'); ?>
