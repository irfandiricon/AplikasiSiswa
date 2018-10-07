function DetailNews(id){
    $.ajax({
        url : 'home/detail_news.php',
        type : 'post',
        cache : false,
        data : {
            id : id
        },
        success : function(data){
            $('#panel-content').html(data);
        }
    });
}

function SeeMoreNews(){
    $.ajax({
        url : 'home/see_more_news.php',
        type : 'post',
        cache : false,
        success : function(data){
            $('#panel-content').html(data);
        }
    });
}
