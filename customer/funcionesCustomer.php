<?php

function obtener_dispositivos ($idCustomer) {
    try {
        // Importar las credenciales
        require '../includes/config/database.php';
        $db = conectarDB();
        // Consulta SQL
        $sql = "SELECT d.* 
        FROM device AS d
        INNER JOIN customerDevice AS cd ON d.id = cd.idDevice
        WHERE cd.idCustomer = '$idCustomer';
        ";
        $query = mysqli_query($db, $sql);

        // Extrer la información


        // Cerrar la conexión
        mysqli_close($db);
        // Acceder a los resultados
        return $query;

    } catch (\Throwable $th) {
         var_dump($th);
    }
}