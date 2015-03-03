//Affichage données about
function refreshAbout() {
    $.ajax({
        url: "../portfolio/about/fetchInfo",
        ifModified:true,
        success: function(content){
            var photo = $('<img class="w-img" src="http://localhost/portfolio/app/webroot/uploads/'+content.info[0].Bio.photo+'" alt="photo profil" />');
            var nameAge = $('<h2 class="name-admin">'+content.info[0].Bio.firstname+' '+content.info[0].Bio.lastname+'</h2>');
            var bio = $('<p>'+content.info[0].Bio.about+'</p>');
            var location = $('<p>'+content.info[0].Bio.location+'</p>');
            var cv = $('<a href="http://localhost/portfolio/app/webroot/uploads/'+content.info[0].Bio.cv_link+'">T&eacute;l&eacute;charger CV</a>');

            $('#about-photo').append(photo);
            $('#subtitle-photo').append(nameAge);
            $('#location-info').append(location);
            $('#cv-info').append(cv);
            $('#about-bio').append(bio);

            $.each(content.skill, function(index){
                if(content.skill[index].Skill.category === 'Développement'){
                    var skill = $('<li class="medium-circle blue-circle"><div class="internal-medium-circle grey-circle">'+content.skill[index].Skill.langage+'</div></div></li>');
                    $('#dev-skill').append(skill);
                }
                if(content.skill[index].Skill.category === 'Framework'){
                    var skill = $('<li class="medium-circle blue-circle"><div class="internal-medium-circle grey-circle">'+content.skill[index].Skill.langage+'</div></div></li>');
                    $('#fram-skill').append(skill);
                }
            });
        }
    });
}
    refreshAbout();