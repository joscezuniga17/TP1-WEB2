<?php
session_start();
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}
include("conexion.php");

// Lógica de ELIMINAR Categoría
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    // Usar consultas preparadas es más seguro en un entorno real
    $sql = "DELETE FROM categorias WHERE id_categoria = $id";
    if ($conn->query($sql) === TRUE) {
        // Redirigir para evitar reenvío del formulario
        header("Location: categorias.php?msg=Categoria eliminada correctamente");
        exit();
    } else {
        $mensaje_error = "Error al eliminar la categoría: " . $conn->error;
    }
}

// Lógica de LISTAR Categorías
$sql = "SELECT id_categoria, nombre, descripcion, imagen FROM categorias";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administrar Categorías</title>
</head>
<body>
    <h1>Administrar Categorías</h1>
    <p><a href="admin.php">Volver al Panel</a> | <a href="agregar_categoria.php">Agregar Nueva Categoría</a></p>
    <hr>
    
    <?php if (isset($_GET['msg'])): ?>
        <p style="color:green;"><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>
    <?php if (isset($mensaje_error)): ?>
        <p style="color:red;"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>

    <h2>Lista de Categorías</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Imagen (URL)</th>
            <th>Acciones</th>
        </tr>
        <?php while($row = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id_categoria']; ?></td>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo htmlspecialchars(substr($row['descripcion'], 0, 50)); ?>...</td>
            <td><?php echo htmlspecialchars($row['imagen']); ?></td>
            <td>
                <a href="editar_categoria.php?id=<?php echo $row['id_categoria']; ?>">Editar</a> |
                <a href="?eliminar=<?php echo $row['id_categoria']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar esta categoría?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

