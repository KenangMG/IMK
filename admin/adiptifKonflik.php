<?php
$title = "Adiptif Konflik";
require 'koneksi.php';
require 'header.php';

$query = "SELECT * FROM mk_adiptifkonflik";
$data = mysqli_query($conn, $query);

?>

<div class="panel-header" style="background-color:#E5E5CB">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class=" pb-2 fw-bold" style="color:black"><?= $title; ?></h1>
                <h2 class=" op-7 mb-2" style="color:black"></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <?php
        $no = 1;
        if (mysqli_num_rows($data) > 0) {
            while ($form = mysqli_fetch_assoc($data)) {
        ?>
                <div class="card  card-imk" style="width: 20rem; margin: 5px">
                    <div class="card-body">

                        <h5 class="card-title"> <?= $form['judul']; ?></h5>

                        <p class="card-text">Waktu : <?= $form['tanggal']; ?></p>
                        <a href="<?= $form['id']; ?>" class="btn btn-primary">Detail</a>
                        <a href="<?= $form['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= $form['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus data?');">Delete</a>
                    </div>
                </div>
        <?php }
        }
        ?>
    </div>
</div>

<?php
require 'footer.php';
?>