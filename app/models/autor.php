<?php
incluir('conexión.php');
$id_autor=$_CONSEGUIR['id_autor'];
$consulta="SELECCIONA canciones.*, autor.nombre AS nombre_autor
          DE canciones
          INNER JOIN autor ON canciones.id_autor = autor.id_autor
          DONDE canciones.id_autor =$id_autor";
$resultado=consulta mysqli($conexión,$consulta);
?>

<h1>Canciones del autor</h1>
<ul>
<?php mientras($do=asociación de búsqueda de mysqli($resultado)):?>
  <li>
    <fuerte><?= $do['nombre_cancion']?></strong><br>
    Álbum:<?= $do['álbum']?><br>
    Duración:<?= $do['duración']?>mín.
    Autor:<?= $do['nombre_autor']?>
  </li>
<?php mientras tanto;?>
</ul>
