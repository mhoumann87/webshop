<?php

DEFINE ('DB_USER', 'shop_admin');
DEFINE ('DB_PASS', '1234');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'webshop');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) OR die('Could not connect to the database '. mysqli_connect_error());

mysqli_set_charset($conn, "utf8");

?>