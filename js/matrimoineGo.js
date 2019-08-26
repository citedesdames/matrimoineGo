
function pop_up (texte,txtButton,urlButton,croix){
    
    if(croix){
        
       $("body").append( '<div class="modal"><img class="close" src="img/icon/close.png" alt="fermer la fenêtre" title="fermer">'+texte+'</div>');
    }
    else{
    $("body").append('<div class="modal"><div>'+texte+'<a class="buto" href="'+urlButton+'">'+txtButton+'</a></div></div>');
        
    }
}
function close(){
    

$(document).on("click",".close",function() {
                $(this).parent().remove();
                




            })
}