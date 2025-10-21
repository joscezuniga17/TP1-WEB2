<?php
session_start();
include("conexion.php");

$mensaje = "";

if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    // La contraseña debe ser "admin" para el usuario "webadmin"
    $password = md5($_POST['password']); 
    
    // El email "webadmin" es el usuario de prueba
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password' AND rol='admin'";
    $res = $conn->query($sql);

    if($res->num_rows > 0){
        $user = $res->fetch_assoc();
        $_SESSION['id'] = $user['id_usuario'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: admin.php"); // Redirige al panel de administración
        exit();
    } else {
        $mensaje = "Usuario o contraseña incorrectos. Solo acceso a administradores.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login de Administrador</title>
</head>
<body>
    <h1>Acceso de Administrador</h1>
    <p style="color:red;"><?php echo $mensaje; ?></p>
    <form method="POST">
        Usuario/Email: <input type="text" name="email" value="webadmin" required><br><br>
        Contraseña: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
