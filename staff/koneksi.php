<?php
session_start();
if ($_SESSION) {
    if ($_SESSION['role'] == 'staff') {
    } else {
        header("location:../index.php");
    }
} else {
    header('location:../index.php');
}

$conn = mysqli_connect("localhost", "root", "", "tubes_imk");

if (mysqli_connect_error()) {
    echo "Koneksi ke database gagal : " . mysqli_connect_error();
}