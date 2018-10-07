
function FormAwal(){
    $('#panel-content').load('content/about/index.php');
}
function SimpanAbout(){
  $('#form_1').form('submit',{
      url : "content/__proses/simpan_data_about.php",
      onSubmit:function(){
          return $(this).form('enableValidation').form('validate');
      },
      success : function (data){
          alert(data);
          FormAwal();
      }
  });
}
