<?php
require_once './config.php';
require_once './app/controllers/cancionesController.php';

class AutorModel {
    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=127.0.0.1;dbname=db_playlistmusical;charset=utf8mb4', 'root', '');
    }

    function obtenerAutores() {
        $query = $this->db->prepare("SELECT * FROM autor");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAutorPorNombre($autor) {
    $query = $this->db->prepare("SELECT * FROM autor WHERE autor = ?");
    $query->execute([$autor]);
    return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarAutor($autor) {
        $query = $this->db->prepare("INSERT INTO autor (autor) VALUES (?)");
        $query->execute([$autor]);
        return $this->db->lastInsertId(); // devuelve el id_autor generado
    }
}
?>