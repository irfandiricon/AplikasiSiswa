<?php
include "../../koneksi_db/Koneksi.php";
$table_guru = TABLE_GURU;
$table_sekolah = TABLE_SEKOLAH;

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$jmlRows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
$offset = ( $page-1 )* $jmlRows;
$limit = "LIMIT $jmlRows OFFSET $offset";
$sort = isset($_POST['sort']) ? $_POST['sort']:"b.nama";
$order = isset($_POST['order']) ? $_POST['order']:"asc";
$parameter_keyword = isset($_POST['keyword']) ? $_POST['keyword']:"";

$error=array();
$query=array();
$result=array('total' =>0 ,'rows' => array());

$query[] = "SELECT COUNT(*) as total
FROM $db.$table_guru AS a
LEFT JOIN $db.$table_sekolah AS b ON b.id = a.id_sekolah
WHERE a.deleted_date IS NULL
AND (a.nama_lengkap like '%$parameter_keyword%' or a.nip like '%$parameter_keyword%' or b.nama like '%$parameter_keyword%')";

$query[] = "SELECT a.user_id_login, a.nip, a.nama_lengkap,CONCAT(a.tempat_lahir,',',DATE_FORMAT(a.tanggal_lahir,'%d/%m/%Y')) AS tgl_lahir,
a.jenis_kelamin, IF(a.flag_aktif='Y','Aktif','N. Aktif') AS flag_aktif, b.nama as nama_sekolah, a.flag_aktif as status_aktif
FROM $db.$table_guru AS a
LEFT JOIN $db.$table_sekolah AS b ON b.id = a.id_sekolah
WHERE a.deleted_date IS NULL
AND (a.nama_lengkap like '%$parameter_keyword%' or a.nip like '%$parameter_keyword%' or b.nama like '%$parameter_keyword%')
ORDER BY $sort $order $limit";

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
