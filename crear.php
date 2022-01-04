<?php

try {


    if (isset($_GET['product']) && isset($_GET['short']) && isset($_GET['price']) && isset($_GET['family']) && isset($_GET['descriptions'])) {
        require './conexion.php';
        $name = $_GET['product'];
        $short = $_GET['short'];
        $price = $_GET['price'];
        $family = $_GET['family'];
        $description = $_GET['descriptions'];

        $statement = $conexion->prepare(
            'INSERT INTO productos (id,nombre,nombre_corto,descripcion,pvp,familia)
                    VALUES (null,:nombre,:nombre_corto,:descripcion,:pvp,:familia)                    
                   '
        );
        $resultado = $statement->execute(array(

            ':nombre' => $name,
            ':nombre_corto' => $short,
            ':descripcion' => $description,
            ':pvp' => $price,
            ':familia' => $family
        ));
        if ($resultado) {
            echo '<div class="alert alert-success text-center">New item saved!</div>';
        } else {

            // echo $statement->errorInfo();
            echo '<div class="alert alert-danger text-center">All fields are required!</div>';
        }
    }
} catch (PDOException $e) {
    echo "PDOException: " . $e->getMessage();
}







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>New item</title>
</head>

<body class="bg container">
    <h1 class="text-center text-white">New item</h1>
    <form name="create">
        <div class="form-group d-flex">
            <input type="text" class="form-control w-50 mx-1" name="product" placeholder="Product name" />
            <input type="text" class="form-control w-50 mx-1" name="short" placeholder="Short product name" />
        </div>
        <div class="form-group d-flex">
            <input type="number" class="form-control mx-1 mt-2" name="price" placeholder="Price ($)" />
            <select class="form-select mx-1 mt-2" name="family">
                <option selected>Select a family product</option>
                <?php
                require './conexion.php';

                $result = $conexion->query("select * from familias");

                foreach ($result as $family) {
                    echo "<option value=\"$family[cod]\">$family[nombre]</option>";
                }

                ?>
            </select>
        </div>

        <textarea class="form-control mt-2" name="descriptions" placeholder="Description"></textarea>
        <button type="submit" class="btn btn-success m-2">Create new item</button>
        <button type="reset" class="btn btn-primary m-2">Clean</button>
        <a href="./listado.php" class="btn btn-secondary m-2">Back List</a>
    </form>


</body>

</html>