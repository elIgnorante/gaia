<?php
require 'includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Inicia Sesión</h1>

    <div class="iniciarSesion_img"> 

    </div>

    <section class="seccion registrarse">
        <a href="registrarse.php">¿No tienes una cuenta en nuestra plataforma? <span>Regístrate</span></a>
    </section>

    <form action="iniciarSesion.php" class="formulario" method="POST">
        <fieldset>
            <legend>Datos de el usuario</legend>

            <label for="name">Usuario:</label>
            <input type="text" id="name" placeholder="Nombre de Usuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Contraseña del Usuario">
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton btn-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>