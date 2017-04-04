<?php include_once ('../includes/header.inc.php'); ?>

<main>
    <div class="formBox">
        <div class="signupBox">
        <h3>Sign Up</h3>

    <?php

    $errors2 = []; //array to pick up errors
    $addError = '';

    //name
    $name = 'Full Name';
    $e5 = '';
    $errName = '';

    //address
    $street =  'Street';
    $e6 = '';
    $errStreet = '';

    $houseno = 'No,';
    $e7 = '';
    $errHouseno = '';

    $street2 = 'Address 2';
    $e8 = '';
    $errStreet2 = '';

    $postno ='Postcode';
    $e9 = '';
    $errPostno = '';

    $city = 'City';
    $e10 = '';
    $errCity = '';

    //phone
    $phone = 'Phone No.';
    $e11 = '';
    $errPhone = '';

    //E-mail
    $mail2 = 'E-Mail';
    $e12 = '';
    $errMail = '';

    //Password
    $e13 = '';
    $errPass = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $status = cleanInput($_POST['status']);

        //Name
        if (!fieldFilled($_POST['name'])) {
            $e5 = 'class="redborder"';
            $errName = '<p class="error">You must enter a name.</p>';
            $errors2 = ['No Name'];
        }

        if (!validName($_POST['name'])) {
            $e5 = 'class="redborder"';
            $errName = '<p class="error">Name can only be letters.</p>';
            $errors2 = ['Invalid Name'];
        }
        $name = cleanInput($_POST['name']);

        //Address
        if (!fieldFilled($_POST['street'])) {
            $e6 = 'class="redborder"';
            $errStreet = '<p class="error">You must enter a street.</p>';
            $errors2 = ['No Street'];
        }

        if (!validAddress($_POST['street'])) {
            $e6 = 'class="redborder"';
            $errStreet = '<p class="error">You must enter a valid address.</p>';
            $errors2 = ['Invalid Address'];
        }
        $street = cleanInput(($_POST['street']));

        if (!fieldFilled($_POST['houseno'])) {
            $e7 = 'class="redborder"';
            $errHouseno = '<p class="error">You must enter a house number.</p>';
            $errors2 = ['No Houseno'];
        }

        $houseno = cleanInput($_POST['houseno']);

        if ($_POST['street2'] == '') {
            $street2 = NULL;
        } else {
            $street2 = cleanInput($_POST['street2']);
        }

        if (!fieldFilled($_POST['postno'])){
            $e9 = 'class="redborder"';
            $errPostno = '<p class="error">You must enter a postal code</p>';
            $errors = ['No Postalcode'];
        }

        $postno = cleanInput($_POST['postno']);

        if (!fieldFilled($_POST['city'])) {
            $e10 = 'class="redborder"';
            $errCity = '<p class="error">You must enter a city name</p>';
            $errors2 = ['No City'];
        }

        $city = cleanInput($_POST['city']);


        //Phone
        if (!fieldFilled($_POST['phone'])) {
            $e11 = 'class="redborder"';
            $errPhone = '<p class="error">You have to enter a phone number</p>';
            $errors2 = ['No Phoneno'];
        }

        if (!validPhone($_POST['phone'])) {
            $e11 = 'class="redborder"';
            $errPhone = '<p class="error">Phonumber must be 8 numbers</p>';
            $errors2 = ['In valid Phoneno'];
        }

        $phone = cleanInput($_POST['phone']);

        if (!fieldFilled($_POST['mail'])) {
            $e12 = 'class="redborder"';
            $errMail = '<p class="error">You must enter an email address';
            $errors2 = ['No Email'];
        }

        if (!validEmail($_POST['mail'])) {
            $e12 = 'class="redborder"';
            $errMail = '<p class="error">You must enter a valid email address.</p>';
            $errors2 = ['Invalid Mail'];
        }

        if (existingEmail($_POST['mail']) === NULL) {
            $e12 = 'class="redborder"';
            $errMail = '¨<p class="error">E-mail allready exist in the database</p>';
            $errors2 = ['Mail Exists'];
        }

        $mail = cleanInput($_POST['mail']);

        //Password

        if ($_POST['pass'] != $_POST['checkPass']) {
            $e13 = 'class="redborder"';
            $errPass = '<p class="error">The two passwords are not equal</p>';
            $errors2 = ['Different Passwords'];
        }

        $pass = hashPassword(cleanInput($_POST['pass']));




        if (empty($errors2)) {

            if (addUser($name, $street, $houseno, $street2, $postno, $city, $phone, $mail, $pass, $status) === TRUE) {
                redirect('./login.php?id=new');
            } else {
                $addError = '<p class="error">Something went wrong, please try again</p>';

            }

    echo (addUser($name, $street, $houseno, $street2, $postno, $city, $phone, $mail, $pass, $status));
        }


    } //if ($_SERVER['REQUEST_METHOD'] == 'POST')

    ?>
    <form action="signup.php" class="signup" method="POST">
        <p><label>Name</label></p>
        <p><input <?php print($e5); ?>  type="text" name="name" size="30" placeholder="<?php print($name); ?>"></p><?php print($errName); ?>
        <p><label>Address</label></p>
        <p><input <?php print($e6); ?> type="text" name="street" size="20" placeholder="<?php print($street); ?>">&nbsp;<input <?php print($e7); ?> type="text" name="houseno" size="5" placeholder="<?php print($houseno); ?>"></p>
        <?php print($errStreet); ?><?php print($errHouseno); ?>
        <p><label>Address 2</label></p>
        <p><input <?php print($e8); ?> type="text" name="street2" size="30" placeholder="<?php print($street2); ?>"></p><?php print($errStreet2); ?>
        <p><label>Postcode and city</label></p>
        <p><input <?php print($e9); ?> type="text" name="postno" size="6" placeholder="<?php print($postno); ?>">&nbsp;<input <?php print($e10); ?> type="text" size="19" name="city" placeholder="<?php print($city); ?>"></p>
        <?php print($errPostno); ?><?php print($errCity); ?>
        <p><label>Phone No.</label></p>
        <p><input <?php print($e11); ?> type="text" name="phone" size="10" placeholder="<?php print($phone); ?>"></p><?php print($errPhone); ?>
        <p><label>E-mail</label></p>
        <p><input <?php print($e12); ?> type="text" name="mail" size="30" placeholder="<?php print($mail2); ?>"></p><?php print($errMail); ?>
        <p>Choose a Password</label></p>
        <p><input <?php print($e13); ?> type="password" name="pass" size="30" placeholder="Password"></p>
        <p>Repeat Password</label></p>
        <p><input <?php print($e13); ?> type="password" name="checkPass" size="30" placeholder="Password"></p>
        <?php print($errPass); ?>
        <p><input type="hidden" name="status" value="user"></p>
        <p><input type="submit" name="signup" value="Sign Up" class="button" </p>
        <?php print($addError); ?>
    </form>




    </div>
 </div>

</main>

<?php include_once ('../includes/footer.inc.php'); ?>