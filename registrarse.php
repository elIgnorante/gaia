<?php
require 'includes/funciones.php';
require 'includes/config/database.php';
$db = conectarDB();

// Arreglo con mensajes de errores
$errores = [];

$nombre = '';
$apellidos = '';
$email = '';
$telefono = '';
$nameUsuario = '';
$password = '';
$confPassword = '';
$dates = date('Y/m/d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Recibe y sanitiza los datos del formulario
    $nombre = mysqli_real_escape_string($db, $_POST['name']);
    $apellidos = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $telefono = mysqli_real_escape_string($db, $_POST['telefono']);
    $nameUsuario = mysqli_real_escape_string($db, $_POST['nameUsuario']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $confPassword = mysqli_real_escape_string($db, $_POST['confPassword']);

    if (!$nombre) {
        $errores[] = "Debes añadirle tu nombre";
    }
    if (!$apellidos) {
        $errores[] = "Debes añadir tus apellidos";
    }
    if ($email == '') {
        $errores[] = "Debes añadir un email";
    }
    if ($telefono == '') {
        $errores[] = "Debes añadir un numero telefonico";
    }
    if (!$nameUsuario) {
        $errores[] = "Debes añadir un nombre de usuario";
    }
    if ($password == '') {
        $errores[] = "Debes añadir una contraseña";
    }
    if ($confPassword == '') {
        $errores[] = "Debes de confirmar tu contraseña";
    }


    // Verificar si no hay errores
    if (empty($errores)) {
        if ($password !== $confPassword) {
            $errores[] = "Las contraseñas no coinciden";
        } else {
            // Hash de la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertar usuario en la base de datos
            $query = "INSERT INTO customer (nombre, apellido, email, numero, nombreUsuario, passwordd, dates) 
                  VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$nameUsuario', '$hashed_password', '$dates')";
            $resultado = mysqli_query($db, $query);

            if ($resultado) {
                // Registro exitoso
                header('Location: iniciarSesion.php');
                exit;
            } else {
                $errores[] = "Hubo un error en el registro, por favor inténtalo de nuevo.";
            }
        }
    }
}


incluirTemplate('header');


?>

<main class="contenedor seccion">
    <h1>Regístrate</h1>

    <div class="registrate_img">

    </div>

    <section class="seccion registrarse">
        <a href="iniciarSesion.php">¿Ya tienes una cuenta en nuestra plataforma? <span>Inicia Sesión</span></a>
    </section>

    <form  class="formulario" method="POST">
        <fieldset>
            <legend>Datos personales</legend>

            <label for="name">Nombre(s):</label>
            <input type="text" id="name" placeholder="Ingresa tu(s) Nombre(s)" value="<?php echo $nombre; ?>" name="name">

            <label for="lastName">Apellidos:</label>
            <input type="text" id="lastName" placeholder="Ingresa tus Apellidos" value="<?php echo $apellidos; ?>" name="lastName">

            <label for="email">E-mail</label>
            <input id="email" type="email" placeholder="Ingresa tu Email" value="<?php echo $email; ?>" name="email">

            <label for="telefono">Telefono</label>
            <input id="telefono" type="tel" placeholder="Ingresa tu Número Telefonico" value="<?php echo $telefono; ?>" name="telefono">
        </fieldset>

        <fieldset>
            <legend>Datos de Usuario</legend>

            <label for="nameUsuario">Nombre de Usuario:</label>
            <input type="text" id="nameUsuario" placeholder="Crea un Nombre para tu Usuario" value="<?php echo $nameUsuario; ?>" name="nameUsuario">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Crea una Contraseña para tu Usuario" value="<?php echo $password; ?>" name="password">

            <label for="confPassword">Confirmar Contraseña:</label>
            <input type="password" id="confPassword" placeholder="Repite tu contraseña" value="<?php echo $confPassword; ?>" name="confPassword">
        </fieldset>

        <input type="submit" value="Registrate" class="boton btn-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>