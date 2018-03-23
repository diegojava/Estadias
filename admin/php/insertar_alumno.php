<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "root", "prueba");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$nombreAlumno = mysqli_real_escape_string($link, $_POST['nombre']);
$apellidoPaterno = mysqli_real_escape_string($link, $_POST['apaterno']);
$apellidoMaterno = mysqli_real_escape_string($link, $_POST['amaterno']);
$escuela = mysqli_real_escape_string($link, $_POST['escuela']);
$grado = mysqli_real_escape_string($link, $_POST['grado']);
$grupo = mysqli_real_escape_string($link, $_POST['grupo']);
$matricula = mysqli_real_escape_string($link, $_POST['matricula']);
$contrasena = mysqli_real_escape_string($link, $_POST['contrasena']);

// attempt insert query execution
$sql = "INSERT INTO alumnos VALUES ('$matricula', '$nombreAlumno', '$apellidoPaterno', '$apellidoMaterno', sha1('$contrasena'), '$grado', '$grupo','$escuela', 1, 1)";
if(mysqli_query($link, $sql)){
    echo "<div class='alert alert-success'>Los datos del alumno se guardaron exitosamente. $sql </div>";
} else{
    echo "<div class='alert alert-danger'> Hubo un error al guardar los datos. Vuelve a intentarlo. $sql. </div>";
}

// close connection
mysqli_close($link);
?>
