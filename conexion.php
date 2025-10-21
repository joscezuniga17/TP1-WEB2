<?php
// conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "lista de reproducción musical");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
?>
