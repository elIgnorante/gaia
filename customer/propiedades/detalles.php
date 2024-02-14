<?php
require '../../includes/funciones.php';
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

$id = intval($_GET['id']);
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
    header('Location: ../index.php');
}

//Incluir el header
incluirTemplate('header', False, True, True);
?>


<main class="contenedor seccion">
    <h1>Titulo</h1>

</main>


<?php
incluirTemplate('footer', False, True, True);

mysqli_close($db);
?>