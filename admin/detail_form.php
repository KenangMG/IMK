<?php
ob_start();
$title = "Adiptif Konflik";
require 'koneksi.php';
require 'header.php';
$id = $_GET['id'];
$query = "SELECT * FROM mk_adiptifkonflik";
$data = mysqli_query($conn, $query);
?>

<div>
</div>