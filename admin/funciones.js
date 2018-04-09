//  select relacionado Vehiculo y Marcas -->
$(function(){
$("#vehiculo").change(function(){ // se activa el script cuando selecciono el select vehiculo
	 vehiculo=$(this).val() // Tomo el valor seleccionado
 
	 //envio a una pagina que hara la consulta sql y me devolvera los datos para poner en el select
 
	 $.get("http://localhost/proyectos/agenciaautos/marcas.php?idvehiculo="+vehiculo,
		 function(data){
			 $("#marca").html(data); // Tomo el resultado e inserto los datos en el select marca								
		 });															
});
});		
 