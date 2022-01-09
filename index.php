<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM alumno";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> CRUD ALUMNO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>Ingrese los siguientes datos</h1>
                                <form action="insertar.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="cod_estudiante" placeholder="Numero de control">
                                    <input type="text" class="form-control mb-3" name="dni" placeholder="CURP">
                                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombre Completo">
                                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                                    
                                    <input type="submit" class="btn btn-primary">
                                </form>
                                <div class="btn-toolbar"> 
        <button type="button" class="btn btn-success my-5 mr-5" data-toggle="modal" onclick="">
          Mostrar XML
        </button>
        <a  class="btn btn-info my-5 mr-5"  href="json.php" data-toggle="modal"  onclick="" >
          Mostrar JSON
</a>
                        </div>
</div>
                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Numero de Control</th>
                                        <th>CURP</th>
                                        <th>Nombre Completo</th>
                                        <th>Apellidos</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                        $Data=Array();
                                            while($row=mysqli_fetch_array($query)){ 
                                                array_push($Data,$row);
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['cod_estudiante']?></th>
                                                <th><?php  echo $row['dni']?></th>
                                                <th><?php  echo $row['nombres']?></th>
                                                <th><?php  echo $row['apellidos']?></th>    
                                                <th><a href="actualizar.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['cod_estudiante'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            </tr>
                                        <?php 
                                            } //echo json_encode($Data);
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>