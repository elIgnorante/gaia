<?php
require '../../includes/funciones.php';
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

// Arreglo con mensajes de errores
$errores = [];

$nombre = '';
$descripcion = '';
$id = '';

// Ejecuta el código después de que el usuairo envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // La función mysqli_real_escape_string nos protege de inyecciones SQL: Sanitizar
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $id = mysqli_real_escape_string($db, $_POST['id']);


    // Validación del formulario

    if (!$nombre) {
        $errores[] = "Debes añadirle un nombre al dispositivo";
    }
    if (!$descripcion) {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$id) {
        $errores[] = "Debes añadir el id del dispositivo";
    }

    // Revisar que el array de errores este vacio
    if (empty($errores)) {
        // Insertar en la base de datos
        $query = " INSERT INTO customerDevice (idCustomer, idDevice, nombre, descripcion) VALUES ( '$idCustomer', '$id', '$nombre', '$descripcion')";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('Location: ../index.php');
        }
    }
}

//Incluir el header
incluirTemplate('header', False, True, True);


?>

<main class="contenedor seccion">
    <h1>Agregar Dispositivo</h1>

    <a href="../index.php" class="boton btn-verde">Volver</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>


    <form method="POST" action="crear.php" class="formulario">
        <fieldset>
            <legend>Información General</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre Cacteristico" value="<?php echo $nombre; ?>">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" placeholder="Agrege una Descripcion"> <?php echo $descripcion; ?></textarea>

            <label for="id">ID del dispositivo:</label>
            <input type="text" id="id" name="id" placeholder="Ej: R9ZG3AJ3GGJHEJ" value="<?php echo $id; ?>">

        </fieldset>

        <input type="submit" value=" Agregar dispositivo" class="boton btn-verde">
    </form>
</main>

<?php
incluirTemplate('footer', False, True, True);
?>