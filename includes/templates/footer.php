<footer class="footer seccion">

    <div class="contenedor contenedor-footer">

        <nav class="navegacion">
            <a href="<?php echo $customer ? ($propiedades ? "../../nosotros.php" : "../nosotros.php") : "nosotros.php" ?> ">Nosotros</a>
            <a href="<?php echo $customer ? ($propiedades ? "../../productos.php" : "../productos.php") : "productos.php" ?> ">Productos</a>
            <a href="<?php echo $customer ? ($propiedades ? "../../blog.php" : "../blog.php") : "blog.php" ?> ">Blog</a>
            <a href="<?php echo $customer ? ($propiedades ? "../../contacto.php" : "../contacto.php") : "contacto.php" ?> ">Contacto</a>
            <a href="<?php echo $customer ? ( $propiedades ? "../../registrarse.php" : "../registrarse.php" ) : "registrarse.php" ?>">Regístrate</a>
            <a class="boton btn-verde" href="<?php echo $customer ? ($propiedades ? "../../iniciarSesion.php" : "../iniciarSesion.php") : "iniciarSesion.php" ?> ">Inicia Sesión</a>
        </nav>

    </div>

    <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
</footer>

<script src=" <?php echo $customer ? ( $propiedades ? "../../build/js/bundle.min.js" : "../build/js/bundle.min.js") : "build/js/bundle.min.js" ?>"></script>
</body>

</html>