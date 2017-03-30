<?php

include_once ('../includes/header.inc.php');




$q = "SELECT * FROM users WHERE user_mail = 'test@dk.dk'";

$r = mysqli_query($conn, $q);

if (mysqli_num_rows($r) != 0) {
    echo 'User exists';
}