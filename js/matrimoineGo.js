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





function pop_up (titre,texte,txtButton,urlButton,croix,grandeModal){
    var codeModal="";
    if (grandeModal){codeModal="1";}
    
    var boutonSuite='';
    
    
    
    
    var imgCroix='<img class="close'+codeModal+'" src="img/icon/close.png" alt="fermer la fenêtre" title="fermer">';
    
//    if(){
//        titre="<p><strong style=\"color:#FC706D; font-size:1.5rem;margin:2px;\">'.$data['femme'].' ('.$data['date_naissance'].'-'.$data['date_mort'].')</strong></p>";
//       }
    
    if(croix==false){
        imgCroix="";
        boutonSuite='<a class="buto" href="'+urlButton+'">'+txtButton+'</a>';
    }
    var onglet='<div class="onglet'+codeModal+'" style="display:"none"><span>'+titre+'</span>'+imgCroix+'</div>';

    
    $(".modal").remove();
    $(".modalGrande").remove();
    $(".onglet1").remove();
    $(".remove").remove();
    
//    console.log ($(".modal"));
 
    if(grandeModal){
       //inserer fonction
        $("body").append( '<div class="remove">'+onglet+'<div class="modalGrande"  style="display:none"><div class="padding1">'+texte+boutonSuite+'</div></div>');
        $(".modalGrande").fadeIn(200);
        $(".onglet1").fadeIn(200);
    }else{
    $("body").append('<div class="modal"  style="display:none">'+onglet+'<div>'+texte+boutonSuite+'</div></div>');
    $(".modal").fadeIn(200);
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
                

            })
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
    
    var testQuizz1=true;
    if ($("#rep1").attr("data-reponse1")=="0"){
        testQuizz1=false;
        
          if (testQuizz1==$("#rep1").prop("checked")){
          $("#t_quizz1").css({"color":"red"});
//          console.log("noooo1");
          }
          else{
          $("#t_quizz1").css({"color":"green"});
//          console.log("oui1");
            }
        
    } 
    else{
        $("#t_quizz1").css({"text-decoration": "underline"});
        
    }
    
    if (testQuizz1==$("#rep1").prop("checked")){
          $("#t_quizz1").css({"color":"green"});
//          console.log("yesssss1");
          }
    else{
        $("#t_quizz1").css({"color":"red"});
//          console.log("no1")
        
    }

    
    
    
    
    var testQuizz2=true;
    if ($("#rep2").attr("data-reponse2")=="0"){
        testQuizz2=false;
        
          if (testQuizz2==$("#rep2").prop("checked")){
          $("#t_quizz2").css({"color":"red"});
          console.log("noooo2");
          }
          else{
          $("#t_quizz2").css({"color":"green"});
          console.log("oui2");
            }
        
    } 
    else{
        $("#t_quizz2").css({"text-decoration": "underline"});
        
    }
    
    if (testQuizz2==$("#rep2").prop("checked")){        
          $("#t_quizz2").css({"color":"green"});
//          console.log("yesssss2");
          }
    else{
        $("#t_quizz2").css({"color":"red"});
//          console.log("no2")
        
    }
    
  
    
    
    var testQuizz3=true;
    if ($("#rep3").attr("data-reponse3")=="0"){
        testQuizz3=false;
        
          if (testQuizz3==$("#rep3").prop("checked")){
          $("#t_quizz3").css({"color":"red"});
          console.log("noooo3");
          }
          else{
          $("#t_quizz3").css({"color":"green"});
          console.log("oui3");
            }
        
    } 
    else{
        $("#t_quizz3").css({"text-decoration": "underline"});
        
        }
        if (testQuizz3==$("#rep3").prop("checked")){
        $("#t_quizz3").css({"color":"green"});
          console.log("yesssss3");
          }
        else{
        $("#t_quizz3").css({"color":"red"});
          console.log("no3")
        
    }
    
    
    
    
    
    
 
}

$(document).on("click",".butSol",function() {
    console.log ("verification");
check ();
})
