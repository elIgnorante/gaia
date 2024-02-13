<?php
require '../includes/funciones.php';
require 'funcionesCustomer.php';
require 'thingSpeak/conexion.php';

$query = obtener_dispositivos();

incluirTemplate('header', False, True);

?>

<main class="contenedor seccion">
    <h1>Bienvenido</h1>
    <div class="inicio_img">

    </div>

    <a href="propiedades/crear.php" class="boton btn-verde">Agregar dispositivo</a>

    <h2>Dispositivos</h2>

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
                        <button class="boton btn-verde">Ver Detalles</button>
                        <button class="boton btn-verde">Modificar</button>
                        <button class="boton btn-rojo">Eliminar</button>
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