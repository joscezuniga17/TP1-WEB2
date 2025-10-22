<?php
class AuthHelper {
    function __construct() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
    }

    function login($user) {
        $_SESSION['USER'] = $user;
    }

    function logout() {
        session_destroy();
    }

    function verificarLogin() {
        if (!isset($_SESSION['USER'])) {
            header('Location: ' . BASE_URL . 'login');
            die();
        }
    }

    function getUser() {
        return $_SESSION['USER'] ?? null;
    }
}
?>