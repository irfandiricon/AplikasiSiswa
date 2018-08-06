<?php
include "../../koneksi_db/Koneksi.php";
require_once "../../__setting.php";

$table_access_menu = TABLE_MENU_ACCESS;
$table_menu = TABLE_MENU;
$table_group_menu = TABLE_MENU_GROUP;
$user_id= isset($_POST['user_id']) ? $_POST['user_id']:"";

$error=array();
$query=array();
$result=array('rows' => array());

$query_access="SELECT id_menu from $db.$table_access_menu WHERE user_id='$user_id'";
$ex_query_access= mysqli_query($con, $query_access);
$res_query_access = mysqli_fetch_assoc($ex_query_access);
$id_menu=$res_query_access['id_menu'];

if($id_menu==""){
    $data_menu="''";
}else{
    $data_menu=$id_menu;
}

$query[]="SELECT a.id_menu,a.id_group_menu,b.nama_group_menu,a.nama_menu,
        IF(a.id_menu IN ($data_menu),'1','0') AS status_menu
        FROM $db.$table_menu AS a
        LEFT JOIN $db.$table_group_menu AS b ON a.id_group_menu=b.id_group_menu
        ORDER BY a.id_group_menu, a.id_menu";

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
            $result=array("rows" => array(),"pesan" => join("",$error));
    }
}

echo json_encode($result);
mysqli_close($con);
