<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM alumno";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

    $Data=Array();
    while($row=mysqli_fetch_array($query)){ 
    array_push($Data,$row);
    }

    echo json_encode($Data);
    ?>
