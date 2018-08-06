<?php
include "../../koneksi_db/Koneksi.php";

$table_menu = TABLE_MENU;

$id_group_menu= isset($_POST['id_group_menu']) ? $_POST['id_group_menu']:"";
$error=array();
$query=array();
$result=array('total' =>0 ,'rows' => array());

$query[]="SELECT id_menu,id_group_menu,path,nama_menu,nama_file,
          IF(flag_aktif = 'Y','Aktif','Non Aktif') AS status_aktif
          FROM $db.$table_menu where id_group_menu='$id_group_menu'";

if (count($query) > 0){
    if (mysqli_multi_query($con, join(";",$query))){
        do{
             if ($rs = mysqli_store_result($con)){
                while ($row = mysqli_fetch_assoc($rs)) {
                    $result['rows'][]=$row;
                }
             }
        } while(next($query) && mysqli_more_results($con) && mysqli_next_result($con));
    }
    if(mysqli_error($con)) $error[] = mysqli_error($con);
    if (count($error) > 1){
            $result=array("total" => 0,"rows" => array(),"pesan" => join("",$error));
    }
}

echo json_encode($result);
mysqli_close($con);
