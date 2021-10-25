<?php
    include("conexion.php");

    $sql= "SELECT * from productos";
    $result = mysqli_query($con, $sql);

?>