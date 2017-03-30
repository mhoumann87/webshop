<?php
ob_start();
function redirect($newPage) {
    header('Location: '.$newPage);
    exit;
}
session_start();
?>