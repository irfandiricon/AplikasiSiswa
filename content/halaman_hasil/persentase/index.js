function FormAwal(){
    $('#panel-content').load('content/halaman_hasil/persentase/index.php');
}

function ResetDataJawaban(user_id, nama_siswa){
    var data = {
        user_id : user_id
    }
    $.messager.confirm({
        title: 'Konfirmasi Hapus',
        msg: 'Anda Yakin Akan Mengahapus Data <b>'+nama_siswa+'</b> Ini ? ',
        fn: function(r){
            if (r){
                $.ajax({
                    type: "POST",
                    url: "content/__proses/hapus_data_jawaban.php",
                    data : data,
                    cache: false,
                    success: function(data){
                        FormAwal();
                    }
                });
            }
        }
    });
}

function ExportToWord(){
    window.open('content/halaman_hasil/persentase/table_export.php');
}
