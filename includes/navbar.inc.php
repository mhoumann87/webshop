<nav>
    <div class="navBox">
        <div class="navbar" id="nav">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a>
                    <ul>
                        <?php
                        $categories = findCategories();

                        while ($category = mysqli_fetch_assoc($categories)) {

                            echo '
                           
                                <li><a href="./products.php?cat='.$category['prod_category'].'">'.$category['prod_category'].'</a></li>
                                    <ul>';
                            $types = findTypes();

                            while ($type = mysqli_fetch_assoc($types)) {

                                echo '
                                    <li><a href="./products.php?cat='.$category['prod_category'].'&type='.$type['prod_type'].'">'.$type['prod_type'].'</a></li>
                                    ';
                            }

                            echo ' 
 
                         </ul>
                        
                        ';

                        }

                        ?>
                    </ul>
                </li>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./signup.php">Signup</a></li>
                <li><a href="./add_products.php">Add products</a></li>
                <li><a href="./add_admins.php">Add Administrator</a></li>
            </ul>
        </div>
    </div>








</nav>
