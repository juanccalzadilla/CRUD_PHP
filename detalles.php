<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Items details</title>
</head>

<body class="bg container p-4">
    <div class="card">
        <?php
        require './conexion.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $statement = $conexion->prepare("select * from productos where id = $id");
            $statement->execute();
            $result = $statement->fetch();
            echo "<h1 class=\"text-center card-header mb-2\">$result[nombre]</h1>";
            echo"<div class=\"card-body\">";
            
            echo "<h5 class=\"text-center\">Code: $result[id]</h5>";
            echo "<h5 class=\"\">Short name: $result[nombre_corto]</h5>";
            echo "<h5 class=\"\">Family code: $result[familia]</h5>";
            echo "<h5 class=\"\">PVP(Euros): $result[pvp]</h5>";
            echo "<p class=\"card-text\">Description: $result[descripcion]</p>";
            echo"</div>";
        } else {
            echo "<h1>404 ID not found</h1>";
        }


        ?>

</div>
<a class="btn btn-danger w-100" href="./listado.php">Back</a>        
</body>

</html>