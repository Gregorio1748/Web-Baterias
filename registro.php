<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bateriasjs";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recibe los datos del formulario
    $Nombres = $_POST['Nombres'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $cedula = $_POST['cedula'] ?? '';
    $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
    $email = $_POST['email'] ?? '';
    $contraseña = isset($_POST['contraseña']) ? password_hash($_POST['contraseña'], PASSWORD_DEFAULT) : '';

    // Consulta preparada
    $sql = "INSERT INTO Registro (Nombres, apellidos, cedula, fecha_nacimiento, email, contraseña) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $Nombres, $apellidos, $cedula, $fecha_nacimiento, $email, $contraseña);

        if ($stmt->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error al registrar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error en prepare(): " . $conn->error;
    }

    $conn->close();
} else {
    echo "Acceso no válido.";
   
    
}
?>