<?php
$resultado = $_GET['resultado'] ?? null; // En caso de que no exista el valor resultado: ?? le asigna null a la variable

require '../includes/funciones.php';
require 'funcionesCustomer.php';
require 'thingSpeak/conexion.php';

$query = obtener_dispositivos();

// Base de datos
$db3 = conectarDB();

// Eliminar dispositivos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if($id) {
        // Eliminar la relacion CustomerDevice
        $query = "DELETE FROM customerdevice WHERE idDevice = $id";
        $resultado = mysqli_query($db3, $query);


        // Eliminar el dispositivo
        $query = "DELETE FROM device WHERE id = $id";
        $resultado = mysqli_query($db3, $query);

        

        if ($resultado) {
            header('Location: index.php?resultado=3');
        }
    }
}

incluirTemplate('header', False, True);

?>

<main class="contenedor seccion">
    <h1>Bienvenido</h1>
    <div class="inicio_img">

    </div>

    <a href="propiedades/crear.php" class="boton btn-verde">Agregar dispositivo</a>

    <h2>Dispositivos</h2>

    <?php if ($resultado == 1) { ?>
        <p class="alerta exito">
            Dispositivo creado correctamente
        </p>
    <?php } elseif ($resultado == 2) { ?>
        <p class="alerta exito">
            Dispositivo modificado correctamente
        </p>
    <?php } elseif ($resultado == 3) { ?>
        <p class="alerta exito">
            Dispositivo eliminado correctamente
        </p>
    <?php } ?>

    <section class="seccion contenedor-dispositivos">
        <?php
        $i = 0;
        while ($devices = mysqli_fetch_assoc($query)) {
            if ($i < 1) {
                if (empty($devices)) { ?>
                    <a href="propiedades/crear.php" class="anuncio">Agrege un Dispositivo. Usted no cuenta con ningun dispositivo</a>
            <?php break;
                }
            } conexionThingSpeak( $devices['id'] ); ?>
            <div class="dispositivo">
                <section class="contenedor-info-botones">

                    <div class="dispositivo-info">
                        <p class="nombre-dispositivo">
                            Nombre: <?php echo $devices['nombre']; ?>
                        </p>
                        <p class="temperatura-dispositivo">
                            Temperatura: <?php echo !$devices['temperatura'] ? "NaN" : $devices['temperatura'] . " C°"; ?>
                        </p>
                        <p class="humedad-dispositivo">
                            Humedad: <?php echo !$devices['humedad'] ? "NaN" : $devices['humedad']; ?>
                        </p>
                    </div>

                    <div class="dispositivo-botones">
                        <a href="propiedades/detalles.php?id=<?php echo $devices['id']; ?>" class="boton btn-verde">Ver Detalles</a>
                        <a href="propiedades/modificar.php?id=<?php echo $devices['id']; ?>" class="boton btn-verde">Modificar</a>
                        <form method="post">
                            <input type="hidden" name="id" value="<?php echo $devices['id']; ?>">    

                            <input type="submit" class="boton btn-rojo" value="Eliminar">
                        </form>
                        
                        <div class="boton-encendido">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-gravatar" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M5.64 5.632a9 9 0 1 0 6.36 -2.632v7.714" />
                            </svg>
                        </div>
                    </div>
                </section>
                <section class="contenedor-descripcion">
                    <p class="dispositivo-descripcion">
                        <?php echo $devices['descripcion']; ?>
                    </p>
                </section>
            </div>

        <?php $i++;
        } ?>
    </section>
</main>

<?php
incluirTemplate('footer', False, True);

?>