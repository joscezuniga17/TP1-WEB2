<?php
//datos de la base de datos
    
    const MYSQL_USER = 'root';
    const MYSQL_PASS = '';
    const MYSQL_DB = 'db_playlistmusical';
    const MYSQL_HOST = 'localhost';

//URL base del proyecto
define('BASE_URL', 'http://localhost/dashboard/WEB2/TP2/');

function getPDOConnection() {
    try {
        $db = new PDO('mysql:host=127.0.0.1;dbname=db_playlistmusical;charset=utf8mb4', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        die('Error de conexión: ' . $e->getMessage());
    }
}


?>