<?php
    $hostname="localhost";
    $username="root";
    $password="";
    $databaseName="compraonline";

    $con = mysqli_connect($hostname,$username,$password,$databaseName); 

    if(!$con){
        echo "Error: No se pudo conectar a MySQL. Error " . mysqli_connect_errno() . " : ". mysqli_connect_error() . PHP_EOL;
        die;
    }
?>