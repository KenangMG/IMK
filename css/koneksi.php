<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "tubes_imk");

if (mysqli_connect_error()) {
    echo "Koneksi ke database gagal : " . mysqli_connect_error();
}
