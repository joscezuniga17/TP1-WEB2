<?php
include('conexion.php');
$id_autor = $_GET['id_autor'];
$query = "SELECT canciones.*, autor.nombre AS nombre_autor 
          FROM canciones 
          INNER JOIN autor ON canciones.id_autor = autor.id_autor 
          WHERE canciones.id_autor = $id_autor";
$result = mysqli_query($conexion, $query);
?>

<h1>Canciones del autor</h1>
<ul>
<?php while($c = mysqli_fetch_assoc($result)): ?>
  <li>
    <strong><?= $c['nombre_cancion'] ?></strong><br>
    Álbum: <?= $c['álbum'] ?><br>
    Duración: <?= $c['duración'] ?> min<br>
    Autor: <?= $c['nombre_autor'] ?>
  </li>
<?php endwhile; ?>
</ul>
