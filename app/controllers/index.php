<?php
include('conexion.php');
$query = "SELECT * FROM autor";
$resultado = mysqli_query($conexion, $query);
?>

<h1>Listado de Autores</h1>
<ul>
<?php while($a = mysqli_fetch_assoc($resultado)): ?>
    <li>
        <a href="autor.php?id_autor=<?= $a['id_autor'] ?>">
            <?= $a['nombre'] ?>
        </a> (<?= $a['nacionalidad'] ?>)
    </li>
<?php endwhile; ?>
</ul>
