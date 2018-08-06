<?php
include "../../koneksi_db/Koneksi.php";
$table_group_menu = TABLE_MENU_GROUP;

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$jmlRows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
$offset = ( $page-1 )* $jmlRows;
$limit = "LIMIT $jmlRows OFFSET $offset";

$error=array();
$query=array();
$result=array('total' =>0 ,'rows' => array());

$query[]="SELECT COUNT(*) AS total FROM $db.$table_group_menu ";
$query[]="SELECT id_group_menu,font_icon,nama_group_menu,IF(flag_aktif = 'Y','Aktif','Non Aktif') AS status_aktif
          FROM $db.$table_group_menu $limit";

if (count($query) > 0){
    if (mysqli_multi_query($con, join(";",$query))){
        do{
             if ($rs = mysqli_store_result($con)){
                while ($row = mysqli_fetch_assoc($rs)) {
                   if(isset($row['total'])) {
                        $result['total']=$row['total'];
                   }else{
                        $result['rows'][]=$row;
                   }
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
