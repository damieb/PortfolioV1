$(document).on('click', '.h-button', function () {
     var id = $(this).attr('id');

      $.ajax({
        type: "POST",
        data: {id: id},
        dataType: "json",
        url: "../portfolio/work/fetchWork",
        ifModified:true,
        success: function(content){
            //Clean contenu
            document.getElementById("title-pop").innerHTML = "";
            document.getElementById("img-pop").innerHTML = "";
            document.getElementById("desc-pop").innerHTML = "";
            document.getElementById("lang-pop").innerHTML = "";

            var title = $('<h2 class="tite-reveal">'+content.info.Work.title+'</h2>');
            var img = $('<img src="http://localhost/portfolio/app/webroot/uploads/'+content.info.Work.img_path+'" alt="img '+content.info.Work.title+'" />');
            var desc = $('<p>'+content.info.Work.desc+'</p>');

            $('#title-pop').append(title);
            $('#img-pop').append(img);
            $('#desc-pop').append(desc);

            $.each(content.langage, function(index){
                var langage = $('<li class="medium-circle blue-circle"><div class="internal-medium-circle grey-circle">'+content.langage[index]+'</div><li>')
                $('#lang-pop').append(langage);
            });
        }
    });
});
