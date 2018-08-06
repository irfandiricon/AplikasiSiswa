<?php
include_once("../../koneksi_db/Koneksi.php");

$table_access_menu = TABLE_ACCESS_MENU;
$divisi_id=isset($_POST['divisi_id']) ? $_POST['divisi_id']:"";
$jabatan=isset($_POST['jabatan']) ? $_POST['jabatan']:"";
$id_menu=isset($_POST['id_menu']) ? $_POST['id_menu']:"";
$id_group_menu=isset($_POST['id_group_menu']) ? $_POST['id_group_menu']:"";
$user_id=isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$row_user_id= isset($_POST['row_user_id']) ? $_POST['row_user_id']:"";
$jumlahData=COUNT($id_menu);

$explode_id_group_menu = explode(",", $id_group_menu);
$data_group_menu= implode(",",array_values(array_unique($explode_id_group_menu)));

$QUERY_USER="SELECT user_id FROM $DB.$table_access_menu WHERE user_id='$row_user_id'";
$EX_QUERY_USER= mysqli_query($con, $QUERY_USER);
$JUMLAH= mysqli_num_rows($EX_QUERY_USER);

if ($id_menu=="" || empty($id_menu)){
    $data_menu=0;
}else{
    $data_menu=$id_menu;
}

if($id_group_menu==""){
    $data_group_menu=0;
}else{
    $data_group_menu=$data_group_menu;
}

if($JUMLAH==0){
    $query="INSERT INTO $DB.$table_access_menu (user_id,id_group_menu,id_menu,divisi_id,"
        . "jabatan,created_date,created_time,created_by) values ('$row_user_id','$data_group_menu','$data_menu',"
        . "'$divisi_id','$jabatan',NOW(),NOW(),'$user_id')";
}else{
    $query="UPDATE $DB.$table_access_menu SET id_group_menu='$data_group_menu',id_menu='$data_menu',"
        . "updated_date=NOW(),updated_time=NOW(),updated_by='$user_id' WHERE user_id='$row_user_id'";
}

$ex_query= mysqli_query($con, $query);

if (!$ex_query){
    echo mysqli_error($con);
}else{
    echo json_encode('Berhasil Tersimpan !!!');
}
mysqli_close($con);
