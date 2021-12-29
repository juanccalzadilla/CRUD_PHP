<?php


try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto','root','');
} catch (PDOException $e) {
echo "Error: ".$e->getMessage();
}


?>