<?php 
// Accedemos a la sesión
session_start();

// Dejamos sin datos al arreglo asociativo $_SESSION
$_SESSION = [];
// Redireccionamos al usuario
header('Location: index.php');


?>