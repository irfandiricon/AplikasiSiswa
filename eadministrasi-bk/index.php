<?php
include "../koneksi_db/Koneksi.php";
$nama_aplikasi = NAMA_APPLICATION;
$nama_folder = NAMA_DIRECTORY;
$hal = isset($_GET['page']) ? $_GET['page']:"";
$page = ucwords(str_replace("-"," ",$hal));
$app = "http://".$_SERVER['HTTP_HOST']."/".$nama_folder;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:0;
?>
<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
<title><?php echo $nama_aplikasi; ?></title>
    <link rel="icon" type="image/png" sizes="16x16" href="../images/login.png">
</head>
<?php
    include "css.php";
?>
<script src="index.js"></script>
<body>
    <br>
    <font face="cambria">
      	<div class="container panel panel-default panel-heading" style="border-radius:0px !important;">
            <div class="row">
                <div class="col-md-12">
                    <?php include "slider.php";?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php include "navbar.php";?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="header-background">
                        <div><?php echo $page;?></div>
                    </div>
                    <?php require "content.php";?>
                </div>
                <div class="col-md-3">
                    <div class="header-background">
                        Berita Terbaru
                    </div>
                    <?php require "daftar_berita.php";?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <footer class="footer-style">
                    <div class="navbar navbar-inverse">
                        <footer class="navbar-brand">
                            <div class="font-form">
                                <?php include "footer.php";?>
                            </div>
                        </footer>
                    </div>
                    </footer>
                </div>
            </div>
	      </div>
    </font>
    <style>
        .navbar {
            border-radius : 0px !important;
        }
    </style>
</body>
</html>
