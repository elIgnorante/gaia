<?php
    require 'app.php';

    function incluirTemplate ( string $nombre, bool $inicio = false, bool $customer = false, bool $propiedades = false ) {
        include TEMPLATES_URL . "/$nombre.php";
    }

?>