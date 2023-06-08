<?php
$title = 'Profil saya';
require 'koneksi.php';


$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user = '$id' ";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tgl_lahir = $_POST['tgl_lahir'];
   
    $kelamin = $_POST['kelamin'];

        // Upload file to server

    $query = "UPDATE user SET nama= '$nama', alamat = '$alamat', email = '$email', tgl_lahir = '$tgl_lahir',  telepon = '$telepon', kelamin = '$kelamin',  WHERE id_user = '$id'";
    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil mengubah data saya';
        header('location: profil.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location:profil.php');
    }
}
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../image/" . $filename;


    // Get all the submitted data from the form
    $sql = "UPDATE user SET foto = '$filename' where id_user = '$id'";

    // Execute query
    mysqli_query($conn, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $_SESSION['msg'] = 'Berhasil mengubah data profil';
        header("location: profil.php?ids=$id");
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header("location: profil.php?ids=$id");
    }
}
require 'header.php';

?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Forms</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="profile.php">Staff</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Staff</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                    <div id="display-image">
    <?php
        $query = " SELECT foto from user where id_user = '$id'";
        $result = mysqli_query($conn, $query);

        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="../image/<?php echo $data['foto']; ?>" style = "width: 354px; height: 472px">

    <?php
        }
    ?>
    </div>
                        </div>
                     <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <input  type="file" name="uploadfile" value="" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
                        </div>
                    </form>
                    <?php while ($edit = mysqli_fetch_array($queryedit)) {
                    ?>
                        <form action="" method="POST" >
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="largeInput">Nama Staff</label>
                                    <input type="text" name="nama" class="form-control form-control" id="defaultInput" value="<?= $edit['nama']; ?>" placeholder="Nama...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Email Staff</label>
                                    <input type="text" name="email" class="form-control form-control" id="defaultInput" value="<?= $edit['email']; ?>" placeholder="Email...">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat Staff</label>
                                    <textarea class="form-control" rows="5" name="alamat"><?= $edit['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Tanggal Lahir Staff</label>
                                    <input type="date" name="tgl_lahir" class="form-control form-control" id="defaultInput" value="<?= $edit['tgl_lahir']; ?>" placeholder="Tanggal lahir">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">No Telepon</label>
                                    <input type="text" name="telepon" class="form-control form-control" id="defaultInput" value="<?= $edit['telepon']; ?>" placeholder="No Telp...">
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect">Jenis Kelamin</label>
                                    <select name="kelamin" class="form-control form-control" id="defaultSelect">
                                        <option value="L" <?php if ($edit['kelamin'] == 'L') {
                                                                echo "selected";
                                                            } ?>>Laki-laki</option>
                                        <option value="P" <?php if ($edit['kelamin'] == 'P') {
                                                                echo "selected";
                                                            } ?>>Perempuan</option>
                                    </select>
                                </div>
                                
                                <div class="card-action">
                                    <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                    <!-- <button class="btn btn-danger">Cancel</button> -->
                                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php require 'footer.php';
