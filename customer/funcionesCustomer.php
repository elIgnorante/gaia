<?php

function eliminarDispositivo() {
    echo "test";
}

function cerrarSesion() {

}
function obtener_dispositivos () {
    try {
        // Importar las credenciales
        require '../includes/config/database.php';
        $db = conectarDB();
        // Consulta SQL
        $sql = "SELECT * FROM device;";
        // Realizar la consulta
        $query = mysqli_query($db, $sql);
        // Cerrar la conexión
        mysqli_close($db);
        // Acceder a los resultados
        return $query;

    } catch (\Throwable $th) {
         var_dump($th);
    }
}