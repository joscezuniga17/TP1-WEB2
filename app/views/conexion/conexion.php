<?php
// conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "lista de reproducción musical");

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
    $host = "localhost";
$db = "playlist musical"; // Nombre de tu base de datos
$user = "root";
$pass = ""; // Tu contraseña de MySQL/MariaDB
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
