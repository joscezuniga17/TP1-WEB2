<?php
require_once './app/controllers/cancionesController.php';

class CancionesView {
    function mostrarListado($canciones) {
        include 'app/views/canciones/listarCanciones.phtml';
    }

    function mostrarDetalle($canciones) {
        include 'app/views/templates/header.phtml';
        include 'app/views/canciones/detalleCancion.phtml';
        include 'app/views/templates/footer.phtml';
    }

    function mostrarFormAgregar($autores) {
        include 'app/views/templates/header.phtml';
        include 'app/views/canciones/formAgregar.phtml';
        include 'app/views/templates/footer.phtml';
    }

    function mostrarFormEditar($cancion, $autores) {
        include 'app/views/templates/header.phtml';
        include 'app/views/canciones/formEditar.phtml';
        include 'app/views/templates/footer.phtml';
    }
}
?>