<?php

//check if field is filled out
function fieldFilled($field) {
 return isset($field) && $field !== '';
   }

//check success query
function tjek_query($result_set) {
    if (!$result_set) {
        die('Query failed');
    }
}

// clean input
function cleanInput($field) {
    global $conn;
    $clean = mysqli_real_escape_string($conn, trim($field));
    return $clean;
}

//Check to see if email allready exsist in db
function existingEmail($email) {
    global $conn;
    $query = "SELECT * FROM users WHERE user_mail = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 0) {
        return TRUE;
    }

}


/***
 *  Database Functions
 */

//Register user

function addUser($name, $street, $houseno, $street2, $postno, $city, $phone, $mail, $pass, $status) {
    global $conn;
    $query  = "INSERT INTO `users` (`user_name`, `user_street`, `user_houseno`, `user_street2`, `user_postno`, `user_city`, `user_phone`, `user_mail`, `user_pass`, `user_status`) VALUES ('$name', '$street', '$houseno', '$street2', '$postno', '$city', '$phone', '$mail', '$pass', '$status');";
    $result = mysqli_query($conn, $query);
    //tjek_query($result);

    if ($result) {
        return TRUE;
    } else {
        return $query;
    }
}


/***
 * Hashing of passwords
 */

//hash password
function hashPassword($password) {
    $hashFormat = '$2y$10$';
    $saltLength = 22;

    $salt = generateSalt($saltLength);
    $formatAndSalt = $hashFormat . $salt;
    $hash = crypt($password, $formatAndSalt);
    return $hash;
}

//generer salt
function generateSalt($length) {
    $uniqueRandomString = md5(uniqid(mt_rand(), true));
    $base64String = base64_encode($uniqueRandomString);
    $modifiedBase64String = str_replace('+', '.', $base64String);
    $salt = substr($modifiedBase64String, 0, $length);
    return $salt;
}

//check password
function checkPassword($password, $existingHash) {
    $hash = crypt($password, $existingHash);
    if ($hash === $existingHash) {
        return true;
    } else {
        return false;
    }
}

//find user
function userByUserMail($userMail) {
    global $conn;
    $safeName = mysqli_real_escape_string($conn, $userMail);

    $query  = "SELECT * ";
    $query .= "FROM users ";
    $query .= "WHERE user_mail='{$safeName}' ";
    $query .= "LIMIT 1";
    $userSet = mysqli_query($conn, $query);
    tjek_query($userSet);
    if ($user = mysqli_fetch_assoc($userSet) ) {
        return $user;
    } else {
        return null;
    }
}

//login
function logIn($userMail, $password) {
    $user = userByUsermail($userMail);
    if ($user) {
        if (checkPassword($password, $user['user_pass'])) {
            return $user;
        } else {
            return false;
        }
    } else {
        return false;
    }

}

/******
 * REG EX functions
 */

// Check name (just letters)
function validName($name) {
    return preg_match('/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}/', $name);
}

//check address (letters and numbers)
function validAddress($street) {
    return preg_match('/^[a-zA-Z0-9-. ]+$/', $street);
}

// Check phone (just numbers 8 digits)
function validPhone($phone) {
    return preg_match('/^[0-9]{8}$/', $phone);
}

//check mail
function validEmail($mail) {
    return preg_match('/^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/', $mail);
};