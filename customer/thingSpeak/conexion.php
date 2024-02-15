<?php

function conexionThingSpeak($key)
{

    try {
        // Importar las credenciales
        $db2 = conectarDB();

        // URL del canal de ThingSpeak y la API key
        $url = "https://api.thingspeak.com/channels/2422948/feeds.json?api_key=$key&results=1";

        // Obtener los datos de ThingSpeak
        $data = json_decode(file_get_contents($url), true);

        if (!empty($data['feeds'])) {
            $temperatura = $data['feeds'][0]['field1'];
            $humedad = $data['feeds'][0]['field2'];
            $fecha = date('Y-m-d H:i');

            // Insertar los datos en la base de datos
            $sql = "UPDATE device SET temperatura = '$temperatura', humedad = '$humedad', fecha = '$fecha' WHERE id = '$key'";


            if ($db2->query($sql) === TRUE) {
                // echo "Datos guardados correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $db2->error;
            }
        } else {
            echo "No se encontraron datos en ThingSpeak.";
        }
        // Cerrar la conexión
        mysqli_close($db2);
    } catch (\Throwable $th) {
        var_dump($th);
    }
}
