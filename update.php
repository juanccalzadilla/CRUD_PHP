<?php
require './conexion.php';
$id = $_GET['id'];

$statement = $conexion->prepare("SELECT * FROM productos WHERE id = $id");
$statement->execute();
$resultado = $statement->fetch();


$cod = $conexion->prepare("SELECT nombre FROM familias WHERE cod = '$resultado[familia]'");
$cod->execute();
$rs = $cod->fetch();
try {
    if (isset($_GET['product']) && isset($_GET['short']) && isset($_GET['price']) && isset($_GET['family']) && isset($_GET['descriptions'])) {
        require './conexion.php';
        $name = $_GET['product'];
        $short = $_GET['short'];
        $price = $_GET['price'];
        $family = $_GET['family'];
        $description = $_GET['descriptions'];
        $consulta = "UPDATE productos
        SET `nombre`= :nombre, `nombre_corto` = :nombre_corto, `descripcion` = :descripcion, `pvp` = :pvp, `familia` = :familia
        WHERE `id` = :id";
        $sql = $conexion->prepare($consulta);
        $resultad = $sql->execute(array(
            ':nombre' => $name,
            ':nombre_corto' => $short,
            ':descripcion' => $description,
            ':pvp' => $price,
            ':familia' => $family,
            ':id' => $id
        ));
        if ($resultad) {
            echo '<div class="alert alert-success text-center">Everything has been successfully updated!</div>';
            $statement = $conexion->prepare("SELECT * FROM productos WHERE id = $id");
            $statement->execute();
            $resultado = $statement->fetch();
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
    <title>Update item</title>
</head>

<body class="bg container">
    <h1 class="text-center text-white">Update item</h1>
    <form name="create">
        <?php
        echo '<div class="form-group d-flex">';
        echo "<input type=\"text\" class=\"form-control w-50 mx-1\" name=\"product\" placeholder=\"Product name\" value=\"$resultado[nombre]\"/>";
        echo "<input type=\"text\" class=\"form-control w-50 mx-1\" name=\"short\" placeholder=\"Product name\" value=\"$resultado[nombre_corto]\"/>";
        echo '</div>';


        echo '<div class="form-group d-flex">';
        echo "<input type=\"number\" class=\"form-control mx-1 mt-2\" name=\"price\" placeholder=\"Price($)\" value=\"$resultado[pvp]\"/>";
        echo "<select class=\"form-select mx-1 mt-2\" name=\"family\">";
        echo "<option selected value=\"$resultado[familia]\">$rs[nombre]</option>";
        require './conexion.php';
        $result = $conexion->query("select * from familias");
        foreach ($result as $family) {
            echo "<option value=\"$family[cod]\">$family[nombre]</option>";
        }
        echo "</select>";
        echo '</div>';

        echo "<textarea class=\"form-control mt-2\" name=\"descriptions\" placeholder=\"Description\">$resultado[descripcion]</textarea>";
        echo "<input type=\"hidden\" class=\"form-control mx-1 mt-2\" name=\"id\" value=\"$id\"/>";
        ?>

        <button type="submit" class="btn btn-warning m-2">Update item</button>
        <a href="./listado.php" class="btn btn-secondary m-2">Back List</a>
    </form>



</body>

</html>