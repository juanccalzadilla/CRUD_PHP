<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Listado Tema 3</title>
</head>

<body class="container bg">
    <h1 class="text-center text-white">Gestion de productos</h1>
    <a class="btn btn-success mb-2" href="./crear.php">New item</a>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Details</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php

            require './conexion.php';

            $
             = $conexion->query("SELECT * from productos");
            foreach ($result as $product) {
                echo "<tr>";

                echo "<th scope=\"row\"><button class=\"btn btn-primary\">Details</button></th>";
                echo "<td>$product[id]</td>";
                echo "<td>$product[nombre]</td>";
                echo "<td><button class=\"btn btn-danger mx-1\">Delete</button><button class=\"btn btn-warning\">Update</button></td>";
                echo "</tr>";
            }
            ?> 

        </tbody>
    </table>
</body>

</html>