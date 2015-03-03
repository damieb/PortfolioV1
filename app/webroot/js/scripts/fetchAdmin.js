    // Rafraichissement liens
    function refreshLinks() {
        $.ajax({
            url: "../users/fetchSOC",
            ifModified:true,
            success: function(content){
            document.getElementById("socials-links").innerHTML = "";
            if(content == 0){
                var newdiv = $('<div data-alert class="alert-box warning radius">Aucun Contenu</div>');
                $('#socials-links').append(newdiv);        
            }
            $.each(content, function(index){
                var newdiv = $('<div class="panel"><div><h4>'+content[index].socials.network+'</h4><kbd class="alert"><a href="../users/delSOC/'+content[index].socials.id+'">Supprimer</a></kbd><p>'+content[index].socials.link+'</p></div></div>');
                $('#socials-links').append(newdiv);
            });
            }
        });
        setTimeout(refreshLinks, 8000);
    }
    refreshLinks();