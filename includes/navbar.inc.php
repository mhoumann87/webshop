<nav>
        <div class="navbar">
            <ul class="dropDownMenu">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Web Shop&nbsp;<i class="fa fa-caret-down "></i></a>
                    <ul>
                        <?php
                        $categories = findCategories();

                        while ($category = mysqli_fetch_assoc($categories)) {

                            echo '
                           
                                <li><a href="./products.php?cat='.$category['prod_category'].'">'.$category['prod_category'].'&nbsp;<i class="fa fa-caret-right"></i></a>
                                    <ul>';
                            $types = findTypes();

                            while ($type = mysqli_fetch_assoc($types)) {

                                echo '
                                    <li><a href="./products.php?cat='.$category['prod_category'].'&type='.$type['prod_type'].'">'.$type['prod_type'].'</a></li>
                                    ';
                            }//while ($type = mysqli_fetch_assoc($types))

                            echo ' 
                            
                         </ul>
                        </li>
                        ';

                        }//while ($category = mysqli_fetch_assoc($categories))

                        ?>
                    </ul>
                </li>
                <li><a href="./login.php">Login</a></li>
                <li><a href="./signup.php">Signup</a></li>

                <?php

                if (isset($_SESSION['status']) && $_SESSION['status'] == 'admin') {
                    echo '
                       <li><a href="./add_products.php">Add products</a></li>
                       <li><a href="./add_admins.php">Add Administrator</a></li>
                    
                    ';
                }

                ?>

            </ul>
    </div>
</nav>
