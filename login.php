<?php
// Configuración de la base de datos
$servidor = "localhost";
$usuario = "root"; // Cambia según tu configuración
$clave = ""; // Cambia según tu configuración
$base_datos = "bateriasjs"; // Nombre de la base de datos

// Conexión a MySQL
$conn = new mysqli($servidor, $usuario, $clave, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>