<?php 
$id = $_GET['id'];
$sql = "DELETE FROM productos where id = $id";
require './conexion.php';
$statement = $conexion->prepare($sql);

$statement->execute();


if($statement->rowCount() > 0)
{
$count = $statement -> rowCount();
echo "<div class='content alert alert-primary text-center' > El producto con codigo: $id ha sido eliminado</div>";
echo "<a class='btn btn-primary text-center w-100' href='listado.php'><- Volver</a>";
    
}
else{
    echo "<div class='content alert alert-danger text-center'> No se pudo eliminar el registro (O ya ha sido eliminado) </div>";
    echo "<a class='btn btn-primary text-center w-100' href='listado.php'><- Volver</a>";
    
    // print_r($statement->errorInfo()); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo"<title>Delete item COD $id</title>"?>
</head>
<body class="bg">
</body>
</html>