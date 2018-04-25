var respuesta = new Array;
var explicacionRespuesta = new Array;
var tuRespuesta = new Array;
var puntuacion = 0;
 
//aqui pones las respuestas de las preguntas (puedes agregar mas o quitar)
respuesta[1] = "b";
respuesta[2] = "d";
respuesta[3] = "b";
respuesta[4] = "a";
respuesta[5] = "d";



//aqui dices cual respuesta es corecta
explicacionRespuesta[1]="Intentalo de nuevo\n";
explicacionRespuesta[2]="Intentalo de nuevo\n";
explicacionRespuesta[3]="Intentalo de nuevo\n";
explicacionRespuesta[4]="Intentalo de nuevo\n";
explicacionRespuesta[5]="Intentalo de nuevo\n";


 
 
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
if(puntuacion <= 1){textoRespuesta=textoRespuesta+"Necesitas estudiar mas!";}
if(puntuacion >= 2 && puntuacion <= 3){textoRespuesta=textoRespuesta+"Te falta poco!";}
if(puntuacion >= 3 && puntuacion <= 4){textoRespuesta=textoRespuesta+"Bien!";}
if(puntuacion <= 5 && puntuacion >= 5){textoRespuesta=textoRespuesta+"Muy bien!";}
 
alert(textoRespuesta);
}