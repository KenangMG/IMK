<?php
$title = "Plat Seng";
require 'koneksi.php';


if (isset($_POST['btn-simpan'])) {

    $tanggal = $_POST['tanggal'];
    $kabupaten = $_POST['kabupaten'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['dusun'];
    $pelaksana = $_POST['pelaksana'];
    $pemilik_lahan = $_POST['pemilik_lahan'];
    $kordinat_n1 = $_POST['kordinat_n1'];
    $kordinat_n2 = $_POST['kordinat_n2'];
    $kordinat_n3 = $_POST['kordinat_n3'];
    $kordinat_e1 = $_POST['kordinat_e1'];
    $kordinat_e2 = $_POST['kordinat_e2'];
    $kordinat_e3 = $_POST['kordinat_e3'];
    $luas = $_POST['luas'];
    $jumlah_pohon = $_POST['jumlah_pohon'];
    $mitra = $_POST['mitra'];
    $kondisi_area = $_POST['kondisi_area'];
    $hasil = $_POST['hasil'];
    $kendala = $_POST['kendala'];
    $rtl = $_POST['rtl'];
    $dokumentasi = $_POST['dokumentasi'];
    $dusun = $_POST['dusun'];

    $query = "INSERT INTO mk_platseng (tanggal, kabupaten, kecamatan, dusun, pelaksana, pemilik_lahan, kordinat_n1, kordinat_n2, kordinat_n3, kordinat_e1, kordinat_e2, kordinat_e3, luas, jumlah_pohon, mitra, kondisi_area, hasil, kendala, rtl, dokumentasi) values ('$tanggal', '$kabupaten', '$kecamatan', '$dusun', '$pelaksana', '$pemilik_lahan', '$kordinat_n1', '$kordinat_n2', '$kordinat_n3', '$kordinat_e1', '$kordinat_e2', '$kordinat_e3', '$luas', '$jumlah_pohon', '$mitra', '$kondisi_area', '$hasil', '$kendala', '$rtl', '$dokumentasi')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil menambahkan user baru';
        header('location:user.php?');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data baru!!!';
        header('location: staff.php');
    }
}

$staff = "SELECT * from mk_platseng ";
$ha = mysqli_query($conn, $staff);
require 'header.php';
?>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="content">
        <div class="page-inner">
            <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
                <div class="alert alert-danger" role="alert" id="msg">
                    <?= $_SESSION['msg']; ?>
                </div>
            <?php }
            $_SESSION['msg'] = ''; ?>
            <div class="page-header">
                <h4 class="page-title">Form Plat Seng</h4>
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
                        <a href="MK.php">MK</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#"><?= $title; ?></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-default">
                        <div class="card-header">
                            <div class="card-title"><?= $title; ?></div>
                        </div>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="largeInput">Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control form-control" required>
                                </div>



                                <div class="form-group">
                                    <label for="largeInput">Kabupaten</label>
                                    <select id="kabupaten" name="kabupaten" class="form-control form-control">
                                        <option value="">Pilih Kecamatan</option>
                                        <?php
                                        $daerah = mysqli_query($conn, "SELECT kode,nama FROM wilayah WHERE CHAR_LENGTH(kode)=5 ORDER BY nama");
                                        while ($d = mysqli_fetch_array($daerah)) {
                                        ?>
                                            <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Kecamatan</label>
                                    <select id="kecamatan" name="kecamatan" class="form-control form-control">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Desa</label>
                                    <input type="text" name="desa" class="form-control form-control" placeholder="Desa..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Dusun</label>
                                    <input type="text" name="dusun" class="form-control form-control" placeholder="Dusun..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Pelaksana</label>
                                    <input type="text" name="pelaksana" class="form-control form-control" placeholder="Pelaksana..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Pemilik Lahan</label>
                                    <input type="text" name="pemilik_lahan" class="form-control form-control" placeholder="Nama Pemilik Lahan..." required>
                                </div>



                                <div class="form-group">
                                    <label for="largeInput">Kordinat N</label>
                                    <br>
                                    <input type="number" min="0" step="0.1" name="kordinat_n1" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;⁰&nbsp;&nbsp;&nbsp;</b>
                                    <input type="number" min="0" step="0.1" name="kordinat_n2" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;'&nbsp;&nbsp;&nbsp;</b>
                                    <input type="number" min="0" step="0.1" name="kordinat_n3" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;"</b>
                                    <br>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Kordinat E</label>
                                    <br>
                                    <input type="number" min="0" step="0.1" name="kordinat_e1" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;⁰&nbsp;&nbsp;&nbsp;</b>
                                    <input type="number" min="0" step="0.1" name="kordinat_e2" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;'&nbsp;&nbsp;&nbsp;</b>
                                    <input type="number" min="0" step="0.1" name="kordinat_e3" style="width:55px; height:45px; float:left; border-radius:8px;" required>
                                    <b style="float:left;">&nbsp;"</b>
                                    <br>
                                    <br>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Luas Tanah</label>
                                    <input type="number" min="0" step="0.1" name="luas" class="form-control form-control" placeholder="Luas Tanah..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Jumlah Pohon</label>
                                    <input type="number" min="0" step="1" name="jumlah_pohon" class="form-control form-control" placeholder="Luas Tanah..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Mitra</label>
                                    <input type="text" name="mitra" class="form-control form-control" placeholder="Nama Mitra..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Kondisi Area</label>
                                    <input type="text" name="kondisi_area" class="form-control form-control" placeholder="Kondisi Area..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Hasil</label>
                                    <input type="text" name="hasil" class="form-control form-control" placeholder="Hasil..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Kendala</label>
                                    <input type="text" name="kendala" class="form-control form-control" placeholder="Kendala..." required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">RTL</label>
                                    <input type="text" name="rtl" class="form-control form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="largeInput">Dokumentasi</label>
                                    <input type="textarea" name="dokumentasi" class="form-control form-control" required>
                                </div>

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

    <?php require 'footer.php'; ?>

</body>


<script type="text/javascript">
    $(document).ready(function() {

        // ambil data kecamatan/kota ketika data memilih kabupaten
        $('body').on("change", "#kabupaten", function() {
            var id = $(this).val();
            var data = "id=" + id + "&data=kecamatan";
            $.ajax({
                type: 'POST',
                url: "get_daerah.php",
                data: data,
                success: function(hasil) {
                    $("#kecamatan").html(hasil);
                    $("#kecamatan").show();
                    // $("#form_des").hide();
                }
            });
        });

    });
</script>