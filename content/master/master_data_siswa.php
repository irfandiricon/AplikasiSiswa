<?php
include "../../koneksi_db/Koneksi.php";
$table_guru = TABLE_GURU;
$table_siswa = TABLE_SISWA;
$table_sekolah = TABLE_SEKOLAH;
$level = isset($_SESSION['level']) ? $_SESSION['level']:"";
$user_id_login = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
if($level==1){
    $parameter_level = "";
}else{
    $parameter_level = " and c.user_id_login='$user_id_login'";
}

$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$jmlRows = isset($_POST['rows']) ? intval($_POST['rows']) : 20;
$offset = ( $page-1 )* $jmlRows;
$limit = "LIMIT $jmlRows OFFSET $offset";
$sort = isset($_POST['sort']) ? $_POST['sort']:"a.nama_lengkap";
$order = isset($_POST['order']) ? $_POST['order']:"asc";
$parameter_keyword = isset($_POST['keyword']) ? $_POST['keyword']:"";

$error=array();
$query=array();
$result=array('total' =>0 ,'rows' => array());

$query[] = "SELECT COUNT(*) as total
FROM $db.$table_siswa AS a
LEFT JOIN $db.$table_sekolah AS b ON b.id = a.id_sekolah
LEFT JOIN $db.$table_guru AS c ON a.id_guru = c.user_id
WHERE a.deleted_date IS NULL
AND (a.nama_lengkap like '%$parameter_keyword%' or a.nis like '%$parameter_keyword%'
or b.nama like '%$parameter_keyword%')
$parameter_level";

$query[] = "SELECT a.user_id_login, a.nis,a.kelas, a.nama_lengkap,
CONCAT(a.tempat_lahir,',',DATE_FORMAT(a.tanggal_lahir,'%d/%m/%Y')) AS tgl_lahir,
a.jenis_kelamin, IF(a.flag_aktif='Y','Aktif','N. Aktif') AS flag_aktif, b.nama AS nama_sekolah,
a.flag_aktif AS status_aktif
FROM $db.$table_siswa AS a
LEFT JOIN $db.$table_sekolah AS b ON b.id = a.id_sekolah
LEFT JOIN $db.$table_guru AS c ON a.id_guru = c.user_id
WHERE a.deleted_date IS NULL
AND (a.nama_lengkap like '%$parameter_keyword%' or a.nis like '%$parameter_keyword%'
or b.nama like '%$parameter_keyword%')
$parameter_level
ORDER BY $sort $order $limit";

//die(json_encode($query));
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
