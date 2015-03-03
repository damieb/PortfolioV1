    // Rafraichissement liens
    function refreshWork() {
        $.ajax({
            url: "../mywork/fetchWork",
            ifModified:true,
            success: function(content){
            document.getElementById("socials-links").innerHTML = "";
            if(content == 0){
                var newdiv = $('<div data-alert class="alert-box warning radius">Aucun Contenu</div>');
                $('#socials-links').append(newdiv);        
            }
            $.each(content, function(index){
                var newdiv = $('<div class="panel large-12 columns" id="'+content[index].Work.id+'"><div class="bloc-img-work large-2 columns"><img class="square-img" src="http://localhost/portfolio/app/webroot/uploads/'+content[index].Work.img_path+'" alt="'+content[index].Work.title+'"/></div><div class="large-7 columns"><h4>'+content[index].Work.title+'</h4><h4><small>'+content[index].Work.entreprise+' le '+content[index].Work.year+'</small></h4><p><a href="'+content[index].Work.link+'">'+content[index].Work.link+'</a></p><p>'+content[index].Work.langage+'</p></div><div><a class="button tiny" href="../mywork/editWrk/'+content[index].Work.id+'">Modifier</a><a href="../mywork/delWrk/'+content[index].Work.id+'" class="button tiny alert">Supprimer</a></div></div>');
                $('#socials-links').append(newdiv);
            });
            }
        });
        setTimeout(refreshWork, 8000);
    }