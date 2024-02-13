<?php
require 'includes/funciones.php';
incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Regístrate</h1>

    <div class="registrate_img"> 

    </div>

    <section class="seccion registrarse">
        <a href="iniciarSesion.php">¿Ya tienes una cuenta en nuestra plataforma? <span>Inicia Sesión</span></a>
    </section>

    <form action="registrate.php" class="formulario" method="POST">
        <fieldset>
            <legend>Datos personales</legend>

            <label for="name">Nombre(s):</label>
            <input type="text" id="name" placeholder="Ingresa tu(s) Nombre(s)">

            <label for="lastName">Apellidos:</label>
            <input type="text" id="lastName" placeholder="Ingresa tus Apellidos">

            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Ingresa tu Email">

            <label for="telefono">Telefono</label>
            <input id="telefono" type="tel" placeholder="Ingresa tu Número Telefonico">
        </fieldset>

        <fieldset>
            <legend>Datos de Usuario</legend>

            <label for="nameUsuario">Nombre de Usuario:</label>
            <input type="text" id="nameUsuario" placeholder="Crea un Nombre para tu Usuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Crea una Contraseña para tu Usuario">
        </fieldset>

        <input type="submit" value="Registrate" class="boton btn-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>