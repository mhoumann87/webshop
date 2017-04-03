<?php include_once ('../includes/header.inc.php'); ?>

    <main>
        <h2>All Products</h2>
        <div class="productList">

            <?php

            $prodList = getProducts();

            while ($products = mysqli_fetch_assoc($prodList)) {
                echo '
                <div class="product">
                    <div class="photoBox">
                    <img src="./assets/images/uploads/'.$products['prod_photo'].'" class="prodPhoto" alt="Product photo of '.$products['prod_artist'].'">
                    </div>
                    <div class="prodText">
                    <p class="info">'.$products['prod_artist'].'</p>
                    <p class="info">'.$products['prod_title'].'</p>
                    <p>Category: '.$products['prod_category'].'</p>
                    <p>Type: '.$products['prod_type'].'</p>
                    <p>Product number: '.$products['prod_number'].'</p>
                    <p>'.$products['prod_description'].'</p>
                    <p>Price: DKR '.$products['prod_price'].'</p>
                    </div>
                </div>
                ';
            }//while

            ?>
        </div>
        <div class="addBox">
        <div class="addProductsForm">
            <h3>Add New Product</h3>

        <?php


        $errors = [];

        $e1 = '';
        $errCat = '';

        $e2 = '';
        $errType = '';

        $e3 = '';
        $errProdNo = '';

        $e4 = '';
        $errArtist = '';

        $e5 = '';
        $errDesc = '';

        $e6 = '';
        $errPrice = '';

        $e7 = '';
        $errTitle = '';

        $errPhoto = '';
        $errPhoto1 = '';

        $resAddProd = '';

        $date = time();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!fieldFilled($_POST['category'])) {
                $e1 = 'class="redborder"';
                $errCat = '<p class="error">You have to enter a category</p>';
                $errors = ['No Category'];
            }

            if (!fieldFilled($_POST['type'])) {
                $e2 = 'class="redborder"';
                $errType = '<p class="error">You have to enter a type</p>';
                $errors = ['No Type'];
            }

            if (!fieldFilled($_POST['prodNo'])) {
                $e3 = 'class="redborder"';
                $errProdNo = 'You have to enter a product number';
                $errors = 'No Product no';
            }

            if (usedProdNo($_POST['prodNo']) === NULL) {
                $e3 = 'class="redborder"';
                $errProdNo = 'THis product number is allready in use';
                $errors = 'Used Prod no';
            }



            if (!fieldFilled($_POST['artist'])) {
                $e4 = 'class="redborder"';
                $errArtist = 'You have to enter an artist';
                $errors = 'No Artist';
            }

            if (!fieldFilled($_POST['title'])) {
                $e7 = 'class="redborder"';
                $errTitle = 'You have to enter an artist';
                $errors = 'No Title';
            }



            if (!fieldFilled($_POST['description'])) {
                $e5 = 'class="redborder"';
                $errDesc = 'You have to enter a description';
                $errors = 'No Description';
            }

            if (!fieldFilled($_POST['price'])) {
                $e6 = 'class="redborder"';
                $errPrice = 'You have to enter a price';
                $errors = 'No Price';
            }


            if (empty($errors)) {

                $prodNo = cleanInput($_POST['prodNo']);
                $category = cleanInput($_POST['category']);
                $type = cleanInput($_POST['type']);
                $artist = cleanInput($_POST['artist']);
                $title = cleanInput($_POST['title']);
                $desc = cleanInput($_POST['description']);
                $price = cleanInput($_POST['price']);
                $photo = basename($_FILES["fileToUpload"]["name"]);


                $target_dir = "./assets/images/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $errPhoto = '<p class="error">This is not an image</p>';
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    $errPhoto = '<p class="error">There is all ready an image with thes name in the database</p>';
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    $errPhoto = '<p class="error">Image can not be larger than 500 kb</p>';
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $errPhoto = '<p class="error">Images must be of the type JPG, JPEG, PNG or GIF</p>';
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $errPhoto1 = '<p class="error">Image was not uploaded';

                } else {// if everything is ok, try to upload file
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $errPhoto = '<p class="sucess">The file ' . basename($_FILES["fileToUpload"]["name"]) . ' has been uploaded</p>.';

                        $query = "INSERT INTO products ";
                        $query .= "(prod_number, prod_added, prod_category, prod_type, prod_artist, prod_title, prod_description, prod_price, prod_photo) ";
                        $query .= "VALUES ";
                        $query .= "('{$prodNo}', '{$date}','{$category}', '{$type}', '{$artist}', '{$title}', '{$desc}', '{$price}', '{$photo}')";
                        $result = mysqli_query($conn, $query);


                        if ($result) {
                            $resAddProd = '<p class="success">Product Added';
                            redirect('./add_products.php');
                        } else {
                            $resAddProd= '<p class="error>Error '.mysqli_error($conn).'</p>';

                        }


                    } else {
                        $resAddProd= '<p class="error">Something went wrong under uplæoad';
                    }
                }

            }

            } //if ($_SERVER['REQUEST_METHOD'] == 'POST')


        ?>
            <form action="add_products.php" id="addProd" method="post" enctype="multipart/form-data">
                <p><label>Enter catogory</label></p>
                <p><input <?php print($e1); ?> type="text" name="category" size="30"></p><?php print($errCat); ?>
                <p><label>Enter product type</label></p>
                <p><input <?php print($e2); ?> type="text" name="type" size="30"></p><?php print($errType); ?>
                <p><label>Enter product number</label></p>
                <p><input <?php print($e3); ?> type="text" name="prodNo" size="30"></p><?php print($errProdNo); ?>
                <p><label>Enter Artist</label></p>
                <p><input <?php print($e4); ?> type="text" name="artist" size="30"></p><?php print($errArtist); ?>
                <p><label>Enter Title</label></p>
                <p><input <?php print($e7); ?> type="text" name="title" size="30"></p><?php print($errTitle); ?>
                <p><label>Enter description</label></p>
                <textarea <?php print($e5); ?> name="description" form="addProd" class="textArea"></textarea><?php print($errDesc); ?>
                <p><label>Add price</label></p>
                <p><input <?php print($e6); ?> type="text" name="price" size="30"><?php print($errPrice); ?>
                <p><label>Upload photo (max size 500kb)</label></p><?php print($errCat); ?>
                <p><input type="file" name="fileToUpload" id="fileToUpload"></p>
                <?php print($errPhoto); ?> <?php print($errPhoto1); ?>
                <p><input type="submit" name="submit" class="button" value="Add Product"></p>
                <?php print($resAddProd); ?>
            </form>
        </div>
        </div>



    </main>

<?php include_once ('../includes/footer.inc.php'); ?>
