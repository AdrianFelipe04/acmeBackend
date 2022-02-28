<?php 
    $contraseña = "Felipe-12345678";
    $usuario = "id18529986_adrian";
    $nombre_base_de_datos = "id18529986_acme";
    try {
        return new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
    } catch (Exception $e) {
        echo "Ocurrió algo con la base de datos: " . $e->getMessage();
    }
?>