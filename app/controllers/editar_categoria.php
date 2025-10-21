<?php
session_start();
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}
include("conexion.php");

$mensaje = "";
$categoria = null;
$id = 0;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql_fetch = "SELECT * FROM categorias WHERE id_categoria = $id";
    $result_fetch = $conn->query($sql_fetch);
    if ($result_fetch->num_rows > 0) {
        $categoria = $result_fetch->fetch_assoc();
    } else {
        $mensaje = "Categoría no encontrada.";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && $categoria){
    $id = (int)$_POST['id_categoria'];
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $imagen = $conn->real_escape_string($_POST['imagen']);

    $sql_update = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id_categoria=$id";
    
    if ($conn->query($sql_update) === TRUE) {
        header("Location: categorias.php?msg=Categoría actualizada exitosamente");
        exit();
    } else {
        $mensaje = "Error al actualizar: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar Categoría</title>
</head>
<body>
    <h1>Editar Categoría</h1>
    <p><a href="categorias.php">Volver a Categorías</a></p>
    <p style="color:red;"><?php echo $mensaje; ?></p>

    <?php if ($categoria): ?>
    <form method="POST">
        <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($categoria['nombre']); ?>" required><br><br>
        Descripción: <textarea name="descripcion"><?php echo htmlspecialchars($categoria['descripcion']); ?></textarea><br><br>
        Imagen (URL): <input type="text" name="imagen" value="<?php echo htmlspecialchars($categoria['imagen']); ?>" placeholder="http://ejemplo.com/foto.jpg"><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <?php endif; ?>
</body>
</html>
