//intro-js

//test si marker voit les élements
//       function fonction_onglet(){
//
//           if(!($('m'+marker.id+'').hasClass('markerR')||$('m'+marker.id+'').hasClass('markerB'))){
//              console.log("markeur bien placer");
////           $('.remove').append('');
//           
//              }
//               
//
//
//}



$(document).on("click",".popupclose",function() {
    $(this).parent().parent().remove();
    if(nbrElementPoint==5){
        //niveau terminé
        finNiveau1();
    }
})


function pop_up (titre,texte,txtButton,urlButton,croix,grandeModal){
    var codeModal="";
    if (grandeModal){codeModal="1";}
    
    var boutonSuite='';
    
    //var imgCroix='<img class="close'+codeModal+'" src="img/icon/close.png" alt="fermer la fenêtre" title="fermer">';
    var imgCroix='<img class="popupclose" src="img/icon/close.png" alt="fermer la fenêtre" title="Fermer">';
    
//    if(){
//        titre="<p><strong style=\"color:#FC706D; font-size:1.5rem;margin:2px;\">'.$data['femme'].' ('.$data['date_naissance'].'-'.$data['date_mort'].')</strong></p>";
//       }
    
    if(croix==false){
        imgCroix="";
        boutonSuite='<a class="buto" href="'+urlButton+'">'+txtButton+'</a>';
    }
    var onglet = imgCroix+'<div>'+titre+'</div>';

    $(".popup").remove();
    $(".modal").remove();
    $(".modalGrande").remove();
    $(".onglet1").remove();
    $(".remove").remove();
    
//    console.log ($(".modal"));
 
    if(grandeModal){
       //inserer fonction
        $("body").append( '<div class="popup" style="display:none"><div class="popupbar">'+onglet+'</div><div class="popuplongtext">'+texte+boutonSuite+'</div></div>');
        $(".popup").fadeIn(200);
        $(".onglet1").fadeIn(200);
    }else{
        $("body").append('<div class="popup"  style="display:none"><div class="popupbar">'+onglet+'</div><div class="popuptext">'+texte+boutonSuite+'</div></div>');
        $(".popup").fadeIn(200);
    }
    close();
    
}

function close(){
    

$(document).on("click",".close",function() {
    $(this).parent().parent().remove();
})

$(document).on("click",".close1",function() {
    $('.modalGrande').remove();
    $(this).parent().parent().remove();
    if(nbrElementPoint==5){
        //niveau terminé
        finNiveau1();
    }
})

}

function verifieReponse (numero){
    var testQuizz=true;
    $("input").prop("checked",false);
    if ($("#rep"+numero).attr("data-reponse"+numero)=="1"){
       $("#t_quizz"+numero).css({"font-weight":"bold"});
       $("#t_quizz"+numero).prepend("Bonne réponse : ");
    }    
    /*
    if ($("#rep"+numero).attr("data-reponse"+numero)=="0"){
        testQuizz=false;
        
          if (testQuizz==$("#rep"+numero).prop("checked")){
          $("#t_quizz"+numero).css({"color":"red"});
//          console.log("noooo1");
          }
          else{
          $("#t_quizz"+numero).css({"color":"green"});
//          console.log("oui1");
            }
        
    } 
    else{
        $("#t_quizz"+numero).css({"text-decoration": "underline"});
        $("#t_quizz"+numero).before("Vraie réponse : ");
    }

    if (testQuizz==$("#rep"+numero).prop("checked")){
          $("#t_quizz"+numero).css({"color":"green"});
//          console.log("yesssss1");
          }
    else{
        $("#t_quizz"+numero).css({"color":"red"});
//          console.log("no1")
        
    }
    */

}

function check (){


    
////     cette partie est pour verifier si les bouton sont coché
//    var quizzNbr="";
//   function checkreponse(){
//       compteur==0;
//    if(compteur<=3){
//    
//var testQuizz=true;
//    if ($("#rep"+quizzNbr+"").attr("data-reponse"+quizzNbr+"")=="0"){
//        testQuizz=false;
//        
//          if (testQuizz1==$("#rep"+quizzNbr+"").prop("checked")){
//          $("#t_quizz"+quizzNbr+"").css({"color":"red"});
////          console.log("noooo"+quizzNbr+"");
//          }
//          else{
//          $("#t_quizz"+quizzNbr+"").css({"color":"green"});
////          console.log("oui"+quizzNbr+"");
//            }
//        
//    } 
//    else{
//        $("#t_quizz"+quizzNbr+"").css({"text-decoration": "underline"});
//        
//    }
//    
//    if (testQuizz==$("#rep"+quizzNbr+"").prop("checked")){
//          $("#t_quizz"+quizzNbr+"").css({"color":"green"});
////          console.log("yesssss"+quizzNbr+"");
//          }
//    else{
//        $("#t_quizz"+quizzNbr+"").css({"color":"red"});
////          console.log("no"+quizzNbr+"")
//        
//    }
//        compteur++;    }
//    };
//    
    
verifieReponse(1);
verifieReponse(2);
verifieReponse(3);    
    
    
    
 
}

$(document).on("click",".butSol",function() {
    console.log ("verification");
check ();
})
