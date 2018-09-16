<?php
    require_once 'koneksi_db/Koneksi.php';
    $table_user = TABLE_USER;
    $table_guru = TABLE_GURU;
    $table_siswa = TABLE_SISWA;

    $username = isset($_POST['username']) ? $_POST['username']:"";
    $password = isset($_POST['password']) ? $_POST['password']:"";
    $mypassword = md5($password);
    $nama_lengkap = isset($_POST['nama_lengkap']) ? $_POST['nama_lengkap']:"";
    $email = isset($_POST['email']) ? $_POST['email']:"";
    $no_telp = isset($_POST['no_telp']) ? $_POST['no_telp']:"";
    $level = isset($_POST['level']) ? $_POST['level']:"";
    $id_sekolah = isset($_POST['sekolah']) ? $_POST['sekolah']:"";

    $json = array("isValid"=>0, "isPesan"=>array());
    if(empty($username) || empty($password) || empty($email) || empty($email) || empty($no_telp) || empty($level) || empty($id_sekolah)){
        $isValid = 0;
        $isPesan = "Silahkan lengkapi data !!!";
    }else{
        $q1 = "SELECT COUNT(*) as total FROM $db.$table_user WHERE username='$username'";
        $ex_q1 = mysqli_query($con, $q1);
        $r1 = mysqli_fetch_assoc($ex_q1);
        $total = $r1['total'];
        if($total > 0){
            $isValid = 0;
            $isPesan = "Username sudah tersedia, silahkan gunakan yang lain !!!";
        }else{
            $q2 = "SELECT IF(user_id is null,0,MAX(user_id)) + 1 as user_id FROM $db.$table_user";
            $ex_q2 = mysqli_query($con, $q2);
            $r2 = mysqli_fetch_assoc($ex_q2);
            $user_id = $r2['user_id'];

            $q3 = "INSERT INTO $db.$table_user (user_id, username, password, nama_lengkap, level, created_date)
              values('$user_id','$username','$mypassword','$nama_lengkap','$level', now())";
            $ex_q3 = mysqli_query($con, $q3);
            if(!$ex_q3){
                $isValid = 0;
                $isPesan = "Data gagal tersimpan, silahkan coba lagi atau hubungi administrator !!!, Error : ".mysqli_error($con);
            }else{
                if($level == 2){
                    $q4 = "INSERT INTO $db.$table_guru (user_id_login, nama_lengkap, email, no_telp, id_sekolah, created_date)
                      values('$user_id','$nama_lengkap','$email','$no_telp','$id_sekolah',now())";
                }elseif($level==3){
                    $q4 = "INSERT INTO $db.$table_siswa (user_id_login, nama_lengkap, email, no_telp, id_sekolah, created_date)
                      values('$user_id','$nama_lengkap','$email','$no_telp','$id_sekolah',now())";
                }
                $ex_q4 = mysqli_query($con, $q4);
                if(!$ex_q4){
                    $isValid = 0;
                    $isPesan = "Data gagal tersimpan, silahkan coba lagi atau hubungi administrator !!!, Error : ".mysqli_error($con);
                }else{
                    $isValid = 1;
                    $isPesan = "Data berhasil tersimpan, silahkan tunggu data anda akan dikonfirmasi 1 x 24 jam !!! ";
                }
            }
        }
    }
    $json = array("isValid" => $isValid, "isPesan" => $isPesan);
    echo json_encode($json);
    mysqli_close($con);
?>
