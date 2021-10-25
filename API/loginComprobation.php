<?php
    include("conexion.php");
    session_start();

    $email = $_GET["email"];
    $password = $_GET["password"];

    $sql = "SELECT * FROM usuarios WHERE email='".$email."' AND contrasena='".$password."'";

    
    $comprobar = mysqli_query($con, $sql);

    if($comprobar->num_rows>0){
        $fila = $comprobar->fetch_row();
        $id = $fila[0];
        $_SESSION["usuario"]= $id;
        header('Location: ../index.php');
    }else{
        header('Location: ../login.php'); 
    }
?>