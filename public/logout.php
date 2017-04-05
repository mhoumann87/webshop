<?php
require_once '../includes/sessions.inc.php';


	$_SESSION['id'] = null;
	$_SESSION['name'] = null;
	$_SESSION['status'] = null;
	$_SESSION['cart'] = null;
	redirect('./index.php');

?>