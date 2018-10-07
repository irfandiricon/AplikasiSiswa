function setSession(session){
    $.ajax({
        url : "../_setSession.php",
        type : "post",
        cache : false,
        data : session,
        success : function(data){
              window.location.href = '../';
        }
    });
}

$(function(){
    var hTbl = parseInt($('#panel-content').height());
    $('#panel-content').css({});
    var $ex=$('#menu_aplikasi').find('.active');
    $('#_title').html('Home ');
    $(document).on("click", "a.menu-application", function(e){
        try{
            var $this=$(this);
            var class_name_array=$this.attr('class').replace('active').trim().split(' ');
            var isPath=$this.data('path');
            var isMenu=$this.data('menu');
            var isGroupMenu=$this.data('path-group');
            var url=class_name_array[class_name_array.length-1];
            var isActive=$this.hasClass('active');
            if(isActive) return;
            var $ex=$('#menu_aplikasi').find('.active');
            $ex.removeClass('active');
            $this.addClass('active');
            var dataTable="path="+isPath+"&url="+url;
            $('#panel-content').load(isPath+'/'+url);
            $('#_title').html(isMenu);
        }catch(e){
            alert(e);
        }
    });
});

function myformatter(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}

function myparser(s){
    if (!s) return new Date();
    var ss = (s.split('-'));
    var y = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var d = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(y,m-1,d);
    } else {
        return new Date();
    }
}

function getUrl(){
    var $this=$('a.menu-application.active') ;
    var isPath=$this.data('path');
    var class_name_array=$('a.menu-application').attr('class').replace('active').trim().split(' ');
    var url=class_name_array[class_name_array.length-1];
    $('#panel-content').load(isPath+'/'+url);
}
