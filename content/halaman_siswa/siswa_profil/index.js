function FormUpdateData(){
      $('#panel-content').load('content/halaman_siswa/siswa_profil/form_data_profile.php');
}

function getDataSekolah(value){
    var sekolah_dll = document.getElementById('nama_sekolah_dll');
    var input = document.createElement('input');
    input.id = "nama_sekolah_lainnya";
    input.name = "nama_sekolah_lainnya";
    if(value=="dll"){
        sekolah_dll.append(input);
        $('#nama_sekolah_lainnya').attr({'class':'form-control','placeholder':'Masukan Nama Sekolah'});
        $('#nama_sekolah_lainnya').css({'margin-top':'10px'});
    }else{
        $('#nama_sekolah_lainnya').remove();
    }
}

function ProsesUpdateDataProfile(){
    var formData = $('#form1').serialize();
    $.ajax({
        url : 'content/__proses/simpan_data_profile.php',
        type : 'post',
        cahce : false,
        data : formData,
        dataType : 'json',
        beforeSend : function(){
            $("#loading").show();
            $("#loading").html('<img src="images/loading.gif" width=50 height=50>');
        },
        success : function(result){
            var isValid = result.isValid;
            var pesan = result.isPesan;
            if(isValid==1){
                $("#loading").html('<font color="green" size="4"><b>'+pesan+'</b></font>');
                return;
            }else{
                $("#loading").html('<font color="red" size="4"><b>'+pesan+'</b></font>');
                return;
            }
        }
    });
}
