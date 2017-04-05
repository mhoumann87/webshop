<?php include_once ('../includes/header.inc.php'); ?>

<main>
    <div class="formBox">
        <div class="loginBox"Z>
            <h3>Login</h3>

            <?php

            if (isset($_GET['id']) && $_GET['id'] == 'new') {
                echo '<h6 class="center">Welcome to the shop, please login before you continue</h6>';
            } else if (isset($_GET['id']) && $_GET['id'] == 'shop') {
                echo '<h6 class="center error">You have to be looged in to use the shop</h6>';
            }

            $e1 = '';
            $e2 = '';
            $e3 = '';
            $e4 = '';

            $errors = []; //array to pick up errors
            $email = 'E-mail';
            $mail = '';
            $password = 'Password';
            $hashedPassword = '';
            $noLogin= '';


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $mail = cleanInput($_POST['email']);
                $email = cleanInput($_POST['email']);
                $pass = cleanInput($_POST ['pass']);


                //Check fields to check they are filled

                if (!fieldFilled($_POST['email'])) {
                    $e1 = 'class="redborder"';
                    $e2 = '<p class="error">You must enter an email address</p>';
                    $errors = ['no email'];
                }

            if (!fieldFilled($_POST['pass'])) {
                $e3 = 'class="redborder"';
                $e4 = '<p class="error">You must enter a password</p>';
                $password = '';
                $errors = ['no password'];
            }

            //check validity of email
            if (!validEmail($mail)) {
                $e1 = 'class="redborder"';
                $e2 = '<p class="error">You must enter a valid email address</p>';
                $errors = ['invalid email'];

            }

            //login procedure
                if (empty($errors)) {

                    $findUser = logIn($mail,  $pass);

                    if ($findUser) {

                        $_SESSION['id'] = $findUser['user_id'];
                        $_SESSION['name'] = $findUser['user_name'];
                        $_SESSION{'status'} = $findUser['user_status'];


                        redirect('shop.php');
                    } else {

                        $noLogin = '<p class="error">Email or password is not found!</p>';
                    }

                }

            } //if ($_SERVER['REQUEST_METHOD'] == 'POST'

            ?>
            <form action="login.php" class="login" method="POST">
                <p><label>E-mail</label></p>
                <p><input <?php print($e1); ?> type="text" name="email" size="30" placeholder="<?php print($email); ?>" value="<?php print($mail); ?>"></p><?php print($e2); ?>
                <p><label>Password</label></p>
                <p><input <?php print($e3); ?> type="password" name="pass" size="30" placeholder="<?php print($password); ?>"></p><?php print($e4); ?>
                <p><input type="submit" name="login" value="Login" class="button">&nbsp;&nbsp;&nbsp;<a href="signup.php">Or Sign Up</a> </p>
                <?php echo $noLogin; ?>
            </form>
        </div>


    </div>


</main>







<?php include_once ('../includes/footer.inc.php'); ?>
