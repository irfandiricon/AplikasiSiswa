<?php
include 'koneksi_db/Koneksi.php';

$table_menu = TABLE_MENU;
$table_group_menu = TABLE_MENU_GROUP;
$link_foto_profile = DIRECTORY_FOTO_PROFILE   ;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$nama_lengkap = isset($_SESSION['nama_lengkap']) ? $_SESSION['nama_lengkap']:"";

if(empty($nik) || $nik==""){
    $foto_profile = "images/login.png";
}else{
    $file = $link_foto_profile.$nik.'.jpg';
    $file_headers = @get_headers($file);
    if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
        $foto_profile = "images/login.png";
    }
    else {
        $foto_profile = $file;
    }
}
?>
<div class='left-sidebar'>
    <div class='scroll-sidebar'>
        <nav class='sidebar-nav'>
            <ul id='sidebarnav'>
            <div class="row hide-menu" aria-expanded='false'>
                <div class="col-md-4" align="center" style="padding-top:15px;padding-left:30px;">
                    <img src="<?php echo $foto_profile;?>" style="width:60px;height:60px;" class="img-circle" align="center" alt="Not Photo">
                </div>
                <div class="col-md-7" align="center"><br>
                    <b><i><?php echo ucwords($nama_lengkap);?></i></b>
                    <hr width="100%">
                </div>
                <hr width="100%">
            </div>
                <li>
                    <a href='javascript:void(0)' data-path="content/halaman_guru/guru_profil" data-menu="Data Profile" class="menu-application index.php">
                        <i><span class='fa fa-user'></span></i>
                        <font size="2">Data Profile</font>
                    </a>
                </li>
                <li>
                    <a href='javascript:void(0)' data-path="content/master_data_siswa/" data-menu="Data Siswa" class="menu-application index.php">
                        <i><span class='fa fa-user'></span></i>
                        <font size="2">Data Siswa</font>
                    </a>
                </li>
                <!-- <li>
                    <a href='javascript:void(0)' data-path="content/master_data_pertanyaan" data-menu="Data Pertanyaan" class="menu-application index.php">
                        <i><span class='fa fa-book'></span></i>
                        <font size="2">Data Pertanyaan</font>
                    </a>
                </li> -->
                <li>
                    <a class='has-arrow' href='#' aria-expanded='false' data-path-group="Form Output">
                        <font size="2">
                            <i><span class='fa fa-book'></span></i>
                            <span class='hide-menu'>Form Output</span>
                        </font>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                        <li>
                            <a href='javascript:void(0)' data-path="content/halaman_hasil/persentase" data-menu="Persentase" class="menu-application index.php">
                                <i><span class='fa fa-percent'></span></i> &nbsp;
                                <font size="2">Persentase</font>
                            </a>
                        </li>
                        <li>
                            <a href='javascript:void(0)' data-path="content/halaman_hasil/grafik" data-menu="Grafik" class="menu-application index.php">
                                <i><span class='fa fa-bar-chart'></span></i> &nbsp;
                                <font size="2">Grafik</font>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
