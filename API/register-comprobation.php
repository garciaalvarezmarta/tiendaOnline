<?php
    include("conexion.php");

    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $email  =$_GET["email"];
    $password = $_GET["password"];

    $sql="INSERT INTO usuarios (nombre, apellido, email, contrasena) VALUES ('".$name."','".$surname."','".$email."','".$password."')";

    mysqli_query($con, $sql);
    
    header('Location: ../index.php');

?>