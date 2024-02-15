<?php
// Validar inicio de sesión
require '../../includes/funciones.php';
$auth = estaAutenticado();

if(!$auth) {
    header('Location: ../../index.php');
}
// Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);


if (!$id) {
    header('Location: ../index.php');
}

// Consultar para obtener los datos del dispositivo
// Consultar
$queryDevice = "SELECT * FROM device WHERE id = $id; ";

// Obtener resultados
$resultadoDevice = mysqli_query($db, $queryDevice);

if($resultadoDevice->num_rows === 0) {
    header('Location: ../index.php');
}

$device = mysqli_fetch_assoc($resultadoDevice);

// Arreglo con mensajes de errores
$errores = [];

$nombre = $device['nombre'];
$descripcion = $device['descripcion'];
$temMinima = $device['temMinima'];
$temMaxima = $device['temMaxima'];
$humMinima = $device['humMinima'];
$humMaxima = $device['humMaxima'];
$modelo = $device['modelo'];
$idConexion = $device['idConexion'];



// Ejecuta el código después de que el usuairo envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    // La función mysqli_real_escape_string nos protege de inyecciones SQL: Sanitizar
    $nombre = mysqli_real_escape_string($db, $_POST['nombre']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $temMinima = mysqli_real_escape_string($db, $_POST['temMinima']);
    $temMaxima = mysqli_real_escape_string($db, $_POST['temMaxima']);
    $humMinima = mysqli_real_escape_string($db, $_POST['humMinima']);
    $humMaxima = mysqli_real_escape_string($db, $_POST['humMaxima']);
    $modelo = mysqli_real_escape_string($db, $_POST['modelo']);
    $idConexion = mysqli_real_escape_string($db, $_POST['idConexion']);

    


    // Validación del formulario

    if (!$nombre) {
        $errores[] = "Debes añadirle un nombre al dispositivo";
    }
    if (!$descripcion) {
        $errores[] = "Debes añadir una descripcion";
    }
    if (!$temMinima) {
        $errores[] = "Debes añadir una temperatura minima";
    }
    if (!$temMaxima) {
        $errores[] = "Debes añadir una temperatura máxima";
    }
    if ($humMinima == '') {
        $errores[] = "Debes añadir una humedad minima";
    }
    if (!$humMaxima) {
        $errores[] = "Debes añadir una humedad máxima";
    }
    if (!$modelo) {
        $errores[] = "Debes añadir el modelo del dispositivo";
    }
    if (!$idConexion) {
        $errores[] = "Debes añadir el id del dispositivo";
    }
    if ($temMinima > $temMaxima) {
        $errores[] = "La temperatura minima no puede ser mayor a la temperatura máxima";
    }
    if ($humMinima > $humMaxima) {
        $errores[] = "La humedad minima no puede ser mayor a la humedad máxima";
    }

    // Revisar que el array de errores este vacio
    if (empty($errores)) {
        // Actualizar en la base de datos
        $query = "UPDATE device 
          SET idConexion = '$idConexion',
              nombre = '$nombre', 
              temMinima = '$temMinima', 
              temMaxima = '$temMaxima', 
              humMinima = '$humMinima', 
              humMaxima = '$humMaxima', 
              descripcion = '$descripcion', 
              modelo = '$modelo' 
          WHERE id = '$id' ";
        $resultado = mysqli_query($db, $query);



        if ($resultado) {
            header('Location: ../index.php?resultado=2');
        }
    }
}


//Incluir el header
incluirTemplate('header', False, True, True);


?>

<main class="contenedor seccion">
    <h1>Modificar Dispositivo</h1>

    <a href="../index.php" class="boton btn-verde">Volver</a>

    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>


    <form method="POST" class="formulario">
        <fieldset>
            <legend>Información General</legend>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Nombre Cacteristico" value="<?php echo $nombre; ?>">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" placeholder="Agrege una Descripcion"> <?php echo $descripcion; ?></textarea>

            <label for="temMinima">Temperatura minima:</label>
            <input type="number" name="temMinima" id="temMinima" placeholder="Establece una temperatura minima" value="<?php echo $temMinima ?>">

            <label for="temMaxima">Temperatura máxima:</label>
            <input type="number" name="temMaxima" id="temMaxima" placeholder="Establece una temperatura maxima" value="<?php echo $temMaxima ?>">

            <label for="humMinima">Humedad minima:</label>
            <input type="number" name="humMinima" id="humMinima" placeholder="Establece una humedad minima" value="<?php echo $humMinima ?>">

            <label for="humMaxima">Humedad máxima:</label>
            <input type="number" name="humMaxima" id="humMaxima" placeholder="Establece una humedad maxima" value="<?php echo $humMaxima ?>">

            <label for="modelo">Modelo:</label>
            <input type="text" id="modelo" name="modelo" placeholder="Modelo del dispositivo" value="<?php echo $modelo; ?>">

            <label for="idConexion">ID del dispositivo:</label>
            <input type="text" id="idConexion" name="idConexion" placeholder="Ej: R9ZG3AJ3GGJHEJ" value="<?php echo $idConexion; ?>">

        </fieldset>

        <input type="submit" value="Modificar dispositivo" class="boton btn-verde">
    </form>
</main>

<?php
incluirTemplate('footer', False, True, True);

mysqli_close($db);
?>