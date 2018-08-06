<?php

include_once("../../koneksi_db/Koneksi.php");
$table_access_menu = TABLE_ACCESS_MENU;

$userCopy = isset($_POST['userCopy']) ? $_POST['userCopy']:"";
$userPaste = isset($_POST['userPaste']) ? $_POST['userPaste']:"";
$userCreated = isset($_SESSION['user_id']) ? $_SESSION['user_id']:"";
$userCopyDivisi = isset($_POST['userCopyDivisi']) ? $_POST['userCopyDivisi']:"";
$userCopyJabatan = isset($_POST['userCopyJabatan']) ? $_POST['userCopyJabatan']:"";

$QUERY_USER="SELECT user_id FROM $DB.$table_access_menu WHERE user_id='$userPaste'";
$EX_QUERY_USER= mysqli_query($con, $QUERY_USER);
$JUMLAH= mysqli_num_rows($EX_QUERY_USER);

if($JUMLAH==0){
    $query="INSERT INTO $DB.$table_access_menu (user_id,id_group_menu,id_menu,divisi_id,jabatan,created_date,created_time,created_by)
            SELECT '$userPaste',id_group_menu,id_menu,'$userCopyDivisi','$userCopyJabatan',NOW(),NOW(),'$userCreated'
            FROM $DB.$table_access_menu WHERE user_id='$userCopy'";
}else{
    $query="UPDATE $DB.$table_access_menu AS a
            INNER JOIN $DB.$table_access_menu AS b
            ON b.user_id='$userCopy' SET a.id_group_menu=b.id_group_menu,a.id_menu=b.id_menu,
            b.updated_date=NOW(),b.updated_time=NOW(),b.updated_by='$userCreated'
            WHERE a.user_id='$userPaste'";
}
$ex_query= mysqli_query($con, $query);

if (!$ex_query){
    echo mysqli_error($con);
}else{
    echo json_encode('Berhasil Tersimpan !!!');
}
mysqli_close($con);
