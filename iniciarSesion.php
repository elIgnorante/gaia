<?php
require 'includes/funciones.php';
require 'includes/config/database.php';
$db = conectarDB();

$errores = [];

$email = '';
$password = '';


// Autenticar el usuario
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
        $errores[] = 'El email es obligatorio o no es valido';
    }
    if(!$password) {
        $errores[] = 'La contraseña es obligatoria';
    }

    if(empty($errores)) {

        // Revisar si el usuario existe
        $query = "SELECT * FROM customer WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);

        // Validaciones
        if ( $resultado->num_rows ) {
            $usuario = mysqli_fetch_assoc($resultado);
            // Revisar si el password es correcto
            $auth = password_verify($password, $usuario['passwordd']);
            
            if($auth) {
                // El usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesión
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['usuario'] = $usuario['nombreUsuario'];
                $_SESSION['login'] = true;
                $_SESSION['idCus'] = $usuario['id'];

                header('Location: customer/index.php');
            } else {
                $errores[] = 'La contraseña es incorrecta';
            }
            
        } else {
            $errores[] = 'El usuario no existe';
        }
    }

}


incluirTemplate('header');

?>

<main class="contenedor seccion">
    <h1>Inicia Sesión</h1>

    <div class="iniciarSesion_img"> 

    </div>

    <section class="seccion registrarse">
        <a href="registrarse.php">¿No tienes una cuenta en nuestra plataforma? <span>Regístrate</span></a>
    </section>

    <form  class="formulario" method="POST">
        <fieldset>
            <legend>Datos de el usuario</legend>

            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Email del Usuario" name="email" value="<?php echo $email ?>" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" placeholder="Contraseña del Usuario" name="password" value="<?php echo $password ?>" required>
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton btn-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>