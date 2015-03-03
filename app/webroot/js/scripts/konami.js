jQuery(function(){
    var kKeys = [];
    //Touche du clavier
    function Kpress(e){
        kKeys.push(e.keyCode);
        if (kKeys.toString().indexOf("16,16,38,40,13") >= 0) {
            jQuery(this).unbind('keydown', Kpress);
            kExec();
        }
    }
    jQuery(document).keydown(Kpress);
});

//Exécution du Konami code
function kExec(){
     window.location.replace("admin/");
}