<?php
session_start();
include 'login.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    //Esto obtiene los datos que le mandamos desde el formulario en el html
    $user=$_POST["usuario"];
    $contraseña=$_POST["contrasena"];

    //esta seria la peticion a la base de datos que le decimos que me obtenga un valor cuando usuario y contraseña sean igual a lo que le mandamos
    $PETICION_BASEA_DATOS="SELECT usuario FROM usuarios WHERE usuario='$user' and clave='$contraseña'";

    //Con esto se realiza la peticion a la base de datos
    $resultado=$conn->query($PETICION_BASEA_DATOS);

    //Verificamos que el resultado obtuvo una o mas linea desde la base de datos y si es asi redirige a productos.html
    if($resultado->num_rows>0){
        header("Location:productos.html");
        exit();
    } else {
        echo "'$user'";
        echo "'$contraseña'";
        echo "Usuario o contraseña incorrecto";
    }
}
$conn->close();
?>
