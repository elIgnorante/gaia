<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poseidon</title>

    <link rel="stylesheet" href=" <?php echo $customer ? ( $propiedades ? "../../build/css/app.css" : "../build/css/app.css") : "build/css/app.css" ?>" >
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="<?php echo $inicio ? 'sobra' : 'no-inicio'; ?>">
            <div class="contenedor contenido-header">
                <div class="barra">
                    <a href="<?php echo $customer ? ( $propiedades ? "../../index.php" : "../index.php") : "index.php" ?>">
                        <picture class="image-header">
                            <source srcset=" <?php echo $customer ? ( $propiedades ? "../../build/img/logo_.webp" : "../build/img/logo_.webp" ) : "build/img/logo_.webp" ?>" type="image/webp">
                            <source srcset=" <?php echo $customer ? ( $propiedades ? "../../build/img/logo_.png" : "../build/img/logo_.png" ) : "build/img/logo_.png" ?>" type="image/png">

                            <img class="logo-header" src="<?php echo $customer ? ( $propiedades ? "../../build/img/logo_.png" : "../build/img/logo_.png" ) : "build/img/logo_.png" ?>" alt="Logo Header">
                        </picture>
                    </a>

                    <nav class="navegacion">
                        <a href="<?php echo $customer ? ( $propiedades ? "../../nosotros.php" : "../nosotros.php" ) : "nosotros.php" ?>">Nosotros</a>
                        <a href="<?php echo $customer ? ( $propiedades ? "../../productos.php" : "../productos.php" ) : "productos.php" ?> ">Productos</a>
                        <a href="<?php echo $customer ? ( $propiedades ? "../../blog.php" : "../blog.php" ) : "blog.php" ?>">Blog</a>
                        <a href="<?php echo $customer ? ( $propiedades ? "../../contacto.php" : "../contacto.php" ) : "contacto.php" ?> ">Contacto</a>
                        <?php if(!$auth) { ?>
                            <a href="<?php echo $customer ? ( $propiedades ? "../../registrarse.php" : "../registrarse.php" ) : "registrarse.php" ?>">Regístrate</a>
                            <a class="boton btn-verde" href="<?php echo $customer ? ( $propiedades ? "../../iniciarSesion.php" : "../iniciarSesion.php" ) : "iniciarSesion.php" ?>">Inicia Sesión</a>
                        <?php } ?>
                        <?php if($auth) { ?>
                            <a href="<?php echo $customer ? ( $propiedades ? "../../cerrar-sesion.php": "../cerrar-sesion.php") : "cerrar-sesion.php" ?> ">Cerrar Sesión</a>
                        <?php } ?>
                    </nav>
                </div> <!--barra-->

                <?php if ($inicio) { ?>
                    <h1>Monitoreo de Jardines Sustentables con Tecnología de Punta.</h1>
                <?php }?>
            </div> <!--contenido-header-->
        </div> <!--sobra-->
    </header>