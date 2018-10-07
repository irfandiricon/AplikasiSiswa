
function FormAwal(){
    $('#panel-content').load('content/support/index.php');
}
function SimpanSupport(){
    $('#form_1').form('submit',{
        url : "content/__proses/simpan_data_support.php",
        onSubmit:function(){
            return $(this).form('enableValidation').form('validate');
        },
        success : function (data){
            alert(data);
            FormAwal();
        }
    });
}
