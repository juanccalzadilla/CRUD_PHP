<?php


try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyecto','gestor','secreto');
} catch (PDOException $e) {
echo "Error: ".$e->getMessage();
}


?>