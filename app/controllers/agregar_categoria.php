<?php
session_start();
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}
include("conexion.php");

$mensaje = "";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $imagen = $conn->real_escape_string($_POST['imagen']);
    
    $sql = "INSERT INTO categorias (nombre, descripcion, imagen) VALUES ('$nombre', '$descripcion', '$imagen')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: categorias.php?msg=Categoría agregada exitosamente");
        exit();
    } else {
        $mensaje = "Error al agregar la categoría: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Agregar Categoría</title>
</head>
<body>
    <h1>Agregar Nueva Categoría</h1>
    <p><a href="categorias.php">Volver a Categorías</a></p>
    <p style="color:red;"><?php echo $mensaje; ?></p>
    
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br><br>
        Descripción: <textarea name="descripcion"></textarea><br><br>
        Imagen (URL): <input type="text" name="imagen" placeholder="http://ejemplo.com/foto.jpg"><br><br>
        <input type="submit" value="Guardar Categoría">
    </form>
</body>
</html>
