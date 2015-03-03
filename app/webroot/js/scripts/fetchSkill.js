    // Rafraichissement liens
    function refreshSkill() {
        $.ajax({
            url: "../users/fetchSkill",
            ifModified:true,
            success: function(content){
            document.getElementById("socials-links").innerHTML = "";
            if(content == 0){
                var newdiv = $('<div data-alert class="alert-box warning radius">Aucun Contenu</div>');
                $('#socials-links').append(newdiv);        
            }
            $.each(content, function(index){
                var newdiv = $('<div class="panel large-12 columns" id="'+content[index].Skill.id+'"><div class="large-7 columns"><h4>'+content[index].Skill.langage+'</h4><h4><small>'+content[index].Skill.category+'</small></h4></div><div><a href="../users/delSkl/'+content[index].Skill.id+'" class="button tiny alert">Supprimer</a></div></div>');
                $('#socials-links').append(newdiv);
            });
            }
        });
        setTimeout(refreshSkill, 8000);
    }
    refreshSkill();