<?php
require 'koneksi.php';
$id = $_GET['id_user'];
$query = "DELETE FROM user WHERE user.id_user = '$id' ";
$delete = mysqli_query($conn, $query);

if ($delete) {
    $_SESSION['msg'] = 'Berhasil Menghapus Data';
    header('location:staff.php');
} else {
    $_SESSION['msg'] = 'Gagal Hapus Data!!!';
    header('location:staff.php');
}
