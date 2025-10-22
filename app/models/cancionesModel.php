<?php
require_once './config.php';

class CancionesModel {
    private $db;

    public function __construct() {
        try{
        $this->db = new PDO(
        "mysql:host=localhost;dbname=db_playlistmusical;charset=utf8mb4", "root", "");
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            die ("Error de conexión: " . $e->getMessage());
        }
    }

    public function obtenerCanciones() {
    $query = $this->db->prepare("SELECT * FROM canciones");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_OBJ);
    }

    

    public function insertarCancion($data) {
        $query = $this->db->prepare("INSERT INTO canciones (nombre_cancion, anio, album, duracion, mood_cancion, genero_musical, id_autor) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $query->execute([
            $data['nombre_cancion'],
            $data['anio'] ?? null,
            $data['album'],
            $data['duracion'] ?? null,
            $data['mood_cancion'] ?? null,
            $data['genero_musical'],
            $data['id_autor'],
        ]);
    }

    public function actualizarCancion($data) {
        $query = $this->db->prepare("UPDATE canciones SET nombre=?, año=?, album=?, duracion=?, mood=?, genero=?, id_autor=? WHERE id=?");
        $query->execute([
            htmlspecialchars($data['nombre_cancion']),
            htmlspecialchars($data['anio']),
            htmlspecialchars($data['album']),
            htmlspecialchars($data['duracion']),
            htmlspecialchars($data['mood_cancion']),
            htmlspecialchars($data['genero_musical']),
            htmlspecialchars($data['id_autor']),
            $data['id']
        ]);
    }

    public function eliminarCancion($id) {
        $query = $this->db->prepare("DELETE FROM canciones WHERE id=?");
        $query->execute([$id]);
    }
}
?>
