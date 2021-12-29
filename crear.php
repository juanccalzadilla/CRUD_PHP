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
    <form class="">
        <div class="form-group d-flex">
            <input type="text" class="form-control w-50 mx-1" placeholder="Product name" />
            <input type="text" class="form-control w-50 mx-1" placeholder="Short product name" />
        </div>
        <div class="form-group d-flex">
            <input type="number" class="form-control mx-1 mt-2" placeholder="Price ($)" />
            <select class="form-select mx-1 mt-2 ">
                <option selected>Select a family product</option>
                <?php
                require './conexion.php';

                $result = $conexion->query("select * from familias");

                foreach ($result as $family){
                    echo"<option value=\"$family[cod]\">$family[nombre]</option>";
                }
            
                ?>
            </select>
        </div>

        <textarea class="form-control mt-2"  placeholder="Description"></textarea>
        <button type="submit" class="btn btn-success m-2">Create new item</button>
        <button type="reset" class="btn btn-primary m-2">Clean</button>
        <a href="./listado.php"class="btn btn-secondary m-2">Back List</a>
    </form>


</body>

</html>