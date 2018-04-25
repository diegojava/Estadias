var respuesta = new Array;
var explicacionRespuesta = new Array;
var tuRespuesta = new Array;
var puntuacion = 0;
 
//aqui pones las respuestas de las preguntas (puedes agregar mas o quitar)
respuesta[1] = "a";
respuesta[2] = "a";
respuesta[3] = "b";

//aqui dices cual respuesta es corecta
explicacionRespuesta[1]="La respuesta corecta era A\n";
explicacionRespuesta[2]="La respuesta corecta era A\n";
explicacionRespuesta[3]="La respuesta corecta era B\n";

 
 
function Motor(pregunta, respuesta){
   tuRespuesta[pregunta]=respuesta;
}
 
function Puntuacion(){
var textoRespuesta = "Asi lo has hecho:\n";
puntuacion=0;
for(i=1;i<=5;i++){
   textoRespuesta=textoRespuesta+"Pregunta "+i+": ";
   if(respuesta[i] != tuRespuesta[i]){
      textoRespuesta=textoRespuesta+explicacionRespuesta[i];
   }
   else{
      textoRespuesta=textoRespuesta+"Has respondido correctamente!\n";
      puntuacion++;
   }
}
 
textoRespuesta=textoRespuesta+"PUNTUACION FINAL : "+puntuacion+"\n";
 
textoRespuesta=textoRespuesta+"Comentario : ";
if(puntuacion <= 4){textoRespuesta=textoRespuesta+"Necesitas estudiar mas!";}
if(puntuacion >= 5 && puntuacion <= 6){textoRespuesta=textoRespuesta+"Te falta poco!";}
if(puntuacion >= 7 && puntuacion <= 8){textoRespuesta=textoRespuesta+"Bien!";}
if(puntuacion > 8){textoRespuesta=textoRespuesta+"Muy bien!";}
 
alert(textoRespuesta);
}