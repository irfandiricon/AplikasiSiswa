$(function(){
    $('#tabel_hasil').dataTable({
        "dom" : 'Bfrtip',
        "buttons" : ['excel','print'],
    });
});

function FormAwal(){
    $('#panel-content').load('content/halaman_siswa/siswa_angket/index.php');
}

function FormPertanyaan(id,deskripsi){
    $('#header_pertanyaan').html("<font size='4'><b>"+deskripsi+"</b></font><hr width='100%'>");
    $.ajax({
        url : 'content/halaman_siswa/siswa_angket/form_pertanyaan.php',
        cache : false,
        type : 'post',
        data : "bidang_layanan="+id,
        success : function(html){
            $('#detail_pertanyaan').html(html);
        }
    });
}

function ProsesPertanyaan(){
    var data = $('#form_2').serialize();
    $.messager.confirm({
        title: 'Notification',
        msg: 'Anda yakin akan menyimpan data ini?',
        fn: function(r){
            if (r){
                $.ajax({
                    url : 'content/__proses/simpan_data_jawaban_angket.php',
                    cache : false,
                    type : 'post',
                    data : data,
                    dataType : 'json',
                    success : function(data){
                        var isValid = data.isValid;
                        var isPesan = data.isPesan;
                        if(isValid==0){
                            $('#jawaban').html("<hr width='100%'><font size='4' color='red'><b>"+JSON.stringify(isPesan)+"</b></font>");
                            return;
                        }else{
                            $('#jawaban').html("<hr width='100%'><font size='4' color='green'><b>"+JSON.stringify(isPesan)+"</b></font>");
                            setTimeout(function(){
                                FormAwal();
                            },1000);
                        }
                    }
                });
            }else{
              return false;
            }
        }
    });
}
