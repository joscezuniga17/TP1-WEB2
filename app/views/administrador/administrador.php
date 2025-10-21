<?php
inicio de sesión();

// Verifica que el usuario esté logueado y sea admin
si(!problema($_SESIÓN['rol']) ||$_SESIÓN['rol'] !='administración'){
    encabezamiento("Ubicación: login.php");
    salida();
}
?>
<!DOCTYPE html>
<html lang="es">
<cabeza>
    <title>Panel de Administración</title>
</cabeza>
<cuerpo>
    <h1>Panel de Administración</h1>
    Bienvenido,<?php eco $_SESIÓN['identificación'];?>(Administrador).</p>
    <hr>
    
    <h2>Menú de Administración</h2>
    
    <a href="categorias.php">Administrar Categorías</a><br>
    
    <a href="items.php">Administrar elementos</a><br>
    
    <hr>
    <a href="logout.php">Salir</a>
</cuerpo>
</html>
