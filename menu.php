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
            <?php
                $query_group_menu="SELECT a.* FROM $db.$table_group_menu AS a WHERE  a.flag_aktif='Y'";
                $ex_query_group_menu=mysqli_query($con,$query_group_menu);
                while($res_ex_query_group_menu= mysqli_fetch_assoc($ex_query_group_menu)){
                $nama_group_menu=$res_ex_query_group_menu['nama_group_menu'];
                $font_icon=$res_ex_query_group_menu['font_icon'];
                $id_group_menu=$res_ex_query_group_menu['id_group_menu'];
                ?>
                <li>
                    <a class='has-arrow' href='#' aria-expanded='false' data-path-group="<?php echo $nama_group_menu;?>">
                        <font size="2">
                            <i><span class='<?php echo $font_icon ?> '></span></i>
                            <span class='hide-menu'><?php echo $nama_group_menu ?></span>
                        </font>
                    </a>
                    <ul aria-expanded='false' class='collapse'>
                      <?php
                        $query_menu="select distinct a.path,a.nama_file,nama_menu,id_menu from $db.$table_menu as a
                        where a.id_group_menu='$id_group_menu'
                        and a.flag_aktif='Y' order by a.id_group_menu,a.id_menu asc";
                        $ex_query_menu=mysqli_query($con,$query_menu);
                        while($res_ex_query_menu=mysqli_fetch_array($ex_query_menu)){
                        $nama_menu=$res_ex_query_menu['nama_menu'];
                        $nama_file=$res_ex_query_menu['nama_file'];
                        $path_menu=$res_ex_query_menu['path'];
                      ?>
                        <li>
                            <a href='javascript:void(0)' data-path="<?php echo $path_menu;?>" data-menu="<?php echo $nama_menu;?>" class="menu-application <?php echo $nama_file; ?>">
                              <font size="2"><?php echo $nama_menu ?></font>
                            </a>
                        </li>
                    <?php } ?>
                    </ul>
                </li>
            <?php }?>
            </ul>
        </nav>
    </div>
</div>
