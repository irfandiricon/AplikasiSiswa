function SimpanPesan(){
    var data = $('#form_1').serialize();
    $.ajax({
        url : '__proses/simpan_data_pesan.php',
        cache : false,
        data : data,
        type : 'post',
        dataType : 'json',
        success : function(res){
            var isValid = res.isValid;
            var isPesan = res.isPesan;
            if(isValid == 0){
                alert(JSON.stringify(isPesan));
            }else{
                alert(JSON.stringify(isPesan));
                window.location.reload();
            }
        }
    });
}
