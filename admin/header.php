<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body style="background-color:#E5E5CB">
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" style="background-color:#3C2A21 ;">


                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                
            </div>
            <!-- End Logo Header -->
            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" style="background-color: #E5E5CB;">

                <div class="container-fluid">
                    <div class="collapse" id="search-nav"></div>

                    
                </div>
            </nav>
            <!-- End Navbar -->
        </div><!-- Sidebar -->
        <div class="sidebar sidebar-style-2" style="background-color:#1A411F; color:white;">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                <span>
                                    <?= $_SESSION['username']; ?>
                                    <span class="user-level"><?php if ($_SESSION['role'] == 'admin') {
                                                                    echo "Administrator";
                                                                } else if ($_SESSION['role'] == 'staff') {
                                                                    echo "staff";
                                                                } ?></span>
                                </span>
                            </a>


                        </div>
                    </div>
                    <ul class="nav">
                        <li class="nav-item <?php if ($title == '') {
                                                echo 'active';
                                            } ?>">
                            <a href="index.php" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($title == 'Data Pengguna') {
                                                echo 'active';
                                            } ?>">
                            <a href="Staff.php">
                                <i class="fas fa-users-cog"></i>
                                <p>Staff</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($title == 'Data Laporan') {
                                                echo 'active';
                                            } ?>"">
                            <a href=" MK.php">
                            <i class="fas fa-print"></i>
                            <p>MK</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($title == 'Data Laporan') {
                                                echo 'active';
                                            } ?>"">
                            <a href=" Comdev.php">
                            <i class="fas fa-print"></i>
                            <p>Comdev</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($title == 'Data Laporan') {
                                                echo 'active';
                                            } ?>"">
                            <a href=" REH.php">
                            <i class="fas fa-print"></i>
                            <p>REH</p>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($title == 'Data Laporan') {
                                                echo 'active';
                                            } ?>"">
                            <a href=" PLH.php">
                            <i class="fas fa-print"></i>
                            <p>PLH</p>
                            </a>
                        </li>
                        <li class="mx-4 mt-2">
                            <a href="logout.php" onclick="return confirm('Keluar dari halaman ini?');" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fas fa-sign-out-alt"></i> </span>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="content">