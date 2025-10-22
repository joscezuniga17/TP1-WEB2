<?php
require_once './app/controllers/cancionesController.php';
require_once './app/controllers/authController.php';

$cancionesController = new CancionesController();
$authController = new AuthController();

$action = $_GET['action'] ?? 'home';
switch ($action) {
    case 'home' :
    case 'mostrarLista':
        $cancionesController-> mostrarLista();
        break;
    case 'detalle':
        $cancionesController->mostrarDetalle($_GET['id']);
        break;
    case 'agregar':
        $cancionesController->mostrarFormAgregar();
        break;
    case 'guardarNueva' :
        $cancionesController->guardarNueva();
        break;
    case 'editar':
        $cancionesController->mostrarFormEditar($_GET['id']);
        break;
    case 'actualizar':
        $cancionesController->actualizar();
        break;
    case 'eliminar':
        $cancionesController->eliminar($_GET['id']);
        break;
    case 'login':
        $authController->mostrarLogin();
        break;
    case 'validarLogin':
        $authController->validarLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    default:
        echo "Página no encontrada.";
        break;
}
?>