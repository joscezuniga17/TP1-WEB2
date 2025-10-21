<?php
session_start();

// Verifica que el usuario esté logueado y sea admin
if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin'){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de Administración</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <p>Bienvenido, <?php echo $_SESSION['id']; ?> (Admin).</p>
    <hr>
    
    <h2>Menú de Administración</h2>
    
    <a href="categorias.php">Administrar Categorías</a><br>
    
    <a href="items.php">Administrar Ítems</a><br>
    
    <hr>
    <a href="logout.php">Salir</a>
</body>
</html>
